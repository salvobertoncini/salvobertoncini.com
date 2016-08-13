<?php
	__DIR__ . "/". include_once "model/post.php";
	__DIR__ . "/". include_once "controller/post_controller.php";

	$resp = getAllPosts();

	if($resp["response"])
	{
		$allPosts = $resp["allPosts"];
		
		foreach ($allPosts as $latestPost)
		{
			echo "<a href='article.php?id=".$latestPost->getId()."'><h2>".$latestPost->getTitle()."</h2><h3>".$latestPost->getSubtitle()."</h3></a>";
			echo "<p>Posted by ".$latestPost->getAuthor()." on ".date("l jS \of F Y", strtotime($latestPost->getDate())).".</p><hr>";
		}
	}
	else
		echo "non ci sono post nel db";

