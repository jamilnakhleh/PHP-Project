<!DOCTYPE>
<?php 
include("connect/db.php");
?>
<html>
<head>
<title>Products Info..</title>
</head>

<body style="background-image:url(../photos/download.jpg)">

<form action="productinfo.php" method="post" enctype="multipart/form-data">
	<table align="center" width="700" border="2" >
	<tr align="center">
		<td colspan="7"><h2>Insert New Post Here..</h2></td>
	</tr>
	<tr>
	<td align = "right"><b>Enter Id Product:</b></td>
		<td><input type="text" name="idPro2" size="60" /></td>
	</tr>
	<tr>
		<td align = "right"><b>Product Title :</b></td>
		<td><input type="text" name="title" size="60" /></td>
	</tr>
	<tr>
		<td align = "right"><b>Product Category :</b></td>
		<td>
		<select name="cat">
		<option>Select a Category</option>
		<?php 
		$get_cats = "select * from categories";
		$run_cats =mysqli_query($con,$get_cats);
		while($row_cats = mysqli_fetch_array($run_cats))
		{
			$cat_id=$row_cats['id'];
			$cat_title=$row_cats['title'];
			echo "<option value='$cat_id'>$cat_title</a></option>";
		}		
		?>
		</select>
		</td>
	</tr>
	<tr>
		<td align = "right"><b>Product Brand :</b></td>
		<td>
		<select name="brand">
		<option>Select a brands</option>
		<?php 
		$get_brands = "select * from brands";
		$run_brands =mysqli_query($con,$get_brands);
		while($row_brands = mysqli_fetch_array($run_brands))
		{
			$brand_id=$row_brands['id'];
			$brand_title=$row_brands['title'];
			echo "<option value='$brand_id'>$brand_title</a></option>";
		}
		?>
		</select>		
		</td>
	</tr>
	<tr>
		<td align = "right"><b>Product Image :</b></td>
		<td><input type="file" name="image"/></td>
	</tr>
	<tr>
		<td align = "right"><b>Product Price :</b></td>
		<td><input type="text" name="price"/></td>
	</tr>
	<tr>
		<td align = "right">Product Description : </td>
		<td><textarea name="desc" cols="20" rows="10"></textarea></td>
	</tr>
	
	<tr align ="center">
		<td colspan="7"><input type="submit" name="insertpost" value="Insert product!"/>
		<input type="submit" name="updatePro" value="Update Title!"/>
		</td>	
	</tr>
	<tr align="center">
		<td colspan="7"><h2>Delete Product..</h2>
	</tr>
	<td align = "right"><b>Enter Id Product:</b></td>
		<td><input type="text" name="idPro" size="60" /></td>
<td colspan="7"><input type="submit" name="deletePro" value="delete Product!"/></td>
	</table>
	<table align="center" width="700" border="2">
	<tr align="center">
		<td colspan="7"><h2>Show All Products..</h2>
		<?php 
		$con=mysqli_connect("localhost","root","","braudeSite");
		$get_brandpro="select * from products";
		$run_brandpro= mysqli_query($con,$get_brandpro);
			echo "<tr>";
			  echo "<td>Id</td>";
			   echo "<td>Title</td>";
			   echo "<td>Category</td>";
			   echo "<td>Brands</td>";
			   echo "<td>Price</td>";
			   echo "<td>Description</td>";
			  // echo "<td>Image</td>";
			echo "</tr>";
		while($row_brand_pro=mysqli_fetch_array($run_brandpro))
		{
			global $con;
		$pro_id=$row_brand_pro['id'];
		$protitle=$row_brand_pro['title'];
		$procat=$row_brand_pro['cat'];
		$probrand=$row_brand_pro['brand'];
		$proprice=$row_brand_pro['price'];
		$prodesc=$row_brand_pro['desc'];
		//$proimage=$_FILES['image']['name'];
		 echo "<tr>";
    echo "<td>$pro_id</td>";
    echo "<td>$protitle</td>";
	 echo "<td>$procat</td>";
	  echo "<td>$probrand</td>";
	   echo "<td>$proprice</td>";
	    echo "<td>$prodesc</td>";
	//	 echo "<td>$proimage</td>";
    echo "</tr>\n";
		}
		?> 
		</td>
	</tr>
	</table>
</form>

</body>
</html>
<?php
	if(isset($_POST['updatePro']))
	{
		global $con;
		$protitle=$_POST['title'];
		$procat=$_POST['cat'];
		$probrand=$_POST['brand'];
		$proprice=$_POST['price'];
		$prodesc=$_POST['desc'];
		$proimage=$_FILES['image']['name'];
		$proimagetmp=$_FILES['image']['tmp_name'];
		move_uploaded_file($proimagetmp,"photos/$proimage");
		$idproducter=$_POST['idPro2'];
		
			 $insert="UPDATE `products` SET `title`='$protitle',`cat`='$procat',`brand`='$probrand',`title`='$protitle',`price`='$proprice',`desc`='$prodesc',`image`='$proimage' WHERE id='$idproducter'";
	if (mysqli_query($con,$insert))
	{
	  echo "<script>window.open('productinfo.php','_self')</script>";
	}
	else  
	  echo "<script>window.open('productinfo.php','_self')</script>";
	}
	//*********************************
	if(isset($_POST['deletePro']))
	{
		global $con;
		$idderz=$_POST['idPro'];
		 $insert="DELETE FROM `products` WHERE id='$idderz'";
	if (mysqli_query($con,$insert))
	{
	  echo "<script>window.open('productinfo.php','_self')</script>";
	}
	else  
	  echo "<script>window.open('productinfo.php','_self')</script>";
	}
	//***********************************************
	if(isset($_POST['insertpost']))
	{
		$protitle=$_POST['title'];
		$procat=$_POST['cat'];
		$probrand=$_POST['brand'];
		$proprice=$_POST['price'];
		$prodesc=$_POST['desc'];
		$proimage=$_FILES['image']['name'];
		$proimagetmp=$_FILES['image']['tmp_name'];
		move_uploaded_file($proimagetmp,"photos/$proimage");	
		 $insert="INSERT INTO `products`(`id`, `cat`, `brand`, `title`, `price`, `desc`, `image`)  values ('null','$procat','$probrand','$protitle','$proprice','$prodesc','$proimage')";
	if (mysqli_query($con,$insert))
	{
	  echo "<script>window.open('productinfo.php','_self')</script>";
  }
	}
?>