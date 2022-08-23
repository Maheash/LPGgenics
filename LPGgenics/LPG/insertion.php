<?php
// $servername="http://sql6.freemysqlhosting.net/";

        $servername="localhost";
        $dbname="leakage";
        $username="root";
        $password="";
        $conn = new mysqli($servername, $username, $password, $dbname);

        
        if(!empty($_POST['value']) )
        {
        $value =500;
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "INSERT INTO `Leakage` (value) VALUES ('" . $value . "')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
    else {
        echo "Wrong API Key provided.";
    }

// else {
//     echo "No data posted with HTTP POST.";
// }

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>