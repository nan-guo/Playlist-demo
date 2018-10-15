<?php

namespace App\Entity;

use App\Entity\Base\BaseModel;

class Video extends BaseModel
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $thumbnail;

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
     * Get $title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @var string $title
     *
     * @return Video
     */
    public function setTitle(string $title)
    {
        $this->name = $title;

        return $this;
    }

    /**
     * Get $thumbnail
     *
     * @return string
     */
    public function getThumbnail(): string
    {
        return $this->thumbnail;
    }

    /**
     * @var string $thumbnail
     *
     * @return Video
     */
    public function setThumbnail(string $thumbnail)
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'title' => $this->getTitle(),
            'thumbnail' => $this->getThumbnail(),
            'createdAt' => $this->getCreatedAt()->format('Y-m-d H:i:s') ,
            'updatedAt' => $this->getUpdatedAt()->format('Y-m-d H:i:s') 
        ];
    }
}