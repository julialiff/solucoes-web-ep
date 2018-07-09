<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
?>

<html>
  <head>
    <link rel="stylesheet" href="css/bootstrap-grid.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap-reboot.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
  </head>
  <body>
    <div class="container-fluid" style="background-color: #999;padding: 20px;">
      <div class="container" style="background-color: #FFF;">
        <div class="row">
          <div class="col-md-8">

            <div class="row" style="padding: 20px;">
              <div class="col-md-8">
                <input type="text" name="address" class="form-control" placeholder="Endereço" />
              </div>
              <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Buscar</button>
              </div>
              <div class="col-md-2"></div>
            </div>

            <div class="row" style="padding-bottom: 10px;">
              <div class="col-md-4">
                <input type="checkbox" name="pontos"> Pontos de ônibus
              </div>
              <div class="col-md-4">
                <input type="checkbox" name="bus"> Ônibus
              </div>
            </div>

          </div>
          <div class="col-md-4" style="padding: 10px;">
            João M. Rossetto F. da Silva - 9277833<br />
            Julia Litvinoff Justus - 8922177<br />
            Lucas Saccumann Miranda - 8921687<br />
          </div>
        </div>

        <div class="container-fluid" style="background-color: #1122AA">
          MAPA
          <!-- Getting API Keys on S3: -->
          <?php require 'config.php'; ?>




<div id="map" style="height: 100%;"></div>
    <script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      var map, infoWindow;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 6
        });
        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }
    </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $google_key; ?>&callback=initMap"
        async defer></script>




        </div>



      </div>





<!--       <div class="container" style="background-color: #FFF">
          <form>
            <input type="text" name="address" class="form-control" />
            <button type="submit" class="btn btn-primary">Buscar</button>
          </form>
      </div> -->








    </div>

    <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </body>
</html>
