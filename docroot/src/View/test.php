<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Playlist</title>
      <!-- Bootstrap core CSS -->
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
   </head>
   <body>
      <header>
         <div class="navbar navbar-dark bg-dark box-shadow">
            <div class="container d-flex justify-content-between">
               <a href="#" class="navbar-brand d-flex align-items-center">
                  <strong>Playlist</strong>
               </a>
            </div>
         </div>
      </header>
      <main role="main">
         <div class="album py-5 bg-light">
            <div class="container">

               <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                     <a class="nav-item nav-link active" id="nav-create-p-tab" data-toggle="tab" href="#nav-create-p" role="tab" aria-controls="nav-create-p" aria-selected="false">Create playlist</a>
                     <a class="nav-item nav-link" id="nav-playlist-tab" data-toggle="tab" href="#nav-playlist" role="tab" aria-controls="nav-playlist" aria-selected="true">My playlists</a>
                     <a class="nav-item nav-link" id="nav-playlistinfo-tab" data-toggle="tab" href="#nav-playlistinfo" role="tab" aria-controls="nav-playlistinfo" aria-selected="true">Playlist infos</a>
                     <a class="nav-item nav-link" id="nav-playlistvideo-tab" data-toggle="tab" href="#nav-playlistvideo" role="tab" aria-controls="nav-playlistvideo" aria-selected="true">Playlist videos</a>
                     <a class="nav-item nav-link" id="nav-edit-p-tab" data-toggle="tab" href="#nav-edit-p" role="tab" aria-controls="nav-edit-p" aria-selected="false">Edit playlist</a>
                     <a class="nav-item nav-link" id="nav-del-p-tab" data-toggle="tab" href="#nav-del-p" role="tab" aria-controls="nav-del-p" aria-selected="false">Remove playlist</a>
                     <a class="nav-item nav-link" id="nav-videos-tab" data-toggle="tab" href="#nav-videos" role="tab" aria-controls="nav-videos" aria-selected="false">Videos list</a>
                     <a class="nav-item nav-link" id="nav-video-tab" data-toggle="tab" href="#nav-video" role="tab" aria-controls="nav-video" aria-selected="false">Video infos</a>
                     <a class="nav-item nav-link" id="nav-video-add-tab" data-toggle="tab" href="#nav-video-add" role="tab" aria-controls="nav-video-add" aria-selected="false">Add video to playlist</a>
                     <a class="nav-item nav-link" id="nav-video-del-tab" data-toggle="tab" href="#nav-video-del" role="tab" aria-controls="nav-video-del" aria-selected="false">Remove video from playlist</a>
                  </div>
               </nav>
               <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-create-p" role="tabpanel" aria-labelledby="nav-create-p-tab">
                     <div class="row">
                        <div class="col-md-12">
                           <br>
                           <div class="form-group">
                              <input type="text" class="form-control" id="p-name" placeholder="Name">
                           </div>
                           <button id="submit-create-p" type="submit" class="btn btn-info">Send request</button>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="nav-playlist" role="tabpanel" aria-labelledby="nav-playlist-tab">
                     <div class="row">
                        <div class="col-md-3">
                           <br>
                           <button id="get-p" type="button" class="btn btn-info">Send request</button>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="nav-playlistinfo" role="tabpanel" aria-labelledby="nav-playlistinfo-tab">
                     <div class="row">
                        <div class="col-md-12">
                           <br>
                           <div class="form-group">
                              <input type="text" class="form-control" id="vpid" placeholder="Playlist ID">
                           </div>
                           <button id="submit-get-p" type="submit" class="btn btn-info">Send request</button>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="nav-playlistvideo" role="tabpanel" aria-labelledby="nav-playlistvideo-tab">
                     <div class="row">
                        <div class="col-md-12">
                           <br>
                           <div class="form-group">
                              <input type="text" class="form-control" id="vpid1" placeholder="Playlist ID">
                           </div>
                           <button id="submit-get-pv" type="submit" class="btn btn-info">Send request</button>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="nav-edit-p" role="tabpanel" aria-labelledby="nav-edit-p-tab">
                     <div class="row">
                        <div class="col-md-12">
                           <br>
                           <div class="form-group">
                              <input type="text" class="form-control" id="ep-id" placeholder="Playlist ID">
                           </div>
                           <div class="form-group">
                              <input type="text" class="form-control" id="ep-name" placeholder="New Name">
                           </div>
                           <button id="submit-edit-p" type="submit" class="btn btn-info">Send request</button>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="nav-del-p" role="tabpanel" aria-labelledby="nav-del-p-tab">
                     <div class="row">
                        <div class="col-md-12">
                           <br>
                           <div class="form-group">
                              <input type="text" class="form-control" id="delplay" placeholder="Playlist ID">
                           </div>
                           <button id="submit-delplay" type="submit" class="btn btn-info">Send request</button>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="nav-videos" role="tabpanel" aria-labelledby="nav-videos-tab">
                     <div class="row">
                        <div class="col-md-12">
                           <br>
                           <button id="get-v" type="button" class="btn btn-info">Send request</button>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="nav-video" role="tabpanel" aria-labelledby="nav-video-tab">
                     <div class="row">
                        <div class="col-md-12">
                           <br>
                           <div class="form-group">
                              <input type="text" class="form-control" id="vid" placeholder="Video ID">
                           </div>
                           <button id="get-vi" type="button" class="btn btn-info">Send request</button>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="nav-video-add" role="tabpanel" aria-labelledby="nav-video-add-tab">
                     <div class="row">
                        <div class="col-md-12">
                           <br>
                           <div class="form-group">
                              <input type="text" class="form-control" id="pid" placeholder="Playlist ID">
                           </div>
                           <div class="form-group">
                              <input type="text" class="form-control" id="addvid" placeholder="Video ID">
                           </div>
                           <button id="addv" type="button" class="btn btn-info">Send request</button>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="nav-video-del" role="tabpanel" aria-labelledby="nav-video-del-tab">
                     <div class="row">
                        <div class="col-md-12">
                           <br>
                           <div class="form-group">
                              <input type="text" class="form-control" id="dpid" placeholder="Playlist ID">
                           </div>
                           <div class="form-group">
                              <input type="text" class="form-control" id="delvid" placeholder="Video ID">
                           </div>
                           <button id="delv" type="button" class="btn btn-info">Send request</button>
                        </div>
                     </div>
                  </div>
               </div>

               <br>
               <br>
               <div>
                  <p id="status"></p>
                  <pre id="reslut" style="background: #000; color: #fff; padding: 15px">
                  </pre>
               </div>
         </div>
      </main>

      <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
      <script type="text/javascript">
         jQuery(document).ready(function($) {

            var div = jQuery('#reslut');
            var status = jQuery('#status');

            jQuery('#get-p').on('click', function(e){
               $.ajax({
                  method: "GET",
                  url: "/api/playlists",
               })
               .done(function(res, textStatus, jqXHR) {
                  status.html(textStatus + '<br>' + jqXHR.status);
                  var data = JSON.stringify(res, undefined, 4);
                  div.html(data);
               }).fail(function(jqXHR, textStatus, errorThrown) {
                  status.html(textStatus + '<br>' + jqXHR.status);
               });
            });

            jQuery('#submit-get-p').on('click', function(e){
               $.ajax({
                  method: "GET",
                  url: "/api/playlists/"+jQuery('#vpid').val(),
               })
               .done(function(res, textStatus, jqXHR) {
                  status.html(textStatus + '<br>' + jqXHR.status);
                  var data = JSON.stringify(res, undefined, 4);
                  div.html(data);
               }).fail(function(jqXHR, textStatus, errorThrown) {
                  status.html(textStatus + '<br>' + jqXHR.status);
               });
            });

            jQuery('#submit-get-pv').on('click', function(e){
               $.ajax({
                  method: "GET",
                  url: "/api/playlists/"+jQuery('#vpid1').val() + "/videos" ,
               })
               .done(function(res, textStatus, jqXHR) {
                  status.html(textStatus + '<br>' + jqXHR.status);
                  var data = JSON.stringify(res, undefined, 4);
                  div.html(data);
               }).fail(function(jqXHR, textStatus, errorThrown) {
                  status.html(textStatus + '<br>' + jqXHR.status);
               });
            });

            jQuery('#submit-create-p').on('click', function(e){
               $.ajax({
                  method: "POST",
                  url: "/api/playlists",
                  data: {'name': jQuery('#p-name').val()}
               })
               .done(function(res, textStatus, jqXHR) {
                  status.html(textStatus + '<br>' + jqXHR.status);
                  var data = JSON.stringify(res, undefined, 4);
                  div.html(data);
               }).fail(function(jqXHR, textStatus, errorThrown) {
                  status.html(textStatus + '<br>' + jqXHR.status);
               });
            });

            jQuery('#submit-edit-p').on('click', function(e){
               $.ajax({
                  method: "POST",
                  url: "/api/playlists/"+jQuery('#ep-id').val(),
                  data: {'name': jQuery('#ep-name').val()}
               })
               .done(function(res, textStatus, jqXHR) {
                  status.html(textStatus + '<br>' + jqXHR.status);
                  var data = JSON.stringify(res, undefined, 4);
                  div.html(data);
               }).fail(function(jqXHR, textStatus, errorThrown) {
                  status.html(textStatus + '<br>' + jqXHR.status);
               });
            });

            jQuery('#get-v').on('click', function(e){
               $.ajax({
                  method: "GET",
                  url: "/api/videos",
               })
               .done(function(res, textStatus, jqXHR) {
                  status.html(textStatus + '<br>' + jqXHR.status);
                  var data = JSON.stringify(res, undefined, 4);
                  div.html(data);
               }).fail(function(jqXHR, textStatus, errorThrown) {
                  status.html(textStatus + '<br>' + jqXHR.status);
               });
            });

            jQuery('#get-vi').on('click', function(e){
               $.ajax({
                  method: "GET",
                  url: "/api/videos/"+jQuery('#vid').val(),
               })
               .done(function(res, textStatus, jqXHR) {
                  status.html(textStatus + '<br>' + jqXHR.status);
                  var data = JSON.stringify(res, undefined, 4);
                  div.html(data);
               }).fail(function(jqXHR, textStatus, errorThrown) {
                  status.html(textStatus + '<br>' + jqXHR.status);
               });
            });

            jQuery('#addv').on('click', function(e){
               $.ajax({
                  method: "POST",
                  url: "/api/playlists/"+jQuery('#pid').val()+"/videos/"+jQuery('#addvid').val(),
               })
               .done(function(res, textStatus, jqXHR) {
                  status.html(textStatus + '<br>' + jqXHR.status);
                  var data = JSON.stringify(res, undefined, 4);
                  div.html(data);
               }).fail(function(jqXHR, textStatus, errorThrown) {
                  status.html(textStatus + '<br>' + jqXHR.status);
               });
            });

            jQuery('#delv').on('click', function(e){
               $.ajax({
                  method: "DELETE",
                  url: "/api/playlists/"+jQuery('#dpid').val()+"/videos/"+jQuery('#delvid').val(),
               })
               .done(function(res, textStatus, jqXHR) {
                  status.html(textStatus + '<br>' + jqXHR.status);
                  var data = JSON.stringify(res, undefined, 4);
                  div.html(data);
               }).fail(function(jqXHR, textStatus, errorThrown) {
                  status.html(textStatus + '<br>' + jqXHR.status);
               });
            });

            jQuery('#submit-delplay').on('click', function(e){
               $.ajax({
                  method: "DELETE",
                  url: "/api/playlists/"+jQuery('#delplay').val(),
               })
               .done(function(res, textStatus, jqXHR) {
                  status.html(textStatus + '<br>' + jqXHR.status);
                  var data = JSON.stringify(res, undefined, 4);
                  div.html(data);
               }).fail(function(jqXHR, textStatus, errorThrown) {
                  status.html(textStatus + '<br>' + jqXHR.status);
               });
            });

         });
      </script>
   </body>
</html>