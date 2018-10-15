<?php

namespace App\Controller;

use App\Controller\Base\Controller;

class PlaylistController extends Controller
{
    /**
     * url /
     *
     * Method GET
     */
    public function list($parameters)
    { 
        require dirname(__DIR__).DIRECTORY_SEPARATOR.'View'.DIRECTORY_SEPARATOR.'test.php';
    }
}