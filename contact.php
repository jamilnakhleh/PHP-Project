<?php 
$conn = mysqli_connect("localhost","root","");
$dbb=mysqli_select_db($conn,"braudeSite");
?>
<?php 
session_start();/*
if(!isset($_COOKIE[$_SESSION['one']])) {
     session_destroy();
    session_unset();
	header("Location: home.php");
} */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<link rel="stylesheet" href="styles/style.css" type="text/css" />
<body>
<br/><br/>
<form align ="center" action="contact.php" method="post">
<p><b>Your Name:</b> <input type="text" name="yourname" /><br/><br/>
<b>Subject:</b> <input type="text" name="subject" /><br /><br/>
<b>E-mail:</b> <input type="text" name="email" /><br /><br/>
<p><b>Your comments:</b><br /><br/>
<textarea name="comments" rows="10" cols="40"></textarea></p>
<p><input type="submit" value="Send it!"></p>
<p> </p>
<p><a href="home.php">Go To Home</a></p>
</form>
</body>
</html>