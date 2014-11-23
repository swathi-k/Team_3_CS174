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

<div id="hmenu"> 
	
	<form method=post action="index.php">
	<ul>
		<li id="title">
			Wing Chun
		</li> 
		<li id="link">
			<a href="register.php">Create an Account!</a>
		</li>
  		<li id="link">
			<a href="entervideo.php">Enter a video into the dbs!</a>
		</li>
		<li id="search">
			<input type="text" minlength="1" placeholder="Search by Keyword..." name="keyword">
    		<input type="submit" name="submit" value="Enter">
		</li>
	</ul>	

<h1>Please Log In</h1>
<div>
<form method="post">
	Username: <input class="uname" type="text" name="uid"><br>
	Password: <input class="uname" type="text" name="pwrd"><br>
	Use Cookies? Yes<input type="radio" name="cook" value="yes">
				 No<input type="radio" name="cook" value="no" checked><br>

	<input type="submit" value="Login">
</form>


<?php 
	include "dbconnect.php";
	
	function error()
	{
		print("<h3>Invalid login info!</h3>");
	}
	
	if (isset($_POST["uid"]) && isset($_POST["pwrd"]) && isset($_POST["cook"]))
	{
		$uid = mysql_real_escape_string($_POST["uid"]);
		$pwrd = mysql_real_escape_string($_POST["pwrd"]);
		$cook = $_POST["cook"];
		
		$query = "SELECT * FROM users WHERE userName='$uid' and passWord='$pwrd'";
		
		$result = $conn->query($query);
		
		if ($result->num_rows == 1)
		{
			session_start();
			
			$_SESSION["uid"] = $uid;
			$_SESSION["pwrd"] = $pwrd;
			
			if ($cook === "yes")
			{
				$month = time() + 3600 * 24 * 30;
				setcookie("uid", $uid, $month);
				setcookie("pwrd", $pwrd, $month);
			}
			
			print("<br><h3>Login successful!</h3>Redirecting in 5 seconds...");
			
			header("refresh:5; url=./index.php");
		}
		
		else
		{
			error();
		}
		
	}
	
	elseif (isset($_COOKIE["uid"]) && isset($_COOKIE["pwrd"]))
	{
		if ($_COOKIE["uid"] != '')
		{
			if ($_COOKIE["pwrd"] != '')
			{
				print("<br><h3>Login saved via cookies!</h3>Redirecting in 5 seconds...");
				$_SESSION["uid"] = $_COOKIE["uid"];
				$_SESSION["pwrd"] = $_COOKIE["pwrd"];
				header("refresh:5;url=./index.php");
			}
		}
	}
	
?>
</div>

</body>
</html>