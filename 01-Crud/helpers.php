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

function sanitaze()
{
    $request = [];
    foreach ($_REQUEST as $key => $item) {
        $request[$key] = htmlspecialchars($item);
    }

    return $request;
}

function fetchRecord()
{
    $id = htmlspecialchars($_REQUEST['id']) ?? null;
    $recordExist = Database::q('SELECT * FROM users WHERE id = :id', ['id' => $id])->fetch();
    return $recordExist;
}
