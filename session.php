<?php
include('config.php');
session_start();

if(!isset($_SESSION["loggedin"])||$_SESSION["loggedin"]!=true)
{
    
if($_SESSION['type']=="admin")
{
    header("location:welcome.php");
}
else if($_SESSION['type']=="user")
{
    header("location:welcome2.php");
}
else if($_SESSION['type']=="sub")
{
    header("location:welcome3.php");
}
else
{
    header("location:loginform.php");
}




}
?>

