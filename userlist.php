<?php

session_start();
include 'dbc.php';
include 'header.php';
if(!isset($_SESSION['UID']) OR $_SESSION['UTID']==1)
        {
          header('Location:home.php');  
        }
$sql="SELECT * from user WHERE UTID='1'";
$result = $conn->query($sql);

?>
<div class="right-menu">

	<table border=1px>
<tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Date Registered</th>
                  </tr>
<?php
// fetching data as it was inserted by user
while ($row = $result->fetch_assoc()) {
 	$name=$row['UName'];    
	$uid=$row['UID']; 
  $email = $row['UEmail'];
	$rg = $row['UregDate'];
	$gender=$row['USex'];

       			echo
                  '<tr>
                  <td>
                  <a href="usertopic.php?id=' . $uid . '">' . $name . '</a>
                  </td>
                  <td> '.$email.'</td>
                  <td> '.$gender.'</td>
                  <td> '.$rg.'</td>
                  
				</tr>';
  }    
  echo '</table>';
  echo '</div>';


include 'footer.php';
 ?>