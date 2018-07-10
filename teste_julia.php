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
                <input type="text" id="pac-input" name="address" class="form-control" placeholder="Endereço" />
              </div>
              <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Buscar</button>
              </div>
              <div class="col-md-2"></div>
            </div>

            <div class="row" style="padding-bottom: 10px;">
              <div class="col-md-4">
                <input type="checkbox" name="pontos" id="pontos" onclick="mostrarPontos()"> Pontos de ônibus
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

        <div class="container-fluid">
          <!-- Getting API Keys on S3: -->
          <?php require 'config.php'; ?>




   <!-- <input id="pac-input" class="controls" type="text" placeholder="Search Box"> -->
    <div id="map" style="height: 100%;"></div>
    <script>
      // This example adds a search box to a map, using the Google Place Autocomplete
      // feature. People can enter geographical searches. The search box will return a
      // pick list containing a mix of places and predicted search terms.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">


      visibility = "off";

      function mostrarPontos() {
        // Get the checkbox
        var checkBox = document.getElementById("pontos");
        // Get the output text
        var visibility = "";

        // If the checkbox is checked, display the output text
        if (checkBox.checked == true){
          visibility = "on";
        } else {
          visibility = "off";
        }
      }


      function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -23.533, lng: -46.625},
          zoom: 13,
          mapTypeId: 'roadmap',
          styles:[{
            "featureType": "poi",
            "stylers": [{
              "visibility": visibility
              }]
            },
            {
            "featureType": "transit.station.bus",
            "stylers": [{
              "visibility": "off"
            }]
          }]
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $google_key; ?>&libraries=places&callback=initAutocomplete"
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
