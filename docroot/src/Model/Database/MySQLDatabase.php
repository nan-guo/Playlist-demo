<?php

namespace App\Model\Database;

use App\Model\Config\MySQLConfig;

/**
 * Class MySQLDatabase
 */
class MySQLDatabase implements DatabaseInterface
{
    /**
     * @var string
     */
    private $dbHost;

    /**
     * @var string
     */
    private $dbName;

    /**
     * @var string
     */
    private $dbUser;

    /**
     * @var string
     */
    private $dbPass;

    /**
     * @var PDO
     */
    private $pdo;

    /**
     * Construtor Database
     *
     * @var string $dbHost
     * @var string $dbName
     * @var string $dbUser
     * @var string $dbPass
     */
    public function  __construct(MySQLConfig $config)
    {
        $this->dbHost = $config->get('db_host');
        $this->dbName = $config->get('db_name');
        $this->dbUser = $config->get('db_user');
        $this->dbPass = $config->get('db_pass');
    }

    public function getDB()
    {
        if ($this->pdo === null) {
            $pdo = new \PDO('mysql:dbname='.$this->dbName.';host='.$this->dbHost, $this->dbUser, $this->dbPass);

            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            $this->pdo = $pdo;
        }

        return $this->pdo;
    }

    /**
     * @var string $sql
     * @var arrray $params
     * @var $classname
     * 
     * @return \PDOStatement
     */
    public function prepare($sql, $params, $classname, $mode = \PDO::FETCH_CLASS)
    {
        $req = $this->getDB()->prepare($sql);
        $req->execute($params);
        $req->setFetchMode($mode, $classname);

        return $req;
    }

    /**
     * @var string $sql
     * @var arrray $params
     * 
     * @return \PDOStatement
     */
    public function query($sql, $params = [])
    {
        $req = $this->getDB()->prepare($sql);
        $req->execute($params);

        
        $req->setFetchMode(\PDO::FETCH_ASSOC);

        return $req;
    }
}
