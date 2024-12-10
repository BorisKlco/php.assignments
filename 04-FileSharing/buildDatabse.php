<?php

const BASE_PATH = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR;

spl_autoload_register(function ($class) {
    $class = BASE_PATH . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    if (file_exists($class)) {
        include $class;
    }
});

$buildUsers = 'CREATE TABLE IF NOT EXISTS users(
    id INTEGER PRIMARY KEY,
    email TEXT,
    password TEXT)
    ';

$buildFiles = 'CREATE TABLE IF NOT EXISTS files(
    id INTEGER PRIMARY KEY,
    name TEXT,
    token TEXT,
    removed INTEGER DEFAULT 0,
    expire TEXT DEFAULT NULL,
    user INTEGER DEFAULT NULL,
    FOREIGN KEY (user) REFERENCES users(id))
    ';
