<!DOCTYPE html>
<html>
<head>
	<?php include_once "head.html"; ?>
</head>
<body>

	<?php
		include_once "navbar.html";
	?> 

	<div class="container pt">
		<div class="row mt" id="menuwork">	
			<div class="col-lg-8 col-lg-offset-2 centered">
				<h3>BLOG</h3>
				<hr>
			</div>
			<div class="col-lg-8 col-lg-offset-2">
				<?php 
					include_once "view/all_posts_view.php";
				?>
			</div>
		</div><!-- /row -->
	</div><!-- /container -->

	<?php include_once "script.php"; ?>

</body>
</html>
