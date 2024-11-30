<?php
const BASE_PATH = __DIR__ . DIRECTORY_SEPARATOR;
const VIEWS = BASE_PATH . 'views' . DIRECTORY_SEPARATOR;
require_once BASE_PATH . 'helpers.php';
require_once BASE_PATH . 'db.php';

$request = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_SERVER['REQUEST_METHOD'];

$routes = require_once BASE_PATH . 'routes.php';

foreach ($routes as $key => $route) {
    if ($route['path'] == $request && $route['method'] == $method) {
        call_user_func($key);
        exit();
    }
}

echo '404';
exit();

function index()
{
    renderView('index');
}

function show()
{
    $records = Database::q('SELECT * FROM users')->fetchAll();
    renderView('show', ['records' => $records]);
}

function search()
{
    $search = sanitaze();
    if ($search['q'] ?? false) {
        $result = Database::q("SELECT * FROM users WHERE name LIKE :q", ['q' => "%{$search['q']}%"])->fetchAll();
    }
    renderView('search', ['result' => $result ?? []]);
}

function create()
{
    $req = sanitaze();
    if (filter_var($req['email'], FILTER_VALIDATE_EMAIL)) {
        Database::q('INSERT INTO users (name,email,tel) VALUES (:name,:email,:tel)', [
            'name' => $req['name'],
            'email' => $req['email'],
            'tel' => $req['tel']
        ]);
        header('Location: /');
        exit();
    }
    renderView('index', ['error' => 'email is not valid', 'old' => $req]);
}

function edit()
{
    $record = fetchRecord();
    if ($record) {
        return renderView('edit', $record);
    }
    header('Location: /list');
    exit();
}

function update()
{
    $record = fetchRecord();
    if ($record) {
        $req = sanitaze();
        Database::q(
            'UPDATE users SET name = :name, email = :email, tel = :tel WHERE id = :id',
            [
                'id' => $req['id'],
                'name' => $req['name'],
                'email' => $req['email'],
                'tel' => $req['tel']
            ]
        );
    }
    header('Location: /list');
    exit();
}

function destroy()
{
    $record = fetchRecord();
    if ($record) {
        Database::q('DELETE FROM users WHERE id = :id', ['id' => $record['id']]);
    }
    header('Location: /list');
    exit();
}
