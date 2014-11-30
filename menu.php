<?php
	
	$menu = '<div id="hmenu">
	
	<form method=post action="index.php">
	<ul>
	<li id="link">
	<a href="./index.php">Home</a>
	</li>
	<li id="link">';
	
	
	
	$login = '<a href="./login.php">Login</a></li>
	<li id="link">
	<a href="register.php">Create an Account!</a>
	</li>';
	
	
	
	$logout = '<a href="./logout.php">Logout</a>';
	
	session_start();
	
	if (!isset($_SESSION["uid"]))
	{
		$menu = $menu . $login;
	}
	
	else 
	{
		$menu = $menu . $logout;
	}
	
	$menu = $menu . '
	<li id="link">
	<a href="entervideo.php">Enter a video into the dbs!</a>
	</li>
	<li id="link">
	<a href="verifyTypeAccount.php">Admin Correct Videos</a>
	</li>
	<li id="search">
	<input type="text" minlength="1" placeholder="Search by Keyword..." name="keyword">
	<input type="submit" name="submit" value="Enter">
	</li>
	</ul>
	</form>
	</div>';
	
	print ($menu);

?>