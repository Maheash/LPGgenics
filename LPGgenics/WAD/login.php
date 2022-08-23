<?php
include "dbconfig.php";
    if(isset($_POST['login']))
    {
    $uname = $_POST['email'];
    $upassword = $_POST['password'];
    $res = mysqli_query($con,"select * from users where email='$uname'and password='$upassword'");
    // if (!$res) {
    //     printf("Error: %s\n", mysqli_error($con));
    //     exit();
    // }
    $result=mysqli_fetch_array($res,MYSQLI_NUM);
    if($result)
    {
    echo "You are login Successfully ";
    header("location:dashboard.html");   
        
    }
    else
    {
        echo "failed ";
        header("location:index.php"); 
    }
    }
    ?>