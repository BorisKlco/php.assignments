<?php

use Controllers\Home;
use Core\Router;

const BASE_PATH = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR;
const VIEWS = BASE_PATH . 'views' . DIRECTORY_SEPARATOR;
const FILES = BASE_PATH . 'files' . DIRECTORY_SEPARATOR;

spl_autoload_register(function ($class) {
    $class = BASE_PATH . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    if (file_exists($class)) {
        include $class;
    }
});
session_start();

$router = new Router();

$router->get('/', [Home::class, 'index']);
$router->post('/upload', [Home::class, 'upload']);
$router->get('/d', [Home::class, 'download']);
$router->post('/d', [Home::class, 'serveFile']);
$router->get('/files', [Home::class, 'list']);
$router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
