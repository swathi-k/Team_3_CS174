<?php
include('dbconnect.php');
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
			<a href="./index.php">Home</a>
		</li>
		<li id="link">
			<a href="./login.php">Login</a>
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
	
	<div id="register">
	<form action="verify_account.php" method="post"> <!--SEND TO Verify.php afterwards -->
        <table align="center">
			<tr>
            	<td><label class="formtext">User Name: </label></td>
				<td><input class = "uname" type="text" name="username" size=20" /></td>
            </tr>
            <tr>
            	<td><label class="formtext">Enter a Password: </label></td>
				<td><input class = "uname" type="password" name="password" size=20/></td>
            </tr>
             <tr>
            	<td><label class="formtext">Enter your password again: </label></td>
				<td><input class = "uname" type="password" name="password2" size=20 /></td>
            </tr>
            <tr>
            	<td colspan="2" align="center">
            		<input type="submit" value="Register!" class="btn"/>
                </td>
            </tr>
        </table>
    </form>
</div>
     
</div>
</body>
</html>