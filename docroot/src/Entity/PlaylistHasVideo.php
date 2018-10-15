<?php

namespace App\Entity;

use App\Entity\Base\BaseModel;

class PlaylistHasVideo extends BaseModel
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $playlist;

    /**
     * @var int
     */
    private $video;

    /**
     * @var int
     */
    private $position = 999;

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
     * Get $playlist
     *
     * @return int
     */
    public function getPlaylist()
    {
        return $this->playlist;
    }

    /**
     * @var int $playlist
     *
     * @return PlaylistHasVideo
     */
    public function setPlaylist(int $playlist)
    {
        $this->playlist = $playlist;

        return $this;
    }

    /**
     * Get $video
     *
     * @return int
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * @var int $video
     *
     * @return PlaylistHasVideo
     */
    public function setVideo(int $video)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get $position
     *
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @var int $position
     *
     * @return PlaylistHasVideo
     */
    public function setPosition(int $position)
    {
        $this->position = $position;

        return $this;
    }

    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'playlist' => $this->getPlaylist(),
            'video' => $this->getVideo(),
            'position' => $this->getPosition(),
            'createdAt' => $this->getCreatedAt()->format('Y-m-d H:i:s'),
            'updatedAt' => $this->getUpdatedAt()->format('Y-m-d H:i:s') 
        ];
    }
}