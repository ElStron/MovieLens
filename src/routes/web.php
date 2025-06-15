<?php

use App\Core\Router;
use App\Controllers\HomeController;

$router->get('/', HomeController::class . '@index');
$router->get('/about', HomeController::class . '@about');

// Agrega más rutas aquí
