<?php

class Post
{
	/* VARS */

	var $id, $author, $title, $subtitle, $text, $preview, $image, $date;

	/* CONSTRUCTORS */

	function Post($id, $author, $title, $subtitle, $text, $preview, $image, $date)
	{
		$this->id 			= $id;
		$this->author 		= $author;
		$this->title 		= $title;
		$this->subtitle 	= $subtitle;
		$this->text 		= $text;
		$this->preview 		= $preview;
		$this->image 		= $image;
		$this->date 		= $date;
	}

	/* GETTERS */

	function getId()
	{
		return $this->id;
	}

	function getAuthor()
	{
		return $this->author;
	}

	function getTitle()
	{
		return $this->title;
	}

	function getSubtitle()
	{
		return $this->subtitle;
	}

	function getText()
	{
		return $this->text;
	}

	function getPreview()
	{
		return $this->preview;
	}

	function getImage()
	{
		return $this->image;
	}

	function getDate()
	{
		return $this->date;
	}

	/* SETTERS */

	function setId($id)
	{
		$this->id = $id;
	}

	function setAuthor($author)
	{
		$this->author = $author;
	}

	function setTitle($title)
	{
		$this->title = $title;
	}

	function setSubtitle($subtitle) 
	{
		$this->subtitle = $subtitle;
	}

	function setText($text)
	{
		$this->text = $text;
	}

	function setPreview($preview) 
	{
		$this->preview = $preview;
	}

	function setImage($image)
	{
		$this->image = $image;
	}

	function setDate($date) 
	{
		$this->date = $date;
	}

	function createPreview($text)
	{
		$tmp = strip_tags($text); 
		$preview = substr($tmp, 0, 200); 

		return $preview;
	}

}