<?php 
$conn = mysqli_connect("localhost","root","");
$dbb=mysqli_select_db($conn,"braudeSite");
?>
<?php
session_start();
if(isset($_SESSION['user'])!="")
{
 header("Location: home.php");
}
if(isset($_POST['btn-signup']))
{
 $uname = mysqli_real_escape_string($conn,$_POST['uname']);
 $email = mysqli_real_escape_string($conn,$_POST['email']);
 $upass = mysqli_real_escape_string($conn,$_POST['pass']);
 
 if(mysqli_query($conn,"INSERT INTO users(username,email,password) VALUES('$uname','$email','$upass')"))
 {
  ?>
				 <script>alert('successfully registered ');</script>
        <?php

		 	header("Location: home.php");	
 }
 else
 {
  ?>
        <script>alert('error while registering you...');</script>
        <?php
 }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<link rel="stylesheet" href="styles/style.css" type="text/css" />
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SOFTBraude - Registration</title>
<link rel="stylesheet" href="styles/style2.css" type="text/css" />

</head>
<body style="background-image:url(photos/web.jpg)">
<center>
<img src="photos/reg.jpg" width="400" height="150"/>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="uname" placeholder="User Name" required /></td>
</tr>
<tr>
<td><input type="email" name="email" placeholder="Your Email" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-signup">Sign Me Up</button></td>
</tr>
<tr>
<td><a href="index.php">Sign In Here</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>