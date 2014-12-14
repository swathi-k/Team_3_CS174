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
	<a href="register.php">Register</a>
	</li>';
	
	
	
	$logout = '<a href="./logout.php">Logout</a>';
	
	if (!isset($_SESSION["uid"]))
	{
		$menu = $menu . $login;
	}
	
	else 
	{

		$menu = $menu . $logout;
		if (isset($_SESSION["isAdmin"]))
		{
			if ($_SESSION["isAdmin"] == 1)
			{
				$videoEntry = '	<li id="link">
				<a href="entervideo.php">Enter Video</a>
				</li>';

				$menu = $menu . '
				<li id="link">
				<a href="./adminCorrect.php">Admin</a>
				</li>' . '<li id="link">
				<a href="entervideo.php">Enter Video</a>
				</li>';
			}
		}
	}

	$menu = $menu . '<li id="search">
	<input type="text" minlength="1" placeholder="Search by Keyword..." name="keyword">
	<input type="submit" name="submit" value="Enter">
	</li>
	</ul>
	</form>
	</div>';
	
	print ($menu);

?>