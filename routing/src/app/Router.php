<?php

namespace App;

use App\Exceptions\RouteNotFound;

class Router
{
    private array $routes;

    public function register(string $route, callable $action): self
    {
        $this->routes[$route] = $action;
        return $this;
    }

    public function resolve(string $requestUri)
    {
        $route = explode('?', $requestUri)[0];

        $action = $this->routes[$route] ?? null;

        if (!$action) {
            throw new RouteNotFound();
        }

        return call_user_func($action);
    }
}
