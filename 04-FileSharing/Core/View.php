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

    public static function error(): void
    {
        http_response_code(404);
        $info = [
            'title' => 'Not found',
            'error' => 'Page not found.',
            'code' => 404,
        ];
        $res = new self('error', $info);
        echo $res->render(true);
        exit();
    }

    private function render(bool $excep = false)
    {
        $title = "FileSharing";
        extract($this->params);
        $slot = VIEWS . "{$this->view}.php";
        $layout = VIEWS . 'layout.php';

        if ($excep) {
            $layout = $slot;
        }

        if (file_exists($slot)) {
            include $layout;
        } else {
            self::error();
        }
    }
}
