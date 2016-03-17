<!DOCTYPE html>
<html lang="en">
  <?php @include "head.html"; ?>

  <body>

    <?php @include "navbar.html"; ?>
	
	
	<!-- +++++ Projects Section +++++ -->
	
	<div class="container pt">
		<div class="row mt">
			<div class="col-lg-6 col-lg-offset-3 centered">
				<h3>MY WORKS</h3>
				<hr>
				<p>Here You will find some of my projects, visit my <a href="https://github.com/salvobertoncini"><i class="fa fa-github"></i> GitHub page</a></p>
			</div>
		</div>
		<div class="row mt centered" id="menuwork">	
			
		</div><!-- /row -->
	</div><!-- /container -->
	
	<?php @include "footer.php"; ?>
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="initialize_work.js"></script>
    <?php include_once("analyticstracking.php") ?>
  </body>
</html>
