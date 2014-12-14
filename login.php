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
	Use Cookies? Yes<input type="radio" name="cook" value="yes">
				 No<input type="radio" name="cook" value="no" checked><br><br>

	<input type="submit" value="Login">
<br>
</form>

<?php	
	
	function checkInfo($uid, $pwrd)
	{
		include "dbconnect.php";
		
		$query = "SELECT * FROM `users` WHERE userName='$uid' and passWord='$pwrd'";
		
		$result = $conn->query($query);
		
		if ($result->num_rows == 1)
		{
			$query2 = "SELECT adminBoolean FROM users WHERE userName='$uid' and passWord='$pwrd'";

			$result2 = mysqli_query($conn, $query2);
			$admin = mysqli_fetch_array($result2);
			$_SESSION["isAdmin"] = $admin["adminBoolean"];	
			$_SESSION["uid"] = $uid;
			$_SESSION["pwrd"] = $pwrd;

			
			return true;
		}
		
		else
		{
			return false;
		}
	}
	
	function setCookies($status = false)
	{
		$_SESSION["cook"] = $status;
	}
	
	if (isset($_POST["uid"]) && isset($_POST["pwrd"]) && isset($_POST["cook"]))
	{
		
		
		if (checkInfo($_POST["uid"], $_POST["pwrd"]))
		{		
			if ($_POST["cook"] === "yes")
			{
				setCookies(true);
			}
			
			else
			{
				setCookies();
			}
				

			include "loginSuccess.php";
		}
		
		else
		{
			print("<h3>Invalid login info!</h3>");
			setCookies();
		}
		
	}
	
	elseif (isset($_COOKIE["uid"]) && isset($_COOKIE["pwrd"]))
	{
		if ($_COOKIE["uid"] !== '' && $_COOKIE["pwrd"] !== '')
		{


			if (checkInfo($_COOKIE["uid"], $_COOKIE["pwrd"]))
			{
				print("<br><h3>Login saved via cookies!</h3>");
				include "loginSuccess.php";
			}
			
			else
			{
				print("<h3>Invalid cookie info.<br>Please clean your cookies and log in as a valid user.</h3>");
			}
		}
	}


	
?>
</div>

</body>
</html>