<?php

include "session.php";
if($_SESSION['type']!="admin")
{
    header("location:loginform.php");
}



if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['subw']))
{
$bride=$_POST['bride'];
$groom=$_POST['groom'];
$w1=$_POST['w1'];

$wid=$_POST['wid'];
$so=$_POST['so'];
if(empty($bride))
{
    echo "<div class=update><center><font >ENTER THE BRIDE NAME !</font></center></div>"; 
}
else if(empty($groom))
{
    echo "<div class=update><center><font >ENTER THE GROOM NAME !</font></center></div>"; 
}
else if(empty($w1))
{
    echo "<div class=update><center><font >ENTER THE DATE OF WEDDING !</font></center></div>";
}

else if(empty($wid))
{
    echo "<div class=update><center><font >ENTER THE FAMILY ID !</font></center></div>"; 
}
else if(empty($so))
{
    echo "<div class=update><center><font >ENTER THE FATHER'S NAME !</font></center></div>"; 
}
else
{
    $sql="INSERT INTO wedding(groom,bride,date,wid,so)values('$bride','$groom','$w1','$wid','$so')";
    if($conn->query($sql))
    {
      
        echo "<div class=update><center><font >updated sucessfully!</font></center></div>";
    
    }
    else
    {
        echo "<div class=update><center><font >updation failed!</font></center></div>";
    }
}
    

}





if (isset($_POST['upload']))
{
    $image = $_FILES['image']['name'];
    
    $target = "images/".basename($image);

    $sql = "INSERT INTO images (image) VALUES ('$image')";
    mysqli_query($conn, $sql);

   if( move_uploaded_file($_FILES['image']['tmp_name'], $target));
   {
    echo "<div class=update><center><font >Image Uploaded Sucessfully</font></center></div>";
   }
}
$result = mysqli_query($conn, "SELECT * FROM images");



if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['subf']))
{

    $s1=$_POST['s1'];
    $s2=$_POST['s2'];
    $s3=$_POST['s3'];
    $s4=$_POST['s4'];
    $b1=$_POST['b1'];
    $b2=$_POST['b2'];
    $m1=$_POST['m1'];
    $sp1=$_POST['sp1'];
    if(empty($s1)||empty($s2)||empty($s3)||empty($s4)||empty($b1)||empty($b2)||empty($m1)||empty($sp1))
     {
        echo "<div class=update><center><font >Fill all the text fields !</font></center></div>";
     }


else
{
    $sql="UPDATE events SET value='$s1' where num=3;";
    $conn->query($sql);
    $sql="UPDATE events SET value='$s2' where num=4;";
    $conn->query($sql);
    $sql="UPDATE events SET value='$s3' where num=5;";
    $conn->query($sql);
    $sql="UPDATE events SET value='$s4' where num=8;";
    $conn->query($sql);
    $sql="UPDATE events SET value='$b1' where num=1;";
    $conn->query($sql);
    $sql="UPDATE events SET value='$b2' where num=2;";
    $conn->query($sql);
    $sql="UPDATE events SET value='$m1' where num=7;";
    $conn->query($sql);
    $sql="UPDATE events SET value='$sp1' where num=6;";
    if($conn->query($sql))
    {
      
        echo "<div class=update><center><font >updated sucessfully!</font></center></div>";
    
    }
    else
    {
        echo "updation failed";
    }
    
}
}
if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['subc']))
{

    $name=$_POST['num11'];
    $type=$_POST['num22'];
    $amount=$_POST['num33'];


    if(empty($name))
    {
       echo "<div class=update><center><font >ENTER THE CATEGORY !</font></center></div>";
    }

   else if(empty($type))
   {
       echo "<div class=update><center><font >ENTER THE TYPE !</font></center></div>";
   }
   else if(empty($amount))
   {
       echo "<div class=update><center><font >ENTER THE AMOUNT !</font></center></div>";
   }

else
{


    $sql="update programs set $type='$amount' where name='$name'";
    if($conn->query($sql))
    {
      
        echo "<div class=update><center><font >updated sucessfully!</font></center></div>";
    
    }
    else
    {
        echo "<div class=update><center><font >updation failed!</font></center></div>";
    }
    
}

}
if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['subb']))
{
$birth=$_POST['birth'];
$b1=$_POST['b1'];
$bid=$_POST['bid'];
$bso=$_POST['bso'];
if(empty($birth))
{
    echo "<div class=update><center><font >ENTER THE NAME !</font></center></div>"; 
}
else if(empty($b1))
{
    echo "<div class=update><center><font >ENTER THE DATE OF BIRTH !</font></center></div>";
}

else if(empty($bid))
{
    echo "<div class=update><center><font >ENTER THE FAMILY ID !</font></center></div>"; 
}
else if(empty($bso))
{
    echo "<div class=update><center><font >ENTER THE FATHER'S NAME !</font></center></div>"; 
}
else
{
    $sql="INSERT INTO birth(bname,date,id,so)values('$birth','$b1','$bid','$bso')";
    if($conn->query($sql))
    {
      
        echo "<div class=update><center><font >updated sucessfully!</font></center></div>";
    
    }
    else
    {
        echo "<div class=update><center><font >updation failed!</font></center></div>";
    }
}
    

}

if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['subd']))
{
    

    $death=$_POST['death'];
    $d1=$_POST['d1'];
    $did=$_POST['did'];
    $dso=$_POST['dso'];
    $age=$_POST['age'];
    if(empty($death))
    {
        echo "<div class=update><center><font >ENTER THE NAME !</font></center></div>"; 
    }
    else if(empty($d1))
    {
        echo "<div class=update><center><font >ENTER THE DATE OF DEATH !</font></center></div>";
    }
    
    else if(empty($did))
    {
        echo "<div class=update><center><font >ENTER THE Family id !</font></center></div>"; 
    }
    else if(empty($dso))
    {
        echo "<div class=update><center><font >ENTER THE FATHER'S NAME !</font></center></div>"; 
    }
    if(empty($age))
    {
        echo "<div class=update><center><font >ENTER THE AGE !</font></center></div>"; 
    }
    else
    {
        $sql="INSERT INTO death(dname,date,id,so,age)values('$death','$d1','$did','$dso','$age')";
        if($conn->query($sql))
        {
          
            echo "<div class=update><center><font >updated sucessfully!</font></center></div>";
        
        }
        else
        {
            echo "<div class=update><center><font >updation failed!</font></center></div>";
        }
    }
        
    
    }


?>


<link rel="shortcut icon" type="image/png" href="images/eedge.png"/>
<link href="fontawesome-free-5.11.2-web/css/all.min.css" rel=stylesheet>
<script src=jquery.txt></script>

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




});
</script>

<html>
<head><title>eParish</title></head>
<body>
<div class=stickify>
<a href=welcome.php><div class=home><i class="fas fa-home"></i>&nbsp;HOME</div></a>
<a href=insert.php><div class=insert><i class="fas fa-server"></i>&nbsp;UPDATE</div></a>
<a href=view.php><div class=view><i class="fas fa-eye"></i>&nbsp;VIEW</div></a>
<a href=settings.php><div class=logout><i class="fas fa-cog"></i> &nbsp; SETTINGS</div></a>
</div>
<div class=leftstick>
<div class=member id=member>&nbsp;&nbsp;EVENTS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-CHURCH"></i></div>
<div class=church id=church>&nbsp;&nbsp;UPLOAD&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-images"></i></div>
<div class=birth id=birth>&nbsp;&nbsp;BIRTH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-birthday-cake"></i></div>
<div class=death id=death>&nbsp;&nbsp;DEATH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-book-dead"></i></div>
<div class=wedding id=wedding>WEDDING&nbsp;&nbsp;&nbsp;<i class="fas fa-hand-holding-heart"></i></div>
<div class=wedding id=certificate style=font-size:20.0px;>&nbsp;CERTIFICATE&nbsp;&nbsp;&nbsp;<i class="fas fa-FILE-ALT" style=font-size:27px;></i></div>

</div>
<div class=box>

<div class=insbox1>
<br>
<form method=post action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id=frm1 class=hide>
<fieldset style="font-size:19px;padding-left:30px;">
<legend> EVENT DETAILS </legend>

<br><br>

&nbsp;&nbsp;&nbsp;Song 1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type=number name=s1 required> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Song 2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type=number name=s2 required><br><br> 
&nbsp;&nbsp;&nbsp;Song 3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type=number name=s3 required> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Song 4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type=number name=s4 required><br><br> 
&nbsp;&nbsp;&nbsp;Chapter&nbsp; 1: <input type=text name=b1 required>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chapter 2&nbsp;&nbsp;: <input type=text name=b2 required><br><br> 
&nbsp;&nbsp;&nbsp;Speech&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type=text name=sp1 required><br><br> 
&nbsp;&nbsp;&nbsp;Message&nbsp;&nbsp;&nbsp;: <textarea name=m1 required style=height:20px;></textarea><br><br> 


     <br><br><center>
<input type=submit value=submit name=subf>
</center>
<br>
</fieldset>
</form>





<form method=post action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="hide"  id=frm4>
<fieldset style="font-size:19px;padding-left:30px;">
<legend> DEATH </legend>
<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type=text name=death ><br>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="date" name="d1" placeholder="DD"  style='width:168px !important'><br>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Family Id&nbsp; : <input type=number name=did><br>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Son of&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type=text name=dso><br>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Age&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <input type=text name=age required>

<br>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=submit value=submit name=subd>







<br><br><br>
</fieldset>
</form>
<form method=post action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="hide"  id=frm3>
<fieldset style="font-size:19px;padding-left:30px;">
<legend> BIRTH </legend>

<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type=text name=birth ><br /><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <input type="date" name="b1" placeholder="DD" style='width:168px !important'><br /><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Family Id&nbsp; : <input type=number name=bid><br /><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Son of  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <input type=text name=bso><br /><br />
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=submit value=submit name=subb>




<br><br><br>
</fieldset>
</form>


<form method=post action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="hide"  id=frm5>
<fieldset style="font-size:19px;padding-left:30px;">
<legend> WEDDING </legend>

<br><br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Groom Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type=text name=bride ><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bride Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type=text name=groom ><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="date" name="w1" id="w1" placeholder="DD" style="width:auto;"><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Family Id&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type=number name=wid><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Son of&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type=text name=so><br><br>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=submit value=submit name=subw>




<br><br>
</fieldset>
</form>

<form method=post action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="hide"  id=frm6>
<fieldset style="font-size:19px;padding-left:30px;">
<legend> Certificates Applied </legend>

<br><br>
<?php


$sql="SELECT * FROM death INNER JOIN logs ON death.num=logs.id where des='death' and logs.status='processing';";
$result=$conn->query($sql);
echo "<table border=0 class=table width=100% cellpadding=40 style=text-align:center;>";
    echo "<tr><th>NO:</th><th>Name</th><th>Description</th><th>Status</th><th>Date</th><th></th></tr><tr></tr>";
    $i=1;
if($result->num_rows>0)
{
    
    
    while($row=$result->fetch_assoc())
    {
     echo "<tr><td>".$i."</td><td>".ucfirst($row["dname"])."</td><td>".$row["des"]."</td><td>".$row["status"]."</td><td>".date('d-m-Y', strtotime($row["date"]))."</td><td><a href='check2.php?k=$row[num]'>view</a></td></tr>";
    $i++;
    }
    
}

$sql="SELECT * FROM wedding INNER JOIN logs ON wedding.id=logs.id where des='wedding' and logs.status='processing';";
$result=$conn->query($sql);
if($result->num_rows>0)
{
   
    while($row=$result->fetch_assoc())
    {
     echo "<tr><td>".$i."</td><td>".ucfirst($row["bride"])." & ".ucfirst($row["groom"])."</td><td>".$row["des"]."</td><td>".$row["status"]."</td><td>".date('d-m-Y', strtotime($row["date"]))."</td><td><a href='check3.php?k=$row[num]'>view</a></td></tr>";
    $i++;
    }
   
}


$sql="SELECT * FROM birth INNER JOIN logs ON birth.num=logs.id where des='birth' and logs.status='processing';";
$result=$conn->query($sql);

if($result->num_rows>0)
{
   
    while($row=$result->fetch_assoc())
    {
     echo "<tr><td>".$i."</td><td>".ucfirst($row["bname"])."</td><td>".$row["des"]."</td><td>".$row["status"]."</td><td>".date('d-m-Y', strtotime($row["date"]))."</td><td><a href='check.php?k=$row[num]'>view</a></td></tr>";
    $i++;
    }
    
}

echo "</table>" ;






?>
<br><br><br>
</fieldset>
</form>

<div style="font-size:19px;padding-left:30px;margin-top:-36px" id="frm2"  class="hide">


<br><br>
 

<br><br>
<div class=content>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
  
<i class="fas fa-download" style='font-size:34vh;position:absolute;margin-left:440px;opacity:.1;margin-top:50px;'></i>


  <div>
  
    <input type="file" name="image" required>
    
  </div>
  <br><br><br><br>
      <button type="submit" name="upload">POST</button>
  </div>
</form>
<div id=insbox2><br>
<b style="margin-left:20px;">Images Uploaded</b>
<br><br><br>
<div style="width:90vw;overflow-y:scroll;height:65vh">
  <?php
   $result = mysqli_query($conn, "SELECT * FROM images");
    while ($row = mysqli_fetch_array($result))
     {
  
      	echo "<a href='images/".$row['image']."' imageanchor=1 class=iimg><img src='images/".$row['image']."' ></a>";
   
     }
  ?>
  </div>
 </div>
</div>






<br><br><br>
</div>


 </div>
<br><br>

<br>
<br>
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

body
{
    background:url("29.jpg");
    background-size:cover;
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

a
{
  
    height:100%;
    background-color:rgba(255,255,255,0);
    text-decoration:none; 
    width:30%;

    align-items:center;
    display:flex;
    color:black;
}
.stickify a:nth-child(2)
{
    background:url("30.jpg",.3);
    background-size:cover;
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
    background-color:rgba(255,255,255,.8);
    height:61vh;
    width:90vw;
    border-radius:15px;
    margin:3.5vh;
    padding:10px;
    margin-left:82px;
}
.insbox2
{
    background-color:rgba(255,255,255,.8);
    width:90vw;
    border-radius:15px;
    padding:10px;
    margin-left:-37px;
    height:80vh;
    font-size:20px;
    margin-top:40px;
    
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
#w1,#w2,#w3 
{
    width:60px;
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
      
   }
.fimg 
{
    width:100%;
}
input[type=submit],button[type=submit]
{
    border:none;
    text-align:center;
    background:#2288ff;
    width:80px;
    height:30px;
    color:white;

}
input[type=file]
{
    text-decoration:none;
    background:#99009955;
    cursor:pointer;
}
.update 
{
    animation:update1 10s 1;
    height:0px;
    color:#265fd9;
    transition:2s ease-in-out;
}
@keyframes update1
{
    0%
    {
        height:auto;
        color:white;
    }
    99%
    {
        height:auto;
        color:white;
    }
    
    100%
    {
        height:0px;
        color:#265fd9;
    }
}
::-webkit-scrollbar {
    display:none;
}
.table tr 
{
height:30px !important;
}
</style>