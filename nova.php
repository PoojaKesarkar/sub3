<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<title>Home Page</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel='stylesheet' href='css/nova.css'>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#bdc3c7">
<nav id="navbar" class="nav" >

<ul class="nav-list" >
<li>
<a href="Estimate.php">Estimate</a>
</li>
<li>
<a href="enter.php">Events</a>
</li>
<li>
<a href="#welcome-section">About</a>
</li>
<li>
<a href="#projects">Work</a>
</li>
<li>
<a href="#contact">Contact</a>
</li>
<li>
<a href="profile.php">Profile</a>
</li>
<li>
<form  action="index.php" method="post">

<input name="logout" type="submit" id="logout_button" style="width:80px" value="Log Out"/><br>

</form>
</li>
</ul>

</nav>
<section id="welcome-section" class="welcome-section">
<h1>Trisha's events</h1>
<p>your manager</p>

</section>

<section id="projects" class="projects">
<center>
<h2><u><b>This is our work</b></u></h2></center>
<div class="compart">
<div class="pics">
<img src="images/images (4).jpeg">
</div>
</div>
<div>

<?php 
if(isset($_POST['logout']))
{
session_destroy();
header('location:index.php');
}
?>


</div>
</section>

<section id="contact" class="contact">
<h1>contact us</h1>

<div>
<a href="https://github.com/PoojaKesarkar" target="_blank" id="profile-link">
<i class="icon-twitter"></i> icon-twitter</i>
GitHub
</a>

</div>
</section>


</body>
</html>