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

    private function render()
    {
        $title = "FileSharing";
        extract($this->params);
        $slot = VIEWS . "{$this->view}.php";
        $layout = VIEWS . 'layout.php';

        if (file_exists($slot)) {
            include $layout;
        }
    }
}
