<?php
namespace App\Core;

use PDO;
use PDOException;
require_once __DIR__ . '/../../config/db.php';

class Database
{
    private static ?PDO $pdo = null;

    public static function getConnection(): PDO
    {
        if (self::$pdo === null) {
            $host = DB_HOST;
            $port = DB_PORT;
            $db   = DB_NAME;
            $user = DB_USER;
            $pass = DB_PASS;
            $charset = 'utf8mb4';
            $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset;";

            try {
                self::$pdo = new PDO($dsn, $user, $pass, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]);

                // show tables
                $stmt = self::$pdo->query("SELECT VERSION()");
                $version = $stmt->fetchColumn();
            } catch (PDOException $e) {
                die('Error de conexión: ' . $e->getMessage());
            }
        }

        return self::$pdo;
    }
}
