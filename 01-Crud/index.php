<?php
const BASE_PATH = __DIR__ . '/';
const VIEWS = __DIR__ . '/views/';
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
    $records = Database::q('SELECT * FROM users')->fetchAll();
    renderView('show', ['records' => $records]);
}

function create()
{
    dd($_REQUEST);
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
    dd(fetchRecord());
    $record = fetchRecord();
    if ($record) {
        return renderView('edit', $record);
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
