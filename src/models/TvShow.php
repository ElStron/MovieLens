<?php

namespace App\Models;

class TvShow
{
    public int $id;
    public string $title;
    public string $slug;
    public string $synopsis;
    public string $release_date;
    public ?string $original_title;
    public ?string $poster;
    public ?string $cover;
    public ?string $genres;
    public ?string $network;
    public ?string $rating;
    public ?int $seasons;
    public ?string $seo_title;
    public ?string $seo_description;
    public ?string $category;
    public ?string $identifier;
    public ?string $created_at;
    public ?string $updated_at;

    public function __construct(
        int $id,
        string $title,
        string $slug,
        string $synopsis,
        string $release_date,
        ?string $original_title = null,
        ?string $poster = null,
        ?string $cover = null,
        ?string $genres = null,
        ?string $network = null,
        ?string $rating = null,
        ?int $seasons = null,
        ?string $seo_title = null,
        ?string $seo_description = null,
        ?string $category = null,
        ?string $identifier = null,
        ?string $created_at = null,
        ?string $updated_at = null
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->slug = $slug;
        $this->synopsis = $synopsis;
        $this->release_date = $release_date;
        $this->original_title = $original_title;
        $this->poster = $poster;
        $this->cover = $cover;
        $this->genres = $genres;
        $this->network = $network;
        $this->rating = $rating;
        $this->seasons = $seasons;
        $this->seo_title = $seo_title;
        $this->seo_description = $seo_description;
        $this->category = $category;
        $this->identifier = $identifier;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            (int)($data['ID_serie'] ?? 0),
            $data['titulo_serie'] ?? '',
            $data['slug_serie'] ?? '',
            $data['sinopsis_serie'] ?? '',
            $data['date_serie'] ?? '',
            $data['original_titulo_serie'] ?? null,
            $data['poster_serie'] ?? null,
            $data['portada_serie'] ?? null,
            $data['generos_serie'] ?? null,
            $data['network'] ?? null,
            $data['calificacion_serie'] ?? null,
            isset($data['temporadas_serie']) ? (int)$data['temporadas_serie'] : null,
            $data['titulo_seo'] ?? null,
            $data['descripcion_seo'] ?? null,
            $data['categoria'] ?? null,
            isset($data['identificador_serie']) ? (string)$data['identificador_serie'] : null,
            $data['serieDate'] ?? null,
            $data['up_date'] ?? null
        );
    }

    public function toArray(): array
    {
        return [
            'ID_serie' => $this->id,
            'titulo_serie' => $this->title,
            'slug_serie' => $this->slug,
            'sinopsis_serie' => $this->synopsis,
            'date_serie' => $this->release_date,
            'original_titulo_serie' => $this->original_title,
            'poster_serie' => $this->poster,
            'portada_serie' => $this->cover,
            'generos_serie' => $this->genres,
            'network' => $this->network,
            'calificacion_serie' => $this->rating,
            'temporadas_serie' => $this->seasons,
            'titulo_seo' => $this->seo_title,
            'descripcion_seo' => $this->seo_description,
            'categoria' => $this->category,
            'identificador_serie' => $this->identifier,
            'serieDate' => $this->created_at,
            'up_date' => $this->updated_at
        ];
    }

}
