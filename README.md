# Introduction

## Playlist test case

## Environment

 - PHP 7.2
 - MySql 5.7

## Run

**Option 1: With Docker**

**Requirements:**  Docker

1. Execute the following commands:
cd docker
docker-compose up -d --build

2. And import database

database name : playlistbdd
database user : admin
database pass : admin
phpmyadmin url : http://localhost:8081/
the .sql file is in the folder : docroot/data/playlistbdd.sql

3. Open your navigator and redirect to http://localhost/, you have a demo to test the requests
4. Stop application command in the folder docker: docker-compose down  

**Option 2: PHP server and MySql**

1. Import database to your mysql,  the .sql file is in the folder : docroot/data/playlistbdd.sql
**database name : playlistbdd**
 
2. Configuration project : You have a config file in the folder : **docroot/app/config/mysql.php**, it allows you to configure your database.
3. Go to the folder docroot and execute: php -S localhost:8000 -t public
4. Open your navigator and redirect to http://localhost:8000, you have a demo to test the requests

Endpoints:

 - Get all playlists: { method : GET, uri: /api/playlists }
 - Get a playlist infos: { method : GET, uri: /api/playlists/:resoureId }
 - Create a playlist: { method : POST, uri: /api/playlists, params: [name] }
 - Edit a playlist: { method : POST, uri: /api/playlists/:resoureId,  params: [name] }
 - Delete a playlist: { method : DELETE, uri: /api/playlists/:resoureId}
 - Get all videos of one playlist: { method : GET, uri: /api/playlists/:resoureId/videos }
 - Add a video to one playlist: { method : POST, uri:  /api/playlists/:resoureId/videos/:videoId }
 - Remove a video in a playlist: { method : DELETE, uri:  /api/playlists/:resoureId/videos/:videoId }
 - Get all available videos: { method : GET, uri: /api/videos }
 - Get one video infos: { method : GET, uri: /api/videos/:resoureId }

