<?php

session_start();
include 'dbc.php';
include 'header.php';
include 'leftmenu.php';

	echo "<div class='right-menu' >";
	echo "<h2> Search Results for:		 ".$_GET['keywords']."  </h2>";
if(isset($_GET['keywords']))
{
	$keys=$_GET['keywords'];
	$sql = "SELECT * from Topic where Topic LIKE '%$keys%' ";
	$res = $conn->query($sql);
	while($row = $res->fetch_assoc())
	{
	$tid = $row['TID'];
	$topic=$row['Topic'];
	$postdate = $row['PostDate'];
	$replies = $row['ReplyCount'];
	$uid = $row['UID'];
	
	$result = $conn->query("SELECT UName FROM User where UID=$uid");
	$row2 = $result->fetch_assoc();
	$uname = $row2['UName'];


		echo '<div class="search-results">
			<a href="topic.php?id='.$tid.'">'.$topic.'</a> <br><hr>
			Original Poster : <a href="usertopic.php?id='.$uid.'">'.$uname.'</a> &nbsp; &nbsp; &nbsp;
			Date Created : '.$postdate.' &nbsp; &nbsp; &nbsp;
			Reply Count :'.$replies.'&nbsp; &nbsp; &nbsp;

		</div> 
	';

}
}
echo '</div>';
?>


<?php
include 'footer.php';
 ?>