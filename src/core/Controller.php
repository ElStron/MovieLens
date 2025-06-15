<?php
namespace App\Core;

abstract class Controller
{
    protected function view(string $template, array $data = []): void
    {
        (new View)->render($template, $data);
    }
}
