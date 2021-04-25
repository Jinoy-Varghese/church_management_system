<link href="fontawesome-free-5.11.2-web/css/all.min.css" rel=stylesheet>
<link rel="shortcut icon" type="image/png" href="images/eedge.png"/>
<script src=jquery.txt></script>

<?php
include "session.php";
if($_SESSION['type']!="user")
{
    header("location:loginform.php");
}
?>


<script>


$(document).ready(function(){
    $("#member").click(function(){
$("#frm1").addClass("show");
$("#frm2").removeClass("show");
$("#frm3").removeClass("show");
$("#frm4").removeClass("show");
$("#frm5").removeClass("show");
$("#frm6").removeClass("show");
    });

    $("#church").click(function(){
$("#frm2").addClass("show");
$("#insbox2").addClass("insbox2");
$("#frm1").removeClass("show");
$("#frm3").removeClass("show");
$("#frm4").removeClass("show");
$("#frm5").removeClass("show");
$("#frm6").removeClass("show");
    });

    $("#birth").click(function(){
$("#frm3").addClass("show");
$("#frm1").removeClass("show");
$("#frm2").removeClass("show");
$("#frm4").removeClass("show");
$("#frm5").removeClass("show");
$("#frm6").removeClass("show");
    });


    $("#death").click(function(){
$("#frm4").addClass("show");
$("#frm1").removeClass("show");
$("#frm2").removeClass("show");
$("#frm3").removeClass("show");
$("#frm5").removeClass("show");
$("#frm6").removeClass("show");
    });

    $("#wedding").click(function(){
$("#frm5").addClass("show");
$("#frm1").removeClass("show");
$("#frm2").removeClass("show");
$("#frm3").removeClass("show");
$("#frm4").removeClass("show");
$("#frm6").removeClass("show");
    });

    $("#certificate").click(function(){
$("#frm6").addClass("show");
$("#frm1").removeClass("show");
$("#frm2").removeClass("show");
$("#frm3").removeClass("show");
$("#frm4").removeClass("show");
$("#frm5").removeClass("show");
    });






    $("#chat").click(function(){
$("#cbox").addClass("show");
    });


    $("#close").click(function(){
$("#cbox").removeClass("show");
    });




    $("#submit").click(function(){
    var chat=$("#msg").val();
    $.post("submitchat.php",{chat:chat},
    function(data)
    {
    $('#chatform')[0].reset();
    });
    });






});
</script>




<html>
<head><title>eParish</title></head>
<body>
<div class=stickify>
<a href=welcome2><div class=home><i class="fas fa-home"></i>&nbsp;HOME</div></a>
<a href=insert2><div class=insert><i class="fas fa-edit"></i>&nbsp;EDIT</div></a>
<a href=view2><div class=view><i class="fas fa-eye"></i>&nbsp;VIEW</div></a>
<a href=settings2><div class=logout><i class="fas fa-cog"></i> &nbsp; SETTINGS</div></a>
</div>
<div class=leftstick>
<div class=member id=member>&nbsp;&nbsp;USER&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-users"></i></div>
<div class=church id=church>&nbsp;&nbsp;IMAGES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-images"></i></div>
<div class=birth id=birth>&nbsp;&nbsp;BIRTH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-birthday-cake"></i></div>
<div class=death id=death>&nbsp;&nbsp;DEATH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-book-dead"></i></div>
<div class=wedding id=wedding style=font-size:20.39px;>&nbsp;&nbsp;WEDDINGS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-hand-holding-heart" style=font-size:27px;></i></div>
<div class=wedding id=certificate style=font-size:20.0px;>&nbsp;CERTIFICATE&nbsp;&nbsp;&nbsp;<i class="fas fa-FILE-ALT" style=font-size:27px;></i></div>

</div>
<div class=box>

<div class="insbox1 hide" id=frm1> 
<div class=in>
<?php
$sql="SELECT * FROM family";
$result=$conn->query($sql);
if($result->num_rows>0)
{
    $i=1;
    echo "<table border=0 class=table style=width:100%;>";
    echo "<tr><th>NO:</th><th>FAMILY_NAME</th><th>MEMBER</th><th>MEMBER_ NAMES</th><th>PHONE_NUMBER</th><th>HEAD</th><th>JOIN_DATE</th></tr>";
    while($row=$result->fetch_assoc())
    {
     echo "<tr><td>".$i."</td><td>".ucfirst($row["family"])."</td><td>".$row["members"]."</td><td>".$row["membername"]."</td><td>".$row["phno"]."</td><td>".ucfirst($row["owner"])."</td><td>".date('d-m-Y',strtotime($row["jd1"]))."</td></tr>";
    $i++;
    }
    echo "</table>" ;
}
else
{
    echo "0 rows available";
}
?>

</div>


</div>



<div class="insbox1 hide" id=frm2> 
<div class=in>
<?php
 $result = mysqli_query($conn, "SELECT * FROM images");
 while ($row = mysqli_fetch_array($result))
     {
  
      	echo "<a href='images/".$row['image']."' imageanchor=1 class=iimg><img src='images/".$row['image']."' ></a>";
   
     }
?>

</div>


</div>


<div class="insbox1 hide" id=frm3> 
<div class=in>
<?php
 $sql="SELECT * FROM birth";
 $result=$conn->query($sql);
 if($result->num_rows>0)
 {
     $i=1;
     echo "<table border=0 class=table style=width:100%>";
     echo "<tr><th>NO:</th><th>NAME</th><th>FATHER'S NAME</th><th>DATE</th></tr>";
     
     while($row=$result->fetch_assoc())
     {
      echo "<tr><td>".$i."</td><td>".ucfirst($row["bname"])."</td><td>".ucfirst($row["so"])."</td><td>".date('d-m-Y',strtotime($row["date"]))."</td></tr>";
     $i++;
     }
     echo "</table>" ;
 }
 else
 {
     echo "0 rows available";
 }
?>

</div>


</div>




<div class="insbox1 hide" id=frm4> 
<div class=in>
<?php
 $sql="SELECT * FROM death";
 $result=$conn->query($sql);
 if($result->num_rows>0)
 {
     $i=1;
     echo "<table border=0 class=table  style=width:100%>";
     echo "<tr><th>NO:</th><th>NAME</th><th>FATHER'S NAME</th><th>DATE</th></tr>";
     while($row=$result->fetch_assoc())
     {
      echo "<tr><td>".$i."</td><td>".ucfirst($row["dname"])."</td><td>".ucfirst($row["so"])."</td><td>".date('d-m-Y',strtotime($row["date"]))."</td></tr>";
     $i++;
     }
     echo "</table>" ;
 }
 else
 {
     echo "0 rows available";
 }
?>

</div>


</div>




<div class="insbox1 hide" id=frm5> 
<div class=in>
<?php
$sql="SELECT * FROM wedding";
$result=$conn->query($sql);
if($result->num_rows>0)
{
    $i=1;
    echo "<table border=0 class=table  style=width:100%>";
    echo "<tr><th>NO:</th><th>#ID</th><th>GROOM</th><th>BRIDE</th><th>FATHER'S NAME</th><th>DATE</th></tr>";
    while($row=$result->fetch_assoc())
    {
     echo "<tr><td>".$i."</td><td>".$row["id"]."</td><td>".ucfirst($row["bride"])."</td><td>".ucfirst($row["groom"])."</td><td>".ucfirst($row["so"])."</td><td>".date('d-m-Y',strtotime($row["date"]))."</td></tr>";
    $i++;
    }
    echo "</table>" ;
}
else
{
    echo "0 rows available";
}
?>

</div>


</div>


<div class="insbox1 hide" id=frm6> 
<div class=in>
<h2>Apply for a certificate</h2>

<br><br><br>
<H3>Wedding</H3>
<br><br>
<?php

$username=$_SESSION['username'];
$sql="SELECT * FROM family where user='$username'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();

if($result->num_rows>0)
{
$id=$row["num"];
$sql2="SELECT * FROM wedding where wid='$id'";
$result2=$conn->query($sql2);


if($result2->num_rows>0)
{
    $i=1;
    echo "<table border=0 class=table style=width:100%;>";
    echo "<tr><th>NO:</th><th>GROOM</th><th>BRIDE</th><th>S/O</th><th>DATE</th></tr>";
    while($row2=$result2->fetch_assoc())
    {
     echo "<tr><td>".$i."</td><td>".$row2["bride"]."</td><td>".$row2["groom"]."</td><td>".$row2["so"]."</td><td>".date('d-m-Y',strtotime($row2["date"]))."</td><td><a href='apply3.php?v=$row2[id]&c=$row2[wid]'>Apply</a></td></tr>";
    $i++;
    }
    echo "</table>" ;
}
else
{
    echo "No Wedding Data Available<br>";
}

echo "<br><br><br><br><H3>Birth</H3>";

$id=$row["num"];
$sql3="SELECT * FROM birth where id='$id'";
$result3=$conn->query($sql3);

if($result3->num_rows>0)
{
    $i=1;
    echo "<table border=0 class=table style=width:100%;>";
    echo "<tr><th>NO:</th><th>NAME</th><th>S/O</th><th>DATE</th></tr>";
    while($row3=$result3->fetch_assoc())
    {
     echo "<tr><td>".$i."</td><td>".$row3["bname"]."</td><td>".$row3["so"]."</td><td>".date('d-m-Y',strtotime($row3["date"]))."</td><td><a href='apply2.php?v=$row3[id]&c=$row3[num]'>Apply</a></td></tr>";
    $i++;
    }
    echo "</table>" ;
}
else
{
    echo "No Birth Data Available";
}
echo "<br><H3>Death</H3>";
$id=$row["num"];
$sql4="SELECT * FROM death where id='$id'";
$result4=$conn->query($sql4);


if($result4->num_rows>0)
{
    $i=1;
    echo "<table border=0 class=table style=width:100%;>";
    echo "<tr><th>NO:</th><th>NAME</th><th>S/O</th><th>DATE</th></tr>";
    while($row4=$result4->fetch_assoc())
    {
     echo "<tr><td>".$i."</td><td>".$row4["dname"]."</td><td>".$row4["so"]."</td><td>".date('d-m-Y',strtotime($row4["date"]))."</td><td><a href='apply.php?v=$row4[id]&c=$row4[num]'>Apply</a></td></tr>";
    $i++;
    }
    echo "</table>" ;
}
else
{
    echo "<br><br>No Death Data Available<br><br><br>";
}
}



echo "<h3>Applied Certificates</h3>

<br>";


$sql="SELECT *,logs.num as onum FROM logs INNER JOIN death ON death.num=logs.id where death.id='$id' and des='death';";
$result=$conn->query($sql);
echo "<table border=0 class=table style=width:100%;>";
    echo "<tr><th>NO:</th><th>Name</th><th>Description</th><th>Status</th><th>Date</th><th></th></tr>";
    $i=1;
if($result->num_rows>0)
{
    
    
    while($row=$result->fetch_assoc())
    {
     echo "<tr><td>".$i."</td><td>".$row["dname"]."</td><td>".$row["des"]."</td><td>".$row["status"]."</td><td>".date('d-m-Y',strtotime($row["ldate"]))."</td><th>";
     
     
     if($row["status"]=='approved')
         echo "<a href=dcertificate.php?a=$row[num]&b=$row[onum]>Download</a>";
 
      
      
      echo "</th></tr>";
    $i++;
    }
    
}

$sql="SELECT *,logs.num as onum FROM logs INNER JOIN wedding ON wedding.id=logs.id where wedding.wid='$id' and des='wedding';";
$result=$conn->query($sql);
if($result->num_rows>0)
{
   
    while($row=$result->fetch_assoc())
    {
     echo "<tr><td>".$i."</td><td>".$row["bride"]." & ".$row["groom"]."</td><td>".$row["des"]."</td><td>".$row["status"]."</td><td>".date('d-m-Y',strtotime($row["ldate"]))."</td><th>";
     
     
     if($row["status"]=='approved')
         echo "<a href=wcertificate.php?a=$row[num]&b=$row[id]>Download</a>";
 
      
      
      echo "</th></tr>";
    $i++;
    }
   
}


$sql="SELECT *,logs.num as onum FROM logs INNER JOIN birth ON birth.num=logs.id where birth.id='$id' and des='birth';";
$result=$conn->query($sql);

if($result->num_rows>0)
{
   
    while($row=$result->fetch_assoc())
    {
     echo "<tr><td>".$i."</td><td>".$row["bname"]."</td><td>".$row["des"]."</td><td>".$row["status"]."</td><td>".date('d-m-Y',strtotime($row["ldate"]))."</td><th>";
     
     
    if($row["status"]=='approved')
        echo "<a href=bcertificate.php?a=$row[num]&b=$row[onum]>Download</a>";

     
     
     echo "</th></tr>";
    $i++;
    }
    
}
echo "</table>" ;


?>






</div>


</div>





















<br><br>





<br>
<br>
</div>


<div class="chat" id=chat><i class="fas fa-comments"></i></div>
<div class="cbox hide" id=cbox>
<div class="ctitle">
<span class=chead>CHAT</span>
<i class="fas fa-times" id=close></i>
</div>
<div class=cdisplay>

<iframe src="http://localhost/project/frame.php"></iframe>






</div>
<hr class=line>
<form method="post" id=chatform name=chatform>
<input type=text class=msg name=msg id=msg placeholder=" Type your message...">
<input type=button value=&#10148; id=submit>
</form>
</div>


<br>
<br>
</body>
</html>
<style>
*
{
padding:0;
margin:0;
}
tr
{
    height:30px;
}

tr:nth-of-type(odd) td
{
    background:#1a8cff55;
}


th 
{
    padding:5px;
    background:#1a8cffcc;
    
}
body
{
    background:url("29.jpg");
    background-size:cover;
    background-attachment:fixed;
}
.stickify
{
    width:100%;
    height:9vh;
    background-color:rgba(212,223,247,.3);
    COLOR:black;
    display:flex;
    justify-content:SPACE-BETWEEN;
    align-items:center;
    position:sticky;
    top:0;

}
.stickify a div
{
    FLOAT:LEFT;
    font-size:20px;
    background-color:rgba(255,255,255,0);
    width:100%;
    height:100%;
    justify-content:center;
    align-items:center;
    display:flex;

}
.stickify a:hover
{
    COLOR:white;
    background-color:rgba(0,0,0,.6);
}

.stickify a
{
  
    height:100%;
    background-color:rgba(255,255,255,0);
    text-decoration:none; 
    width:30%;

    align-items:center;
    display:flex;
    color:black;
}
.stickify a:nth-child(3)
{
    box-shadow:inset 0 0 5px #ddd;
    color:white;
}
.box
{
    
   margin-top:9vh;
   height:60vh;
    width:100%;
}
.insbox1 
{
    background-color:rgba(255,255,255,.6);
    
    width:90vw;
    border-radius:15px;
    margin:3.5vh;
    display:flex;
    justify-content:center;
    padding-right:14px;
    padding-left:14px;
    margin-left:82px;
}
.insbox2
{
    background-color:rgba(255,255,255,.6);
    height:20vh;
    width:95vw;
    border-radius:15px;
    margin:3.5vh;
}
@keyframes animate
{
    0%
    {
        transform:rotate(0deg);
    }
    100%
    {
        transform:rotate(360deg);
    }
}
a:nth-child(4):hover i
{
    animation:animate 2s linear infinite;
}
.table
{
    width:92px;
    margin-top:10vh;
    margin-bottom:10vh;
}
tr
{
    height:30px;
}
td 
{
    text-align:center;
    text-transform:uppercase;
    padding:5px;
}
th 
{
    padding:5px;
}
.in
{
    overflow-x:hidden;
    padding:15px;
    
}
.leftstick 
{
    width:5vw;
    height:91vh;
   
    float:left;
    bottom:0;
    position:fixed;
    display:block;
    justify-content:SPACE-BETWEEN;
    align-items:center;
}
.church,.birth,.death,.member,.wedding
{
    background-color:rgba(255,255,255,.5);
    width:15vw;
    height:4.9vw;
    border:1px solid black;
    display:flex;
    align-items:center;
    font-size:26px;
    margin-top:10px;
    transition:.5s ease-in-out;
    margin-left:-130px;
    border-radius:0px 15px 15px 0px;
}
.church:hover,.birth:hover,.death:hover,.member:hover,.wedding:hover
{
    
    background-color:#eeeeee;
    margin-left:0px;
   
}
.hide
{
    display:none;
}
.show
{
    display:block;
}


img
{
   	float: left;
   	margin: 0px;
   	width: 260px;
   	height: 110px;
    float:left;
    border-radius:15px;
}
   .content 
   {
       width:100%;
     margin-top:-20px;
       height:54vh;
   }
  .iimg
  {
       float:left;
       border:1px solid black;
       width:auto;
       height:auto;
       margin:9px;
       border-radius:15px;
   }
.fimg 
{
    width:100%;
}



.chat
{
     width:72px;
     height:69px;
     background-color:rgba(30,215,30,.8);
     font-size:42px;
     border-radius:50%;
     justify-content:center;
     align-items:center;
     display:flex;
     position:fixed;
     margin-left:91vw;
     color:white;
     border:1px solid white;
     margin-top:36px;
}
.cbox 
{
    width:310px;
    height:460px;
    background-color:white;
    position:absolute;
    z-index:1;
    margin-top:-353px;
    margin-left:73vw;
    border-radius:10px;
   position:fixed;
   
}
.ctitle
{
    width:100%;
    height:60px;
    background: -webkit-linear-gradient(144deg, rgba(255,0,255,1) 0%, rgba(237,0,255,1) 17%, rgba(189,1,255,1) 65%, rgba(154,3,255,1) 100%);

    border-radius:10px 10px 0 0;
}
.fa-times 
{
    font-size:22px;
    position:absolute;
    margin-left:282px;
    margin-top:10px;
}
.msg 
{
    margin-top:0px;
    width:86%;
    height:35px;
    outline:none;
    border:none;
    background-color:rgba(0,0,0,0);
    background-color:rgba(0,0,0,0);
    font-size:16px;
}
.line 
{
    height:0px;
    border:.5px solid black;
    margin-top:4px;
}
.cdisplay 
{
    width:100%;
    height:355px;
    
}
#submit 
{
    outline:none;
    border:none;
    background:none;
    font-size:25px;
    color:#2253bd;
}

iframe 
{
    width:100%;
    height:355px;
    border:0;
    overflow-y:scroll;
}
.chead
 {
    position:absolute;
    width:100%;
    height:13%;
    font-size:25px;
    color:white;
    display:flex;
    align-items:center;
    justify-content:center;
    
}

</style>


