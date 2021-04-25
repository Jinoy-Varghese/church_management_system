<?php
include "session.php";
$chat=$_POST['chat'];
$name=$_SESSION['username'];
if(!empty($chat))
{
$sql="INSERT INTO chat(chat,name) VALUES('$chat','$name');";
$conn->query($sql);
}
?>