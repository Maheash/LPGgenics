<?php 
session_start();

	include("connection.php");
	include("function.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
        
		$username = $_POST['username'];
		$password = $_POST['password'];
        $email= $_POST['email'];
        

		if(!empty($username) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$query = "insert into users (username,password,email) values ('$username','$password','$email')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sign-up</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">
            #text{
                width: 100%;
                height:25px;
                border-radius:5px;
                padding:4px;
                border: solid thin #aaa;
            }

            #button{
                background: blue;
                padding:10px;
                width:100px;
                color:white;
                border:none;
                border-radius:10px;;
            }

            #box{
                background-color : gold;
                margin: auto;
                width: 300px; 
                padding:20px;
                text-align:center;
            }
        </style>
    </head>
    <body>
        <div id="box">
        <form method="post" style="color:red;">
            <h1><div style="color: blue;">Sign-Up module</div></h1>
 
            <label for="Username">Username</label>     
            <input id="text" type="text" name="user_name"><br><br>
            <label for="password">Password</label>    
            <input id="text" type="password" name="password"><br><br>
            <label for="email">E-mail</label>
            <input id="text" type="email" name="email"><br><br>

            <input id="button" type="Submit" name="Sign Up"><br><br>

            <a style="color:blue;" href="login.php">If an existing user, then Login!</a><br><br>
            <a style="color:blue;" href="index.php">Home</a>

        </form> 
        </div>
    </body>
</html>