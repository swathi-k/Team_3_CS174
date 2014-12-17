<?php session_start()?>

<!DOCTYPE HTML> 
<html>

	<head>
		<link rel="stylesheet" type="text/css" href="styles/SearchBox.css">
		<link rel="stylesheet" type="text/css" href="styles/Navbar.css">

		<link href='http://fonts.googleapis.com/css?family=Mr+Dafoe' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Amaranth:700' rel='stylesheet' type='text/css'>
	
		<link rel="stylesheet" href="styles/slideshow.css" />
		<script src="jquery.js"></script>
		<script src="player.js"></script>
	</head>

	<body> 
<div id="hmenu">
<?php 
	include "menu.php";
	include('dbconnect.php');
?>
     
</div>

	<span id="sl_play" class="sl_command">&nbsp;</span>
	<span id="sl_pause" class="sl_command">&nbsp;</span>
	<span id="sl_i1" class="sl_command sl_i">&nbsp;</span>
	<span id="sl_i2" class="sl_command sl_i">&nbsp;</span>
	<span id="sl_i3" class="sl_command sl_i">&nbsp;</span>
	<span id="sl_i4" class="sl_command sl_i">&nbsp;</span>
	

	
		
		
		<div id="container" class="container"></div>

		<div id="browse-container">
            <button class="browse-button" id="prev-button">prev</button>
            <button class="browse-button" id="next-button">next</button>
        </div>
		
		
<?php 

	print "<table id='gallery' style='width:100%'>";
	
	$fav_vid = false;
	if(isset($_SESSION["uid"])) {
		$fav_vid = true;
		$username = $_SESSION["uid"];
		$sql = "SELECT iconimage, videolink FROM favorites INNER JOIN fun_video ON favorites.vId=fun_video.id WHERE favorites.userName = '$username' LIMIT 0, 4";
		$result = mysqli_query($conn, $sql);

	}
	$total = 4;
	if($fav_vid)
	{
		while($row = mysqli_fetch_array($result)) 
		{
			$videoID = substr($row['videolink'], -11);

			print ("
				<td> 
					<a class=\"show-popup\" href=\"javascript: void(0)\" onclick=\" loadVideo('$videoID');\">
						<img src=\"{$row['iconimage']}\" width=\"220\" height=\"215\" />
					</a>
				</td> 

				");
			$total = $total - 1;
		}
	}

	$sql = "SELECT  `iconimage`, `videolink` FROM  fun_video";
	$arrayofvideos = array();
	$arrayoficons = array();
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_array($result))
	{
		$piece = $row['videolink'];
		$icon = $row['iconimage'];
		$arrayofvideos[] = $piece;
		$arrayoficons[] = $icon;
	}
	$buffer = array();
	$rand = rand( 0, count($arrayofvideos) - 1);
	$buffer[] = $rand;
	while($total > 0)
	{
	while(in_array($rand, $buffer))
	{
	$rand = rand( 0, count($arrayofvideos) - 1);
		
	}
	$buffer[] = $rand;
	$videoID = substr($arrayofvideos[$rand], -11);
	print ("
			<td>
			<a class=\"show-popup\"  href=\"javascript: void(0)\" onclick=\" loadVideo('$videoID');\">
			<img src=\"{$arrayoficons[$rand]}\" width=\"220\" height=\"215\" />
			</a>
			</td>
	
			");
	
	
	$total = $total - 1;
	}
	
	print"</table>";

?>



<table style="width:100%" id="results">
<tr>
<td>
<form id="searchform" method=post action="index.php">

	<h1>Search</h1>
	<br><br>

	Highest Resolution: 
   <select name="hresolution">
   <option value="">Select One</option>
   <option value="144">144p</option>
   <option value="240">240p</option>
   <option value="360">360p</option>
   <option value="480">480p</option>
   <option value="720">720p</option>
   <option value="1080">1080p</option>
   </select>
   <br><br>
   
   View Length: 
   <select name="vlength">
   <option value="" selected>Select One</option>
   <option value="0,5">0 - 5 min</option>
   <option value="10,20">10 - 20 min</option>
   <option value="20,40">20 - 40 min</option>
   <option value="40,60">40 - 60 min</option>
   <option value="60,">1+ hour</option>
   </select>
   <br>
   
   Language: 
   <input type="radio" value="English" name="language">English
   <input type="radio" value="Non-English" name="language">Non-English
   <br><br>
   
   View Count: 
   <select name="vcount">
   <option value="" selected>Select One</option>
   <option value="50000,75000">50,000 - 75,000</option>
   <option value="75001,100000">75,001 - 100,000</option>
   <option value="100001,125000">100,001 - 125,000</option>
   <option value="125001,150000">125,001 - 150,000</option>
   <option value="150000,">150,000+</option>
   </select>
   <br><br>
   
   Video type: 
   <select name="vtypes">
   <option value="" selected>Select One</option>
   <option value="Tutorial">Tutorial</option>
   <option value="Entertainment">Entertainment</option>
   <option value="Application">Application</option>
   <option value="Weapon">Weapon</option>
   <option value="Group demo">Group demo</option>
   <option value="Others">Others</option>
   </select>
   <br><br>
      
   <input type="submit" name="submit" value="Enter">
</form>
</td>
<td>

<?php 	
	include('dbconnect.php');	// include your code to connect to DB.

	$tbl_name="fun_video";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;

	if (isset($_GET['subquery'])) 
	{
		$subquery = $_GET['subquery'];
	
	}
	
	
	$subquery = str_replace("\\", "",$subquery);
	
	if (isset($_POST['keyword']))
	{
		$bucketsearch = $_POST["keyword"];
	
		$searchTerms = explode(' ', $bucketsearch);
		$searchTermBits = array();
		foreach ($searchTerms as $term) {
			$term = trim($term);
			if (!empty($term)) {
				$searchTermBits[] = "tag LIKE '%$term%'";
			}
		}
	
		$subquery = implode(' AND ', $searchTermBits);
	}
	
	if (isset($_POST['vlength']))
	{
		
		
		if(!empty($_POST["vlength"])) {

			if(!empty($subquery)) {
				$subquery = $subquery . " AND ";
			}
				
			$vlength = explode(',', $_POST["vlength"]);
		
			$vlength1 = $vlength[0];
			$vlength2 = $vlength[1];
			if(!empty($vlength2)) {
				if(!empty($subquery)) {
					$subquery = $subquery . " videolength BETWEEN $vlength1 AND $vlength2";
				}
				else {
					$subquery = " videolength BETWEEN $vlength1 AND $vlength2";
				}		
			}
			else {
				if(!empty($subquery)) {
					$subquery = $subquery . " videolength > $vlength1";
				}
				else {
					$subquery = " videolength > $vlength1";
				}		
				
			}
		}
	}
	
	if (isset($_POST['vcount']))
	{
	
		if(!empty($_POST["vcount"])) {

			if(!empty($subquery)) {
				$subquery = $subquery . " AND ";
			}
				
			$vcount = explode(',', $_POST["vcount"]);
	
			$vcount1 = $vcount[0];
			$vcount2 = $vcount[1];
			if(!empty($vcount2)) {

				if(!empty($subquery)) {
					$subquery = $subquery . " viewcount BETWEEN $vcount1 AND $vcount2";
				}
				else {
					$subquery = " viewcount BETWEEN $vcount1 AND $vcount2";
				}		

			}
			else {

				if(!empty($subquery)) {
					$subquery = $subquery . " viewcount > $vcount1";
				}
				else {
					$subquery = " viewcount > $vcount1";
				}		

			}
		}
	}
	
	if (isset($_POST['hresolution']))
	{
	
		if(!empty($_POST["hresolution"])) {

			$hres = $_POST["hresolution"];
			if(!empty($subquery)) {
				$subquery = $subquery . " AND ";
				$subquery = $subquery . " highestresolution = '$hres'";
			}
			else {
				$subquery = " highestresolution = '$hres'";
			}
			
		}
	}
	
	if (isset($_POST['language']))
	{
	
		if(!empty($_POST["language"])) {

			$lang = $_POST["language"];

			if(!empty($subquery)) {
				$subquery = $subquery . " AND ";
				$subquery = $subquery . " language = '$lang'";
			}
			else {
				$subquery = " language = '$lang'";
			}
		}
	}
	
	if (isset($_POST['vtypes']))
	{
	
		if(!empty($_POST["vtypes"])) {
			
			$vtype = $_POST["vtypes"];

			if(!empty($subquery)) {
				$subquery = $subquery . " AND ";
				$subquery = $subquery . " videotype LIKE '%$vtype%'";
			}
			else {
				$subquery = " videotype LIKE '%$vtype%'";
			}

		}
	}
	
	if (isset($_GET['page']))
		$page = $_GET['page']; 
	else
		$page = 0;	


	if (isset($subquery))
	{
	$query = "SELECT COUNT(*) as num FROM $tbl_name WHERE $subquery";
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	//$query = "SELECT COUNT(*) as num FROM $tbl_name";
	$total_pages = mysqli_fetch_array(mysqli_query($conn, $query));
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "index.php"; 	//your file name  (the name of this file)
	$limit = 10; 								//how many items to show per page
	
	
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	
	$sql = "SELECT id, title, iconimage, videolink, videolength, description, language, viewcount, videotype, tag FROM $tbl_name WHERE $subquery LIMIT $start, $limit";
	//$sql = "SELECT id FROM $tbl_name LIMIT $start, $limit";
	$result = mysqli_query($conn, $sql);
	
	

	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?subquery=$subquery&page=$prev\">previous</a>";
		else
			$pagination.= "<span class=\"disabled\">previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?subquery=$subquery&page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?subquery=$subquery&page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?subquery=$subquery&page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?subquery=$subquery&page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?subquery=$subquery&page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?subquery=$subquery&page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?subquery=$subquery&page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?subquery=$subquery&page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?subquery=$subquery&page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?subquery=$subquery&page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?subquery=$subquery&page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?subquery=$subquery&page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?subquery=$subquery&page=$next\">next</a>";
		else
			$pagination.= "<span class=\"disabled\">next</span>";
		$pagination.= "</div>\n";		
	}


		if ($result->num_rows < 1)
		{


			print "<table style=\"width:100%\" id=\"results2\">Favorite Videos:<br>";

			/* Get data. */






			$username = $_SESSION["uid"];


			$sql = "SELECT id, title, iconimage, videolink, videolength, description, language, viewcount, videotype, tag FROM favorites INNER JOIN fun_video ON favorites.vId=fun_video.id WHERE favorites.userName = '$username' LIMIT $start, 4";

			$result = mysqli_query($conn, $sql);


		}
		else {
			print "<table style=\"width:100%\" id=\"results2\">Search Results:<br>";

		}




		while($row = mysqli_fetch_array($result))
		{
	
		print "<tr class=\"alt\" >";
		print "<td>";
		print "<b>{$row['title']}</b>";
//		print "</td>";
		print "<br>";
		print "<a href=\"{$row['videolink']}\"><img src=\"{$row['iconimage']}\" height=\"100\" width=\"160\"></a>";
		print "</td>";


		print "<td>";
		print "<form action=\"favorite.php\" method=\"post\">";
		print "<input type=\"image\" src=\"http://pngimg.com/upload/star_PNG1595.png\" name=\"favorite\" value=\"{$row['id']}\"/>";
		print "</form>";
		print "</td>";


		print "<td id=\"description\">";
		print "<b>Description:</b>";
		print $row["description"];
		print "</td>";

		print "<td>";
		print "<b>Video Length:</b>";
		print $row["videolength"];
		print "</td>";
		print "<td>";
		print "<b>View Count:</b>";
		print $row["viewcount"];
		print "</td>";
		//print "<br>\n";
		print "<td>";
		print "<b>Language:</b>";
		print $row["language"];
		print "</td>";
		//print "<br>\n";
		print "<td>";
		print "<b>Video Type:</b>";
		print $row["videotype"];
		print "<td>";
		print "<b>Tags:</b>";
		print $row["tag"];
		print "</td>";
		print "</tr>\n";
         
	
		}
	}
	else {
		$pagination = 0;
	}	
	?>

<div id="pagination"> 
<?=$pagination?>
</div>
</td>
</tr>
</table> 
</body>
</html>