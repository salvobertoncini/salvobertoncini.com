<!DOCTYPE html>
<html>
<head>
	<?php include_once "head.html"; ?>
</head>
<body>

	<?php include_once "navbar.html"; ?> 

	<div class="container pt">
		<div class="row mt centered">	
			<div class="col-lg-8 col-lg-offset-2 centered">
				<h3>LOGIN</h3>
				<hr><br>
				<form action="controller/login_controller.php" method="POST">
					<div id="loading"></div>
					<input class="form-control" type="email" name="email" id="email">
					<input class="form-control" type="password" name="password" id="password">
					<br>
					<input type="submit" class="btn btn-info" value="Login">
				</form>
			</div>
		</div><!-- /row -->
	</div>

	<?php include_once "script.php"; ?>

</body>
</html>