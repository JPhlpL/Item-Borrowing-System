<?php

require_once "../../config.php";

// Get the user id
$Employee_num = $_REQUEST['empnum'];

if ($Employee_num !== "") {
	
	// Get corresponding data for that input key
	$query = mysqli_query($link, "SELECT Name, Dept, Section, Position, Email FROM tblemplist WHERE Employee_num='$Employee_num'");

	$row = mysqli_fetch_array($query);

	// Get the row data
	$Name = $row["Name"];

	// Get the row data
	$dept = $row["Dept"];

	// Get the row data
	$section = $row["Section"];

	// Get the row data
	$position = $row["Position"];

	// Get the row data
	$Email = $row["Email"];

	
}

// Store it in a array
$result = array("$Name", "$dept", "$section", "$position", "$Email");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
