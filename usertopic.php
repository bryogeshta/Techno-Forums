<?php

session_start();
include 'dbc.php';
include 'header.php';
include 'leftmenu.php';
if(!isset($_SESSION['UID']) OR $_SESSION['UTID']==1)
        {
          header('Location:home.php');  
        }

$id = $_GET['id'];
$sql="SELECT TID, Topic, ReplyCount, PostDate FROM Topic WHERE UID='$id'  ORDER BY PostDate ";
$result = $conn->query($sql);

?>
<div class="right-menu">

<h2> My Topics </h2>

    <table border=1px>
<tr>
                    <th>Topics</th>
                    <th>ReplyCount</th>
                    <th>Date Created</th>
                    <th> Action</th>
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
                  <td><a href="delete.php?id='.$tid.'"> Delete </a></td>
                  
                </tr>';
  }    
  echo '</table>';
  echo '</div>';






include 'footer.php';
 ?>