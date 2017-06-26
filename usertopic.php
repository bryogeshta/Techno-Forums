<?php

session_start();
include 'dbc.php';
include 'header.php';
include 'leftmenu.php';


$id = $_GET['id'];
$sql="SELECT TID, Topic, ReplyCount, PostDate FROM Topic WHERE UID='$id'  ORDER BY PostDate ";
$result = $conn->query($sql);

?>
<div class="right-menu">

<h2> Topics </h2>

    <table border=1px>
<tr>
                    <th>Topics</th>
                    <th>ReplyCount</th>
                    <th>Date Created</th>
                    <?php
                    if($_SESSION['UID']==$id OR $_SESSION['UTID']==2)
                  {
                    echo '<th> Action</th>';
                  }
                  ?>
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
                  <td> '.$date.'</td>';
                  if($_SESSION['UID']==$id OR $_SESSION['UTID']==2)
                  {
                    
                  echo '<td><a href="deletetopic.php?id='.$tid.'"> Delete </a></td>';
                  }
                echo '</tr>';
  }    
  echo '</table>';
  echo '</div>';






include 'footer.php';
 ?>