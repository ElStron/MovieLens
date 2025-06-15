<?php 
namespace App\Services;

use App\Core\Database;

class MovieService
{
    private $db;
    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function getBySlug(string $slug): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM peliculas WHERE slug_movie = :slug");
        $stmt->execute(['slug' => $slug]);
        return $stmt->fetch() ?: null;
    }

    public function getAll(): array
    {
        $stmt = $this->db->query("SELECT * FROM peliculas");
        return $stmt->fetchAll() ?: [];
    }

    public function get($limit = 10, $offset = 0): array
    {
        $stmt = $this->db->prepare("SELECT * FROM peliculas ORDER BY movieDate DESC LIMIT :limit OFFSET :offset");
        $stmt->bindValue(':limit', (int)$limit, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll() ?: [];
    }

    public function create(array $data): bool
    {
        return true;
    }
}
