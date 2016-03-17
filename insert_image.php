<!DOCTYPE html>
<html lang="en">
	<head>
		<?php @include "head.html"; ?>
	</head>
	
    <body>
    	<?php @include "sidebar.html"; ?>

    	<div id="ww">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 centered">
                        <form role="form" enctype="multipart/form-data" action="upload_image.php" method="post">
                            <h2>Inserisci Immagine</h2>
                            autore: <label>Salvo Bertoncini</label>
                            <br>
                            <input type="file" name="file" size="40"/><br>
                            <input name="submit" type="submit" class="btn btn-info" value="Carica immagine"></input>
                        </form>
                    </div><!-- /col-lg-8 -->
                </div><!-- /row -->
            </div> <!-- /container -->
        </div><!-- /ww -->

    	<?php @include "footer.php"; ?>

    	<!-- Bootstrap core JavaScript
	    ================================================== -->
	    <!-- Placed at the end of the document so the pages load faster -->
	    <script src="assets/js/bootstrap.min.js"></script>

    </body>
</html>