<?php 
	$host 		= "localhost";
	$user		= "root";
	$password	= "";
	$database	= "dbcountries";
	
	$conn = mysqli_connect($host,$user,$password,$database);
	
	if(!$conn)
	{
		die(mysqli_error());
	}

?>