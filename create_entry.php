<?php include("dbconnect.php"); ?>
<?php

		$vtitle = $_POST["vtitle"];
		$vlink = $_POST["vlink"];
		$vlength = $_POST["vlength"];
		$vdescr = $_POST["vdescr"];
		$vcount = $_POST["vcount"];
		$iconimg = $_POST["iconimg"];
		$vtags = $_POST["vtags"];

   		$hresolution = $_POST["hresolution"];

        $language = $_POST["language"];

   		$vtype = implode(',', $_POST['vtypes']);

		//echo "No fields are empty";
		
		
		
		$sql2 = "SELECT videolink FROM fun_video WHERE videolink = '$vlink' ";
		//$result = mysql_query("SELECT * FROM fun_video WHERE videolink =  '$vlink' ");
		$result = $conn->query($sql2);
		
		if (!$result)
		{
			die('Query failed to exe...'. mysqli_error($conn));
		}
		
		if ($result->num_rows > 0)
		{
			
			echo "<h2><a href=index.php>Home</a></h2>";
			die('This is a duplicate entry!' );
			
		}
		
		
		$sql = "INSERT INTO fun_video ".
   	   	"(title, videolink, videolength, highestresolution, description, language, viewcount, videotype, iconimage, tag) ".
   		"VALUES ('$vtitle', '$vlink', '$vlength', '$hresolution', '$vdescr', '$language', '$vcount', '$vtype', '$iconimg', '$vtags')";

		$retval = mysqli_query( $conn, $sql );
			
		if(! $retval )
		{
			die('Could not enter data: ' . mysqli_error($conn));
		}

		echo "Entered data successfully\n";
		mysqli_close($conn);

?>
<h2>Thanks!!</h2>
<h2><a href="entervideo.php">Enter Another!</a></h2>
<h2><a href="index.php">Home</a></h2>