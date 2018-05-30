<?php
//create.php
if ($_SERVER["REQUEST_METHOD"] == "POST")	
    {
		
	require_once 'login.php';				

	//delcare PHP variables
	$lastName = $_POST["lastName"];			
	$firstname = $_POST["firstname"];
	$DayBrith = $_POST["DayBirth"];
	
	$mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
	
	//Output any connection error
	if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}   
	
		$statement = $mysqli->prepare("INSERT INTO UserList (Lastname_, Firstname) VALUES(?, ?, ?)");
		//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
		$statement->bind_param('sss', $lastName, $firstName, $DayBrith); //bind value
		if($statement->execute())
			{
				//print output text
				echo nl2br("$lastName_ . " ". $firstName.!  Thank You for signng up to be one of the user play list on Player tracker Roblox);
			}
			else{
					print $mysqli->error; //show mysql error if any 
				}
else{
    echo ("error");
    }         
?>