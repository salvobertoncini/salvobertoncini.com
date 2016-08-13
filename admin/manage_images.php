<?php
	include_once __DIR__ . "/". "../model/user.php";
	include_once __DIR__ . "/". "../controller/image_controller.php";

	session_start();
	
	if(!isset($_SESSION["userLogged"]))
	{
		session_destroy();
		
		//redirect login page	
		header("location: ../login.php");
	}
	else
		$userLogged = $_SESSION["userLogged"];

?>

<!DOCTYPE html>
<html>
<head>
	<?php include_once "admin_head.html"; ?>
</head>
<body>

	<?php include_once "admin_navbar.php"; 

	// set the default timezone to use. Available since PHP 5.1
	date_default_timezone_set('UTC');
	$date = date("D M j G:i:s T Y"); 

	?> 

	<script type="text/javascript">
		function uploadImage()
		{
			var file = _("file1").files[0];
			var formdata = new FormData();
			formdata.append("file1", file);
			var ajax = new XMLHttpRequest();
			ajax.upload.addEventListener("progress", progressHandler, false);
			ajax.addEventListener("load", completeHandler, false);
			ajax.addEventListener("error", errorHandler, false);
			ajax.addEventListener("abort", abortHandler, false);
			ajax.open("POST", "uploader.php");
			ajax.send(formdata);
		}

		function _(el)
		{
			return document.getElementById(el);
		}

		function progressHandler(event)
		{
			_("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
			var percent = (event.loaded / event.total) * 100;
			_("progressBar").value = Math.round(percent);
			_("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
		}

		function completeHandler(event)
		{
			_("status").innerHTML = event.target.responseText;
			_("progressBar").value = 0;
		}

		function errorHandler(event)
		{
			_("status").innerHTML = "Upload Failed";
		}

		function abortHandler(event)
		{
			_("status").innerHTML = "Upload Aborted";
		}
	</script>

	<div class="container pt">

		<div class="row mt centered " id="menuwork">	
			<div class="col-lg-8 col-lg-offset-2 centered">
				<h3>BENVENUTO <?php echo $userLogged->getName().' '.$userLogged->getSurname(); ?> :)</h3>
			</div>
		</div>

		<div class="row mt centered " id="menuwork">	
			<div class="col-lg-8 col-lg-offset-2 centered">
				<h3>INSERT IMAGE</h3>
				<hr><br>

				<form id="upload_form" enctype="multipart/form-data" method="post">
				  	<input type="file" name="file1" id="file1">
				  	<input type="button" class="btn btn-info" value="Upload Image" onclick="uploadImage()"><br>
				  	<br><progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
				  	<h3 id="status"></h3>
				  	<p id="loaded_n_total"></p>
				</form>
			</div>
		</div><!-- /row -->

		<div class="row mt centered " id="menuwork">	
			<div class="col-lg-8 col-lg-offset-2 centered">
				<h3>DELETE IMAGE</h3>
				<hr><br>
				<p>
					<form action="../controller/image_controller.php" method="POST">
						<select class="form-control" name="image" id="image">
							<option value="null">Select image...</option>
							
							<?php 
								$optionList = getAllImages();

								echo $optionList;
							?>

						</select>
						<br>
						<input type="submit" class="btn btn-danger" value="Delete Image">
						<input class="form-control" type="hidden" name="action" id="action" value="delete_image">
					</form>
				</p>
			</div>
		</div><!-- /row -->

	</div><!-- /container -->

	<?php include_once "../script.php"; ?>

</body>
</html>