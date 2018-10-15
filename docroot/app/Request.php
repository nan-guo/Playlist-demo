<?php

namespace App;

class Request
{
    /**
     * @var Request
     */
    private static $_instance;

    /**
     * $_SERVER
     */
    public $server;

    /**
     * $_POST|array
     */
    public $post;

    /**
     * array
     */
    public $put;

    /**
     * $_GET
     */
    public $query;

    /**
     * $_FILES
     */
    public $files;

    /**
     * @var array
     */
    private $headers = [];

    /**
     * @var string
     */
    private $method;

    /**
     * @var string
     */
    private $requestUri;

    public function __construct()
    {
        $this->server = $_SERVER;
        $this->query = $_GET;
        $this->files = $_FILES;
    }

    /**
     * Get App Instance
     *
     * @return Request
     */
    public static function create(): Request
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Request();
        }

        return self::$_instance;
    }

    public function getMethod()
    {
        return strtoupper($this->server['REQUEST_METHOD']);
    }

    public function getHeaders()
    {
        return getallheaders();
    }

    public function getRequestUri()
    {
        return $this->server['REQUEST_URI'];
    }

    public function getData()
    {
        return $this->setPostData();
    }

    public function setPostData()
    {
        $headers = $this->getHeaders();
        if ($headers['Content-Type'] == 'application/json') {
            $data = file_get_contents('php://input');
            $this->post = json_decode($data, TRUE);
        } else {
            $this->post = $_POST;
        }

        return $this->post;        
    }
}