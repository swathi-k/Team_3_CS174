<?php
include('dbconnect.php');



$uname_error = false;
$empty_error = false;
$password_error = false;
$similar_error = false;
$password_length = false;

if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['password2']))
{
	$empty_error = true;
}
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$password2 = mysqli_real_escape_string($conn, $_POST['password2']);
$containsLetter  = preg_match('/[a-zA-Z]/',    $password);
$containsDigit   = preg_match('/\d/',          $password);
$container = $containsDigit && $containsLetter;
if(strlen($password) < 8)
{
	$password_length = true;
}
else if(strcmp($password, $password2) !== 0)
{
	$similar_error = true;
}
else if(!$container)
{
	$password_error = true;
}
$query = "select hID, eID from users where username = '$username' ";
$result = mysqli_query($conn, $query);
if($result)
{
	$uname_error = true;
}

?>
<!DOCTYPE HTML> 
<html>

	<head>
		<link rel="stylesheet" type="text/css" href="styles/SearchBox.css">
		<link rel="stylesheet" type="text/css" href="styles/Navbar.css">
		<link rel="stylesheet" type="text/css" href="styles/registerbox.css">

		<link href='http://fonts.googleapis.com/css?family=Mr+Dafoe' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Amaranth:700' rel='stylesheet' type='text/css'>


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
	</form>
	<?if($empty_error):?>
	<p>Do not leave any fields blank. Please try to register again.</p>
	<?elseif($password_length):?>
	<p>You must have a password longer than 8 characters. Please try to register again.</p>
	<?elseif($similar_error):?>
	<p>You must enter the same password in both fields. Please try to register again.</p>
	<?elseif($password_error):?>
	<p>Your password must only contain numbers and letters and must have at least one of each.
	Please try to register again.</p>
	<?elseif($uname_error):?>
	<p>That user name is already taken. Please try again with a different one.</p>>
	<?else:?>
	<?php 
	$q = "INSERT INTO users(userName,password) values ('$username', '$password')";
	$res = mysqli_query($conn, $q);
	if (!$res)
    {
		die('Invalid query: ' . mysqli_error($conn));
	}
	echo "<p>Successfully added your new account</p>";	
	?>
	<?endif?>


     
</div>
</body>
</html>