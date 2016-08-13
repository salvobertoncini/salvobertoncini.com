<?php
	__DIR__ . "/". include_once "controller/post_controller.php";

	$resp = getLatestPost();

	if($resp["response"])
	{
		$latestPost = $resp["latestPost"];
		
		echo "<h3>".$latestPost->getTitle()."</h3><h4><i>".$latestPost->getSubtitle()."</i></h4>";
		echo "<h5><span class=\"fa fa-calendar\" aria-hidden=\"true\"></span> ".date("l jS \of F Y", strtotime($latestPost->getDate()))."</h5>";
		echo "<p>".$latestPost->getPreview()."</p><p><a href='article.php?id=".$latestPost->getId()."' class='btn btn-info'>Read More</a> <a href='blog.php' class='btn btn-primary'>More from Blog</a></p>";
	}
	else
		echo "non ci sono post nel db";

