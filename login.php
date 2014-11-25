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

<?php include("menu.php");?>

<h1>Please Log In</h1></form>
<div>
<form method="post">
	Username: <input class="uname" type="text" name="uid"><br>
	Password: <input class="uname" type="password" name="pwrd"><br>
	Use Cookies? Yes<input type="radio" name="cook" value="yes">
				 No<input type="radio" name="cook" value="no" checked><br>

	<input type="submit" value="Login">
</form>


<?php 
	function checkInfo($uid, $pwrd)
	{
		include "dbconnect.php";
		$uid = mysql_real_escape_string($uid);
		$pwrd = mysql_real_escape_string($pwrd);
		
		$query = "SELECT * FROM `users` WHERE userName='$uid' and passWord='$pwrd'";
		
		$result = $conn->query($query);
		
		if ($result->num_rows == 1)
		{
				
			$_SESSION["uid"] = $uid;
				

			return true;
		}
		
		else
		{
			return false;
		}
	}
	
	//if called without any parameters it will clear cookies
	function setCookies($uid = '', $pwrd = '')
	{
		$month = time() + 3600 * 24 * 30;
		setcookie("uid", $uid, $month);
		setcookie("pwrd", $pwrd, $month);
	}
	
	if (isset($_POST["uid"]) && isset($_POST["pwrd"]) && isset($_POST["cook"]))
	{
		if (checkInfo($_POST["uid"], $_POST["pwrd"]))
		{
			print("<br><h3>Login successful!</h3>Redirecting in 5 seconds...");
			header("refresh:5; url=./index.php");
			
			if ($_POST["cook"] === "yes")
			{
				setCookies($_POST["uid"], $_POST["pwrd"]);
			}
			
			else 
			{
				setCookies();
			}
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
				print("<br><h3>Login saved via cookies!</h3>Redirecting in 5 seconds...");
				header("refresh:5;url=./index.php");
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