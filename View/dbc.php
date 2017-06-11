<?php

$conn = mysqli_connect("localhost", "root", "", "techno"); //creating a connection to connect tp databse

if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());	
}

?>