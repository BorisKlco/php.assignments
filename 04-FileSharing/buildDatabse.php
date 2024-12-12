<?php

use Core\Database;

const BASE_PATH = __DIR__ . DIRECTORY_SEPARATOR;

spl_autoload_register(function ($class) {
    $class = BASE_PATH . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    if (file_exists($class)) {
        include $class;
    }
});

$buildDb = [
    'Users' => 'CREATE TABLE IF NOT EXISTS users(
    id INTEGER PRIMARY KEY,
    email TEXT,
    password TEXT)
    ',
    'Files' => 'CREATE TABLE IF NOT EXISTS files(
    id INTEGER PRIMARY KEY,
    name TEXT,
    temp TEXT,
    token TEXT,
    removed INTEGER DEFAULT 0,
    expire_date TEXT DEFAULT NULL,
    count INTEGER DEFAULT 0,
    user INTEGER DEFAULT NULL,
    FOREIGN KEY (user) REFERENCES users(id))
    '
];


foreach ($buildDb as $val) {
    Database::query($val);
}

var_dump(Database::query("SELECT name FROM sqlite_master WHERE type = 'table' ORDER BY name")->fetchAll());
