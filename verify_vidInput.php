<?
/* File   : verify_vidInput.php
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
	/*
	<input type='button' value='Go back'
                      onclick='self.history.back()' />
	*/
   
   echo(" <font color='red'>$message</font><br> <b>Please try Again! </b><br>");
   echo "<br>";
   echo "<input type='button' value='Go back'
                      onclick='self.history.back()' />";
}
if (empty($_POST["videoID"]))
{
	printErrorMessage("*Please Enter Video ID!");
}
elseif(empty($_POST["vtitle"]))
{
	printErrorMessage("*Please Enter a Video Title!");
}
elseif(empty($_POST["vlength"]))
{
	printErrorMessage("*Please Enter a Video Length!");
}
elseif(empty($_POST["hresolution"]))
{
	printErrorMessage("*Please Enter a Video Resolution!");
}
elseif(empty($_POST["vdescr"]))
{
	printErrorMessage("*Please Enter a Video Description!");
}
elseif(empty($_POST["language"]))
{
	printErrorMessage("*Please Enter a View Language!");
}
elseif(empty($_POST["vcount"]))
{
	printErrorMessage("*Please Enter a Video Count!");
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
	include 'update_entry.php';
}

?>
<!-- PHP codes ends here -->

</body>
</html>