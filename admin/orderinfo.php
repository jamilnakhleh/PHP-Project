<!DOCTYPE>
<?php 
include("connect/db.php");
?>
<html>
<head>
<title>ORDERS Info..</title>
</head>

<body style="background-image:url(../photos/download.jpg)">

<form action="orderinfo.php" method="post" enctype="multipart/form-data">
	<table align="center" width="700" border="2" >
	<tr align="center">
		<td colspan="7"><h2>Delete ALL Orders..</h2></td>
	</tr>
	<tr>
		<td align = "right"><b>Enter Email :</b></td>
		<td><input type="text" name="emailing" size="60" /></td>
		<td colspan="7"><input type="submit" name="deleteorder" value="DELETE ALL!"/></td>
	</tr>
	<tr align="center">
		<td colspan="7"><h2>Delete an Order..</h2></td>
	</tr>
	<tr>
		<td align = "right"><b>Enter ID :</b></td>
		<td><input type="text" name="idoneorder" size="60" /></td>
	</tr>
	<tr>
		<td align = "right"><b>Enter Email :</b></td>
		<td><input type="text" name="emailingoneorder" size="60" /></td>
		<td colspan="7"><input type="submit" name="deleteoneorder" value="DELETE ORDER!"/></td>
	</tr>
	<tr align="center">
		<td colspan="7"><h2>Show All Orders..</h2>
		<?php 
		$con=mysqli_connect("localhost","root","","braudeSite");
		$get_brandpro="select * from cart";
		$run_brandpro= mysqli_query($con,$get_brandpro);
			echo "<tr>";
			  echo "<td>Product Id</td>";
			   echo "<td>Email</td>";
			echo "</tr>";
		while($row_brand_pro=mysqli_fetch_array($run_brandpro))
		{
			global $con;
		$pro_id=$row_brand_pro['p_id'];
		$protitle=$row_brand_pro['emailID'];
		 echo "<tr>";
    echo "<td>$pro_id</td>";
    echo "<td>$protitle</td>";
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

//*************************************************************************************
if(isset($_POST['deleteoneorder']))
{
	global $con;
		$p2=$_POST['emailingoneorder'];
		$p3=$_POST['idoneorder'];
		 $insert3="DELETE FROM cart WHERE emailID='$p2' AND p_id='$p3'";
		 if (mysqli_query($con,$insert3))
	{
	  
	  echo "<script>window.open('orderinfo.php','_self')</script>";
	}
	else  {
	  echo "<script>window.open('orderinfo.php','_self')</script>";
	}
}
//*****************************************
	if(isset($_POST['deleteorder']))
	{
		global $con;
		$p=$_POST['emailing'];
		 $insert2="DELETE FROM cart WHERE emailID='$p'";
		 
	if (mysqli_query($con,$insert2))
	{
	 
	  echo "<script>window.open('orderinfo.php','_self')</script>";
	}
	else  
	 echo "<script>window.open('orderinfo.php','_self')</script>";
	}
?>