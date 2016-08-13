<?php

	include_once __DIR__ . "/". "../model/post.php";
	include_once __DIR__ . "/". "../config.php";

	if(isset($_POST["id"]))
		$id 	= $_POST["id"];
	else
		$id = 0;
	if(isset($_POST["id_user"]))
		$id_author 	= $_POST["id_user"];
	else $id_author = '';

	if(isset($_POST["title"]))
		$title 		= $_POST["title"];
	else
		$title = '';

	if(isset($_POST["subtitle"]))
		$subtitle	= $_POST["subtitle"];
	else
		$subtitle = '';

	if(isset($_POST["text"]))
	{
		$text 		= $_POST["text"];
		$preview 	= createPreview($text, 300);
	}
	else
	{
		$text = '';
		$preview = '';
	}

	if(isset($_POST["image"]))
		$image		= $_POST["image"];
	else
		$image = 'null';

	if(isset($_POST["date"]))
		$date		= $_POST["date"];
	else
		$date = '';

	if(isset($_POST["action"]))
		$action		= $_POST["action"];
	else
		$action = '';

	$post = new Post($id, $id_author, $title, $subtitle, $text, $preview, $image, $date);


	switch ($action) {
	    case 'insert_post':
	        createPost($post);
	        //redirect admin page
			header("location: ../admin/manage_posts.php");
	        break;
	    case 'edit_post':
	        updatePostById($post);
	        //redirect admin page
			header("location: ../admin/manage_posts.php");
			break;
	    case 'delete_post':
	        deletePostById($post);
	        //redirect admin page
			header("location: ../admin/manage_posts.php");
	        break;
	    case 'add_get':
	    	header("location: ../admin/manage_posts.php?id=".$post->getId());
	    default:
	    	break;
	}


	/* CRUD FUNCTIONS */

	function createPost($post)
	{
		global $pdo;

		$stmt = $pdo->prepare('INSERT INTO `posts`(`id`, `id_user`, `title`, `subtitle`, `text`, `preview`, `image`, `date`) VALUES (null, :id_author, :title, :subtitle, :text, :preview, :image, NOW())');

		$stmt->execute(array('id_author' => $post->author, 'title' => $post->title, 'subtitle' => $post->subtitle, 'text' => $post->text, 'preview' => $post->preview, 'image' => $post->image));

		if($stmt)
			$resp = array('response' => true);
		else
			$resp = array('response' => false);

		return $resp;
	}


	function getAllPosts()
	{
		global $pdo;
		
		$latestPost = null;
		$allPosts = [];

		$stmt = $pdo->prepare('SELECT *, posts.id as uid, users.name, users.surname FROM posts JOIN users ON (users.id = posts.id_user) ORDER BY posts.id DESC');

		$stmt->execute();

		foreach ($stmt as $row)
		{
			$latestPost = new Post($row["uid"], $row["name"]." ".$row["surname"], $row["title"], $row["subtitle"], $row["text"], $row["preview"], $row["image"], $row["date"]);
			array_push($allPosts, $latestPost);
			
		}

		if($latestPost == null)
			$resp = array('response' => false);
		else
			$resp = array('response' => true, 'allPosts' => $allPosts);
		
		return $resp;
	}

	function getPostById($id)
	{
		global $pdo;
		
		$latestPost = null;

		$stmt = $pdo->prepare('SELECT *, posts.id as uid, users.name, users.surname FROM posts JOIN users ON (users.id = posts.id_user) WHERE posts.id = :id');

		$stmt->execute(array('id' => $id));

		foreach ($stmt as $row)
		{
			$latestPost = new Post($row["uid"], $row["name"]." ".$row["surname"], $row["title"], $row["subtitle"], $row["text"], $row["preview"], $row["image"], $row["date"]);
			$resp = array('response' => true, 'latestPost' => $latestPost);
		}

		if($latestPost == null)
			$resp = array('response' => false);
		
		return $resp;
	}

	function getLatestPost()
	{
		/*	
			SELECT * 
			FROM table_name
			ORDER BY id DESC
			LIMIT 1
		*/

		global $pdo;
		
		$latestPost = null;

		$stmt = $pdo->prepare('SELECT *, posts.id as uid, users.name, users.surname FROM posts JOIN users ON (users.id = posts.id_user) ORDER BY posts.id DESC LIMIT 1');

		$stmt->execute();

		foreach ($stmt as $row)
		{
			$latestPost = new Post($row["uid"], $row["name"]." ".$row["surname"], $row["title"], $row["subtitle"], $row["text"], $row["preview"], $row["image"], $row["date"]);
			$resp = array('response' => true, 'latestPost' => $latestPost);
		}

		if($latestPost == null)
			$resp = array('response' => false);
		
		return $resp;
	}

	function updatePostById($post)
	{
		global $pdo;

		$stmt = $pdo->prepare('UPDATE `posts` SET `id_user`= :id_user,`title`= :title,`subtitle`= :subtitle,`text`= :text,`preview`= :preview,`image`= :image, `date`= :date WHERE `id`= :id');
		var_dump($post->getId());
		$stmt->execute(array('id' => $post->getId(), 'id_user' => $post->getAuthor(), 'title' => $post->getTitle(), 'subtitle' => $post->getSubtitle(), 'text' => $post->getText(), 'preview' => $post->getPreview(), 'image' => $post->getImage(), 'date' => $post->getDate()));

		if($stmt)
			$resp = array('response' => true);
		else
			$resp = array('response' => false);

		return $resp;
	}

	function deletePostById($post)
	{
		global $pdo;

		$lastWork = null;

		$stmt = $pdo->prepare('DELETE FROM `posts` WHERE `id`= :id');

		$stmt->execute(array('id' => $post->getId()));

		if($stmt)
			$resp = array('response' => true);
		else
			$resp = array('response' => false);

		return $resp;
	}

	/* UTILITY FUNCTION */

	function createPreview($text, $limit)
	{
		$text = preg_replace('/\[\/?(?:b|i|u|s|center|quote|url|ul|ol|list|li|\*|code|table|tr|th|td|youtube|gvideo|(?:(?:size|color|quote|name|url|img)[^\]]*))\]/', '', $text);

	    if (strlen($text) > $limit) return substr($text, 0, $limit) . "...";
	    return $text;
	}