<?php

namespace Core;

class Router
{
    private array $routes;

    public function register(string $method, string $route, array $action): self
    {
        $this->routes[] = [
            'method' => $method,
            'path' => $route,
            'action' => $action
        ];

        return $this;
    }

    public function get(string $path, array $action)
    {
        $this->register('GET', $path, $action);
    }

    public function post(string $path, array $action)
    {
        $this->register('POST', $path, $action);
    }

    public function resolve(string $uri, string $method)
    {
        $path = parse_url($uri)['path'];
        $action = null;

        foreach ($this->routes as $route) {
            if ($route['path'] == $path && $route['method'] == $method) {
                $action = $route['action'];
            }
        }

        if (!$action) {
            View::error();
        }

        [$class, $fn] = $action;
        if (class_exists($class) && method_exists($class, $fn)) {
            $controller = new $class();
            call_user_func([$controller, $fn]);
            exit();
        }

        View::error();
    }
}
