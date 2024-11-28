<?php

function dd(...$args)
{
    echo '<pre>';
    foreach ($args as $arg) {
        var_dump($arg);
    }
    exit();
}

function renderView($view, $params = [])
{
    extract($params);
    $slot = VIEWS . $view . '.php';
    include VIEWS . 'layout.php';
}

function fetchRecord()
{
    $id = $_REQUEST['id'] ?? null;
    $recordExist = Database::q('SELECT * FROM users WHERE id = :id', ['id' => $id])->fetch();
    return $recordExist;
}
