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
        if (!$lastMovieData) {
            http_response_code(404);
            echo "No hay películas disponibles en este momento.";
            return;
        }

        $this->view('home', ['title' => 'Bienvenido a la Aplicación', 'lastMovie' => $lastMovieData]);
    }
}
