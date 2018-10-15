<?php

namespace App\Repository;

use App\Repository\Base\BaseRepository;
use App\Entity\Playlist;

class PlaylistRepository extends BaseRepository
{
    static $table = 'playlist';

    static $entity = Playlist::class;

    /**
     * @var int $resourceId
     *
     * @return array
     */
    public function getPlaylistVideos($resourceId)
    {
        return $this->prepare('
            SELECT playlist.id as playlist, video.*, pv.position FROM 
            '.static::$table.' AS playlist 
            INNER JOIN '. PlaylistHasVideoRepository::$table .' AS pv ON pv.playlist = playlist.id 
            INNER JOIN '. VideoRepository::$table .' AS video ON pv.video = video.id 
            WHERE playlist.id = ? 
            ORDER BY pv.position ASC', 
            [$resourceId]
        )->fetchAll();   
    }

    /**
     * @var Playlist $playlist
     *
     * @return array
     */
    public function serializeObj($playlist): array
    {
        return [
            'id' => $playlist->getId(),
            'name' => $playlist->getName(),
            'createdAt' => $playlist->getCreatedAt(),
            'updatedAt' => $playlist->getUpdatedAt(),
            '_links' => $playlist->getLinks()
        ];
    }

    /**
     * @var array $data
     *
     * @return bool|Playlist
     */
    public function validate($data)
    {
        $playlist = new Playlist();
        $validate = true;

        if (!isset($data['name']) || empty($data['name'])) {
            $validate = false;
        }

        if ($validate) {
            $now = new \DateTime('NOW');
            $playlist->setName($data['name']);
            $playlist->setCreatedAt($now->format('Y-m-d H:i:s'));

            return $playlist;
        }

        return false;
    }

}