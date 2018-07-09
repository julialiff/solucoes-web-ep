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
        <?php require 'config.php' ?>
          mapa
          <?php echo "Google Key"+ $google_key
          echo "<br /> Sptrans key: " + $sptrans_key ?>





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
