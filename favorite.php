<?php
/* File   : favorite.php
   Subject: Bonus Homework
   Authors: Swathi Kotturu
   Version: 1.0.2
   Date   : Dec 1, 2014
   Description: Adds to a video to the favorites of the user
*/
include("dbconnect.php"); 

	if (isset($_POST["favorite"]))
	{
		session_start();
		array_push($_SESSION["favorite"], $_POST["favorite"]);
	
		$user = $_SESSION["uid"];

		if(empty($user)) {
			include("login.php");			
		} else {
			$fav = $_POST["favorite"];
			$query = "INSERT INTO `youthcyb_kotturu`.`favorites` (`userName`, `vId`) VALUES ('$user', '$fav');";
			$result = $conn->query($query); 
			include("index.php");

		}
	}
	else {
	
		include("index.php");

	}

?>

