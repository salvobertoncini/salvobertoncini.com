<?php
	include_once __DIR__ . "/". "../model/user.php";
	include_once __DIR__ . "/". "../model/work.php";
	include_once __DIR__ . "/". "../controller/work_controller.php";
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

	$resp = getWorkById(acquireGetParamethers());

	if($resp["response"])
		$workOnGet = $resp["project"];
	else
		$workOnGet = new Work(0, 'titolo', 'descrizione', '1991-01-01', 'url', 'avatar');






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
				<h3>INSERT WORK</h3>
				<hr><br>
				<form action="../controller/work_controller.php" method="POST">
					<input class="form-control" type="text" name="title" id="title" placeholder="Title"><br>
					<textarea class="form-control" type="text" name="description" id="description" placeholder="Description"></textarea><br>
					<input class="form-control" type="date" name="date" id="date"><br>
					<input class="form-control" type="text" name="url" id="url" placeholder="Url"><br>

					<select class="form-control" name="avatar" id="avatar">
						<option value="null">Select image...</option>
						
						<?php 
							$optionList = getAllImages();

							echo $optionList;
						?>

					</select>

					<input class="form-control" type="hidden" name="action" id="action" value="insert_work">

					<br>
					<input type="submit" class="btn btn-success" value="Insert Project">
				</form>
			</div>
		</div><!-- /row -->
	
		<div class="row mt centered " id="menuwork">	
			<div class="col-lg-8 col-lg-offset-2 centered">
				<h3>EDIT WORK</h3>
				<hr><br>
				<form action="../controller/work_controller.php" method="POST">
				<div class="col-md-10 centered"><select class="form-control" name="id" id="id">
				<?php
						$resp = getAllWorks();

						if($resp["response"])
						{
							$optionList = $resp["allProjects"];
							foreach ($optionList as $work)
								echo '<option value="'.$work->getId().'">'.$work->getTitle().'</option>';
						}
						else
							echo '<option value="">nessun progetto</option>';
				?>
				</select></div><div class="col-md-2">
				<input class="form-control" type="hidden" name="action" id="action" value="add_get"><input type="submit" class="btn btn-warning" value="Select Project"></div>
				</form>
				<br><br><br>
				<form action="../controller/work_controller.php" method="POST">
					<input class="form-control" type="text" name="title" id="title" <?php echo 'value='.$workOnGet->getTitle(); ?> ><br>
					<textarea class="form-control" type="text" name="description" id="description"><?php echo $workOnGet->getDescription(); ?></textarea><br>
					<input class="form-control" type="date" name="date" id="date" <?php echo 'value='.$workOnGet->getDate(); ?> ><br>
					<input class="form-control" type="text" name="url" id="url" <?php echo 'value='.$workOnGet->getUrl(); ?> ><br>

					<select class="form-control editAvatar" name="avatar" id="editAvatar">
						<option value="null">Select image...</option>
						
						<?php 
								$optionList = getAllImagesWithSelect($workOnGet->getAvatar());

								echo $optionList;
						?>

					</select>

					<input class="form-control" type="hidden" name="id" id="id" <?php echo 'value='.$workOnGet->getId(); ?> >
					<input class="form-control" type="hidden" name="action" id="action" value="update_work">

					<br>
					<input type="submit" class="btn btn-primary" value="Update Project">
				</form>
			</div>
		</div><!-- /row -->

		<div class="row mt centered " id="menuwork">	
			<div class="col-lg-8 col-lg-offset-2 centered">
				<h3>DELETE WORK</h3>
				<hr><br>
				<div class="col-md-10 centered">
					<form action="../controller/work_controller.php" method="POST">
					<select class="form-control" name="id" id="id">
					<?php
							$resp = getAllWorks();

							if($resp["response"])
							{
								$optionList = $resp["allProjects"];
								foreach ($optionList as $work)
									echo '<option value="'.$work->getId().'">'.$work->getTitle().'</option>';
							}
							else
								echo '<option value="">nessun progetto</option>';
					?>
					</select></div><div class="col-md-2"><input type="submit" class="btn btn-danger" value="Delete Project"></div>
					
					<input class="form-control" type="hidden" name="action" id="action" value="delete_work">
				</form>
			</div>
		</div><!-- /row -->

	</div><!-- /container -->

	<?php include_once "../script.php"; ?>

</body>
</html>