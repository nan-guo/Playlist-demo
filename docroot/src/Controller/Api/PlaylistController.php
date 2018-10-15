<?php

namespace App\Controller\Api;

use App\Controller\Base\Controller;

class PlaylistController extends Controller
{
    /**
     * name = api_playlists,  uri = /api/playlists
     *
     * Method GET
     */
    public function list($parameters)
    {  
        $playlistRepo = $this->container->get('PlaylistRepository');

        $playlists = $playlistRepo->findBy([], ['createdAt' => 'DESC']);

        if (!empty($playlists)) {
            array_map([$this, 'addPlaylistHateoas'], $playlists);
        }

        $response = $playlistRepo->generateResponse($playlists);

        $this->send(['data' =>  $response]);
    }

    /**
     * name = api_playlist, uri = /api/playlists/:resourceId
     *
     * Method GET
     */
    public function get($parameters)
    {
        $resourceId = $this->extractResourceId($parameters);

        $playlistRepo = $this->container->get('PlaylistRepository');

        $playlist = $playlistRepo->find($resourceId);

        if ($playlist) {
            $this->addPlaylistHateoas($playlist);
        } else {
            $this->send('Not found', 404);
        }

        $response = $playlistRepo->generateResponse($playlist);

        $this->send($response);
    }

    /**
     * /api/playlist
     *
     * Method POST
     */
    public function create($parameters)
    {
        $request = $this->container->get('request');
        $data = $request->getData();
        $playlistRepo = $this->container->get('PlaylistRepository');
        $playlist = $playlistRepo->validate($data);
        
        if ($playlist) {

            $res = $playlistRepo->insert($playlist);

            if(!$res) {
                $this->send('Bad request.', 400);
            }

            $this->send('Created', 201);
        }

        $this->send('Bad request.', 400);
    }

    /**
     * /api/playlists/:resourceId
     *
     * Method POST
     */
    public function edit($parameters)
    {
        $request = $this->container->get('request');
        $resourceId = $this->extractResourceId($parameters);

        $playlistRepo = $this->container->get('PlaylistRepository');
        $playlist = $playlistRepo->find($resourceId);

        $data = $request->getData();

        if (!$playlist) {
            $this->send('Not found', 404);
        }

        if(!empty($data)) {
            $now = new \DateTime();
            $data['updatedAt'] = $now->format('Y-m-d H:i:s');
            $res = $playlistRepo->update($playlist, $data);

            if(!$res) {
                $this->send('Bad request.', 400);
            }
        }

        $this->send('Accepted', 202);
    }

    /**
     * /api/playlists/:resourceId
     *
     * Method DELETE
     */
    public function delete($parameters)
    {
        $request = $this->container->get('request');
        $resourceId = $this->extractResourceId($parameters);

        $playlistRepo = $this->container->get('PlaylistRepository');
        $playlist = $playlistRepo->find($resourceId);

        if ($playlist) {
            $playlistRepo->remove($playlist);
        }

        $this->send('Deleted', 204);
    }

    /**
     * name = api_playlist_items, uri = /api/playlists/:resoureId/videos
     *
     * Method GET
     */
    public function items($parameters)
    {
        $resourceId = $this->extractResourceId($parameters);

        $playlistRepo = $this->container->get('PlaylistRepository');

        $videos = $playlistRepo->getPlaylistVideos($resourceId);

        if (!empty($videos)) {
            foreach ($videos as $key => $video) {
                $videos[$key] = $this->addVideoHateoas($video);
            }
        }

        $this->send(['data' => $videos]);
    }

    /**
     * name = api_playlist_add_item, uri = /api/playlists/:resoureId/videos/:videoId
     *
     * Method POST
     */
    public function addItem($parameters)
    {
        $request = $this->container->get('request');
        $resourceId = $this->extractResourceId($parameters);
        $videoId = $this->extractVideoId($parameters);

        $playlistRepo = $this->container->get('PlaylistRepository');
        $playlist = $playlistRepo->find($resourceId);

        if (!$playlist) {
            $this->send('Bad request', 400);
        }

        $videoRepo = $this->container->get('VideoRepository');
        $video = $videoRepo->find($videoId);
        if (!$video) {
            $this->send('Bad request', 400);
        }

        $playlistHasVideoRepo = $this->container->get('PlaylistHasVideoRepository');
        if ($playlistHasVideoRepo->validate($playlist, $video)) {
            $this->send('Created', 201);
        }

        $res = $playlistHasVideoRepo->addVideoToPlaylist($playlist, $video);

        if($res)
            $this->send('Created', 201);
        else 
            $this->send('Bad request', 400);
    }

    /**
     * name = api_playlist_delete_item, uri = /api/playlists/:resoureId/videos/:videoId
     *
     * Method DELETE
     */
    public function deleteItem($parameters)
    {
        $resourceId = $this->extractResourceId($parameters);
        $videoId = $this->extractVideoId($parameters);

        $playlistHasVideoRepo = $this->container->get('PlaylistHasVideoRepository');

        $playlistHasVideo = $playlistHasVideoRepo->findOneBy(['playlist' => $resourceId, 'video' => $videoId]);

        if ($playlistHasVideo) {
            $playlistHasVideoRepo->remove($playlistHasVideo);
        }

        $this->send('Deleted', 204);
    }
}
