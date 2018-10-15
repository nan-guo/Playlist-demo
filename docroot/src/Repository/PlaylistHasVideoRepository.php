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