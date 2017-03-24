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
if(isset($_POST['btn-login']))
{
 $email = mysqli_real_escape_string($conn,$_POST['email']);
 $upass = mysqli_real_escape_string($conn,$_POST['pass']);
 $res=mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
 $row=mysqli_fetch_array($res);
 if($row['password']==$upass)
 {
  $_SESSION['user'] = $row['user_id'];
  //$_SESSION['timestamp']=1000;
$cookie_name = "user";
$cookie_value = "value";
$_SESSION['one']= $cookie_name; // we have SESSIONS for COOKIES !!!!!
$_SESSION['two']= $cookie_value;
setcookie($cookie_name, $cookie_value, time() + (60), "/");
  header("Location: home.php");
 }
 else
 {
  ?>
        <script>alert('wrong details');</script>
        <?php
 } 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" href="styles/style.css" type="text/css" />
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SOFTBraude - HomePage</title>
<link rel="stylesheet" href="styles/style.css" type="text/css" />
</head>
<body>
<center>
<img src="photos/wel.jpg" width="600" height="200"/>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="email" placeholder="Your Email" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-login">Sign In</button></td>
</tr>
<tr>
<td><a href="register.php">Sign Up Here</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>