<?php

	include_once __DIR__ . "/". "../model/work.php";
	include_once __DIR__ . "/". "../config.php";

	if(isset($_POST["id"]))
		$id 	= $_POST["id"];
	else
		$id = 0;

	if(isset($_POST["title"]))
		$title 		= $_POST["title"];
	else
		$title = '';

	if(isset($_POST["description"]))
		$description	= $_POST["description"];
	else
		$description = '';

	if(isset($_POST["date"]))
		$date 		= $_POST["date"];
	else
		$date = '';

	if(isset($_POST["avatar"]))
		$avatar		= $_POST["avatar"];
	else
		$avatar = 'null';

	if(isset($_POST["url"]))
		$url		= $_POST["url"];
	else
		$url = '';

	if(isset($_POST["action"]))
		$action		= $_POST["action"];
	else
		$action = '';

	$work = new Work($id, $title, $description, $date, $url, $avatar);

	switch ($action) {
	    case 'insert_work':
	        createWork($work);
	        //redirect admin page
			header("location: ../admin/manage_works.php");
	        break;
	    case 'update_work':
	        updateWorkById($work);
	        //redirect admin page
			header("location: ../admin/manage_works.php");
	        break;
	    case 'delete_work':
	        deleteWorkById($work);
	        //redirect admin page
			header("location: ../admin/manage_works.php");
	        break;
	    case 'add_get':
	    	header("location: ../admin/manage_works.php?id=".$work->getId());
	    default:
	    	break;
	}


	/* CRUD FUNCTIONS */

	function createWork($work)
	{
		global $pdo;

		$stmt = $pdo->prepare('INSERT INTO `works`(`id`, `title`, `description`, `date`, `url`, `avatar`) VALUES (null, :title, :description, :date, :url, :avatar)');

		$stmt->execute(array('title' => $work->getTitle(), 'description' => $work->getDescription(), 'date' => $work->getDate(), 'url' => $work->getUrl(), 'avatar' => $work->getAvatar()));

		if($stmt)
			$resp = array('response' => true);
		else
			$resp = array('response' => false);

		return $resp;
	}

	function getAllWorks()
	{
		global $pdo;
		
		$latestWorks = [];

		$stmt = $pdo->prepare('SELECT * FROM works ORDER BY id DESC');

		$stmt->execute();

		foreach ($stmt as $row)
		{
			$lastWork = new Work($row["id"], $row["title"], $row["description"], $row["date"], $row["url"], $row["avatar"]);
			array_push($latestWorks, $lastWork);
		}

		if($latestWorks == null)
			$resp = array('response' => false);
		else
			$resp = array('response' => true, 'allProjects' => $latestWorks);

		return $resp;
	}

	function getLastThreeWorks()
	{
		/*	
			SELECT * 
			FROM table_name
			ORDER BY id DESC
			LIMIT 3
		*/

		global $pdo;
		
		$latestWorks = [];

		$stmt = $pdo->prepare('SELECT * FROM works ORDER BY id DESC LIMIT 3');

		$stmt->execute();

		foreach ($stmt as $row)
		{
			$lastWork = new Work($row["id"], $row["title"], $row["description"], $row["date"], $row["url"], $row["avatar"]);
			array_push($latestWorks, $lastWork);
		}

		if($latestWorks == null)
			$resp = array('response' => false);
		else
			$resp = array('response' => true, 'latestWorks' => $latestWorks);

		return $resp;
	}

	function getWorkById($id)
	{
		global $pdo;

		$lastWork = null;

		$stmt = $pdo->prepare('SELECT * FROM works WHERE id = :id');

		$stmt->execute(array('id' => $id));

		foreach ($stmt as $row)
		{
			$lastWork = new Work($row["id"], $row["title"], $row["description"], $row["date"], $row["url"], $row["avatar"]);

			$resp = array('response' => true, 'project' => $lastWork);
		}

		if($lastWork == null)
			$resp = array('response' => false);

		return $resp;
	}

	function updateWorkById($work)
	{
		global $pdo;

		$lastWork = null;

		$stmt = $pdo->prepare('UPDATE `works` SET `title`= :title,`description`= :description,`date`= :date,`url`= :url,`avatar`= :avatar WHERE `id`= :id');

		$stmt->execute(array('id' => $work->getId(), 'title' => $work->getTitle(),'description' => $work->getDescription(),'date' => $work->getDate(),'url' => $work->getUrl(), 'avatar' => $work->getAvatar()));

		if($stmt)
			$resp = array('response' => true);
		else
			$resp = array('response' => false);

		return $resp;
	}

	function deleteWorkById($work)
	{
		global $pdo;

		$lastWork = null;

		$stmt = $pdo->prepare('DELETE FROM `works` WHERE `id`= :id');

		$stmt->execute(array('id' => $work->getId()));

		if($stmt)
			$resp = array('response' => true);
		else
			$resp = array('response' => false);

		return $resp;
	}
