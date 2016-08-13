<?php

	if(isset($_POST["image"]))
		$image		= $_POST["image"];
	else
		$image = 'null';

	if(isset($_POST["action"]))
		$action		= $_POST["action"];
	else
		$action = '';

	if($action == "delete_image")
	{
		deleteImageByName($image);
		header("location: ../admin/manage_images.php");
	}

	/* CRUD FUNCTIONS */

	function getAllImages()
	{
		$files = glob("../contents/*.*");
		
		for ($i=0; $i<count($files); $i++)
		{
			$image = $files[$i];
			$supported_file = array(
			    'gif',
			    'jpg',
			    'jpeg',
			    'png'
			);

			$ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
			
			if (in_array($ext, $supported_file))
			{
			    echo '<option value="'.substr($image, 12).'">'.substr($image, 12).'</option>';
			}
			else
			{
			    continue;
			}
		}
	}

	function getAllImagesWithSelect($name)
	{
		$files = glob("../contents/*.*");
		
		for ($i=0; $i<count($files); $i++)
		{
			$image = $files[$i];
			$supported_file = array(
			    'gif',
			    'jpg',
			    'jpeg',
			    'png'
			);

			$ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
			
			if (in_array($ext, $supported_file))
			{
			    echo '<option value="'.substr($image, 12).'"';
			    
			    if(substr($image, 12) == $name)
			    	echo ' selected'; 
			    echo '>'.substr($image, 12).'</option>';
			}
			else
			{
			    continue;
			}
		}	
	}

	function deleteImageByName($name)
	{
		var_dump($name);
		array_map( "unlink", glob( "../contents/".$name ) );
	}