<?php

include "session.php";
if($_SESSION['type']!="user")
{
    header("location:loginform.php");
}


if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['subf']))
{

    $user=$_SESSION["username"];
    $password=$_SESSION["password"];
    $item=$_POST['num2'];
    $value=$_POST['num3'];
 
   
    if(empty($item))
    {
        echo "<center><font color=white>ENTER THE CATEGORY !</font></center>";
    }
    elseif(empty($value))
    {
        echo "<center><font color=white>ENTER THE VALUE !</font></center>";
    }

else
{
    $sql="update family set $item='$value' where user='$user' ";
    if($conn->query($sql))
    {
      
        echo "<center><font color=white><div class=update>updated succefully</div></font></center>";
    
    }
    else
    {
        echo "<center><font color=white>updation failed</font></center>";
    }
    
}
}















?>




<html>
<head><title>eParish</title>
<link rel="shortcut icon" type="image/png" href="images/eedge.png"/>
<link href="fontawesome-free-5.11.2-web/css/all.min.css" rel=stylesheet>
<script src=jquery.txt></script>
<style>
*
{
padding:0;
margin:0;
}

body
{  background:url("29.jpg");
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
    background-color:rgba(255,255,255,.8);
    height:60vh;
    width:93.6vw;
    border-radius:15px;
    margin:3.6vh;
    padding:10px;
   
}
.insbox2
{
    background-color:rgba(255,255,255,.8);
    height:20vh;
    width:95vw;
    border-radius:15px;
    margin:3.5vh;
    display:none;
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
input[type=submit],input[type=reset]
{
    width:130px;
    height:28px;
    color:white;
    background: linear-gradient(90deg, rgba(0,18,36,1) 0%, rgba(47,91,245,1) 0%, rgba(49,67,249,1) 100%);
    cursor:pointer;
    border:0;
    animation:anima 2s 1;
}
input[type=reset]
{
    animation:anim 2s 1;
}
.fa-address-card
{
    position:absolute;
    font-size:85px;
    margin-left:83%;
    margin-top:2%;
    opacity:.7;
    
    animation:animat 10s linear infinite;
    
}
@keyframes animat
{
    0%
    {
        color:darkviolet;
    }
    10%
    {
        color:green;
    }
    20%
    {
        color:blue;
    }
    30%
    {
        color:red;
    }
    40%
    {
        color:yellow;
    }
    50%
    {
        color:orange;
    }
    60%
    {
        color:indigo;
    }
    70%
    {
        color:black;
    }
    80%
    {
        color:brown;
    }
    90%
    {
        color:grey;
    }
    100%
    {
        color:pink;
    }
}
@keyframes anima
{
    0%
    {
        margin-left:-1000px;
    }
    100%
    {
        margin-left:0px;
    }
}
</style>
</head>
<body>
<!--Navigation-->
<div class=stickify>
<a href=welcome2><div class=home><i class="fas fa-home"></i>&nbsp;HOME</div></a>
<a href=insert2><div class=insert><i class="fas fa-edit"></i>&nbsp;EDIT</div></a>
<a href=view2><div class=view><i class="fas fa-eye"></i>&nbsp;VIEW</div></a>
<a href=settings2><div class=logout><i class="fas fa-cog"></i> &nbsp; SETTINGS</div></a>
</div>
<!--/Navigation-->
<div class=box>
<div class=insbox1>
<br>
<i class="far fa-address-card"></i>
<form method=post action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id=frm1>
<fieldset style="font-size:19px;padding-left:30px;">
<legend> Update Your Details </legend>
<br><br><br>
 Select the category : <select name=num2 required style=width:166px;>
     <option value="tax">Subscription</option>
     <option value="members">Members</option>
     <option value="membername">Member Name</option>
     <option value="owner">Owner</option>
     <option value="phno">Phone Number</option>
     
     </select>
    <br><br><br>
   Enter the value &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type=text name=num3 required>

     <br><br><br><br><br>
     <center>
     <input type=reset value=Reset>&nbsp;&nbsp;
<input type=submit value=Update name=subf>
</center>
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
