<?php
	
	include_once __DIR__ . "/". "../config.php";
	include_once __DIR__ . "/". "../model/user.php";

	/* CRUD FUNCTIONS */

	function createUser($user)
	{
		global $pdo;

		$resp = null;

		$stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');

		$stmt->execute(array('email' => $user->email, 'password' => $user->password));

		foreach ($stmt as $row)
			$resp = array('response' => false, 'message' => 'Esiste già un utente con quella email');

		if($resp == null)
		{
			$stmt = $pdo->prepare('INSERT INTO `users`(`id`, `name`, `surname`, `email`, `password`, `birthday`, `avatar`) VALUES (null, :name , :surname, :email, :password, :birthday, :avatar)');

			$stmt->execute(array('name' => $user->name, 'surname' => $user->surname ,'email' => $user->email, 'password' => $user->password, 'birthday' => $user->birthday, 'avatar' => $user->avatar));

			$resp = array('response' => true);
		}

		return $resp;
	}

	function getAllUsers()
	{
		global $pdo;
		
		$userList = null;

		$stmt = $pdo->prepare('SELECT * FROM users');

		$stmt->execute();

		foreach ($stmt as $row)
		{
			$user = new User($row["id"], $row["name"], $row["surname"], $row["email"], $row["password"], $row["birthday"], $row["avatar"]);

			array_push($userList, $user);
		}

		$resp = array('response' => true, 'userList' => $userList);

		return $resp;
	}

	function getUserById($id)
	{
		global $pdo;
		
		$user = null;

		$stmt = $pdo->prepare('SELECT * FROM users WHERE id = :id');

		$stmt->execute(array('id' => $id));

		foreach ($stmt as $row)
			$user = new User($row["id"], $row["name"], $row["surname"], $row["email"], $row["password"], $row["birthday"], $row["avatar"]);

		$resp = array('response' => true, 'user' => $user);

		return $resp;
	}

	function getUserByName($name)
	{
		global $pdo;
		
		$user = null;

		$stmt = $pdo->prepare('SELECT * FROM users WHERE name = :name');

		$stmt->execute(array('name' => $name));

		foreach ($stmt as $row)
			$user = new User($row["id"], $row["name"], $row["surname"], $row["email"], $row["password"], $row["birthday"], $row["avatar"]);

		$resp = array('response' => true, 'user' => $user);

		return $resp;
	}

	function updateUserById($id, $json_list)
	{
		$query = 'UPDATE `users` SET ';

		foreach ($json_list as $key => $value)
			$query .= '`'.$key.'`= :'.$key.', ';

		$query = substr($query, 0, -2);
		$query .= ' WHERE `id`= :id';

		$stmt = $pdo->prepare($query);

		$array = [];

		foreach ($json_list as $key => $value)
		{	
			array_push($array, $key => $value);
		}

		$stmt->execute($array);

		$resp = array('response' => true);

		return $resp;
	}

	function deleteUserById($id)
	{
		$query = 'DELETE FROM `users` WHERE `id` = :id';
		$stmt = $pdo->prepare($query);
		$stmt->execute(array('id' => $id));

		$resp = array('response' => true);

		return $resp;
	}
