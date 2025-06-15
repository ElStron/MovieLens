<?php
namespace App\Core;

class View
{
    public function render(string $template, array $data = []): void
    {
        $path = __DIR__ . '/../Views/' . $template . '.php';
        if (!empty($data)) {
            extract($data); // Extrae variables del array $data
        }
        if (!file_exists($path)) {
            echo "❌ Vista no encontrada";
        } else {

           require $path; // Incluye el archivo de la vista
        }
    }

}
