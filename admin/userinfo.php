<!DOCTYPE>
<?php 
include("connect/db.php");
?>
<html>
<head>
<title>User Info..</title>
</head>

<body style="background-image:url(../photos/download.jpg)">

<form action="userinfo.php" method="post" enctype="multipart/form-data">
	<table align="center" width="700" border="2" >
	<tr align="center">
		<td colspan="7"><h2>Delete a User..</h2></td>
	</tr>
	<tr>
		<td align = "right"><b>Enter Email :</b></td>
		<td><input type="text" name="email" size="60" /></td>
	</tr>
	<tr align ="center">
		<td colspan="7"><input type="submit" name="deletepost" value="delete user!"/>
		</td>
	</tr>
	<tr align="center">
		<td colspan="7"><h2>Update UserName && Password..</h2></td>
	</tr>
	<tr>
		<td align = "right"><b>UserName :</b></td>
		<td><input type="text" name="usname" size="60" /></td>
	</tr>
	<tr>
		<td align = "right"><b>Email :</b></td>
		<td><input type="text" name="email2" size="60" /></td>
	</tr>
	<tr>
		<td align = "right"><b>Password :</b></td>
		<td><input type="text" name="pass" size="60" /></td>
	</tr>
	<tr align ="center">
		<td colspan="7"><input type="submit" name="updatepost" value="update user!"/>
		</td>
	</tr>
	<tr align="center">
		<td colspan="7"><h2>Add New User..</h2></td>
	</tr>
	<tr>
		<td align = "right"><b>New UserName :</b></td>
		<td><input type="text" name="newusname" size="60" required /></td>
	</tr>
	<tr>
		<td align = "right"><b>New Email :</b></td>
		<td><input type="email" name="newemail" size="60" required /></td>
	</tr>
	<tr>
		<td align = "right"><b>New Password :</b></td>
		<td><input type="password" name="newpass" size="60" required /></td>
	</tr>
	<tr align ="center">
		<td colspan="7"><input type="submit" name="addpost" value="Add user!"/>
		</td>
	</tr>
	</table>
	<table align="center" width="700" border="2">
	<tr align="center">
		<td colspan="7"><h2>Show All Users..</h2>
		<?php 
		$con=mysqli_connect("localhost","root","","braudeSite");
		$get_brandpro="select * from users";
		$run_brandpro= mysqli_query($con,$get_brandpro);
			echo "<tr>";
			  echo "<td>UserName</td>";
			   echo "<td>Email</td>";
			   echo "<td>Password</td>";
			echo "</tr>";
		while($row_brand_pro=mysqli_fetch_array($run_brandpro))
		{
			global $con;
		$pro_User=$row_brand_pro['username'];
		$pro_Email=$row_brand_pro['email'];
		$pro_PASS=$row_brand_pro['password'];
		 echo "<tr>";
    echo "<td>$pro_User</td>";
    echo "<td>$pro_Email</td>";
	 echo "<td>$pro_PASS</td>";
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
	if(isset($_POST['deletepost']))
	{
		$p=$_POST['email'];	 
		 $insert2="DELETE FROM cart WHERE emailID='$p'";
		 
		 $insert="DELETE FROM `users` WHERE email='$p'";
	if (mysqli_query($con,$insert) && mysqli_query($con,$insert2))
	{
	  echo "<script>window.open('userinfo.php','_self')</script>";
	}
	else  
	 echo "<script>window.open('userinfo.php','_self')</script>";
	}
	//******************************
	if(isset($_POST['updatepost']))
	{
		$username=$_POST['usname'];
		$email2=$_POST['email2'];	
		$pass=$_POST['pass'];
		 $insert="UPDATE users SET password='$pass',username='$username' WHERE email='$email2'";
	if (mysqli_query($con,$insert))
	{
	  echo "<script>window.open('userinfo.php','_self')</script>";
	}
	else  
		echo "<script>window.open('userinfo.php','_self')</script>";
	}
	/********************************/
	if(isset($_POST['addpost']))
{
 $uname333 = mysqli_real_escape_string($con,$_POST['newusname']);
 $email333 = mysqli_real_escape_string($con,$_POST['newemail']);
 $pass333 = mysqli_real_escape_string($con,$_POST['newpass']);
 
 if(mysqli_query($con,"INSERT INTO users(username,email,password) VALUES('$uname333','$email333','$pass333')"))
 {
        echo "<script>alert('successfully registered')</script>";   
 }
 else
 {
       echo" <script>alert('error while registering you...')</script>";    
 }
}
?>