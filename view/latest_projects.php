<?php

	__DIR__ . "/". include_once "controller/work_controller.php";

	$resp = getLastThreeWorks();

	if($resp["response"])
	{
		$latestWorks = $resp["latestWorks"];
		
		foreach ($latestWorks as $latestWork)
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
		echo "no project into db";

