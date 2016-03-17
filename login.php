<!DOCTYPE html>
<html lang="en">
	<head>

		<?php @include "head.html"; ?>
    	
	</head>
	
    <body>
    	<?php @include "navbar.html"; ?>

    	<div id="ww">
		    <div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2 centered">
						<form action="" method="POST" id="submitForm">
				    		<div id="loading"></div>
				    		<h2>Login</h2>
				    			<input class="form-control" type="text" name="user" id="user">
				    			<input class="form-control" type="password" name="password" id="password">
				    			<br>
				    		<input type="submit" class="btn btn-info" value="Login" id="login">
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
	    <script type="text/javascript" src="login.js"></script>

    </body>
</html>