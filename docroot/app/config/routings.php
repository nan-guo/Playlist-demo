<?php

return [
    'playlist' => ['path' => '/', 'method' => 'GET', 'controller' => 'App\Controller\PlaylistController:list'],
    'api_playlists' => ['path' => '/api/playlists', 'method' => 'GET', 'controller' => 'App\Controller\Api\PlaylistController:list'],
    'api_playlist' => ['path' => '/api/playlists/:resoureId', 'method' => 'GET', 'controller' => 'App\Controller\Api\PlaylistController:get'],
    'api_playlist_create' => ['path' => '/api/playlists', 'method' => 'POST', 'controller' => 'App\Controller\Api\PlaylistController:create'],
    'api_playlist_edit' => ['path' => '/api/playlists/:resoureId', 'method' => 'POST', 'controller' => 'App\Controller\Api\PlaylistController:edit'],
    'api_playlist_delete' => ['path' => '/api/playlists/:resoureId', 'method' => 'DELETE', 'controller' => 'App\Controller\Api\PlaylistController:delete'],
    'api_playlist_items' => ['path' => '/api/playlists/:resoureId/videos', 'method' => 'GET', 'controller' => 'App\Controller\Api\PlaylistController:items'],
    'api_playlist_add_item' => ['path' => '/api/playlists/:resoureId/videos/:videoId', 'method' => 'POST', 'controller' => 'App\Controller\Api\PlaylistController:addItem'],
    'api_playlist_delete_item' => ['path' => '/api/playlists/:resoureId/videos/:videoId', 'method' => 'DELETE', 'controller' => 'App\Controller\Api\PlaylistController:deleteItem'],
    'api_videos' => ['path' => '/api/videos', 'method' => 'GET', 'controller' => 'App\Controller\Api\VideoController:list'],
    'api_video' => ['path' => '/api/videos/:resoureId', 'method' => 'GET', 'controller' => 'App\Controller\Api\VideoController:get'],
];