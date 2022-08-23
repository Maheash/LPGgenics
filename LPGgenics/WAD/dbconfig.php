<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lpg";


//connect to db
$con = new mysqli($servername, $username, $password, $dbname);
// check connnection 
if($con->connect_error) {
	die("connection failed: ".$con->connect_error);
}
?>