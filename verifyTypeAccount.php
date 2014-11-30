<?php include("dbconnect.php"); ?>
<?php

	session_start();
	if (isset($_SESSION['uid']))
	{
		//print("<br><h3>Login successful!</h3>Redirecting in 5 seconds...");
		//	header("refresh:5; url=./index.php");
			
		
		if ($_SESSION['isAdmin'] === 1)
			header ('Location: ./adminCorrect.php');
		else
		{
			echo "<br><h2>You don't have permission to this page!</h2>Redirecting to Home...";
			header('refresh:3; url = ./index.php');
		}	
	}
	else
	{
		header('Location: ./login.php');
	}
		

?>