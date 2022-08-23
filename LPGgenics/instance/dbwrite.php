<?php
    $host = "localhost";		         // host = localhost because database hosted on the same server where PHP files are hosted
    $dbname = "leakage";              // Database name
    $username = "root";		// Database username
    $password = "";	        // Database password

// Establish connection to MySQL database
$conn = new mysqli($host, $username, $password, $dbname);

// Check if connection established successfully
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

else {
    echo "Connection: Success "; 
} 
// If values send by NodeMCU are not empty then insert into MySQL database table

  if(!empty($_POST['sendval']))
    {
		$val = $_POST['sendval'];

// Update your tablename here
	    $sql = "INSERT INTO `value` (`value`) VALUES ('$val')"; 


		if ($conn->query($sql) === TRUE) {
		    echo "\nValues inserted into MySQL database table.";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
// Close MySQL connection
$conn->close();
?>
