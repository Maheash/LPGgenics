<?php
include "dbconfig.php";
    if(isset($_POST['signup']))
    {
    $uname = $_POST['full'];
    $email=$_POST['email'];
    $upassword = $_POST['password'];
    $res = mysqli_query($con,"insert into users values('$uname','$email','$upassword');");
    if (!$res) {
        printf("Error: %s\n", mysqli_error($con));
        exit();
    }
    if($res)
    {
    echo "signed up ";
    header("location:index.php");   
        
    }
    else
    {
        echo "signed up failed ";
        header("location:index.php"); 
    }
    }
    ?>