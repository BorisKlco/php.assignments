<?php

namespace Core;

class View
{
    public function __construct(
        protected string $view,
        protected array $params
    ) {}

    public static function show(string $view, array $params = []): void
    {
        $res = new self($view, $params);
        $res->render();
        exit();
    }

    public static function partial(string $view, array $params = []): void
    {
        $res = new self($view, $params);
        extract($res->params);
        include VIEWS . "{$res->view}.php";
        exit();
    }


    public static function error(): void
    {
        http_response_code(404);
        $info = [
            'title' => 'Not found',
            'error' => 'Page not found.',
            'code' => 404,
        ];
        extract($info);
        include VIEWS . 'error.php';
        exit();
    }

    private function render()
    {
        $title = "Dropie";
        extract($this->params);
        $slot = VIEWS . "{$this->view}.php";
        $layout = VIEWS . 'layout.php';

        if (file_exists($slot)) {
            include $layout;
        } else {
            self::error();
        }
    }
}
