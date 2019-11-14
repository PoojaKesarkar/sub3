<?php
session_start();
require 'dbconfig/config.php'
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin login page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#bdc3c7">
<div id="main-wrapper">
<h2>Admin login</h2></center>
<form class="myform" action="admin.php" method="post">
<label><b>Admin:</b></label><br>
<input name="admin" type="text" class="inputvalues" placeholder="Type your admin name" required/>
<br>
<label><b>Password:</b></label><br>
<input name="password" type="password" class="inputvalues" placeholder="Type your password" required/><br>
<input name="login" type="submit" id="login_button" value="Login"/><br>
</form>
<?php
if(isset($_POST['login']))
{
	$admin=$_POST['admin'];
	$password=$_POST['password'];
	$query = "select * from admin WHERE admin='$admin' AND password='$password'";
	$query_run = mysqli_query($con,$query);
	if(mysqli_num_rows($query_run)>0)
	{
		//valid
		$_SESSION['admin']= $uadmin;
		header('location:adminhome.php');
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


