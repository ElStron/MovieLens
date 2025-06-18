<?php
declare(strict_types=1);
define('APP_START', microtime(true));

use App\Controllers\{HomeController, MoviesController, TvShowController};
use App\Core\{Container, Router, Database};
use App\Services\{MovieService, TvShowService};
use App\Repositories\{MovieRepository, TvShowRepository};

require_once __DIR__ . '/../vendor/autoload.php';

if (!getenv('APP_ENV')) {
    require_once __DIR__ . '/../src/utils/env.php';
    loadEnv(__DIR__ . '/../.env');
}

$container = new Container();
$container->bind(Database::class, fn() => new Database());
$container->bind(MovieRepository::class, fn($c) => new MovieRepository($c->get(Database::class)));
$container->bind(MovieService::class, fn($c) => new MovieService($c->get(MovieRepository::class)));
$container->bind(TvShowRepository::class, fn($c) => new TvShowRepository($c->get(Database::class)));
$container->bind(TvShowService::class, fn($c) => new TvShowService($c->get(TvShowRepository::class)));

$router = new Router($container);

$router->get('/', HomeController::class . '@index');
$router->get('/peliculas', MoviesController::class . '@index');
$router->get('/pelicula/{slug}', MoviesController::class . '@show');

$router->get('/series',TvShowController::class . '@index');
$router->get('/serie/{slug}', TvShowController::class . '@show');

$router->get('/api/peliculas', MoviesController::class . '@apiIndex');
$router->get('/api/series', TvShowController::class . '@apiIndex');

$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
