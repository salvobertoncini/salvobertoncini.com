<!DOCTYPE html>
<html lang="en">
  <head>
    <?php @include "head.html"; ?>
  </head>

  <body>

    <?php @include "navbar.html"; ?>

	<!-- +++++ Welcome Section +++++ -->
	<div id="ww">
	    <div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 centered">
					<img class="img-circle" src="assets/img/user.png" alt="Salvo">
					<h1>Hi, I am Salvo!</h1>
					<h3>Welcome to my Website!</h3>
					<p>I'm a Computer Science student at "Universit&agrave degli Studi di Messina".
					   I'm currently looking for a job or projects to work on. Check out my portfolio or contact me if you're interested.
					   You can find my projects' source code (including this website) on my <a href="https://github.com/salvobertoncini"><i class="fa fa-github"></i> GitHub page</a>.
					</p>
					<p>Enjoy your stay!</p>
				</div><!-- /col-lg-8 -->
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /ww -->
	
	
	<!-- +++++ Projects Section +++++ -->
	
	<div class="container pt">
		<div class="row mt centered " id="menuwork">	
			<div class="col-lg-6 col-lg-offset-3 centered">
				<h3>SOME WORKS</h3>
				<hr><br>
			</div>
		</div><!-- /row -->
	</div><!-- /container -->
	
	
	<?php @include "footer.php"; ?>
	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="initialize_index.js"></script>
    <?php include_once("analyticstracking.php") ?>
  </body>
</html>
