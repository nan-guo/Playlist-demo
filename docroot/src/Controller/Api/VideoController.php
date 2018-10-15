<?php

namespace App\Controller\Api;

use App\Controller\Base\Controller;

class VideoController extends Controller
{
    /**
     * name = api_videos,  uri = /api/videos
     *
     * Method GET
     */
    public function list($parameters)
    {  
        $videoRepo = $this->container->get('VideoRepository');

        $videos = $videoRepo->findBy([], ['createdAt' => 'DESC']);

        $list = [];

        if (!empty($videos)) {
            foreach ($videos as $key => $video) {
                $list[] = $this->addVideoHateoas($video);
            }
        }

        $response = $videoRepo->generateResponse($list);

        $this->send(['data' => $response]);
    }

    /**
     * name = api_video, uri = /api/videos/:resoureId
     *
     * Method GET
     */
    public function get($parameters)
    {
        $resourceId = $this->extractResourceId($parameters);

        $videoRepo = $this->container->get('VideoRepository');

        $video = $videoRepo->find($resourceId);

        if ($video) {
            $this->addVideoHateoas($video);
        } else {
            $this->send('Not found', 404);
        }

        $response = $videoRepo->generateResponse($video);

        $this->send($response);
    }
}