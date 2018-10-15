<?php

namespace App\Repository;

use App\Repository\Base\BaseRepository;
use App\Entity\Video;

class VideoRepository extends BaseRepository
{
    static $table = 'video';

    static $entity = Video::class;
    
    /**
     * @var Video $video
     *
     * @return array
     */
    public function serializeObj($video): array
    {
        return [
            'id' => $video->getId(),
            'title' => $video->getTitle(),
            'thumbnail' => $video->getThumbnail(),
            'createdAt' => $video->getCreatedAt(),
            'updatedAt' => $video->getUpdatedAt(),
            '_links' => $video->getLinks()
        ];
    }
}