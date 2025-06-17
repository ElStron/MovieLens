<?php
namespace App\Core;

require_once __DIR__ . '/../utils/minify.php';

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
            ob_start();
            require $path;
            $output = ob_get_clean();
            echo minify_html($output);
        }
    }

}
