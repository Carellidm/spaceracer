<?php

	$host = 'spaceracerserver.mysql.database.azure.com';
	$username = 'Spaceraceradmin@spaceracerserver';
	$password = 'LostAnderson89e';
	$db_name = 'spaceracerdatabase';

	//Initializes MySQLi
	$conn = mysqli_init();

	mysqli_ssl_set($conn,NULL,NULL, "/var/www/html/DigiCertGlobalRootG2.crt.pem", NULL, NULL);

	// Establish the connection
	mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306, NULL, MYSQLI_CLIENT_SSL);

	//If connection failed, show the error
	if (mysqli_connect_errno($conn))
	{
	    die('Failed to connect to MySQL: '.mysqli_connect_error());
	}

	echo("3");
	mysqli_close($conn);
?>