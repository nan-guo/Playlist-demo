<?php

namespace App\Model\Config;

class MySQLConfig implements ConfigInterface
{
    /**
     * @var array
     */
    private $configs = [];

    /**
     * @var MySQLConfig
     */
    private static $_instance;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->configs = require dirname(dirname(dirname(__DIR__))).DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'mysql.php';
    }

    /**
     * Get MySQLConfig Instance
     *
     * @return MySQLConfig
     */
    public static function getInstance(): ConfigInterface
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new MySQLConfig();
        }

        return self::$_instance;
    }

    /**
     * @param string $key
     *
     * @return string|null
     */
    public function get(string $key): ?string
    {
        return $this->configs[$key] ?? null;
    }
}