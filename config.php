<?php

	$servername 	= "localhost";
	$db_username 	= "salvo";
	$db_password 	= "salvo";
	$db_name 	 	= "salvobertoncini";

	$userLogged 	= null;

	try
	{
		$pdo = new PDO("mysql:host=$servername;dbname=$db_name", $db_username, $db_password);

		// set the PDO error mode to exception
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	{
		echo "Connection failed: " . $e->getMessage();
	}