<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Services\MovieService;
use App\Models\Movie; 

class MoviesController extends Controller
{
    private MovieService $movieService;

    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }

    public function index(): void
    {
        /** @var Movie[] $movies */
        $movies = $this->movieService->getPaginatedMovies(10, 0);

        if (empty($movies)) {
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
        /** @var Movie|null $movie */
        $movie = $this->movieService->getMovieBySlug($slug);

        if (!$movie) {
            http_response_code(404);
            echo "Alto ahí rufian, no hay nada que ver aquí.";
            return;
        }

        $this->view('movies/details', [
            'title' => $movie->title,
            'description' => $movie->synopsis,
            'movie' => $movie
        ]);
    }

    public function apiIndex(int $offset, int $limit): void
    {
        $movies = $this->movieService->getPaginatedMovies($limit, $offset);

        if (empty($movies)) {
            http_response_code(404);
            $this->json(['error' => 'No movies found']);
            return;
        }

        $this->json($movies);
    }

}