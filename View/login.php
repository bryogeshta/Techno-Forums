<?php
//signup.php
include 'dbc.php';
include 'header.php';
 ?>
<div id="form">
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
        <input type="passwrod" class="textbox" name="pass" placeholder="Enter your password here" required="required" />
    </div>  
    <div class="formelement">
    <label> Retype Password : </label> 
    </div>
        <div class="formelement">
        <input type="passwrod" class="textbox" name="pass" placeholder="Enter your password again" required="required" />
    </div>  
      <div class="formelement">
      <label>  Birthday : </label> 
    </div>  
      <div class="formelement">
      <input type="text" id="timepicker" name="birthday"  required="required" />
    </div>  

      <div class="formelement">
      <label>  Email : </label> 
    </div>  
      <div class="formelement">
      <input type="text" class="textbox" name="Email" placeholder="Enter your Email here" required="required" />
    </div>  
      <div class="formelement">
      <label>  Gender : </label>   
     <select type="text" name="gender" required="required" >
        <option>M</option>
        <option>F</option>
        </select>
    </div>  
      <div class="formelement">
      <label>  Country : </label> 
    </div>
       <div class="formelement">
       <input type="text" id="countrypicker" required="required" /> 
    </div> 
       <div class="formelement">
       <label> About Yourself: </label> 
    </div> 
       <div class="formelement">
       <input type="Textbox" required="required" >
    </div> 



    </form>

    </div>

<?php
include 'UserController.php';
include 'footer.php';
?>