<?php
$sql = "SELECT TTID, TopicType
  FROM TopicType
  ORDER BY TTID";


$result = $conn->query($sql);
echo '<div class="left-menu">';
	echo '<table>';
          echo        "<tr>
                    <th>Categories</th>
                    
                  </tr>";

// fetching data as it was inserted by user
while ($row = $result->fetch_assoc()) {
 	$type=$row['TopicType'];    
	$tid=$row['TTID']; 

       			echo
                  '<tr>
                  <td>
                  <h3><a href="category.php?id=' . $tid . '">' . $type . '</a></h3>
                  </td>';
                  
				echo "</tr>";
  }    
  echo '</table>';
  echo '</div>';
  

?>