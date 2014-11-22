<?
/* File   : verify_input.php
   Subject: CS160 demo
   Authors: Chris Tseng
   Version: 1.0.2
   Date   : Nov 19, 2002
   Description: check to see if the input contains any thing
*/
?>
<html>
<head><title>Input Verification Page</title>
</head>
<body bgcolor='white'>
<?php
include_once("dbconnect.php");
function printErrorMessage($message)
{
   echo(" <font color='red'>$message</font><br><a href='entervideo.php'> Please try Again!</a><br>");
}

if(empty($_POST["vtitle"]))
{
	printErrorMessage("*Please Enter a Video Title!");
}
elseif(empty($_POST["vlink"]))
{
	printErrorMessage("*Please Enter a Video Link!");
}
elseif(empty($_POST["vlength"]))
{
	printErrorMessage("*Please Enter a Video Length!");
}
elseif(empty($_POST["vdescr"]))
{
	printErrorMessage("*Please Enter a Video Description!");
}
elseif(empty($_POST["vcount"]))
{
	printErrorMessage("*Please Enter a View Count!");
}
elseif(empty($_POST["iconimg"]))
{
	printErrorMessage("*Please Enter a Icon Image Link!");
}
elseif(empty($_POST["vtags"]))
{
	printErrorMessage("*Please Enter Video Tags!");
}
elseif(empty($_POST["vtypes"]))
{
	printErrorMessage("*Please Enter Video Types!");
}
else 
{
	include 'create_entry.php';
}

?>
<!-- PHP codes ends here -->

</body>
</html>