<?php

namespace App;

class Router
{
    /**
     * @var array
     */
    private $routes;

    public function __construct()
    {
        $this->routes = [];
    }

    public function add(string $name, string $path, string $method = 'GET', string $controller, $container): void
    {
        $route = new Route($path, $method, $controller);
        $route->setContainer($container);
        $this->routes[$method][$name] = $route;

    }

    public function run($request)
    {
        $method = $request->getMethod();
        $requestUri = $request->getRequestUri();

        if (!isset($this->routes[$method])) {
            header('HTTP/1.1 404 Not Found');
            exit();
        }
       
        foreach ($this->routes[$method] as $route) {
            if ($route->match($requestUri)) {
                $route->execute($request);
                exit();
            }
        }

        header('HTTP/1.1 404 Not Found');
        exit();
    }

    /**
     * Get routes
     *
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * Get route
     *
     * @var string $method
     * @var string $name
     *
     * @return Route|null
     */
    public function getRoute($method, $name) :? Route
    {
        return $this->routes[$method][$name] ?? null;
    }

}