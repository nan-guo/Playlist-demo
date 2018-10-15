<?php

namespace App\Repository\Base;

use App\Container;
use App\Model\Database\MySQLDatabase;

class BaseRepository
{
    const REPOSITORY = 'Repository';
    const ENTITY = 'Entity';

    /**
     * Database
     */
    protected $db;

    /**
     * @var string
     */
    static $table = null;

    /**
     * @var string
     */
    static $entity = null;


    public function __construct(MySQLDatabase $db)
    {
        $this->db = $db;
    }

    public function all()
    {
        return $this->db->prepare('SELECT * FROM '. static::$table,[], static::$entity)->fetchAll();
    }

    public function find(int $id)
    {
        return $this->db->prepare('SELECT * FROM '. static::$table . ' WHERE id = ?', [$id], static::$entity)->fetch();   
    }

    private function prepareFindByQuery(array $fields, array $orders = [])
    {
        $sql = 'SELECT * FROM '. static::$table;
        $params = [];

        if (!empty($fields)) {
            $sql = 'SELECT * FROM '. static::$table . ' WHERE ';
            
            $index = 0;
            foreach ($fields as $field => $value) {
                if($index > 0)
                    $sql .= ' AND ';

                $sql .= "$field = ?";

                array_push($params, $value);

                $index ++;
            }
        }

        if (!empty($orders)) {
            $index = 0;

            foreach ($orders as $field => $value) {
                if($index == 0)
                    $sql .= ' ORDER BY ';
                else 
                    $sql .= ', ';

                $sql .= "$field ". $value;

                $index ++;
            }
        }
        
        return $this->db->prepare($sql, $params, static::$entity);
    }

    public function findBy(array $fields, array $orders = [])
    {
        return $this->prepareFindByQuery($fields, $orders)->fetchAll();   
    }

    public function findOneBy(array $fields)
    {          
        return $this->prepareFindByQuery($fields)->fetch();   
    }

    public function prepare($sql, $params)
    {
        return $this->db->query($sql, $params);
    }

    /**
     * @var BaseModel $obj
     * @var array $fields
     *
     * @return bool
     */
    public function update($obj, $fields = [])
    {        
        $sql = 'UPDATE '. static::$table. ' SET ';

        foreach ($fields as $key => $field) {
            $sql .= $key .' = ?,';
        }
        $sql = substr($sql, 0, -1);

        $sql .= ' WHERE id = ?';

        try {
            $this->prepare($sql, array_values(array_merge($fields, [$obj->getId()])));
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * @var BaseModel $obj
     *
     * @return bool
     */
    public function insert($obj)
    {
        $sql = 'INSERT INTO '. static::$table. ' (';

        $reflection = new \ReflectionClass($obj);

        $fields = $reflection->getProperties(\ReflectionProperty::IS_PRIVATE | \ReflectionProperty::IS_PROTECTED);

        $valueString = 'VALUES (';

        foreach ($fields as $field) {
            $name = $field->getName();
            $sql .= $field->getName() .',';
            $valueString .= '?,';
        }
        $sql = substr($sql, 0, -1);
        $sql .= ') ';

        $valueString = substr($valueString, 0, -1);
        $valueString .= ') ';
        $sql .= $valueString;

        try {
            $this->prepare($sql, array_values($obj->toArray()));
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * @var Object $obj
     */
    public function remove($obj)
    {
        return $this->prepare('DELETE FROM '.static::$table.' WHERE id = ?', [$obj->getId()])->execute();
    }

    /**
     * @var array|object
     *
     * @return array
     */
    public function generateResponse($data)
    {        
        if (!empty($data)) {
            if (is_array($data)) {
                $res = [];
                foreach ($data as $obj) {
                    $res[] = $this->serializeObj($obj);
                }
                return $res;
            } else {
                return $this->serializeObj($data);
            }
        }

        return null;
    }

    public function serializeObj($list)
    {
    }
}
