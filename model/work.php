<?php

class Work
{
	/* VARS */

	var $id, $title, $description, $date, $url, $avatar;

	/* CONSTRUCTORS */

	function Work($id, $title, $description, $date, $url, $avatar)
	{
		$this->id 			= $id;
		$this->title 		= $title;
		$this->description 	= $description;
		$this->date 		= $date;
		$this->url 			= $url;
		$this->avatar 		= $avatar;
	}

	/* GETTERS */

	function getId()
	{
		return $this->id;
	}

	function getTitle()
	{
		return $this->title;
	}

	function getDescription()
	{
		return $this->description;
	}

	function getDate()
	{
		return $this->date;
	}

	function getUrl()
	{
		return $this->url;
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

	function setTitle($title)
	{
		$this->title = $title;
	}

	function setDescription($description) 
	{
		$this->description = $description;
	}

	function setDate($date)
	{
		$this->date = $date;
	}

	function setUrl($url) 
	{
		$this->url = $url;
	}

	function setAvatar($avatar) 
	{
		$this->avatar = $avatar;
	}

}