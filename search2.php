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
<head><title>Search Results</title>
</head>
<body bgcolor='white'>
<?php
include_once("dbconnect.php");

$bucketsearch = $_POST["keyword"];

$searchTerms = explode(' ', $bucketsearch);
$searchTermBits = array();
foreach ($searchTerms as $term) {
	$term = trim($term);
	if (!empty($term)) {
		$searchTermBits[] = "tag LIKE '%$term%'";
	}
}

$sql = "SELECT * FROM fun_video WHERE ".implode(' AND ', $searchTermBits);

//echo "Query: \n" . $sql;

$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
	{
        echo "id: " . $row["id"];

	
	}
} 
else 
{
    echo "0 results";
}
mysqli_close($conn);

?>

// http://www.youtube.com/watch?v=Ahg6qcgoay4
<object width="420" height="315"
data="http://www.youtube.com/v/XGSy3_Czz8k">
</object>
<!-- PHP codes ends here -->

</body>
</html>