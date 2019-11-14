<?php
 define('DB_SERVER', 'localhost:3325');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'samplelogindb');
   $connect = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

?>

<!DOCTYPE html>
<html>                                       
<head>
<title>Login Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#bdc3c7">
<div id="main-wrapper">
<center><h2>Login Form</h2>
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
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query = "select * from user WHERE username='$username' AND password='$password'";
	$query_run = mysqli_query($con,$query);
	if(mysqli_num_rows($query_run)>0)
	{
		//valid
		$_SESSION['username']= $username;
		header('location:nova.html');
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