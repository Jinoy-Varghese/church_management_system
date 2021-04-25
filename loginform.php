
<?php

include("config.php");
session_start();

if(isset($_SESSION["loggedin"])&&$_SESSION["loggedin"]==true)
{
    $sql="SELECT type FROM login WHERE username='$username' AND password='$password'";
    $conn->query($sql);
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    
if($_SESSION['type']=="admin")
{
    $_SESSION['type']="admin";
  header("location:welcome.php");
}
else if($_SESSION['type']=="user")
{
    $_SESSION['type']="user";
    header("location:welcome2.php");
}
else if($_SESSION['type']=="sub")
{
    $_SESSION['type']="sub";
    header("location:welcome3.php");
}
  exit;
}



if($_SERVER["REQUEST_METHOD"]=="POST")
{
$username=$_POST['user'];
$password=md5($_POST['password']);
$sql="SELECT * FROM login WHERE username='$username' AND password='$password'";
$result=$conn->query($sql);
if($result->num_rows==1)
{
    $_SESSION['loggedin']=true;
    $_SESSION['username']=$username;
    $_SESSION['password']=$password;

    $sql="SELECT * FROM login WHERE username='$username' AND password='$password'";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();

    if($row["type"]=="admin")
{
    $_SESSION['type']="admin";
header("location:welcome.php");

}
else if($row["type"]=="user")
{
    $_SESSION['type']="user";
    header("location:welcome2.php");
  
}

else if($row["type"]=="sub")
{
    $_SESSION['type']="sub";
    header("location:welcome3.php");
}



}
else
{
    echo "<CENTER>invalid username or password!</CENTER>";
}

}

?>

<link href="fontawesome-free-5.11.2-web/css/all.min.css" rel=stylesheet>

<html>
<link rel="shortcut icon" type="image/png" href="images/eedge.png"/>
<head><title>eParish</title></head>
    <body>
    
    <div class=div>
    <div class=i>
    <img src=icon/4.png width=300 height=300 style=position:absolute;margin-top:-50px;margin-left:140px;opacity:.15>
    <img src=icon/2.png width=200 height=200 style=position:absolute;margin-top:20px;margin-left:62px;opacity:.15>
    <img src=icon/22.png style='position:absolute;width:290px;height:200px;margin-top:170px;margin-left:10px;animation:animate1 1s 1;'>
    <img src=icon/15.png width=290 height=200 style='position:absolute;margin-top:170px;margin-left:10px;animation:animatet 2s 1;'>
    <img src=icon/6.png width=290 height=200 style='position:absolute;margin-top:170px;margin-left:10px;animation:animatel 2s 1;'>
    <img src=icon/7.png width=290 height=200 style='position:absolute;margin-top:170px;margin-left:10px;animation:animatet 3s 1;'>
    <img src=icon/8.png width=290 height=200 style='position:absolute;margin-top:170px;margin-left:10px;animation:animatel4 4s 1;'>
    <img src=icon/9.png width=290 height=200 style='position:absolute;margin-top:170px;margin-left:10px;animation:animateb 5s 1;'>
    <img src=icon/10.png width=290 height=200 style='position:absolute;margin-top:170px;margin-left:10px;animation:animatel5 6s 1;'>
    <img src=icon/11.png width=290 height=200 style='position:absolute;margin-top:170px;margin-left:10px;animation:animatet2 7s 1;'>
    <img src=icon/12.png width=290 height=200 style='position:absolute;margin-top:170px;margin-left:10px;animation:animatet2 8s 1;'>
    <img src=icon/13.png width=290 height=200 style='position:absolute;margin-top:170px;margin-left:10px;animation:animatet2 9s 1;'>
    <img src=icon/14.png width=290 height=200 style='position:absolute;margin-top:170px;margin-left:10px;animation:animatet2 10s 1;'>
    <img src=icon/16.png width=290 height=200 style='position:absolute;margin-top:170px;margin-left:10px;animation:animatet2 11s 1;'>
    <img src=icon/17.png width=290 height=200 style='position:absolute;margin-top:170px;margin-left:10px;animation:animatet2 12s 1;'>
    <img src=icon/18.png width=290 height=200 style='position:absolute;margin-top:170px;margin-left:10px;animation:animatet2 13s 1;'>
    <img src=icon/19.png width=290 height=200 style='position:absolute;margin-top:170px;margin-left:10px;animation:animatet2 14s 1;'>
    <img src=icon/20.png width=290 height=200 style='position:absolute;margin-top:170px;margin-left:10px;animation:animatet2 15s 1;'>
    <img src=icon/3.png width=95 height=190 style='position:absolute;margin-top:60px;margin-left:10px;animation:animatet2 16s 1;'>
    <img src=icon/5.png width=20 height=20 style=position:absolute;margin-top:130px;margin-left:150px;opacity:.9>
    <img src=icon/21.png width=40 height=40 style=position:absolute;margin-top:80px;margin-left:220px;opacity:.7>
    <img src=icon/1.png width=30 height=30 style=position:absolute;margin-top:30px;margin-left:180px;opacity:.9>
    
    



    </div>
    <h1 class=h1>Login</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <center>
        <br><br><br>
        <br>
        <br><br>
        <br>
           <font size=4> &#128102;</font> <input type="email" name="user" placeholder="user name"  required>
            <hr width=263px >
            <br><br>
            <font size=4>  &#128272; </font><input type="password" name=password placeholder="password"  required>
            <hr width=263px>
            <br><br>
            <br>
            <input type="submit" value="SIGN IN">
           <br><br>
           <font style=margin-left:-10px;>Forgot Your Password?&nbsp; <A HREF="forgot.php"> Reset Password</A></font>
            </center>
        </form>
        </div>
    </body>
</html>
<style>
*
{
padding:0;
margin:0;
}
::-webkit-scrollbar
{
    display: none;
}
body
{
    background-color:#265fd9;
}
.i 
{
    width:300px;
    height:370px;
    background:darkviolet;
    position:absolute;
    z-index:1;
    margin-left:-330px;
    border-radius:15px 0 0 15px;
    overflow:hidden;
}
.div
{
    width:100%;
    height:100vh;
    background-image:url("icon/b1.jpg");
    position:absolute;
    justify-content:center;
    align-items:center;
    display:flex;
    background-size:cover;
    background-repeat:no-repeat;
}
form
{
    width:300px;
    height:370px;
    background-color:rgba(255,255,255,1);
    border-radius:0 15px 15px 0px;
    margin-left:270px;
   
    }
.h1
{
    color:black;
    position:absolute;
    z-index:1;
    margin-top:-220px;
    margin-left:80px;
}
input[type=submit]
{
width:270px;
height:28px;
text-decoration:none;
background-color:rgba(0,0,0,0);
border:2px solid #2253bd;
font-size:17px;
color:#2253bd;
}
input[type=email],input[type=password]
{
    outline:none;
    border:none;
    background-color:rgba(0,0,0,0);
    width:235px;
    height:30px;
    font-size:17px;
    color:black;
   
}
::placeholder{
    color:white;
}
input[type=password]:focus,input[type=email]:focus
{
    background-color:#2253bd;
    color:white;
}
hr{
border:1px solid #2253bd;

}
input[type=submit]:hover
{
    background: -webkit-linear-gradient(144deg, rgba(255,0,255,1) 0%, rgba(237,0,255,1) 17%, rgba(189,1,255,1) 65%, rgba(154,3,255,1) 100%);
    cursor:pointer;
    color:white;
    opacity:.8;
    border:2px solid darkviolet;
}
a
{
    text-decoration:none;
    color:#2253bd;
}
@keyframes animate1
{
    0%
    {
        width:0px;
        height:0px;
    }
    100%
    {
        width:290px;
        height:200px;
    }
}
@keyframes animatel
{
    0%
    {
        margin-left:-500px;
        opacity:0;
    }
    100%
    {
        opacity:1;
    }
}
@keyframes animatet
{
    0%
    {
        margin-top:5000px;
    }
    100%
    {
        
    }
}
@keyframes animatel4
{
    0%
    {
        margin-left:-5000px;
        opacity:0;
    }
    100%
    {
        opacity:1;
    }
}
@keyframes animateb
{
    0%
    {
        margin-top:-8000px;
    }
    100%
    {
        
    }
}
@keyframes animatel5
{
    0%
    {
        margin-left:-8000px;
        opacity:0;
    }
    100%
    {
        opacity:1;
    }
}
@keyframes animatet2
{
    0%
    {
        margin-top:80000px;
    }
    100%
    {
        
    }
}
</style>
