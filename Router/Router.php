<?php

class Router
{
  public static string $path;
  public array $routes = [
    '/' =>        'home',
    '/contact' => 'form',
    '/404' =>     '404',
  ];

  public function __construct()
  {
    self::$path = $_SERVER['PATH_INFO'] ?? '/';
  }

  public function start(): void
  {
    $file = $this->routes[self::$path] ?? $this->routes['404'];
    require_once '../views/' . $file . '.php';
  }
}
