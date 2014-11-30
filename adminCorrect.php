<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Videos Edit</title>

<!-- ALL STYLES -->

<!--<link rel="stylesheet" type="text/css" href="css/adminTable.css" media="screen"> -->
</head>
			
<body>

<?php

	session_start();
	if (!isset($_SESSION['uid']))
	{
		header('Location: ./index.php');
	}
	else if ($_SESSION['isAdmin'] === 0)
		header('Location: ./index.php');
	
	

	include("dbconnect.php");
	$tbl_name = "fun_video";
	$sql = "SELECT id, title, iconimage, videolink, videolength, description, language, viewcount, videotype, tag FROM $tbl_name";

	$result2 = $conn->query($sql);
	?>
	
	
	<table width="500" cellspacing = "10" >
		<tbody>
	<?php
		
		if ($result2->num_rows > 0)
		{
			while ($row = $result2->fetch_assoc())
			{
		
				echo "<tr>";
				echo "<td>";
				echo "<b>".$row["title"]. "</b>";
				echo "<br>";
				echo "<a href=\"{$row['videolink']}\"><img src=\"{$row['iconimage']}\" height=\"100\" width=\"160\"></a>";
				echo "</td>";
				
				echo "<td>";
				echo "<b>Description:</b>";
				echo $row["description"];
				echo "</td>";
				
				echo "<td>";
				echo "<b>Video Length:</b>";
				echo $row["videolength"];
				echo "</td>";
			
				echo "<td>";
				echo "<form action=\"editVid.php\" method =\"post\">";
				echo "<input type = \"hidden\" name=\"id\" value=\"{$row['id']}\"/>";
				echo "<input type = \"submit\" value=\"Edit\"/>";
				echo "</form>";
				echo "</td>";
	
				echo "</tr>";
	
		}
	}
	?>
			</tbody>
		</table>
	
</body>
</html>