<?php



$hostName = "localhost";
$userName = "mckenley";
$password = "mckenley";
$db ="db_list";
// Create connection
$conn = mysqli_connect($hostName, $userName, $password,$db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{
	
}	



?>