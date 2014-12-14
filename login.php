<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="styles/SearchBox.css">
<link rel="stylesheet" type="text/css" href="styles/Navbar.css">
<link rel="stylesheet" type="text/css" href="styles/registerbox.css">

<link href='http://fonts.googleapis.com/css?family=Mr+Dafoe' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Amaranth:700' rel='stylesheet' type='text/css'>
<title>Login</title>
</head>
<body>

<?php

	include "menu.php";
	
?>
<div style="background-color:#ffffff;text-align:center">
<br>
<h1>Please Log In</h1></form>

<form method="post">
	Username: <input class="uname" type="text" name="uid"><br>
	<br><br>
	Password: <input class="uname" type="password" name="pwrd"><br>
	<br>

	<input type="submit" value="Login">
<br>
</form>

<?php	
	
	function checkInfo($uid, $pwrd)
	{
		include "dbconnect.php";
		
		$uid = mysqli_real_escape_string($conn, $uid);
		
		$pwrd = mysqli_real_escape_string($conn, $pwrd);
		
		$query = "SELECT `adminBoolean` FROM `users` WHERE userName='$uid' and passWord='$pwrd'";
		
		$result = $conn->query($query);
		
		if ($result->num_rows == 1)
		{
			$isAdmin = $result->fetch_row();
			$_SESSION["isAdmin"] = $isAdmin[0];
			$_SESSION["uid"] = $uid;
			$_SESSION["pwrd"] = $pwrd;

			
			return true;
		}
		
		else
		{
			return false;
		}
	}
	

	if (isset($_POST["uid"]) && isset($_POST["pwrd"]))
	{
		
		if (checkInfo($_POST["uid"], $_POST["pwrd"]))
		{
			include "loginSuccess.php";
		}
		
		else
		{
			print("<h3>Invalid login info!</h3>");
		}
		
	}


	
?>
</div>

</body>
</html>