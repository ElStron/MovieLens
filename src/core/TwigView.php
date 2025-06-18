<?php
namespace App\Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
require_once __DIR__ . '/../utils/minify.php';
class TwigView
{
    protected Environment $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../Views');
        $this->twig = new Environment($loader,[
            'cache' => __DIR__ . '/../cache/twig',
            'auto_reload' => true,
        ]);
    }

    public function render(string $template, array $data = []): void
    {
        ob_start();
        $output = $this->twig->render($template . '.twig', $data);
        echo minify_html($output);
        $duration = microtime(true) - APP_START;
        echo "Tiempo de carga: " . round($duration * 1000, 2) . " ms";

    }
}
