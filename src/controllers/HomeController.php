<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Services\MovieService;

class HomeController extends Controller
{
    private MovieService $movieService;

    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }

    public function index(): void
    {
        $lastMovieData = $this->movieService->getLastMovie();
        $releasedMovies = $this->movieService->getRelasedMovies(5, 0);
        $lastMoviesAdded = $this->movieService->getLastMoviesAdded(5, 0);

        $this->twig('index', 
            [
                'title' => "Explora las Películas", 
                'lastMovie' => $lastMovieData,
                'releasedMovies' => $releasedMovies,
                'lastMoviesAdded' => $lastMoviesAdded
            ]
        );
    }
}
