<?php
namespace App\Core;

class Autoloader
{
    public static function register(): void
    {
        spl_autoload_register(function(string $class): void {
            $prefix = 'App\\';
            if (strncmp($prefix, $class, strlen($prefix)) !== 0) {
                return;
            }
            $relative = str_replace('\\', DIRECTORY_SEPARATOR, substr($class, strlen($prefix)));
            $file = __DIR__ . '/../' . $relative . '.php';
            if (file_exists($file)) {
                require $file;
            }
        });
    }
}
