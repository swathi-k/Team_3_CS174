<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>
</head>
<body>

<h1>Please Log In</h1>

<form method="post">
	Username: <input type="text" name="uid"><br>
	Password: <input type="text" name="pwrd"><br>
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
				setcookie("user", $uid, $month);
				setcookie("pwrd", $uid, $month);
			}
			
			print("<br><h3>Login successful!</h3>Redirecting in 5 seconds...");
			
			header("refresh:5; url=./index.php");
		}
		
		else
		{
			error();
		}
		
	}
	
	elseif (isset($_COOKIE["user"]) && isset($_COOKIE["pwrd"]))
	{
		if ($_COOKIE["user"] != '')
		{
			if ($_COOKIE["pwrd"] != '')
			{
				print("<br><h3>Login saved via cookies!</h3>Redirecting in 5 seconds...");
				header("refresh:5;url=./index.php");
			}
		}
	}
	
?>

</body>
</html>