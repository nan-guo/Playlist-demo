<?php

namespace App\Repository;

use App\Repository\Base\BaseRepository;
use App\Entity\PlaylistHasVideo;

class PlaylistHasVideoRepository extends BaseRepository
{
    static $table = 'playlisthasvideo';

    static $entity = PlaylistHasVideo::class;

    /**
     * @var Playlist $playlist
     * @var Video $video
     *
     * @return bool
     */
    public function addVideoToPlaylist($playlist, $video)
    {
        $playlistHasVideo = new PlaylistHasVideo();
        $playlistHasVideo->setPlaylist($playlist->getId());
        $playlistHasVideo->setVideo($video->getId());
        $res = $this->getLastPosition($playlist);
        if ($res) {
            $playlistHasVideo->setPosition(intval($res['position']) + 1);
        } else {
            $playlistHasVideo->setPosition(1);
        }

        return $this->insert($playlistHasVideo);
    }

    /**
     * @var Object $obj
     */
    public function remove($obj)
    {
        $res = $this->prepare('DELETE FROM '.static::$table.' WHERE id = ?', [$obj->getId()])->execute();

        if ($res) {
            return $this->reOrderPlaylist($obj);
        }

        return $res;
    }

    /**
     * Reorder position
     * 
     * @var Object $obj
     */
    public function reOrderPlaylist($obj)
    {
        $prePosition = $obj->getPosition() - 1; 

        if ($prePosition < 0) {
            return true;
        } else {
            $sql = 'SET @count := '.$prePosition.';';
            $sql .= 'UPDATE '.static::$table.' SET position = (@count:= @count + 1) WHERE playlist = ? AND position > ?';
            return $this->prepare(
                $sql,
                [$obj->getPlaylist(), $obj->getPosition()]
            );
        }
    }

    public function getLastPosition($playlist)
    {
        return $this->prepare('SELECT position FROM '. static::$table .' WHERE playlist = ? ORDER BY position DESC LIMIT 1', [$playlist->getId()])->fetch();
    }

    /**
     * @var Playlist $playlist
     * @var Video $video
     *
     * @return bool
     */
    public function validate($playlist, $video)
    {
        return $this->findOneBy(['playlist' => $playlist->getId(), 'video' => $video->getId()]);
    }
}