<?php

namespace App;

class Container
{
    private static $_instance;

    /**
     * @var array
     */
    private $registries = [];

    /**
     * @var array
     */
    private $services = [];

    /**
     * Get Container Instance
     *
     * @return Container
     */
    public static function getInstance(): Container
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Container();
        }

        return self::$_instance;
    }

    /**
     * @var string $key
     * @var string $service
     */
    public function set(string $key, string $service): void
    {
        $this->registries[$key] = $service;
    }

    /**
     * @var string $key
     * @var obj $service
     */
    public function addService(string $key, $service): void
    {
        $this->services[$key] = $service;
    }

    /**
     * Return required instance with constructor params
     *
     * @var string $key
     */
    public function get($key)
    {
        if (!isset($this->services[$key])) {

            if (!isset($this->registries[$key])) {
                throw new \Exception('Service '. $key .' not found.');
            }

            $reflection = New \ReflectionClass($this->registries[$key]);

            if (!$reflection->isInstantiable()) {
                throw new \Exception('Class '. $this->registries[$key] .' is not found.');
            }

            $constructor = $reflection->getConstructor();

            if (!$constructor) {
                $this->services[$key] = $reflection->newInstance();
            } else {

                $params = $constructor->getParameters();
                $constructorParams = [];

                foreach ($params as $param) {
                    if ($param->getClass()) {
                        $alias = array_search($param->getClass()->getName(), $this->registries);
                        $constructorParams[] = $this->get($alias);
                    } else {
                        $constructorParams[] = $param->getDefaultValue();
                    }
                }
                
                $this->services[$key] = $reflection->newInstanceArgs($constructorParams);
            }              
        }
        
        return $this->services[$key];
    }

}