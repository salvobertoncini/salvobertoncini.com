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
					<h3>MY PROJECTS</h3>
					<hr>
					<p>
						Here You will find some of my projects, visit my <a href="http://www.github.com/salvobertoncini"><i class="fa fa-github"></i> GitHub page</a>.
						<br>
					</p>
				</div>
				<?php
					include_once "view/all_projects_view.php";
				?>
			</div><!-- /row -->
		</div>
		
		<?php include_once "script.php"; ?>

	</body>
</html>