<?php
/* File   : sign.php
   Subject: Bonus Homework
   Authors: Swathi Kotturu
   Version: 1.0.2
   Date   : Nov 9, 2014
   Description: A web form that collects users' data to write into the guestbook database table
*/
include("dbconnect.php"); 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="styles/SearchBox.css">
<link rel="stylesheet" type="text/css" href="styles/Navbar.css">
<link rel="stylesheet" type="text/css" href="styles/registerbox.css">

<link href='http://fonts.googleapis.com/css?family=Mr+Dafoe' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Amaranth:700' rel='stylesheet' type='text/css'>
<meta charset="UTF-8">
<title>Add Video</title>
<body>
<div style="background-color:#ffffff">
<?php 
	include 'menu.php';
	echo "<h2>Enter a video into the Database!</h2>";

		

?>
<br><br>

 <form method=post action="verify_input.php">

   Video Title: <input class="uname" type="text" size="25" min="1" maxlength="50" name="vtitle">
   <br><br>

   Video Link: <input class="uname" type="text" size="25" name="vlink">
   <br><br>

   Video Length: <input class="uname" type="text" size="6" maxlength="6" name="vlength"> mins
   <br><br>

   Highest Resolution: 
   <select class="uname" name="hresolution">
   <option value="144" selected>144p</option>
   <option value="240">240p</option>
   <option value="360">360p</option>
   <option value="480">480p</option>
   <option value="720">720p</option>
   <option value="1080">1080p</option>
   </select>
   (select one)
   <br><br>
   
   Video Description: <textarea class="uname" rows="4" cols="25" maxlength="1000" name="vdescr"> </textarea>
   <br><br>
   
   Language: 
   <select class="uname" name="language">
   <option  value="English" selected>English</option>
   <option  value="Non-English">Non-English</option>
   </select>
   <br><br>
   
   View Count: <input class="uname" type="text" size="8" maxlength="8" name="vcount">
   <br><br>
   
   Video type: 
   <input type='checkbox' name='vtypes[]' value='Tutorial'>Tutorial
   <input type='checkbox' name='vtypes[]' value='Entertainment'>Entertainment
   <input type='checkbox' name='vtypes[]' value='Application'>Application
   <input type='checkbox' name='vtypes[]' value='Weapon'>Weapon
   <input type='checkbox' name='vtypes[]' value='Group demo'>Group demo
   <input type='checkbox' name='vtypes[]' value='Others'>Others
   <br><br>
   
   Video icon image link:
   <input  class="uname" type="text" name="iconimg">
   <br><br>
   
   Tags (keywords about the site separated by commas):
   <input class="uname" type="text" name="vtags">
   <br><br>
   
   <input type="submit" name="submit" value="Enter"> 
   <br><br>

</form>

</body>