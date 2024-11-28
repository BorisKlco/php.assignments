<?php

return [
    'index' => [
        'path' => '/',
        'method' => 'GET'
    ],
    'show' => [
        'path' => '/list',
        'method' => 'GET'
    ],
    'search' => [
        'path' => '/search',
        'method' => 'GET'
    ],
    'create' => [
        'path' => '/list',
        'method' => 'POST'
    ],
    'edit' => [
        'path' => '/edit',
        'method' => 'GET'
    ],
    'update' => [
        'path' => '/edit',
        'method' => 'POST'
    ],
    'destroy' => [
        'path' => '/delete',
        'method' => 'POST'
    ],
    'find' => [
        'path' => '/search',
        'method' => 'POST'
    ],
];
