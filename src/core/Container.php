<?php
namespace App\Core;

class Container {
    private array $bindings = [];
    private array $instances = [];

    public function bind(string $abstract, callable $factory): void {
        $this->bindings[$abstract] = $factory;
    }

    public function get(string $abstract) {
        if (isset($this->instances[$abstract])) {
            return $this->instances[$abstract];
        }

        if (!isset($this->bindings[$abstract])) {
            return $this->instances[$abstract] = $this->autoResolve($abstract);
        }

        return $this->instances[$abstract] = $this->bindings[$abstract]($this);
    }

    private function autoResolve(string $class) {
        $refClass = new \ReflectionClass($class);
        $constructor = $refClass->getConstructor();

        if (!$constructor) {
            return new $class;
        }

        $params = array_map(function ($param) {
            $type = $param->getType();
            if (!$type) {
                throw new \Exception("Cannot resolve {$param->getName()}");
            }
            return $this->get($type->getName());
        }, $constructor->getParameters());

        return $refClass->newInstanceArgs($params);
    }
}
