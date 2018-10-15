<?php

namespace App;

class Route
{
    /**
     * @var Container
     */
    private $container;

    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $method;

    /**
     * @var array
     */
    public $params = [];

    /**
     * @var string
     */
    private $controller;

    public function __construct(string $path, string $method, string $controller)
    {
        $this->path = $path;
        $this->method = $method;
        $this->controller = $controller;
    }

    public function execute($request)
    {
        $this->container->addService('request', $request);

        list($controller, $function) = explode(':', $this->controller);

        $controller = new $controller($this->container);

        $controller->$function($this->params);        
    }

    /**
     * Match url
     */
    public function match($url)
    {
        $url = $url;

        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);

        if (!preg_match("#^$path$#i", $url, $params)) {
            return false;
        }

        array_shift($params);

        $this->params = $params;

        return true;
    }

    /**
     * Get path
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Get method
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Set container
     */
    public function setContainer($container)
    {
        $this->container = $container;
    }

    /**
     * Replace parameter and generate url
     */
    public function generateUrl($params = [])
    {
        $path = preg_replace_callback('#:([\w]+)#', function($matches) use ($params){
            if(isset($params[$matches[1]])){ 
                return $params[$matches[1]];
            }else{
                return $matches[0];
            }
        }, $this->path);
        
        return $path;
    }
}