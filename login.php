<?php

session_start();
include 'dbc.php';
include 'header.php';
if(isset($_SESSION['UID']))
        {
          header('Location:home.php');  
        }
 ?>
<div class="form">
    <form name="Login" method="post" >
    <div class="formelement">
    <label> Enter Email : </label> 
    </div>
        <div class="formelement">
        <input type="text" class="textbox" name="email" placeholder="Enter your email here" required="required" />
    </div>  
      <div class="formelement">
      <label> Enter Password : </label> 
    </div>
        <div class="formelement">
        <input type="password" class="textbox" name="pass" placeholder="Enter your password here" required="required" />
    </div>  
    
    <div class="formelement" >
    <input type="submit" name="Login" value ="Login" class="button" />
    </div>



    </form>

    </div>

<?php

  if(isset($_POST['Login']))
  {

  $email=$_POST['email'];
  $pass=$_POST['pass'];

  $query = "SELECT * FROM user WHERE UEmail='$email' AND UPassword='$pass'";
  $result = mysqli_query($conn,$query);
  $row= $result->fetch_assoc();
  if (mysqli_num_rows($result) == 1)
  {
    $_SESSION['email'] = $email;
    $_SESSION['UID'] = $row['UID'];
    $_SESSION['name']= $row['UName'];
    $_SESSION['regdate'] = $row['UregDate'];
    $_SESSION['gender']= $row['USex'];
    $_SESSION['UTID'] = $row['UTID'];
    header('Location: home.php');
  }
  else
    ?> <script> alert('Email or Password is incorrect')</script>
  <?php
}

include 'footer.php';
?>