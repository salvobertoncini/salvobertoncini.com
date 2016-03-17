<!DOCTYPE html>
<html lang="en">
<head>
	<?php @include "head.html"; ?>
</head>

<body>

	<?php @include "navbar.html"; ?>

	<div class="container pt">
		<!-- +++++ Posts Lists +++++ -->
		<div class="row mt">
			<div class="col-lg-6 col-lg-offset-3 centered">
				<h3>MY BLOG</h3>
				<hr>
			</div>
		</div>
		<div id="white">
			<div class="container">
				<div class="row">
					<?php 
					
					$orig = "<div class=\"col-lg-8 col-lg-offset-2\" id=\"menublog\"> </div>";
					$a = htmlentities($orig);
					$b = html_entity_decode($a);
					echo $b;

					?>
				</div><!-- /row -->
			</div> <!-- /container -->
		</div><!-- /white -->
	</div>

	<?php @include "footer.php"; ?>

<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="initialize_blog.js"></script>
	<?php include_once("analyticstracking.php") ?>
</body>
</html>
