<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Database;
use App\Services\MovieService;
use App\Repositories\MovieRepository; 
use App\Models\Movie; 

class MoviesController extends Controller
{
    private MovieService $movieService;

    public function __construct()
    {

        $database = new Database(); 
        $movieRepository = new MovieRepository($database); 
        $this->movieService = new MovieService($movieRepository);
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
}