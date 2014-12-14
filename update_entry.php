<?php include("dbconnect.php"); ?>
<?php

		$id = $_POST["videoID"];
		$vtitle = $_POST["vtitle"];
		
		$res = 	$_POST["hresolution"];
		$vlength = $_POST["vlength"];
		$vdescr = $_POST["vdescr"];
		$vcount = $_POST["vcount"];
		$vtags = $_POST["vtags"];
		$language = $_POST["language"];
		
		$vtype = implode(',', $_POST['vtypes']);
		
		$vdescr = mysqli_real_escape_string($conn, $vdescr);
		$vtitle = mysqli_real_escape_string($conn, $vtitle);
		$vtags = mysqli_real_escape_string($conn, $vtags);
		
		
		$sql = "UPDATE fun_video ".
   	   	" SET title = '$vtitle', videolength = '$vlength', highestresolution = '$res', description = '$vdescr', language = '$language', ".
   	   	" viewcount = '$vcount', videotype = '$vtype', tag = '$vtags' ".
   	   	" WHERE id = '$id' ";
   	   	
   	   	
   	   	$retval = mysqli_query( $conn, $sql );
			
		if(! $retval )
		{
			die('Could not enter data: ' . mysqli_error($conn));
		}

		echo "Entered data successfully\n";
		mysqli_close($conn);
   		
		
?>
<h2>Thanks!!</h2>
<h2><a href="AdminCorrect.php">Edit Another Video!</a></h2>
<h2><a href="index.php">Home</a></h2>