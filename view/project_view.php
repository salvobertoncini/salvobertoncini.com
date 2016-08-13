<?php

	__DIR__ . "/". include_once "model/work.php";
	__DIR__ . "/". include_once "controller/work_controller.php";

	function acquireGetParamethers()
	{
		return $_GET["id"];

	}

	$resp = getWorkById(acquireGetParamethers());
	
	if($resp["response"])
	{
		$project = $resp["project"];

		echo '<div class="col-lg-8 col-lg-offset-2 centered">
				<h3>'.$project->getTitle().'</h3>
				<hr>
				'.$project->getDescription().'<br><br><br>
				</div>
				<div class="row mt centered"> 
					<div class="col-lg-6 col-lg-offset-3 centered">
						<p>
							<a href="'.$project->getUrl().'">
								<img class="img-responsive" src="';
								if($project->getAvatar()!="null") echo "contents/".$project->getAvatar();
								else echo "http://placehold.it/800x600";
								echo '">
							</a>
						</p>
						<p><bt>Link: <a href="'.$project->getUrl().'">'.$project->getTitle().'</a></bt> - <bt>Date: '.$project->getDate().'</bt></p>
					</div>
				</div>';
	}
	else
		echo "WRONG WAY!";