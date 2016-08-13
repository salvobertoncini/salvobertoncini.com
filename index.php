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
		<div class="row mt centered " id="menuwork">	
			<div class="col-lg-8 col-lg-offset-2 centered">
				<img class="thumb img-circle" src="contents/stanco.jpg" alt="Salvo">
				<h3>WELCOME TO MY WEBSITE</h3>
				<hr><br>
				<p>
					Hi! Salvo Bertoncini, a Computer Science student at "Università degli Studi di Messina". 
					<br>I'm currently looking for a job or projects to work on. Check out my portfolio or contact me if you're interested. You can find my projects' source code (including this website) on my <a href="http://www.github.com/salvobertoncini"><i class="fa fa-github"></i> GitHub page</a>.
					<br>
					Enjoy your stay!
				</p>
			</div>
		</div><!-- /row -->
	
		<div class="row mt centered " id="menuwork">	
			<div class="col-lg-8 col-lg-offset-2 centered">
				<h3>LATEST NEWS</h3>
				<hr>
				<p>
					<?php 
						include_once "view/latest_post.php";
					?>
				</p>
			</div>
		</div><!-- /row -->

		<div class="row mt centered " id="menuwork">	
			<div class="col-lg-8 col-lg-offset-2 centered">
				<h3>SOME PROJECTS</h3>
				<hr><br>
			</div>
					<?php 
						include_once "view/latest_projects.php";
					?>
		</div><!-- /row -->

	</div><!-- /container -->

	<?php include_once "footer.php"; ?>

	<?php include_once "script.php"; ?>

</body>
</html>