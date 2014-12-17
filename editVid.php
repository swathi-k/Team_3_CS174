<?php session_start();?>

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
<title>Edit Videos</title>

<!-- ALL STYLES -->

<!--<link rel="stylesheet" type="text/css" href="css/adminTable.css" media="screen"> -->
</head>	
<body>
<div style="background-color:#ffffff;text-align:left">
	<?php
		include("dbconnect.php");
		include "menu.php";
		$vidID = $_POST["id"];
		
		$tbl_name = "fun_video";
		$sql = "SELECT id, title, iconimage, videolink, videolength, highestresolution, description, language, viewcount, videotype, tag, category ";
		$sql = $sql ." FROM $tbl_name WHERE id = $vidID";
		
		$result = $conn->query($sql);
	
		if($result->num_rows === 1) /*sorry, I don't know how to extract just the one row  */
		{							/*							  	-Gibran            */
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
				$cat = $row["category"];
			}
		}
		//echo "<a href=\"{$row['videolink']}\"><img src=\"{$row['iconimage']}\" height=\"100\" width=\"160\"></a>";

		echo "<h2><b>Edit Video ID: $vidID</b></h2>";
		echo "<br>";
		echo "<a href=\"$vidLink\"><img src=\"$icomImage\" height=\"100\" width=\"160\"></a>";
		echo "<br>";
		
		//start of form
		echo "<form action=\"verify_vidInput.php\" method =\"post\">";
		echo "<input class=\"uname\" type= \"hidden\" name= \"videoID\" value= \"$vidID\">";
		//echo "<p><b>Title:  </b>";
		//echo "$vidTitle </p>";
		//print "    ";
		echo "<br>";
		echo "<b>Title:  </b>";
		echo "<input class=\"uname\" type=\"text\" value=\"$vidTitle\" size=\"45\" maxlength = \"80\" name = \"vtitle\" >";
		echo "<br>";
		
		echo "<p><b>Video Link: </b>";
		echo "<input class=\"uname\" type=\"text\" value=\"$vidLink\" size=\"45\" maxlength = \"80\" name = \"vlink\" ></p>";
		
		echo "<p><b>Icon Image: </b>";
		echo "<input class=\"uname\" type=\"text\" value=\"$icomImage\" size=\"45\" maxlength = \"80\" name = \"iImage\" ></p>";
		
		
		
		echo "<p><b>Length:</b>";
		
		
		echo "<select class=\"uname\" name=\"vlength\"> ";
		
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
		echo "<p><b>Highest resolution: </b>";
		?>
		
		
		<select class="uname" name="hresolution">
   		
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
		
		echo "<p><b>Language: </b>";
	
		if ($language === 'English')
		{	
			echo "<input class=\"uname\" type=\"radio\" name=\"language\" value=\"English\" checked>English" ;
			echo "<input class=\"uname\" type=\"radio\" name=\"language\" value=\"Non-English\">Non-English </p>" ;
		}
		else /*  Else make the checked button nonenglish */
		{
			echo "<input class=\"uname\" type=\"radio\" name=\"language\" value=\"English\"> English" ;
			echo "<input class=\"uname\" type=\"radio\" name=\"language\" value=\"Non-English\" checked> Non-English" ;
			
		}
		echo "<br><br>";
		echo "<p><b>Count: </b>";
		echo "<input class=\"uname\" type=\"text\" value=\"$count\" size=\"20\" maxlength = \"10\" name = \"vcount\" > </p>";
		
		?>
		<?php
		echo "<br>";
	
		echo "<p><b>Current Type(s): </b>";
		?>
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
   		echo "<input class=\"uname\" type=\"text\" name=\"vtags\" value=\"$tag\" maxlength = \"70\" size=\"60\" > </p>";
		
				
		echo "<br><br>";
				echo "<b>Category: </b>";
				echo "<select class=\"uname\" name=\"category\"> ";

				if ($cat == 'Aikido')
					echo "<option value=\"Aikido\" selected>Aikido</option>";
				else 
					echo "<option value=\"Aikido\">Aikido</option>";
				
				if ($cat == 'Chen Taichi')
					echo "<option value=\"Chen Taichi\" selected>Chen Taichi</option>";
				else
					echo "<option value=\"Chen Taichi\">Chen Taichi</option>";
					
				if ($cat == 'Judo')
					echo "<option value=\"Judo\" selected>Judo</option>";
				else
					echo "<option value=\"Judo\">Judo</option>";
					
				if ($cat == 'KungFu Movie')
					echo "<option value=\"KungFu Movie\" selected>KungFu Movie</option>";
				else
					echo "<option value=\"KungFu Movie\">KungFu Movie</option>";
				
				if ($cat == 'QiGong')
					echo "<option value=\"QiGong\" selected>QiGong</option>";
				else
					echo "<option value=\"QiGong\">QiGong</option>";
					
				if ($cat == 'Shaolin')
					echo "<option value=\"Shaolin\" selected>Shaolin</option>";
				else
					echo "<option value=\"Shaolin\">Shaolin</option>";
					
				if ($cat == 'Sun Taichi')
					echo "<option value=\"Sun Taichi\" selected>Sun Taichi</option>";
				else
					echo "<option value=\"Sun Taichi\">Sun Taichi</option>";
				
				if ($cat == 'Tae kwon do')
					echo "<option value=\"Tae kwon do\" selected>Tae kwon do</option>";
				else
					echo "<option value=\"Tae kwon do\">Tae kwon do</option>";
					
				if ($cat == 'Wing Chun')
					echo "<option value=\"Wing Chun\" selected>Wing Chun</option>";
				else
					echo "<option value=\"Wing Chun\">Wing Chun</option>";
				
				if ($cat == 'Wu Taichi')
					echo "<option value=\"Wu Taichi\" selected>Wu Taichi</option>";
				else
					echo "<option value=\"Wu Taichi\">Wu Taichi</option>";
					
				if ($cat == 'Yang Taichi')
					echo "<option value=\"Yang Taichi\" selected>Yang Taichi</option>";
				else
					echo "<option value=\"Yang Taichi\">Yang Taichi</option>";
			
			echo "</select>	</p>";
		
		echo "<br><br>";
		echo "<input class=\"uname\" type=\"submit\" name=\"submit\" value=\"Enter\"> ";
		echo "<input class = \"uname\" type=\"button\" VALUE=\"Cancel\" onClick=\"history.go(-1);return true;\"> ";
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