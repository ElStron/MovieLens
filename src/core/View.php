<?php
namespace App\Core;

class View
{
    public function render(string $template, array $data = []): void
    {
        $path = __DIR__ . '/../Views/' . $template . '.php';
        if (!empty($data)) {
            extract($data);
        }
        if (!file_exists($path)) {
            http_response_code(404);
            return;
        } else {
           require $path;
        }
    }

}
