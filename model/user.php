<?php

class User
{
	/* VARS */

	private $id, $name, $surname, $email, $password, $birthday, $avatar;

	/* CONSTRUCTORS */
	function User($id, $name, $surname, $email, $password, $birthday, $avatar)
	{
		$this->id 		= $id;
		$this->name 	= $name;
		$this->surname 	= $surname;
		$this->email 	= $email;
		$this->password = $password;
		$this->birthday = $birthday;
		$this->avatar 	= $avatar;
	}

	/* GETTERS */

	function getId()
	{
		return $this->id;
	}

	function getName()
	{
		return $this->name;
	}

	function getSurname()
	{
		return $this->surname;
	}

	function getEmail()
	{
		return $this->email;
	}

	function getPassword()
	{
		return $this->password;
	}

	function getBirthday()
	{
		return $this->birthday;
	}

	function getAvatar()
	{
		return $this->avatar;
	}

	/* SETTERS */

	function setId($id)
	{
		$this->id = $id;
	}

	function setName($name)
	{
		$this->name = $name;
	}

	function setSurname($surname) 
	{
		$this->surname = $surname;
	}

	function setEmail($email)
	{
		$this->email = $email;
	}

	function setPassword($password) 
	{
		$this->password = $password;
	}

	function setBirthday($birthday)
	{
		$this->birthday = $birthday;
	}

	function setAvatar($avatar) 
	{
		$this->avatar = $avatar;
	}

}