<?php 
include("functions/function.php");
?>
<?php 
$conn = mysqli_connect("localhost","root","");
$dbb=mysqli_select_db($conn,"braudeSite");
?>
<?php
session_start();

$idletime=1000;//after 10 seconds the user gets logged out

 if(!isset($_COOKIE[$_SESSION['one']])) {
     session_destroy();
    session_unset();
	header("Location: home.php");
} 

////////*****************************/ aen tsore5
/*
if (time()-$_SESSION['timestamp']<$idletime){
    session_destroy();
    session_unset();
}else{
    $_SESSION['timestamp']=time();
}*/
	////////////////////////////////////////
if(!isset($_SESSION['user']))
{
 header("Location: index.php");
}
$sql="SELECT * FROM users WHERE user_id='".$_SESSION['user']."'";
$res=mysqli_query($conn,$sql);
$userRow=mysqli_fetch_array($res);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to SOFTBraude- <?php echo $userRow['username']; ?></title>
<link rel="stylesheet" href="styles/style.css" type="text/css" />
</head>
<body>

	<div class="main_wrapper">
	<div class="header_wrapper">
			<a href="home.php"><img id="logo" src="photos/logo2.png"/></a>
			<img id="banner" src="photos/banner2.jpg"/>
		</div>
		<br><br>
		<div class="">
			<ul id="menu">
				<div id="shopping_cart">
			<span style="float:left">Welcome 
			<?php echo $userRow['username']; ?><a href="logout.php?logout" style="color:red"> Sign Out </a> &nbsp;			
			<a href="cart.php" style="color:red">Go to Orders</a> &nbsp;			
			<a href="contact.php" style="color:red">Contact Us</a>
			</div>
			</ul>
		</div>
		<div class="content_wrapper" style="float:left">
		     <div id="sidebar">
				<div id="sidebar_title">Categories</div>
				<ul id="cats">
				<?php getcategory(); ?>
				</ul>
				<div id="sidebar">
				<div id="sidebar_title">Brands</div>
				<ul id="cats">
				<?php getbrands();?>
				</ul>
			</div>
			<div id="content_area">
			<?php cart(); ?>
			</div>
		     </div>
		<div id="products_box">
			<?php getPro(); ?>
			<?php getCategoryProduct(); ?>
			<?php getBrandProduct(); ?>
			</div>
</div>
</div>
</body>
</html>