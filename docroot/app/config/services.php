<?php

/**
 * Return all services to container
 */

return [
    'MySQLConfig' => 'App\Model\Config\MySQLConfig',
    'DB' => 'App\Model\Database\MySQLDatabase',
    'PlaylistRepository' => 'App\Repository\PlaylistRepository',
    'VideoRepository' => 'App\Repository\VideoRepository',
    'PlaylistHasVideoRepository' => 'App\Repository\PlaylistHasVideoRepository'
];