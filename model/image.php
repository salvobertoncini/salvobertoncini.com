<?php

class User
{
	/* VARS */

	private $id, $name, $type, $path;

	/* CONSTRUCTORS */

	function User($id, $name, $type, $path)
	{
		$this->id 		= $id;
		$this->name 	= $name;
		$this->type 	= $type;
		$this->path 	= $path;
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

	function getType()
	{
		return $this->type;
	}

	function getPath()
	{
		return $this->path;
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

	function setType($type) 
	{
		$this->type = $type;
	}

	function setPath($path)
	{
		$this->path = $path;
	}

}