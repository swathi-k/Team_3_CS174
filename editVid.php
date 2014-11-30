<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit Videos</title>

<!-- ALL STYLES -->

<!--<link rel="stylesheet" type="text/css" href="css/adminTable.css" media="screen"> -->
</head>	
<body>
	<?php
		include("dbconnect.php");
		$vidID = $_POST["id"];
		
		$tbl_name = "fun_video";
		$sql = "SELECT id, title, iconimage, videolink, videolength, highestresolution, description, language, viewcount, videotype, tag ";
		$sql = $sql ." FROM $tbl_name WHERE id = $vidID";
		
		$result = $conn->query($sql);
		
		if($result->num_rows === 1)
		{
			while ($row = $result->fetch_assoc())
			{
				
				$vidTitle = $row["title"];
				$icomImage = $row["iconimage"];
				$vidLink =  $row["videolink"];
				$vidLength = $row["videolength"];
				$res = $row["highestresolution"];
				$description = $row["description"];
				$language = $row["language"];
				$count =  $row["viewcount"];
				$vidType = $row["videotype"];
				$tag = $row["tag"];
			}
		}
		//echo "<a href=\"{$row['videolink']}\"><img src=\"{$row['iconimage']}\" height=\"100\" width=\"160\"></a>";

		echo "<h2><b>Edit Video ID: $vidID</b></h2>";
		echo "<br>";
		echo "<a href=\"$vidLink\"><img src=\"$icomImage\" height=\"100\" width=\"160\"></a>";
		echo "<br>";
		
		//start of form
		echo "<form action=\"verify_vidInput.php\" method =\"post\">";
		echo "<input type= \"hidden\" name= \"videoID\" value= \"$vidID\">";
		echo "<p><b>Title:  </b>";
		echo "$vidTitle </p>";
		print "    ";
		echo "<br>";
		echo "New Title:  ";
		echo "<input type=\"text\" value=\"$vidTitle\" size=\"45\" maxlength = \"80\" name = \"vtitle\" >";
		echo "<br>";
		
		echo "<p><b>Length:</b> $vidLength  ";
		
		
		echo "New Length <select name=\"vlength\"> ";
		
			for ($i = 1; $i<=30; $i++)
			{
				if ($i == $vidLength)
				{
					echo "<option value=\".$i.\" selected>$i</option>";
					
				}
				else
				{
					echo "<option value=\".$i.\">$i</option>";
				}
			}
		echo "</select>	</p>";	 
	
		
		echo "<br><br>";
		echo "<p><b>Current highest resolution: </b>$res". "p";
		?>
		
		
		<select name="hresolution">
   		
   		<?php
   			if ($res == 144 )
   				echo "<option value=\"144\" selected>144p</option>";
   			else
   				echo "<option value=\"144\">144p</option>";
   			
   			if ($res == 240 )
   				echo "<option value=\"240\" selected>240p</option>";
   			else
   				echo "<option value=\"240\">240p</option>";
   	
   			if ($res == 360)
   				echo "<option value=\"360\" selected>360p</option>";
   			else
   				echo "<option value=\"360\">360p</option>";
   				
   			if ($res == 480)
   				echo "<option value=\"480\" selected>480p</option>";
   			else
   				echo "<option value=\"480\">480p</option>";
   				
   			if ($res == 720)
   				echo "<option value=\"720\" selected>720p</option>";
   			else
   				echo "<option value=\"720\">720p</option>";
   				
   			if ($res == 1080)
   				echo "<option value=\"1080\" selected>1080p</option>";
   			else
   				echo "<option value=\"1080\">1080p</option>";
   				
  	 	echo "</select>";
  	 	
  	 	?>

		<?php
		
	
		
		echo "<br><br><br>";
		echo "<b>Desription: </b><textarea rows=\"5\"  cols=\"30\" maxlength = \"1000\" name = \"vdescr\"> $description </textarea>";
		echo "<br><br>";
		
		echo "<p><b>Language: </b> $language</p>";
	
		if ($language === 'English')
		{	
			echo "<input type=\"radio\" name=\"language\" value=\"english\" checked> English" ;
			echo "<input type=\"radio\" name=\"language\" value=\"nonenglish\"> Non-English" ;
		}
		else /*  Else make the checked button nonenglish */
		{
			echo "<input type=\"radio\" name=\"language\" value=\"english\"> English" ;
			echo "<input type=\"radio\" name=\"language\" value=\"nonenglish\" checked> Non-English" ;
			
		}
		echo "<br><br>";
		echo "<p><b>Count: </b> $count </p> ";
		echo "New Count <input type=\"text\" value=\"$count\" size=\"20\" maxlength = \"10\" name = \"vcount\" >";
		
		?>
		<?php
		echo "<br><br>";
	
		echo "<p><b>Current Type(s): </b> $vidType </p>";
		?>
		New type:
		<?php
		
		if (isInArray("Tutorial", $vidType))
			echo "<input type='checkbox' name='vtypes[]' value='Tutorial' checked>Tutorial";
		else
			echo "<input type='checkbox' name='vtypes[]' value='Tutorial'>Tutorial";
   		
   		if (isInArray("Entertainment", $vidType))
   			echo "<input type='checkbox' name='vtypes[]' value='Entertainment' checked>Entertainment";
   		else
   			echo "<input type='checkbox' name='vtypes[]' value='Entertainment'>Entertainment";
   			
   		if (isInArray("Application", $vidType))
   			echo "<input type='checkbox' name='vtypes[]' value='Application' checked>Application";
   		else
   			echo "<input type='checkbox' name='vtypes[]' value='Application'>Application";
   			
   		if (isInArray("Weapon", $vidType))
   			echo "<input type='checkbox' name='vtypes[]' value='Weapon' checked>Weapon";
   		else
   			echo "<input type='checkbox' name='vtypes[]' value='Weapon'>Weapon";
   			
   		if (isInArray("Group demo", $vidType))
   			echo "<input type='checkbox' name='vtypes[]' value='Group demo' checked>Group demo";
   		else
   			echo "<input type='checkbox' name='vtypes[]' value='Group demo'>Group demo";
   		
   		if (isInArray("Others", $vidType))
   			echo "<input type='checkbox' name='vtypes[]' value='Others' checked>Others";
   		else
   			echo "<input type='checkbox' name='vtypes[]' value='Others'>Others";
   			
   		echo "<br><br>";
   		
   		?>
   		<?php
   		echo "<p> <b>Current Tags: </b> ";
   		echo "<input type=\"text\" name=\"vtags\" value=\"$tag\" maxlength = \"70\" size=\"60\" > </p>";
		
		
		echo "<br><br>";
		echo "<input type=\"submit\" name=\"submit\" value=\"Enter\"> ";
		echo "</form>";	
		?>
		
		<?php
		
		function isInArray($target, $vtype)
		{	
			$myArray = explode("," ,$vtype);
			
			foreach($myArray as $key => $value)
			{
				if ($target == $value)
					return true;
			}
			return false;
		}
		
		
		?>



</body>
</html>