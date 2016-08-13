<?php
	include_once __DIR__ . "/". "../model/user.php";
	include_once __DIR__ . "/". "../controller/post_controller.php";
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


	function acquireGetParamethers()
	{
		return $_GET["id"];
	}

	$resp = null;

	$resp = getPostById(acquireGetParamethers());

	if($resp["response"])
		$postOnGet = $resp["latestPost"];
	else
		$postOnGet = new Post(0, 0, 'titolo', 'sottotitolo', 'testo', 'preview', 'immagine', '1991-01-01');



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

	<div class="container pt">

		<div class="row mt centered " id="menuwork">	
			<div class="col-lg-8 col-lg-offset-2 centered">
				<h3>BENVENUTO <?php echo $userLogged->getName().' '.$userLogged->getSurname(); ?> :)</h3>
			</div>
		</div>

		<div class="row mt centered " id="menuwork">	
			<div class="col-lg-8 col-lg-offset-2 centered">
				<h3>INSERT POST</h3>
				<hr><br>
				<form action="../controller/post_controller.php" method="POST">
					<input class="form-control" type="text" name="title" id="title" placeholder="Title"><br>
					<textarea class="form-control" type="text" name="subtitle" id="subtitle" placeholder="SubTitle"></textarea><br>
					<textarea class="form-control" type="text" name="text" id="text" placeholder="Text"></textarea><br>

					<select class="form-control" name="image" id="image">
						<option value="null">Select image...</option>
						
						<?php 
							$optionList = getAllImages();

							echo $optionList;
						?>

					</select>

					<input class="form-control" type="hidden" name="id_user" id="author" value="<?php echo $userLogged->getId(); ?>">
					<input class="form-control" type="hidden" name="action" id="action" value="insert_post">


					<br>
					<input type="submit" class="btn btn-success" value="Insert Post">
				</form>
			</div>
		</div><!-- /row -->
	
		<div class="row mt centered " id="menuwork">	
			<div class="col-lg-8 col-lg-offset-2 centered">
				<h3>EDIT POST</h3>
				<hr><br>
				<form action="../controller/post_controller.php" method="POST">
				<div class="col-md-10 centered"><select class="form-control" name="id" id="id">
				<?php
						$resp = getAllPosts();

						if($resp["response"])
						{
							$optionList = $resp["allPosts"];
							foreach ($optionList as $post)
								echo '<option value="'.$post->getId().'">'.$post->getTitle().'</option>';
						}
						else
							echo '<option value="">nessun post</option>';
				?>
				</select></div><div class="col-md-2">
				<input class="form-control" type="hidden" name="action" id="action" value="add_get"><input type="submit" class="btn btn-warning" value="Select Post"></div>
				</form>
				<br><br><br>
				<form action="../controller/post_controller.php" method="POST">
					<textarea class="form-control" type="text" name="title" id="title" ><?php echo $postOnGet->getTitle(); ?> </textarea><br>
					<textarea class="form-control" type="text" name="subtitle" id="subtitle" ><?php echo $postOnGet->getSubTitle(); ?></textarea><br>
					<textarea class="form-control" type="text" name="text" id="text"><?php echo $postOnGet->getText(); ?></textarea><br>
					<input class="form-control" type="date" name="date" id="date" <?php echo 'value='.$postOnGet->getDate(); ?> ><br>
					<select class="form-control editAvatar" name="image" id="avatar">
						<option value="null">Select image...</option>
						
						<?php 
								$optionList = getAllImagesWithSelect($postOnGet->getImage());

								echo $optionList;
						?>

					</select>

					</select>

					<input class="form-control" type="hidden" name="id_user" id="id_user" value="<?php echo $userLogged->getId(); ?>">
					<input class="form-control" type="hidden" name="id" id="id" <?php echo 'value='.$postOnGet->getId(); ?> >
					<input class="form-control" type="hidden" name="action" id="action" value="edit_post">


					<br>
					<input type="submit" class="btn btn-primary" value="Update Post">
				</form>
			</div>
		</div><!-- /row -->

		<div class="row mt centered ">	
			<div class="col-lg-8 col-lg-offset-2 centered">
				<h3>DELETE POST</h3>
				<hr><br>
				<div class="col-md-10 centered">
				<form action="../controller/post_controller.php" method="POST">
					<select class="form-control" name="id" id="id">
					<?php
							$resp = getAllPosts();

							if($resp["response"])
							{
								$optionList = $resp["allPosts"];
								foreach ($optionList as $post)
									echo '<option value="'.$post->getId().'">'.$post->getTitle().'</option>';
							}
							else
								echo '<option value="">nessun post</option>';
					?>
					</select></div><div class="col-md-2"><input type="submit" class="btn btn-danger" value="Delete Post"></div>
					
					<input class="form-control" type="hidden" name="action" id="action" value="delete_post">
				</form>
			</div>
		</div><!-- /row -->

	</div><!-- /container -->

	<?php include_once "../script.php"; ?>

</body>
</html>