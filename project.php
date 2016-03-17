<!DOCTYPE html>
<html lang="en">
  <head>
    <?php @include "head.html"; ?>
  </head>

  <body>

    <?php 

    	@include "navbar.html";
    	@include "config.php";


        // controlliamo che sia stato inviato un id numerico alla pagina
        if(isset($_GET['id'])&&(is_numeric($_GET['id']))){
          // valorizziamo la variabile relativa all'id dell'articolo e includiamo il file di configurazione
          $art_id = $_GET['id'];
          echo "<script>console.log('$art_id')</script>";

          // selezioniamo dalla tabella i dati relativi all'articolo
          $sql = "SELECT * FROM `work` WHERE id = '$art_id' ORDER BY id DESC"; 
          echo "<script>console.log('$sql')</script>";
          $result = mysql_query($sql);
          // se per quell'id esiste un articolo..

          while($row = mysql_fetch_assoc($result)){
            // ...estraiamo i dati e mostriamoli a video
            $art_id = $row['id'];
            $name = $row['name'];
            $description = html_entity_decode(stripslashes($row['description']));
            $date = $row['date'];
            $link = $row['link'];
            $idimmagine = $row['id_image'];
        }
    }
    ?>

	
	<!-- +++++ Projects Section +++++ -->
  
  <div class="container pt">
    <div class="row mt">
      <div class="col-lg-6 col-lg-offset-3 centered">
        <h3><?php echo $name; ?></h3>
        <hr>
        <?php echo $description; ?>
      </div>
    </div>
    <div class="row mt centered"> 
      <div class="col-lg-8 col-lg-offset-2">
        <p><img class="img-responsive" src='<?php echo "show.php?id=".$idimmagine; ?>'></p>
        <p><bt>Link: <a <?php echo "href=\"http://".$link."\""; ?>><?php echo $name; ?></a></bt> - <bt>Date: <?php echo $date; ?></bt></p>
      </div>
    </div><!-- /row -->
  </div><!-- /container -->
	
	
	
	
	<?php @include "footer.php"; ?>
	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap.min.js"></script>
    <?php include_once("analyticstracking.php") ?>
  </body>
</html>
