<?php
namespace App\Core;

class Router
{
    protected array $routes = [];

    public function get(string $uri, string $action): void
    {
        $this->addRoute('GET', $uri, $action);
    }

    public function post(string $uri, string $action): void
    {
        $this->addRoute('POST', $uri, $action);
    }

    protected function addRoute(string $method, string $uri, string $action): void
    {
        $this->routes[$method][] = [
            'uri' => $uri,
            'pattern' => $this->convertToRegex($uri),
            'action' => $action
        ];
    }

    protected function convertToRegex(string $uri): string
    {
        return '#^' . preg_replace('#\{[^/]+\}#', '([^/]+)', $uri) . '$#';
    }

    public function dispatch(string $method, string $requestUri): void
    {
        $requestUri = parse_url($requestUri, PHP_URL_PATH);

        foreach ($this->routes[$method] ?? [] as $route) {
            if (preg_match($route['pattern'], $requestUri, $matches)) {
                array_shift($matches);

                [$controller, $method] = explode('@', $route['action']);
                $controllerInstance = new $controller;

                call_user_func_array([$controllerInstance, $method], $matches);
                return;
            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }
}
