<?php

require __DIR__.'/../vendor/autoload.php';

$application = App\Application::getInstance();

$application->init();

$request = App\Request::create();

$application->handle($request);
