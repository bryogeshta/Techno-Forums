<?php

session_start();
include 'dbc.php';
include 'header.php';
include 'leftmenu.php';


$sql="SELECT TID, Topic, ReplyCount, PostDate FROM Topic  ORDER BY ReplyCount LIMIT 5";
$result = $conn->query($sql);

?>
<div class="right-menu">

	<div class="right-table" >
	<table border=1px>
<tr>
                    <th>Most Visited Topics</th>
                    <th>ReplyCount</th>
                    <th>Date Created</th>
                  </tr>
<?php
// fetching data as it was inserted by user
while ($row = $result->fetch_assoc()) {
 	$topic=$row['Topic'];    
	$tid=$row['TID']; 
	$rc = $row['ReplyCount'];
	$date=$row['PostDate'];

       			echo
                  '<tr>
                  <td>
                  <a href="topic.php?id=' . $tid . '">' . $topic . '</a>
                  </td>
                  <td> '.$rc.'</td>
                  <td> '.$date.'</td>
                  
				</tr>';
  }    
  echo '</table>';
  echo '</div>';




$sql="SELECT  TID, Topic, ReplyCount, PostDate FROM Topic  ORDER BY PostDate LIMIT 5";
$result = $conn->query($sql);

?>


  <div class="right-table" >
  <table border=1px>
<tr>
                    <th>New Topics</th>
                    <th>ReplyCount</th>
                    <th>Date Created</th>
                  </tr>
<?php
// fetching data as it was inserted by user
while ($row = $result->fetch_assoc()) {
  $topic=$row['Topic'];    
  $tid=$row['TID']; 
  $rc = $row['ReplyCount'];
  $date=$row['PostDate'];

            echo
                  '<tr>
                  <td>
                  <a href="topic.php?id=' . $tid . '">' . $topic . '</a>
                  </td>
                  <td> '.$rc.'</td>
                  <td> '.$date.'</td>
                  
        </tr>';
  }    
  echo '</table>';
  echo '</div>';
    echo '</div>';





include 'footer.php';
 ?>