<?php
include('config.php');
include "session.php";
if($_SESSION['type']!="user")
{
    header("location:loginform.php");
}

if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['form3']))
{
$username=$_SESSION['username'];
$password=md5($_POST['password']);

$sql="SELECT * FROM login WHERE username='$username' AND password='$password'";

$result=$conn->query($sql);
if($result->num_rows==1)
{
    $sssql="DELETE FROM family WHERE user='$username'";
    $conn->query($sssql);
  
    $sql="DELETE FROM login WHERE username='$username' AND password='$password'";

    if(mysqli_query($conn,$sql))
    {
    $_SESSION['loggedin']=false;
    header("location:loginform.php");
    }
}

else
{
    echo "<center><font color=white>Invalid username or password !</font></center>";
}
}


if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['form2']))
{
$old=md5($_POST['old']);
$password=md5($_POST['password']);
$confirm=md5($_POST['confirm']);
$username=$_SESSION['username'];

$sql="SELECT * FROM login WHERE username='$username' AND password='$old'";
$result=$conn->query($sql);
if($result->num_rows==1)
{


if(strlen($password)<6)
{
echo "<center><font color=white>Password should be aleast 6 characters !</font></center>";
}
else
{
if($confirm==$password)
{
   
    $sql="UPDATE login SET password='$password' where username='$username' AND password='$old';";
    if(mysqli_query($conn,$sql))
    {
        echo "<center><font color=white>Password Changed !</font></center>";
    }
    else{
        echo "error:".$sql."".msqli_error($conn);
    }
}

else
{
echo "<center><font color=white>Entered password did not match the confirmed password !</font></center>";
}
}


}
else
{
    echo "<CENTER><font color=white>invalid password!</font></CENTER>";
}


}
?>
<link href="fontawesome-free-5.11.2-web/css/all.min.css" rel=stylesheet>
<link rel="shortcut icon" type="image/png" href="images/eedge.png"/>
<script src=jquery.txt></script>


<script>


$(document).ready(function(){
    $("#aboutm").click(function(){
$("#about").addClass("show");
$("#new").removeClass("show");
$("#change").removeClass("show");
$("#delete").removeClass("show");
    });

    $("#newm").click(function(){
$("#new").addClass("show");
$("#about").removeClass("show");
$("#change").removeClass("show");
$("#delete").removeClass("show");
    });

    $("#changem").click(function(){
$("#change").addClass("show");
$("#about").removeClass("show");
$("#new").removeClass("show");
$("#delete").removeClass("show");
    });


    $("#deletem").click(function(){
$("#delete").addClass("show");
$("#about").removeClass("show");
$("#new").removeClass("show");
$("#change").removeClass("show");
    });







});
</script>





<html>
<head><title>eParish</title></head>
<body>
<div class=stickify>
<a href=welcome2.php class=a><div class=home><i class="fas fa-home"></i>&nbsp;HOME</div></a>
<a href=insert2.php class=a><div class=insert><i class="fas fa-edit"></i>&nbsp;EDIT</div></a> 
<a href=view2.php class=a><div class=view><i class="fas fa-eye"></i>&nbsp;VIEW</div></a>
<a href=settings2.php class=a><div class=logout><i class="fas fa-cog"></i> &nbsp; SETTINGS</div></a>
</div>
<div class=box>
<div class=box1>
<br><br> 
<a href=# class=side><i class="fas fa-user-circle" id=aboutm>&nbsp;About </i></a>
<br><br><br><br>

<a href=# class=side><i class="fas fa-key" id=changem>&nbsp;Change Password </i></a>
<br><br><br><br>
<a href=# class=side><i class="fas fa-trash" id=deletem>&nbsp;Delete Account </i></a>
<br><br><br><br>
<a href=help.php class=side><i class="fas fa-question-circle">&nbsp;Help </i></a>
<br><br><br><br>
<a href=logout.php class=side><i class="fas fa-sign-out-alt">&nbsp;Logout </i></a>

</div>
<b>
<div class=box2>
<div id="about" class=hide>
<?php
$username=$_SESSION['username'];
$sql="SELECT * FROM family where user='$username'";
$result=$conn->query($sql);
  if($result->num_rows>0)
    {
    while($row=$result->fetch_assoc())
    {
    echo "<br><br>&nbsp; User Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ";
     echo $row["user"];
     echo "<br><br>&nbsp; Family Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ";
     echo $row["family"];
     echo "<br><br>&nbsp; Members&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ";
     echo $row["members"];
     echo "<br><br>&nbsp; Member Names&nbsp;&nbsp;&nbsp;: ";
     echo $row["membername"];
     echo "<br><br>&nbsp; Head&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ";
     echo $row["owner"];
     echo "<br><br>&nbsp; Join Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ";
     echo date('d-m-Y',strtotime($row["jd1"]));
     echo "<br><br>&nbsp; Contact No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ";
     echo $row["phno"];
     echo "<br><br>&nbsp; Subscription&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ";
     echo $row["tax"];
     echo "<br><br>&nbsp; Donation&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ";
     echo $row["donation"];
     echo "<br><br>&nbsp; Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ";
     echo $row["total"];
     echo "<br><br>&nbsp; Due&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ";
     echo $row["due"];






    }
}
else{
    echo "0 rows";
}


?>
</div>


</b>




<div class=hide id="change">
<form method=post action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

<input type=text name=old placeholder="Old Password">
<br><br>
<input type=password name=password placeholder="New Password">
<br><br>
<input type=password name=confirm placeholder="Confirm Password">
<br><br>
<input type=submit value=change name="form2">
</form>
</div>



<div class=hide id="delete">

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

<br><br>
<input type="password" name=password placeholder="PASSWORD">
<br><br>
<input type="submit" value="delete" name="form3">
</form>





</div>


</div>
</div>
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
    background-color:rgba(255,255,255,.3);
    COLOR:black;
    display:flex;
   justify-content:SPACE-BETWEEN;
   align-items:center;

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

.a
{
    margin-left:20px;
    margin-right:20px;
    height:100%;
    background-color:rgba(255,255,255,0);
    text-decoration:none; 
    width:30%;

    align-items:center;
    display:flex;
    color:black;
}
a:nth-child(4)
{
    box-shadow:inset 0 0 5px #ddd;
    color:white;
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
.box
{
    background-color:rgba(255,255,255,.6);
    height:80vh;
    width:95vw;
    border-radius:15px;
    margin:3.5vh;
}
.box1
{
    width:25vw;
  
    height:80vh;
    display:block;
    float:left;
    
    border-right:2px solid black;
}
.box2
{
    width:69.6vw;
    height:80vh;
    float:left;
    display:block;
  
}
.fa-sign-out-alt,.fa-user-circle,.fa-question-circle,.fa-key,.fa-trash
{
    font-size:24px;
    display:block;
    position:absolute;
    margin-left:20px;
    color:black;
}
.fas:hover
{
    font-size:31px;
}
.hide
{
    display:none;
}
.show
{
    display:block;
}
#change 
{
    
    width:100%;
    height:100%;
}
#about 
{
    text-transform:uppercase;

}
</style>