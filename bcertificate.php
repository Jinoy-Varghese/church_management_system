<link href="fontawesome-free-5.11.2-web/css/all.min.css" rel=stylesheet>
<link rel="shortcut icon" type="image/png" href="images/eedge.png"/>
<head><title>eParish</title></head>
<?php
include("session.php");
?>
<html>
    <head>

        <style>
            
           table
           {
               border:15px solid black;
               border-style: double;
               border-spacing: 30px;
           }
           .head
           {
           text-align: center;
           }
            .content
            {
                
                font-size:15px;
                font-weight: bold;
                font-family: Arial, Helvetica, sans-serif;
            }
            @media print{
                .print 
                {
                    display:none;
                }
            }
        </style>
    </head>
    <body>
        <button onclick="window.print();return false;" class="print" style="border:0;padding:0;background:none;font-size:25px;cursor:pointer;margin-top:4vh;margin-left:88vw;position:absolute;">
        <i class="fas fa-print"> Print </i>
        
        </button>

        <div class=main>
            <center>
        <table>
            <tr><td>
                <div class="head">
        <h1 style="font-size:50px;font-family:algerian;">Certificate of Birth</h1><br>
        <img src=1.png style="width:155px; height:155px; margin-left:5px;">
        <h3 style="font-family:algerian;">Emmanuel Marthoma Church</h3>
        <h3 style="font-family:arial;"></h3>
        <h3 style="font-family:arial;">Mathra,Punalur</h3 style="font-family:arial;">
        <h2 style="font-family:algerian; font-weight: bold;">This is to Certify</h2>
    </div>
        <div class=content>
        <?php 
$v=$_GET['a'];
$sql="SELECT * FROM birth INNER JOIN family ON birth.id=family.num where birth.num='$v'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();



echo "<div class=name style='position:absolute;margin-left:90px;margin-top:-2px;'>".$row['bname']."</div>";




?>
 That ...............................................................................................................................<br><br>
 ........................................................................................................................................<br><br>
 <?php
 echo "<div class=name style='position:absolute;margin-left:140px;margin-top:-2px;'>".$row['so']."</div>";
?>
 son of ............................................................................................................................<br><br>
 <?php
 echo "<div class=name style='position:absolute;margin-left:180px;margin-top:-2px;'>".$row['date']."</div>";
?>
 was BAPTIZED on .......................................................................................................<br><br>
 <?php
 echo "<div class=name style='position:absolute;margin-left:140px;margin-top:-2px;'>".$row['family']."</div>";
?>
 into the ...............................................................................................................family<br><br>
 according to the rite of
 <h1 style="font-family: algerian; text-align:center">The Marthoma Church</h1>
 and in the name of Lord was certified by<br><br>


 <?php 
$v=$_GET['a'];
$sql="SELECT * FROM priest";
$result=$conn->query($sql);
$row=$result->fetch_assoc();



echo "<div class=name style='position:absolute;margin-left:290px;margin-top:18px;'>".$row['username']."</div>";




?>

 <h4 style="font-family: algerian; text-align: right;">Rev.................................................................................<br>
</h4>
 as appears from the Baptism Register of this Church.
 <br><br>
 <?php 
$v=$_GET['a'];
$sql="SELECT * FROM logs where num='$_GET[b]'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();



echo "<div class=name style='position:absolute;margin-left:67px;margin-top:18px;'>".$row['ldate']."</div>";




?>
<h3 style="font-family: algerian;">Date.......................................<br><br>
<?php

echo "<div class=name style='position:absolute;margin-left:165px;margin-top:-2px;'>".$_GET['b']."</div>";

?>
Application No .............
</h3>
<img src=ceil1.png style=width:100px;height:100px;position:absolute;margin-left:400px;margin-top:-100px; />
        </div>
    </td></tr>
    </table>
</center>
</div>
    </body>
</html>
