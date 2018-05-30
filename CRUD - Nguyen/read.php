<?php
//read.php
require_once 'login.php';
$conn = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

	
$sql = "SELECT * FROM UserList='" . $_POST['$Lastname_$Firstname'] . "'";
$result = $conn->query($sql);

$UserListID = $row[0];
$Lastname = $row[1];
$Firstname = $row[2];
$DayBirth = $row[3];
// HTML to display the form on this page.
echo"<HEAD> <link rel='stylesheet' href='styles.css'></HEAD><BODY>";
echo nl2br("<H2>Here is the roster for "." ". $_POST['lastname_firstname']."</H2>");

if ($result->num_rows > 0)//will only do this if there is something to be returned from the above line
	{	echo"<HEAD> <link rel='stylesheet' href='styles.css'></HEAD>";
		echo "<TABLE><TR><TH>Student ID</TH><TH>Student Name</TH><TH>Grade</TH></TR>";
		// Iterate through all of the returned images, placing them in a table for easy viewing
	while($row = $result->fetch_assoc())
		{
			// The following few lines store information from specific cells in the data about an image
			echo "<TR>";
			echo "<TD>".$row['UserListID']. "</TD><TD>". $row['lastname]. "</TD><TD>".$row[DayBirth] ."</TD>";
			echo "<TD><form action= 'delete.php' method = 'post'>";
			echo "<button name = 'delete'   type = 'submit' value =".$row['UserListID'].">Delete</button></FORM>";
			echo "</TR>";
	
?>