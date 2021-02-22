<?php

	//create a connection to data base by creating a variable to stroe that connection in 
	//                      location, username, password, database name 
	$host = 'spaceracer.database.windows.net';
	$username = 'carellidm';
	$password = 'LostAnderson89e';
	$db_name = 'spaceracer';

	//Initializes MySQLi
	$conn = mysqli_connect($host, $username, $username, $db_name);	

	//If connection failed, show the error
	if (mysqli_connect_errno($conn))
	{
	    die('1');
	}

	//get the information passed from the unity c# script and store them as variables for accessability
	//$challengeid = $_POST["challengeId"];
	$trackid = $_POST["trackId"];
	$replaybodylevel = $_POST["replayBodyLevel"];
	$replayenginelevel = $_POST["replayEngineLevel"];
	$replaytirelevel = $_POST["replayTireLevel"];
	$replayafterburnerlevel = $_POST["replayAfterburnerLevel"];
	$replayvehiclepower = $_POST["replayVehiclePower"];
	$replaymainbodymaterialid = $_POST["replayMainBodyMaterialId"];
	$replaysecondarybodymaterialid = $_POST["replaySecondaryBodyMaterialId"];
	$replaybodypositions = $_POST["replayBodyPositions"];
	$replaybodyrotations = $_POST["replayBodyRotations"];
	$replayboostconditions = $_POST["replayBoostConditions"];
	$replaytime = $_POST["replayTime"];

	//add a challenge to the table anything adding to the database is called a query
	$insertchallengequery = "INSERT INTO challenge (TrackId, ReplayBodyLevel, ReplayEngineLevel, ReplayTireLevel, ReplayAfterburnerLevel, ReplayVehiclePower, ReplayMainBodyMaterialId, ReplaySecondaryBodyMaterialId, ReplayBodyPositions, ReplayBodyRotations, ReplayBoostConditions, ReplayTime) VALUES ('" . $trackid . "','" . $replaybodylevel . "','" . $replayenginelevel . "','" . $replaytirelevel . "','" . $replayafterburnerlevel . "','" . $replayvehiclepower . "','" . $replaymainbodymaterialid . "','" . $replaysecondarybodymaterialid . "','" . $replaybodypositions . "','" . $replayboostconditions . "','" . $replaybodyrotations . "','" . $replaytime . "');";

	//execute the query
	mysqli_query($con, $insertchallengequery) or die("4: Insert challenge query failed");

	echo("0");

	mysql_close($con);

?>