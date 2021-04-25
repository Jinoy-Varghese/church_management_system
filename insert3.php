<?php

include "session.php";
if($_SESSION['type']!="sub")
{
    header("location:loginform.php");
}




if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['subw']))
{
$bride=$_POST['bride'];
$groom=$_POST['groom'];
$w1=$_POST['w1'];
$wid=$_POST['wid'];
$fname=$_POST['fname'];
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

else if(empty($fname))
{
    echo "<div class=update><center><font >ENTER THE FAMILY NAME !</font></center></div>"; 
}

else
{
    $sql="INSERT INTO wedding(groom,bride,date,so,wid)values('$bride','$groom','$w1','$fname','$wid')";
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





if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['subf']))
{

    $id=$_POST['num1'];
    $item=$_POST['num2'];
    $amount=$_POST['num3'];

    if(empty($id))
     {
        echo "<center><font color=white>ENTER THE ID !</font></center>";
     }

    else if(empty($item))
    {
        echo "<center><font color=white>ENTER THE CATEGORY !</font></center>";
    }
    else if(empty($amount))
    {
        echo "<center><font color=white>ENTER THE AMOUNT !</font></center>";
    }

else
{
    $sql="update family set $item='$amount' where num='$id'";
    if($conn->query($sql))
    {
      
        echo "<center><font color=white>updated sucessfully!</font></center>";
    
    }
    else
    {
        echo "<center><font color=white>updation failed!</font></center>";
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
       echo "<center><font color=white>ENTER THE CATEGORY !</font></center>";
    }

   else if(empty($type))
   {
       echo "<center><font color=white>ENTER THE TYPE !</font></center>";
   }
   else if(empty($amount))
   {
       echo "<center><font color=white>ENTER THE AMOUNT !</font></center>";
   }

else
{

    $sql2="SELECT * from programs where name='$name'";
    $result=$conn->query($sql2);
    $row=$result->fetch_assoc();
    $amount=$amount+$row[$type];
    $sql="update programs set $type='$amount' where name='$name'";
    if($conn->query($sql))
    {
      
        echo "<center><font color=white>updated sucessfully!</font></center>";
    
    }
    else
    {
        echo "<center><font color=white>updation failed!</font></center>";
    }
    
}

}
if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['subb']))
{
$birth=$_POST['birth'];
$b1=$_POST['b1'];
$bid=$_POST['bid'];
$bfamily=$_POST['bfamily'];
if(empty($birth))
{
    echo "<center><font color=white>ENTER THE NAME !</font></center>"; 
}
else if(empty($b1))
{
    echo "<center><font color=white>ENTER THE DATE OF BIRTH !</font></center>";
}

else if(empty($bfamily))
{
    echo "<center><font color=white>ENTER THE FAMILY NAME !</font></center>"; 
}
else if(empty($bid))
{
    echo "<center><font color=white>ENTER THE FAMILY ID !</font></center>"; 
}
else
{
    $sql="INSERT INTO birth(bname,date,so,id)values('$birth','$b1','$bfamily','$bid')";
    if($conn->query($sql))
    {
      
        echo "<center><font color=white>updated sucessfully!</font></center>";
    
    }
    else
    {
        echo "<center><font color=white>updation failed!</font></center>";
    }
}
    

}

if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['subd']))
{
    

    $death=$_POST['death'];
    $d1=$_POST['d1'];
    $did=$_POST['did'];
    $dfamily=$_POST['dfamily'];
    $age=$_POST['age'];
    if(empty($death))
    {
        echo "<center><font color=white>ENTER THE NAME !</font></center>"; 
    }
    else if(empty($d1))
    {
        echo "<center><font color=white>ENTER THE DATE OF DEATH !</font></center>";
    }
    
    else if(empty($did))
    {
        echo "<center><font color=white>ENTER THE FAMILY ID !</font></center>";
    }
    else if(empty($dfamily))
    {
        echo "<center><font color=white>ENTER THE FAMILY NAME !</font></center>"; 
    }
    if(empty($age))
    {
        echo "<div class=update><center><font >ENTER THE AGE !</font></center></div>"; 
    }
    else
    {
        $sql="INSERT INTO death(dname,date,so,id,age)values('$death','$d1','$dfamily','$did','$age')";
        if($conn->query($sql))
        {
          
            echo "<center><font color=white>updated sucessfully!</font></center>";
        
        }
        else
        {
            echo "<center><font color=white>updation failed!</font></center>";
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
    });

    $("#church").click(function(){
$("#frm2").addClass("show");
$("#frm1").removeClass("show");
$("#frm3").removeClass("show");
$("#frm4").removeClass("show");
$("#frm5").removeClass("show");
    });

    $("#birth").click(function(){
$("#frm3").addClass("show");
$("#frm1").removeClass("show");
$("#frm2").removeClass("show");
$("#frm4").removeClass("show");
$("#frm5").removeClass("show");
    });


    $("#death").click(function(){
$("#frm4").addClass("show");
$("#frm1").removeClass("show");
$("#frm2").removeClass("show");
$("#frm3").removeClass("show");
$("#frm5").removeClass("show");
    });

    $("#wedding").click(function(){
$("#frm5").addClass("show");
$("#frm1").removeClass("show");
$("#frm2").removeClass("show");
$("#frm3").removeClass("show");
$("#frm4").removeClass("show");
    });





});
</script>

<html>
<head><title>eParish</title></head>
<body>
<div class=stickify>
<a href=welcome3.php><div class=home><i class="fas fa-home"></i>&nbsp;HOME</div></a>
<a href=insert3.php><div class=insert><i class="fas fa-server"></i>&nbsp;UPDATE</div></a>
<a href=view3.php><div class=view><i class="fas fa-eye"></i>&nbsp;VIEW</div></a>
<a href=settings3.php><div class=logout><i class="fas fa-cog"></i> &nbsp; SETTINGS</div></a>
</div>
<div class=leftstick><br><br><br>
<div class=member id=member>&nbsp;&nbsp;FAMILY&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-users"></i></div>
<div class=church id=church>&nbsp;&nbsp;CHURCH&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-church"></i></div>

<?php

$hjql="select flag from priest";
$hresult=$conn->query($hjql);
$row=$hresult->fetch_assoc();
if($row['flag']==1)
{
echo "<div class=birth id=birth>&nbsp;&nbsp;BIRTH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='fas fa-birthday-cake'></i></div>
<div class=death id=death>&nbsp;&nbsp;DEATH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='fas fa-book-dead'></i></div>
<div class=wedding id=wedding>WEDDING&nbsp;&nbsp;&nbsp;<i class='fas fa-hand-holding-heart'></i></div>";
}
?>
</div>
<div class=box>

<div class=insbox1>
<br><br>
<form method=post action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id=frm1 class=hide>
<fieldset style="font-size:19px;padding-left:30px;">
<legend> FAMILY DETAILS </legend>

<br><br><br>

 User id:<input type=text name=num1>

 Item: <select name=num2>
     <option value="diocese">diocese</option>
     <option value="convention">convention</option>
     <option value="treatment">treatment</option>
     <option value="gospel">gospel</option>
     <option value="due">due</option>
     <option value="christmas">christmas</option>
     <option value="donation">donation</option>
     </select>
    
     Amount:<input type=text name=num3>

     <br><br><br><br><center>
     <input type=reset value=reset>&nbsp;&nbsp;
<input type=submit value=update name=subf>
</center>
<br><br><br>
</fieldset>
</form>


<form method=post action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="hide" id=frm2 >
<fieldset style="font-size:19px;padding-left:30px;">
<legend> CHURCH DETAILS </legend>

<br><br><br>
 
Name: <select name=num11 >
     <option value="Sunday school">Sundayschool</option>
     <option value="Yuvajana sakhyam">Yuvajanasakhyam</option>
     <option value="Idavaka mission">Idavaka mission</option>
     <option value="Vbs">Vbs</option>
     <option value="Choir">Choir</option>
     <option value="prayer group">prayer group</option>
     <option value="donation">Donation</option>

     </select>

Type: <select name=num22>
     <option value="credit">Credit</option>
     <option value="debit">Debit</option>
    
    
     </select>

Amount:<input type=text name=num33><br><br><br><center>
<input type=submit value=submit name=subc></center>
<br><br><br>
</fieldset>
</form>


<form method=post action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="hide"  id=frm4>
<fieldset style="font-size:19px;padding-left:30px;">
<legend> DEATH </legend>
<br><br><br>
Name:<input type=text name=death >
Date:<input type="date" name="d1" placeholder="DD">
S/O:<input type=text name=dfamily>
Family Id:<input type=number name=did>
Age:<input type=text name=age required>

<br><br><br>
<input type=submit value=submit name=subd>

<br><br><br>






<br><br><br>
</fieldset>
</form>
<form method=post action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="hide"  id=frm3>
<fieldset style="font-size:19px;padding-left:30px;">
<legend> BIRTH </legend>

<br><br><br>

Name:<input type=text name=birth >
Date:<input type="date" name="b1" placeholder="DD">
S/O:<input type=text name=bfamily>
Family Id:<input type=number name=bid>
<br><br><br>
<input type=submit value=submit name=subb>


<br><br><br>
</fieldset>
</form>



<form method=post action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="hide"  id=frm5>
<fieldset style="font-size:19px;padding-left:30px;">
<legend> WEDDING </legend>

<br><br><br>

Groom Name:<input type=text name=bride >
Bride Name:<input type=text name=groom >
Date:<input type="date" name="w1" id="w1" placeholder="DD" style="width:auto;">
S/O:<input type=text name=fname>
Family Id:<input type=number name=wid>
<br><br><br>
<input type=submit value=submit name=subw>




<br><br><br>
</fieldset>
</form>







 </div>
<br><br>
<div class=insbox2> </div>
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
a:nth-child(2)
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
    height:60vh;
    width:90vw;
    border-radius:15px;
    margin:3.5vh;
    padding:10px;
    margin-left:82px;
}
.insbox2
{
    background-color:rgba(255,255,255,.6);
    height:20vh;
    width:95vw;
    border-radius:15px;
    margin:3.5vh;
    display:none;
}

#w1,#w2,#w3 
{
    width:60px;
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

</style>