<?php
/* File   : sign.php
   Subject: Bonus Homework
   Authors: Swathi Kotturu
   Version: 1.0.2
   Date   : Nov 9, 2014
   Description: A web form that collects users' data to write into the guestbook database table
*/
include("dbconnect.php"); 

	print("help0");
	if (isset($_POST["favorite"]))
	{
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

