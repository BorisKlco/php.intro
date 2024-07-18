<?php

namespace App;

use App\Exceptions\RouteNotFound;

class Router
{
    private array $routes;

    public function register(string $method, string $route, callable|array $action): self
    {
        $this->routes[$method][$route] = $action;
        return $this;
    }

    public function get(string $route, callable|array $action): self
    {
        return $this->register('GET', $route, $action);
    }

    public function post(string $route, callable|array $action): self
    {
        return $this->register('POST', $route, $action);
    }

    public function routes():void
    {
        echo '<pre>';
        var_dump($this->routes);
        echo '<pre>';
    }

    public function resolve(string $requestUri, string $method)
    {
        $route = explode('?', $requestUri)[0];

        $action = $this->routes[$method][$route] ?? null;

        if (!$action) {
            throw new RouteNotFound();
        }

        if (is_callable($action)) {
            return call_user_func($action);
        }

        if (is_array($action)) {
            [$class, $method] = $action;

            if (class_exists($class)) {
                $class = new $class();

                if (method_exists($class, $method)) {
                    return call_user_func_array([$class, $method], []);
                }
            }
        }
    }
}
