<?php

namespace App;

use App\Model\Database\MySQLDatabase;

class Application
{
    /**
     * @var Application
     */
    private static $_instance;

    /**
     * @var Container
     */
    private $container;

    /**
     * @var Router
     */
    public $router;

    /**
     * Constructor
     *
     * @var Router $router
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * Get App Instance
     *
     * @return App
     */
    public static function getInstance(): Application
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Application(new Router());
        }

        return self::$_instance;
    }

    /**
     * Get Container
     *
     * @return Container
     */
    public function getContainer(): Container
    {
        return $this->container;
    }

    /**
     * Execute request
     */
    public function handle($request)
    {
        if(extension_loaded('zlib'))
            ob_start('ob_gzhandler');
        else    
            ob_start();
        $this->router->run($request);
        $response = ob_get_clean();
    }

    /**
     * Inititalization
     */
    public function init(): void
    {
        $this->loadContainer();
        $this->loadRoutings();
    }

    /**
     * DIC
     */
    public function loadContainer(): void
    {
        $this->container = Container::getInstance();

        $services = require dirname(__FILE__).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'services.php';

        foreach ($services as $alias => $service) {
            $this->container->set($alias, $service);
        }       
    }

    /**
     * Routings
     */
    public function loadRoutings(): void
    {
        $routes = require dirname(__FILE__).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'routings.php';

        foreach ($routes as $name => $route) {
            $this->router->add($name, $route['path'], $route['method'], $route['controller'], $this->container);
        }

        $this->container->addService('router', $this->router);
    }
}
