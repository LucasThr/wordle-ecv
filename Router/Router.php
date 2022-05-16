<?php

declare(strict_types=1);

class Router
{
    public static string $path;
    public array $routes = [
        '/' => 'home',
        '/404' => '404',
    ];

    public function __construct()
    {
        self::$path = $_SERVER['PATH_INFO'] ?? '/';
    }

    public function engine(): void
    {
        $file = $this->routes[self::$path] ?? $this->routes['404'];
        require_once '../views/'.$file.'.php';
    }
}
