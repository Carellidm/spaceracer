<?php

	$host = 'spaceracerserver.mysql.database.azure.com';
	$username = 'Spaceraceradmin@spaceracerserver';
	$password = 'LostAnderson89e';
	$db_name = 'spaceracerdatabase';

	//Initializes MySQLi
	$conn = mysqli_connect('spaceracerserver.mysql.database.azure.com', 'Spaceraceradmin@spaceracerserver', 'LostAnderson89e', 'spaceracerdatabase');

	//If connection failed, show the error
	if (mysqli_connect_errno($conn))
	{
	    die('1'); //die('Failed to connect to MySQL: '.mysqli_connect_error());
	}

	//get the information passed from the unity c# script and store them as variables for accessability
	$trackid = $_POST["trackId"];
	$usedchallengeids = $_POST["UsedChallengeIds"];
	$vpmin = $_POST["vpMin"];
	$vpmax = $_POST["vpMax"];

	//convert the used challenge ids string into an array it is delimited by ~
	$usedchallengeidsarray = array_map('intval', explode(",", $usedchallengeids));
	$usedchallengeidsarray = implode("','", $usedchallengeidsarray);
	//$usedchallengeidsarray = explode("~", $usedchallengeids);
	//AND !in_array(challengeId, '" . $usedchallengeidsarray . "') 

	//check to see that the challengeId doesnt already exist using query language
	$trackidsearchquery = "SELECT * FROM challenge WHERE TrackId = '" . $trackid . "' AND ChallengeId NOT IN ('" . $usedchallengeidsarray . "') AND ReplayVehiclePower >= '" . $vpmin . "' AND ReplayVehiclePower <= '" . $vpmax . "';";
	

	//run the track id search query to check for any challenges with the matching trackId
	$result = mysqli_query($conn, $trackidsearchquery) or die("2"); //error code #2 - challenge id check query failed 

	$row = mysqli_fetch_assoc($result);

	$challengeId = $row["ChallengeId"]; 
	$trackid = $row["TrackId"];
	$replaybodylevel = $row["ReplayBodyLevel"];
	$replayenginelevel = $row["ReplayEngineLevel"];
	$replaytirelevel = $row["ReplayTireLevel"];
	$replayafterburnerlevel = $row["ReplayAfterburnerLevel"];
	$replayvehiclePower = $row["ReplayReplayVehiclePower"];
	$replaymainbodymaterialid = $row["ReplayMainBodyMaterialId"];
	$replaysecondarybodymaterialid = $row["ReplaySecondaryBodyMaterialId"];
	$replaybodypositions = $row["ReplayBodyPositions"];
	$replaybodyrotations = $row["ReplayBodyRotations"];
	$replayboostconditions = $row["ReplayBoostConditions"];
	$replaytime = $row["ReplayTime"];

	echo "" . $challengeId . "~" . $trackId . "~" . $replaybodylevel . "~" . $replayenginelevel . "~" . $replaytirelevel . "~" . $replayafterburnerlevel . "~" . $replaymainbodymaterialid . "~" . $replaysecondarybodymaterialid . "~" . $replaybodypositions . "~" . $replaybodyrotations . "~" . $replayboostconditions . "~" . $replaytime . "~";
	
	mysqli_close($conn);
?>