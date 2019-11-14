<?php
session_start();
require 'dbconfig/config.php'
?>

<!DOCTYPE html>
<html>                                       
<head>
<title>Login Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#bdc3c7">
<a href="admin.php"><input type="button" id="admin_button" value="admin"/><br></a>
<div id="main-wrapper">
<center><h2>User Login </h2>
<img src="images/user.png" class="avatar"/>
</center>
<form class="myform" action="index.php" method="post">
<label><b>Username:</b></label><br>
<input name="username" type="text" class="inputvalues" placeholder="Type your username" required/>
<br>
<label><b>Password:</b></label><br>
<input name="password" type="password" class="inputvalues" placeholder="Type your password" required/><br>
<input name="login" type="submit" id="login_button" value="Login"/><br>
<a href="register.php"><input type="button" id="register_button" value="Register"/><br></a>

</form>

<?php
if(isset($_POST['login']))
{
	$admin=$_POST['admin'];
	$password=$_POST['password'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query = "select * from user WHERE username='$username' AND password='$password'";
	$query_run = mysqli_query($con,$query);
	if(mysqli_num_rows($query_run)>0)
	{
		//valid
		$_SESSION['id']=$id;
		$_SESSION['username']= $username;
		$_SESSION['password'] = $password;
		header('location:nova.php');
	}
	else
	{
		//invalid
		echo '<script type="text/javascript"> alert("invalid credentials") </script>';
	}		
}
?>

</div>

</body>
</html>