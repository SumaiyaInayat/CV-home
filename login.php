<?php   
	$servername = "localhost";
    $username = "root";
    $password ="";
    $dbname = "database";
    $conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
        die("connection failed:" . $conn->connect_error);
    }
session_start();
if(isset($_POST["login"])){
    $username=mysqli_real_escape_string($conn,$_POST["uname"]);
    $password=mysqli_real_escape_string($conn,$_POST["password"]);
    $user=mysqli_query($conn,"SELECT username from users where username='$username' AND password='$password'");
    if(mysqli_num_rows($user)>0){
        $row=mysqli_fetch_assoc($user);
        $_SESSION['username']=$row['uname'];
        echo "<script>window.location.href='index.html';</script>";
    }
    else{
        echo "<script>alert(\"Login details are incorrect. Please try again.\");
        window.location.href='login.php';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	
		<div class="login-content">
			<form action="" method="post">
				<img src="avatar.png">
				<h2 class="title">Log In</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" name="uname" required="required">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="password" required="required">
            	   </div>
            	</div>
            	<a href="#">Forgot Password?</a>
            	<input type="submit" class="btn" value="Login" name="login">
                <p class="text">Don't have an account?  <a href="signup.html" >Sign Up</a></p>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="main.js"></script>
</body>
</html>
