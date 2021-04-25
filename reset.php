
<?php

include("config.php");

error_reporting(0);

if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST["submit"]))
{
$username=$_POST['a'];
$password=$_POST['b'];
$pass1=$_POST['pass1'];
$pass2=$_POST['pass2'];

$sql="SELECT * FROM login WHERE username='$username' AND password='$password'";
$result=$conn->query($sql);
if($result->num_rows==1)
{
   if($pass1==$pass2)
   {
       $pass1=md5($pass1);
    $sql="UPDATE login set password='$pass1' WHERE username='$username' AND password='$password'";
    $result=$conn->query($sql);
    
    echo '<script>alert("Password Reset Sucessfully !");';
        echo 'window.location="loginform.php";</script>';
    
   }
   else
   {
    echo "<CENTER>Passwords does't match each other !</CENTER>"; 
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


    <img src=icon/k.jpeg width=270 height=270 style=position:absolute;margin-top:60px;margin-left:12px;opacity:.9>




    </div>
    <h1 class=h1>Reset Password</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <center>
        <br><br><br>
        <br>
        <br><br>
        <br>
        <input type=hidden name=a value="<?php echo $_GET['a'] ?>" >
        <input type=hidden name=b value="<?php echo $_GET['b'] ?>" >
           <font size=4> &#128272;</font> <input type="password" name="pass1" placeholder="New Password" required>
            <hr width=263px >
            <br><br>
            <font size=4>  &#128272; </font><input type="password" name=pass2 placeholder="Confirm Password" required>
            <hr width=263px>
            <br><br>
            <br>
            <input type="submit" value="RESET" NAME=submit>
           <br><br>
           <font style=margin-left:-57px;>Don't want to reset?&nbsp; <A HREF="eparish.php">go back</A></font>
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
    background:white;
    background-size:contain;
    background-repeat:no-repeat;
    background-position:center;
    position:absolute;
    z-index:1;
    margin-left:-165px;
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
    margin-top:-138px;
    margin-left:106px;
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
    color:black;
}
input[type=password]:focus,input[type=email]:focus
{
    background-color:#2253bd;
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
