<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Services\MovieService;

class MoviesController extends Controller
{
    private $movieService;
    public function __construct()
    {
        $this->movieService = new MovieService();
    }

    public function index(): void
    {
        $movies = $this->movieService->get(10, 0);
        if (!$movies) {
            http_response_code(404);
            return;
        }
        $this->view('movies/index', [
            'title' => 'Lista de Películas',
            'description' => 'Aquí puedes ver todas las películas disponibles.',
            'movies' => $movies
        ]);
    }

    public function show(string $slug): void
    {
        $movie = $this->movieService->getBySlug($slug);

        if (!$movie) {
            http_response_code(404);
            return;
        }

        $this->view('movies/details', [
            'title' => $movie['titulo_movie'],
            'description' => $movie['sinopsis_movie'],
            'movie' => $movie
        ]);
    }
}
