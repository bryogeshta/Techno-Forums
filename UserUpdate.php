<?php

session_start();
include 'dbc.php';
include 'header.php';


if(!isset($_SESSION['UID']))
        {
          header('Location:login.php');  
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
        <textarea  class="textarea" name="desc" placeholder="Description" required="required"></textarea>
    </div>
    <div class="formelement" >
    <input type="submit" name="Register" value="Register" class="button" />
    </div>



    </form>
</div>


<?php



	if (isset($_POST['Update']))
	{
	$name=$_POST['name'];
	$pass=$_POST['pass'];
	$gender=$_POST['gender'];
	$country=$_POST['country'];
	$statement=$_POST['statement'];
	$sql = "update user set UName='$name' , UPassword='$pass', USex='$gender', UCountry='$country' , UStatement = '$statement' where UID='$id'";
	if ($conn->query($sql) === TRUE)
	{
		header("Location: home.php");
	}
	}

include 'footer.php';
	?>