<?php

	function passwordcrypt($password)
	{
		$key = substr($password,0,2);
		$pass_crypt = crypt($password,$key);
		
		return $pass_crypt;	
	}
