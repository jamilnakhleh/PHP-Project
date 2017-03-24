<?php
session_start();

if(!isset($_SESSION['user']))
{
 header("Location: index.php");
}
else if(isset($_SESSION['user'])!="")
{
 header("Location: home.php");
}
if(isset($_GET['logout'])) // aza kabasna 3al sign out az mnerja3 lal home page wen el sign in .. session is done!!!!!!
{
 session_destroy();
 unset($_SESSION['user']);
 header("Location: index.php");
}
?>