<?php
$con=mysqli_connect("localhost","root","","braudeSite");
function cart()
{
	if(isset($_GET['add_cart']))
	{
		global $con;
		
		$pro_id=$_GET['add_cart'];
		$resulting = mysqli_query($con,"select * from users WHERE user_id='".$_SESSION['user']."'");
		while($row44 = mysqli_fetch_array($resulting))
		{
			$idder=$row44['user_id'];	
			$idder33=$row44['email'];
		}		
		$check_pro="select * from cart where p_id='$pro_id' AND user_idd='$idder' AND emailID='$idder33'";
		$runCheck=mysqli_query($con,$check_pro);
		if(mysqli_num_rows($runCheck)>0)
		{
			echo "";
		}
		else {
			$insertpro="INSERT INTO `cart`(`p_id`,`user_idd`,`emailID`) VALUES ('$pro_id','$idder','$idder33')";
			$run_pro=mysqli_query($con,$insertpro);
			echo "<script>window.open('home.php','_self')</script>";
			}
	}
}
function getcategory()
{
	global $con;
		$get_cats = "SELECT * from categories";
		$run_cats =mysqli_query($con,$get_cats);
		while($row_cats = mysqli_fetch_array($run_cats))
		{
			$cat_id=$row_cats['id'];
			$cat_title=$row_cats['title'];
			echo "<li><a href='home.php?cat=$cat_id'>$cat_title</a></li>";
		}
}

function getbrands()
{
	global $con;
		$get_brands = "SELECT * from brands";
		$run_brands =mysqli_query($con,$get_brands);
		while($row_brands = mysqli_fetch_array($run_brands))
		{
			$brand_id=$row_brands['id'];
			$brand_title=$row_brands['title'];
			echo "<li><a href='home.php?brand=$brand_id'>$brand_title</a></li>";
		}
}
function getPro()
{
	if(!isset($_GET['cat']))
	{	
		if(!isset($_GET['brand']))
		{
	global $con;
	$get_pro="select * from products order by RAND() LIMIT 0,6";
	$run_pro= mysqli_query($con,$get_pro);
	while($row_pro=mysqli_fetch_array($run_pro))
	{
		$pro_id=$row_pro['id'];
		$pro_cat=$row_pro['cat'];
		$pro_brand=$row_pro['brand'];
		$pro_title=$row_pro['title'];
		$pro_price=$row_pro['price'];
		$pro_image=$row_pro['image'];
		echo "
		<div id='single_product'>
			<h3>$pro_title</h3>
			<img src='photos/$pro_image' width='180' height='180' />
			<p><b> Price : $pro_price $ </b></p>	
			<a href='home.php?add_cart=$pro_id'><button style='float:left'>Order!</button></a>
		</div>
		";
	}	
		}
}
}
function getCategoryProduct()
{
	if(isset($_GET['cat']))
	{	
		$catId=$_GET['cat'];
	global $con;
	$get_catpro="select * from products where cat = '$catId'";
	$run_catpro= mysqli_query($con,$get_catpro);
	$countcat=mysqli_num_rows($run_catpro);
	
	if($countcat==0) // if we do not have any product in this category - if the Admin did not insert product for this category..
	{
		 echo "<h2>There is not product in this category !</h2>";
		exit();
	}
	while($row_cat_pro=mysqli_fetch_array($run_catpro))
	{
		$pro_id=$row_cat_pro['id'];
		$pro_cat=$row_cat_pro['cat'];
		$pro_brand=$row_cat_pro['brand'];
		$pro_title=$row_cat_pro['title'];
		$pro_price=$row_cat_pro['price'];
		$pro_image=$row_cat_pro['image'];
		
		echo "
		<div id='single_product'>
			<h3>$pro_title</h3>
			<img src='photos/$pro_image' width='180' height='180' />
			<p><b> $pro_price </b></p>
			<a href='home.php?add_cart=$pro_id'><button style='float:left'>Order!</button></a>
		</div>
		";
	}	
		}
}
function getBrandProduct()
{
	if(isset($_GET['brand']))
	{	
		$brandId=$_GET['brand'];
	global $con;
	$get_brandpro="select * from products where brand = '$brandId'";
	$run_brandpro= mysqli_query($con,$get_brandpro);
	$countbrand=mysqli_num_rows($run_brandpro);
	
	if($countbrand==0)
	{
		 echo "<h2>No products where found associated with this brand !</h2>";
		exit();
	}
	while($row_brand_pro=mysqli_fetch_array($run_brandpro))
	{
		$pro_id=$row_brand_pro['id'];
		$pro_cat=$row_brand_pro['cat'];
		$pro_brand=$row_brand_pro['brand'];
		$pro_title=$row_brand_pro['title'];
		$pro_price=$row_brand_pro['price'];
		$pro_image=$row_brand_pro['image'];
		
		echo "
		<div id='single_product'>
			<h3>$pro_title</h3>
			<img src='photos/$pro_image' width='180' height='180' />
			<p><b> $pro_price </b></p>
			<a href='home.php?add_cart=$pro_id'><button style='float:left'>Order!</button></a>
		</div>
		";
	}	
		}
}
?>