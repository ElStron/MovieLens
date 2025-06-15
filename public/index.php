<?php
declare(strict_types=1);

use App\Core\Autoloader;
use App\Core\Router;
use App\Controllers\HomeController;
use App\Controllers\AboutController;
use App\Controllers\MoviesController;
require_once __DIR__ . '/../src/Core/Autoloader.php';
Autoloader::register();

$router = new Router();
$router->get('/', HomeController::class . '@index');
$router->get('/about', AboutController::class . '@index');

$router->get('/peliculas', MoviesController::class . '@index');
$router->get('/pelicula/{slug}', MoviesController::class . '@show');

$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
