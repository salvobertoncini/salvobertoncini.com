<?php
	
	include_once __DIR__ . "/". "../config.php";
	include_once __DIR__ . "/". "../model/user.php";

	if(!isset($_POST["email"]) || !isset($_POST["password"]))
		echo "fill all the fields";
	else
	{
		$resp = loginUser($_POST["email"], $_POST["password"]);
		

		if($resp["response"])
		{
			echo "Minchia ".$resp["userLogged"]->getName()." ma sei togo!";

			//salva sessione userLogged
			session_start();
			$_SESSION['userLogged'] = $resp["userLogged"];

			//redirect admin page
			header("location: ../admin/manage_posts.php");
		}
		else
			echo "bad username or password";
		
	}

	/* LOGIN FUNCTION */

	function loginUser($email, $password)
	{
		/*
			1. check if email or password are empty
			2. query to database
			3. if login credential are correct => return new User
			4. else => return false
		*/

		global $pdo;
		
		$userLogged = null;

		$stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');

		$stmt->execute(array('email' => $email));

		foreach ($stmt as $row)
		{
			if(password_verify($password, row["password"]))
			{
				$userLogged = new User($row["id"], $row["name"], $row["surname"], $row["email"], $row["password"], $row["birthday"], $row["avatar"]);
				$resp = array('response' => true, 'userLogged' => $userLogged);
			}
		}

		if($userLogged == null)
			$resp = array('response' => false);

		return $resp;

	}

	function logoutUser()
	{
		session_start();

		//destroy all $_SESSION and redirect to login
		if(!empty($_SESSION) && is_array($_SESSION)) 
		{
			foreach($_SESSION as $sessionKey => $sessionValue)
		    	session_unset($_SESSION[$sessionKey]);
		}

		session_destroy();

		header("location: ../login.php");
	}
