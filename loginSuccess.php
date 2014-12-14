<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" http-equiv="refresh" content="5;url=./index.php">
<title>Logging In</title>
</head>
<body>

<?php



 
	print ("<h1>Logging In!</h1><h3>Redirecting in 5 seconds...</h3>");
	session_start();
	
	session_unset();
	
	session_destroy();
	
	setcookie("uid", '', time() - 60);
	
//	header("refresh:3;url=/index.php");

	
?>
</body>
</html>