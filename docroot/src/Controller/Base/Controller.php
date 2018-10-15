<?php

namespace App\Controller\Base;

use App\Entity\Video;

class Controller
{
    /**
     * Container
     */
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function getContainer()
    {
        return $this->container;
    }

    public function send($response = [], $status = 200)
    {        
        header('Content-Type: application/json');
        http_response_code($status);
        echo json_encode($response);
        exit();
    }

    protected function addPlaylistHateoas($playlist)
    {
        $container = $this->getContainer();
        $request = $container->get('request');
        $router = $container->get('router');
        $playlistsRoute = $router->getRoute($request->getMethod(), 'api_playlists');
        $playlistRoute = $router->getRoute($request->getMethod(), 'api_playlist');
        $playlistVideosRoute = $router->getRoute($request->getMethod(), 'api_playlist_items');

        $playlist->addLink([
            'self' => [
                'link' => $playlistRoute->generateUrl(['resoureId' => $playlist->getId()]),
                'rel' => 'playlist',
                'type' => $playlistRoute->getMethod()
            ],
            'playlists' => [
                'link' => $playlistsRoute->generateUrl(),
                'rel' => 'playlist',
                'type' => $playlistsRoute->getMethod()
            ],
            'videos' => [
                'link' => $playlistVideosRoute->generateUrl(['resoureId' => $playlist->getId()]),
                'rel' => 'video',
                'type' => $playlistVideosRoute->getMethod()
            ]
        ]);
    }

    protected function addVideoHateoas($video)
    {
        $request = $this->container->get('request');
        $router = $this->container->get('router');
        $videoListRoute = $router->getRoute($request->getMethod(), 'api_videos');
        $videoRoute = $router->getRoute($request->getMethod(), 'api_video');
        $links = [
            'self' => [
                'link' => $videoRoute->generateUrl(['resoureId' => is_array($video) ? $video['id'] : $video->getId()]),
                'rel' => 'video',
                'type' => $videoRoute->getMethod()
            ],
            'list' => [
                'link' => $videoListRoute->generateUrl(),
                'rel' => 'video',
                'type' => $videoListRoute->getMethod()
            ]
        ];

        if (is_array($video)) {
            $video['links'] = $links;
        } elseif ($video instanceof Video) {
            $video->setLinks($links);
        }

        return $video;
    }

    public function extractResourceId($parameters)
    {
        $resourceId = intval($parameters[0]) ?? null;

        if (is_null($resourceId)) {
            $this->send('Bad request', 400);
        }

        return $resourceId;
    }

    public function extractVideoId($parameters)
    {
        $videoId = intval($parameters[1]) ?? null;

        if (is_null($videoId)) {
            $this->send('Bad request', 400);
        }

        return $videoId;
    }
}
