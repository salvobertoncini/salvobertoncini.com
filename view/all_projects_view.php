<?php
	
	__DIR__ . "/". include_once "model/work.php";
	__DIR__ . "/". include_once "controller/work_controller.php";

	$resp = getAllWorks();
	
	if($resp["response"])
	{
		foreach ($resp["allProjects"] as $latestWork)
		{
			echo "<div class='col-lg-4 hover01'><a class='zoom green' href='project.php?id=".$latestWork->getId()."'><figure><img class='img-responsive' src='";
			if($latestWork->getAvatar() != "null")
				echo "contents/".$latestWork->getAvatar();
			else
				echo "http://placehold.it/350x350";
			echo "'></figure></a><p>".$latestWork->getTitle()."</p></div>";
		}
	}
	else
		echo "WRONG WAY!";