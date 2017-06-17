<?php

session_start();
include 'dbc.php';
include 'header.php';

if(!isset($_SESSION['UID']))
        {
          header('Location:login.php');  
        }
  $uid = $_SESSION['UID'];
 ?>
<div class="form">
    <form name="Login" method="post" >
    <div class="formelement">
    <label> Topic : </label> 
    </div>
        <div class="formelement">
        <input type="text" class="textbox" name="topic" placeholder="Topic" required="required" />
    </div>  
      <div class="formelement">
      <label> Description: </label> 
    </div>
        <div class="formelement">
        <input type="textarea" class="textarea" name="desc" placeholder="Description" required="required" />
    </div>  
     <div class="formelement">
      <label> Topic Category: </label> 
    </div>
    <div class="formelement">
    <?php
    $store = "SELECT TTID, TopicType FROM TopicType";
    $result=$conn->query($store);
    echo "<select name='topictype'id='topictype' required='required'>";
    while($row =$result->fetch_assoc())
    {
      echo "<option value='".$row['TTID']."'>".$row['TopicType']."</option>";
    } 

     ?>
     </select>
    </div>
    <div class="formelement" >
    <input type="submit" name="Create" value ="Create" class="button" />
    </div>



    </form>

    </div>

<?php

  if(isset($_POST['Create']))
  {

  $topic=$_POST['topic'];
  $desc=$_POST['desc'];
  $ttid = $_POST['topictype'];

  $query = "INSERT INTO Topic VALUES('','$topic','$desc',0,NOW(),'$ttid','$uid')";
  if ($conn->query($query)===TRUE)
    {
    header('Location: category.php?id='.$ttid);
  }
  else
    ?> <script> alert('Error! Try again.')</script>
  <?php
}

include 'footer.php';
?>