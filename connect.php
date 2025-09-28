<?php

//step 1

$servername="localhost";
$username="root";
$password="";
$database="career_institute_jhang";
//step 2

$conn= mysqli_connect($servername, $username, $password, $database);


//step 3
if(!$conn){

	die("Connection failed: ". 
		mysqli_connect_error());
}

echo "Your connection successful:";
?>