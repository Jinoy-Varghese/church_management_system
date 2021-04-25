<meta http-equiv="refresh" content="2.5">
<script src=jquery.txt></script>
<script>




$(document).ready(function(){
    window.scrollTo(0,document.body.scrollHeight);
  });





</script>
<?php
include "session.php";





 $sql="SELECT * FROM chat";
 $result=$conn->query($sql);




 if($result->num_rows>0)
 {
    
     while($row=$result->fetch_assoc())
     {

        if($row["name"]==$_SESSION['username'])

        {
            echo "<div class=message style=float:right;background-color:#bbbbff;><font size=2 color=#darkorange>".substr($row["name"],0,strpos($row["name"],"@"))."</font><p style=margin:3px;>".$row["chat"]."</p></div>";
        }
        else
        {
            echo "<div class=message style=background-color:#99ccff;float:left;><font size=2 color=#darkorange>".substr($row["name"],0,strpos($row["name"],"@"))."</font><p style=margin:3px;>".$row["chat"]."</p></div>";
        }
     }

 }
 else
 {
     echo "<center>no chat history available<center>";
 
 }


?>
<style>
.message 
{
    
    margin:5px;
    width:72%;
    border-radius:10px;
    padding:5px;
    color:black;
   
}



</style>