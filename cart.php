<!DOCTYPE>
<?php
include("functions/function.php");
?>
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
if(!isset($_SESSION['user']))
{
 header("Location: index.php");
}
$sql="SELECT * FROM users WHERE user_id='".$_SESSION['user']."'";
$res=mysqli_query($conn,$sql);
$userRow=mysqli_fetch_array($res);
?>
<html>
<head>
<title>Orders</title>
	<link rel="stylesheet" href="styles/style.css" media="all" />
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
			<?php echo $userRow['username']; ?><a href="logout.php?logout" style="color:yellow"> Sign Out </a> &nbsp;			
			<a href="home.php" style="color:yellow">Go to Home</a>
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
				<?php getbrands(); ?>
				</ul>
			</div>
			
			<div id="products_box">
			<br>
			<form action="" method="post" enctype="multipart/form-data">
				<table align="center" width="700px" >
				
				<tr align="center">
				<th>Remove</th>
				<th>Product(S)</th>
				</tr>
	<?php 
	$total = 0;
	global $con;
	$resulting2 = mysqli_query($con,"select * from users WHERE user_id='".$_SESSION['user']."'");
		while($row55 = mysqli_fetch_array ($resulting2))
		{
			$idder2=$row55['user_id'];						
	$sel_price="select p_id from cart where user_idd='$idder2'";
	$runPrice=mysqli_query($con,$sel_price);
	while($pPrice=mysqli_fetch_array($runPrice))
	{
		$pro_id=$pPrice['p_id'];
		
		$proPrice="select * from products where id='$pro_id'";
		$runProPrice=mysqli_query($con,$proPrice);
		while($ppPrice=mysqli_fetch_array($runProPrice))
		{
			//$productprice=array($ppPrice['price']);
			$productTitle=$ppPrice['title'];
			$productImage=$ppPrice['image'];
			$singlePrice=$ppPrice['price'];
			//$values=array_sum($productprice);
			//$total += $values;	
		}
	
				?>
				<tr align="center">
				<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"/></td>
				<td><?php echo $productTitle; ?><br>
				<img src="photos/<?php echo $productImage;?>" width="60" height="60"/></td>
				<td><?php echo $singlePrice." $"; ?></td>
				</tr>
	<?php }  ?>
		<?php } ?>
				<tr align="center">
					<td colspan="2"><input type="submit" name="DeleteOrder" value="Delete Order"/></td>
				</tr>
				</table>
			
			</form>
		
			<?php 
				global $con;
			if(isset($_POST['DeleteOrder']))
			{
				if(isset($_POST['remove']))
				{
				foreach($_POST['remove'] as $remove_id)
				{
					$deleteProduct="DELETE FROM cart where p_id = '$remove_id' AND emailID='$userRow[email]'";
					$runDelete=mysqli_query($con,$deleteProduct);
					if($runDelete)
					{
						echo "<script>window.open('cart.php','_self')</script>";
					}
					else  echo "<script>window.open('choose product to remove!')</script>";
				}
				}
				else  echo "<script>window.open('choose product to remove!')</script>";	
			}
			else echo "<script>window.open('choose product to remove!')</script>";
			?>
			</div>
			</div>
		     </div>
			 
			 <br><br><br><br><br><br><br><br><br><br><br>
	
</div>

</body>
</html>