<?php

	$servername = 'localhost:3307';
	$username = '';
	$password = '';
	$databasename = 'database1';

	$conn = mysqli_connect($servername, $username, $password, $databasename);

	if(!$conn)
	{
		die("Error! Connection cannot be made.".mysqli_connect_error());
	}

?>