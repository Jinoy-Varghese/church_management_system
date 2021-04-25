<?php
include('session.php');
$_SESSION=array();
session_destroy();
header("location:loginform.php");
?>
