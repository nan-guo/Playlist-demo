<?php

namespace App\Entity;

use App\Entity\Base\BaseModel;

class Playlist extends BaseModel
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * Get $id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get $name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @var string $name
     *
     * @return Playlist
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    public function set($key, $value)
    {
        $this->{$key} = $value;

        return $this; 
    }

    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'createdAt' => $this->getCreatedAt()->format('Y-m-d H:i:s'),
            'updatedAt' => $this->getUpdatedAt()->format('Y-m-d H:i:s') 
        ];
    }
}