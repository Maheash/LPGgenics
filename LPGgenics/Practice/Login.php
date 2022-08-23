<?php 

session_start();

	include("connection.php");
	include("function.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($username) && !empty($password) && !is_numeric($username))
		{

			//read from database
			$query = "select * from users where username = '$username'";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] == $password)
					{

						$_SESSION['username'] = $user_data['username'];
						header("Location:index.php");
						die;
					}
				}
			}
		}
        else
		{
			echo "wrong username or password!";
		}
	}

?>



<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
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
            <h1><div style="color: blue;">Login module</div></h1>
            <label for="Username">Username</label>     
            <input id="text" type="text" name="user_name"><br><br>
            <label for="password">Password</label>    
            <input id="text" type="password" name="password"><br><br>

            <input id="button" type="Submit" name="Login"><br><br>

            <a style="color:blue;" href="signup.php">New user huh? then Signup!</a><br><br>
            <a style="color:blue;" href="index.php">Home</a>
        </form> 
        </div>
    </body>
</html>