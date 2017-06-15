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
	$sql = " insert into user values(''.'$name','$pass','$email','$bday','$gender',now(),'$country','$statement')"
	if ($conn->query($sql)===TRUE)
		{
			header('Location:login.php');

		}
	else{
		echo "Error: ".$conn->error;
		echo"<script> Alert('Email already in use')</script>"
	}
	}



	if(isset($_POST['Login']))
	{

	$email=$_POST['email'];
	$pass=$_POST['pass'];

	$query = "Select * form user where UEmail='$email' and UPassword='$pass'";
	$result = mysqli_query($conn,$query);
	if (mysqli_num_rows(result) == 1)
	{
		$_SESSION['email'] = $user;
		header('Location: home.php');
	}



	if (isset($_POST['Update']))
	{
	$name=$_POST['name'];
	$pass=$_POST['pass'];
	$gender=$_POST['gender'];
	$country=$_POST['country'];
	$bday=$_POST['bday'];
	$statement=$_POST['statement'];
	$sql = "update user set UName='$name' , UPassword='$pass', USex='$gender', UCountry='$country' , UStatement = '$statement' where UID='$id'";
	if ($conn->query($sql) === TRUE)
	{
		header("Location: home.php")
	}
	}

	?>