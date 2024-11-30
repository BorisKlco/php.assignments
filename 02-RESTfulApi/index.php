<?php
// init
const BASE_PATH = __DIR__ . DIRECTORY_SEPARATOR;
require_once BASE_PATH . 'db.php';
$request = parse_url($_SERVER["REQUEST_URI"])['path'];
$method = $_SERVER['REQUEST_METHOD'];

// process
$request = explode('/', $request);
array_shift($request);

// handle
if ($request[0] != 'tasks') {
    $data = ['status' => 'Wrong path, (/tasks)'];
    response($data);
}

match ($method) {
    'GET' => show(),
    'POST' => create(),
    'PUT' => update(),
    'DELETE' => destroy(),
};

function show()
{
    $tasks = Database::q('SELECT token,task,created,modified FROM tasks WHERE removed = 0')->fetchAll();
    response($tasks);
}
function create()
{
    $data = getData();
    if ($data['task'] ?? false) {
        $token = getToken();
        $create = Database::q('INSERT INTO tasks (task, token) VALUES (:task, :token)', ['task' => htmlspecialchars($data['task']), 'token' => $token]);
        response([
            'status' => 'ok',
            'task' => htmlspecialchars($data['task']),
            'token' => $token
        ]);
    }
    response(['status' => 'Wrong data, (task)']);
}

function update()
{
    $data = getData();
    if (isset($data['task']) && isset($data['token'])) {
        $select = Database::q(
            'UPDATE tasks SET task = :task, modified = current_timestamp WHERE token = :token',
            [
                'token' => htmlspecialchars($data['token']),
                'task' => htmlspecialchars($data['task'])
            ]
        );
        response([
            'status' => 'ok',
            'token' => htmlspecialchars($data['token']),
            'task' => htmlspecialchars($data['task'])
        ]);
    }
    response(['status' => 'Wrong data, (token,task)']);
}
function destroy()
{
    $data = getData();
    if ($data['token'] ?? false) {
        $select = Database::q('UPDATE tasks SET removed = 1 WHERE token = ?', [htmlspecialchars($data['token'])]);
        response([
            'status' => 'ok',
        ]);
    }
    response(['status' => 'Wrong data. (token)']);
}

// helpers
function dd(...$args)
{
    echo '<pre>';
    foreach ($args as $arg) {
        var_dump($arg);
    }
    exit();
}

function response($data)
{
    header("Content-Type: application/json");
    echo json_encode($data);
    exit();
}

function getData()
{
    $data = file_get_contents("php://input");
    $data = json_decode($data, true);
    return $data;
}

function getToken()
{
    do {
        $token = substr(bin2hex(random_bytes(6)), 0, 6);
        $tokenExist = Database::q('SELECT * FROM tasks WHERE token = ?', [$token])->fetch();
    } while ($tokenExist);

    return $token;
}
