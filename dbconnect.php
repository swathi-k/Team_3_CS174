<?php
/* File   : dbconnect.php
   Subject: Bonus Homeworkd
   Authors: Swathi Kotturu
   Version: 1.0.2
   Date   : Nov 9, 2014
   Description: create database connection to the selected database
*/

	// connect to database
	$dbhost = 'localhost';
	$dbuser = 'youthcyb_kotturu';
	$dbpass = '007824167';
	$mydb = 'youthcyb_kotturu';

	$conn = new mysqli($dbhost, $dbuser, $dbpass, $mydb);

	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}


	mysqli_select_db($conn, 'youthcyb_kotturu');

?>