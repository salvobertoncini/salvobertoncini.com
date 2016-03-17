<?php

@include "config.php";

function returnsomething($return)
{
//Encode the stdClass object containing information and return data as a json string
	$json = json_encode($return);



	$file = 'log.txt';
	// Open the file to get existing content
	$current = file_get_contents($file);
	// Append a new person to the file
	$current .= time()."\n\n".$return."\n\n\n";
	// Write the contents back to the file
	file_put_contents($file, $current);




//Return the json string to the JavaScript
	echo $json;
}

function sanitize($str, $quotes = ENT_NOQUOTES)
{
	$str = htmlspecialchars($str, $quotes);
	return $str;
}

function initialize_insert_post()
{
	$risposta =[];
	$sql = "SELECT * FROM image ORDER BY id DESC";
	$query = @mysql_query($sql) or die (mysql_error());

//verifichiamo che siano presenti records
	if(mysql_num_rows($query) > 0)
	{

		while($row = mysql_fetch_array($query))
		{  

			$id = $row['id'];
			$name = $row['name'];

			$data = array('id'=> $id, 'nome'=>$name);
			array_push($risposta, $data);
		}
	}

	return $risposta;
}

function login($username, $password)
{
	$file = 'log.txt';
	// Open the file to get existing content
	$current = file_get_contents($file);
	// Append a new person to the file
	$current .= time()."\t".$username." ".$password."\n\n\n";
	// Write the contents back to the file
	file_put_contents($file, $current);
	
	$id = 0;
	$return = false;
	$sql = "SELECT id FROM user WHERE email = '".$username."' AND password = '".$password."'";
	$query = @mysql_query($sql) or die (mysql_error());

//verifichiamo che siano presenti records
	if(mysql_num_rows($query) > 0)
		while($row = mysql_fetch_array($query))
			$id = $row['id'];

//Alter values
		if ($id != 0)
		{
			$return->data['json_object'] = $id;
			$return->success = true;
		}

		return $return;
}

function insert_post($user, $titolo, $articolo, $id_immagine)
{

	$sql = "INSERT INTO `post`(`id`, `id_user`, `id_image`, `title`, `articles`, `date`) VALUES (null,".$user.",".$id_immagine.",'".$titolo."','".$articolo."',CURDATE())";
	$query = @mysql_query($sql) or die (mysql_error());
	return true;
}

function insert_work($link, $titolo, $articolo, $id_immagine)
{
	$sql = "INSERT INTO `work`(`id`, `name`, `description`, `link`, `date`, `id_image`) VALUES (null,'".$titolo."','".$articolo."','".$link."',CURDATE(),".$id_immagine.")";
	$query = @mysql_query($sql) or die (mysql_error());
	return true;
}

function initialize_work()
{
	$risposta =[];
	$sql = "SELECT * FROM `work` ORDER BY id DESC";
	$query = @mysql_query($sql) or die (mysql_error());

//verifichiamo che siano presenti records
	if(mysql_num_rows($query) > 0)
	{

		while($row = mysql_fetch_array($query))
		{  

			$link = "project.php?id=".$row['id'];
			$title = $row['name'];
			$description = stripslashes($row['description']);
			$date = $row['date'];
			$image = "show.php?id=".$row['id_image'];

			$data = array('title'=>$title, 'description'=>$description, 'date'=>$date, 'image'=>$image, 'link'=>$link);

			array_push($risposta, $data);
		}
	}

	return $risposta;
}

function initialize_index()
{
	$risposta =[];
	$sql = "SELECT * FROM `work` ORDER BY id DESC LIMIT 3";
	$query = @mysql_query($sql) or die (mysql_error());

//verifichiamo che siano presenti records
	if(mysql_num_rows($query) > 0)
	{

		while($row = mysql_fetch_array($query))
		{  

			$link = "project.php?id=".$row['id'];
			$title = $row['name'];
			$description = stripslashes($row['description']);
			$date = $row['date'];
			$image = "show.php?id=".$row['id_image'];

			$data = array('title'=>$title, 'description'=>$description, 'date'=>$date, 'image'=>$image, 'link'=>$link);

			array_push($risposta, $data);
		}
	}

	return $risposta;
}

function initialize_blog()
{
	$risposta =[];
	$sql = "SELECT  post.id,post.title, post.articles, post.date, image.id AS idimmagine, image.name AS nomeimmagine,  image.image AS immagine FROM `post` JOIN image ON (post.id_image = image.id) ORDER BY post.id DESC";
	$query = @mysql_query($sql) or die (mysql_error());

//verifichiamo che siano presenti records
	if(mysql_num_rows($query) > 0)
	{

		while($row = mysql_fetch_array($query))
		{  

			$id = $row['id'];
			$title = $row['title'];
			$articles = stripslashes($row['articles']);
			$date = $row['date'];
			$idimmagine = $row['idimmagine'];
			$nomeimmagine = $row['nomeimmagine'];
			$immagine = base64_encode($row['immagine']);

			$data = array('id'=> $id, 'title'=>$title, 'articles'=>$articles, 'date'=>$date, 'idimmagine'=>$idimmagine, 'nomeimmagine'=>$nomeimmagine, 'immagine'=>$immagine);

			array_push($risposta, $data);
		}
	}

	return $risposta;
}

//Create a stdClass instance to hold important information
	$return = new stdClass(); 
	$return->success = true;
	$return->errorMessage = "";
	$return->data = array();

	$method = $_POST;

//Sanitize the string and json strings received from the front-end
//Corresponds to 'data:{ js_string: val , js_array: arr,  js_object: obj }' in $.ajax
	if(isset($method['js_object'])) $json_object = sanitize($method['js_object']); 

//Decode the json to get workable PHP variables
	$php_object = json_decode($json_object);

	switch ($php_object->r) 
	{
		case "Login":
			$return = login($php_object->u, $php_object->p);
			returnsomething($return);
			break;
		case "InitializeInsertPost":
			$return = initialize_insert_post();
			returnsomething($return);
			break;
		case "InsertPost":
			$return = insert_post($php_object->u, $php_object->t, $php_object->a, $php_object->i);
			returnsomething($return);
			break;
		case "InsertWork":
			$return = insert_work($php_object->l, $php_object->t, $php_object->a, $php_object->i);
			returnsomething($return);
			break;
		case "InsertImage":
			$return = insert_image($php_object->i);
			returnsomething($return);
			break;
		case "InitializeBlog":
			$return = initialize_blog();
			returnsomething($return);
			break;
		case "InitializeWork":
			$return = initialize_work();
			returnsomething($return);
			break;
		case "InitializeIndex":
			$return = initialize_work();
			returnsomething($return);
			break;
	}

	?>
