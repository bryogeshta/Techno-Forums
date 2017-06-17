<?php

session_start();
include 'dbc.php';
include 'header.php';

if(isset($_SESSION['UID']))
        {
          header('Location:home.php');  
        }
 ?>


<div class="form" >
    <form name="Register" method="post" >
    <div class="formelement">
    <label>  Name : </label> 
    </div>
        <div class="formelement">
        <input type="text" class="textbox" name="name" placeholder="Enter your name here" required="required" />
    </div>  
      <div class="formelement">
      <label> Enter Password : </label> 
    </div>
        <div class="formelement">
        <input type="password" class="textbox" name="pass" placeholder="Enter your password here" required="required" />
    </div>  
    <div class="formelement">
    <label> Retype Password : </label> 
    </div>
        <div class="formelement">
        <input type="password" class="textbox" name="pass" placeholder="Enter your password again" required="required" />
    </div>  
      <div class="formelement">
      <label>  Birthday : </label> 
    </div>  
      <div class="formelement">
      <input type="text" id="timepicker" class="textbox" name="birthday"  required="required" />
    </div>  

      <div class="formelement">
      <label>  Email : </label> 
    </div>  
      <div class="formelement">
      <input type="text" class="textbox" name="email" placeholder="Enter your Email here" required="required" />
    </div>  
      <div class="formelement">
      <label>  Gender : </label>  
      </div>
      <div class="formelement"> 
     <select type="text" name="gender" required="required" >
        <option>M</option>
        <option>F</option>
        </select>
    </div>  
      <div class="formelement">
      <label>  Country : </label> 
    </div>
       <div class="formelement">
       <input type="text" class="textbox" name="country" id="countrypicker" required="required" /> 
    </div> 
       <div class="formelement">
       <label> About Yourself: </label> 
    </div> 
       <div class="formelement">
       <input type="textarea" class="textarea" name="statement" required="required" >
    </div> 
    <div class="formelement" >
    <input type="submit" name="Register" value="Register" class="button" />
    </div>



    </form>
</div>

<?php



if(isset($_POST['Register']))
  {

  $name=$_POST['name'];
  $pass=$_POST['pass'];
  $email=$_POST['email'];
  $gender=$_POST['gender'];
  $country=$_POST['country'];
  $bday=$_POST['bday'];
  $statement=$_POST['statement'];
  $name=$_POST['name'];
  $sql = " INSERT INTO user VALUES('','$name','$pass','$email','$bday','$gender',NOW(),'$country','$statement')";
  if ($conn->query($sql)===TRUE)
    {
      header('Location:login.php');

    }
  else{

    ?><script> Alert('Email already in use')</script>"
    <?php
  }
  }
include 'footer.php';
?>