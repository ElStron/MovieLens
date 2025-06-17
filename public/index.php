<?php
declare(strict_types=1);
use App\Controllers\{HomeController, MoviesController};
use App\Core\{Autoloader, Container, Router, Database};
use App\Services\MovieService;
use App\Repositories\MovieRepository;

require_once __DIR__ . '/../src/Core/Autoloader.php';
Autoloader::register();

if (!getenv('APP_ENV')) {
    require_once __DIR__ . '/../src/utils/env.php';
    loadEnv(__DIR__ . '/../.env');
}

$container = new Container();
$container->bind(Database::class, fn() => new Database());
$container->bind(MovieRepository::class, fn($c) => new MovieRepository($c->get(Database::class)));
$container->bind(MovieService::class, fn($c) => new MovieService($c->get(MovieRepository::class)));

$router = new Router($container);

$router->get('/', HomeController::class . '@index');
$router->get('/peliculas', MoviesController::class . '@index');
$router->get('/pelicula/{slug}', MoviesController::class . '@show');

$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
