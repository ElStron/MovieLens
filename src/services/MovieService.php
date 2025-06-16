<?php
namespace App\Services;

use App\Models\Movie;
use App\Repositories\MovieRepository;
use App\Exceptions\MovieNotFoundException;
use App\Exceptions\ValidationException;

class MovieService
{
    private MovieRepository $movieRepository;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    public function getPaginatedMovies(int $limit, int $offset): array
    {
        return $this->movieRepository->findAllPaginated($limit, $offset);
    }

    public function getMovieBySlug(string $slug): ?Movie
    {
        if (empty($slug)) return null;

        $movie = $this->movieRepository->findBySlug($slug);
        if (!$movie) {
            throw new MovieNotFoundException( 
                "La película con el slug '{$slug}' no fue encontrada."
            );
        }
        return $movie;
    }

    public function createMovie(array $data): Movie
    {
        if (empty($data['title']) || empty($data['description']) || empty($data['release_date'])) {
            throw new ValidationException("campos requeridos faltantes.");
        }

        // <- Crear la entidad Movie 
        $movie = new Movie(
            null, 
            $data['title'],
            $data['slug'],
            $data['description'],
            $data['release_date']
        );

        if (!$this->movieRepository->save($movie)) {
            throw new \RuntimeException('No se pudo guardar la película.');
        }

        return $movie;
    }
}