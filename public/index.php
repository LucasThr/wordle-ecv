<?php

declare(strict_types=1);

require_once '../Router/Router.php';
require_once '../class/Word.php';
require_once '../class/Game.php';
require_once '../class/Letter.php';

$router = new Router();
$router->engine();

// php -S localhost:8000 -t public
