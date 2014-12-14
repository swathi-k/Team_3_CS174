<?php setcookie("uid", '', time() - 60);
	setcookie("pwrd", '', time() - 60);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" http-equiv="refresh" content="3;url=./index.php">
<title>Logout</title>
</head>
<body>

<?php



 
	print ("<h1>You have logged out!</h1><h3>Redirecting in 3 seconds...</h3>");
	session_start();
	
	session_unset();
	
	session_destroy();
	

	
?>
</body>
</html>