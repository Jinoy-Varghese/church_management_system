

<?php
include('session.php');

if($_SESSION['type']!="sub")
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

if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['form1']))
{
$username=$_POST['user'];
$password=md5($_POST['password']);
$confirm=md5($_POST['confirm']);
$family=$_POST['family'];
$members=$_POST['members'];
$membername=$_POST['membername'];
$phno=$_POST['phno'];
$owner=$_POST['owner'];
$tax=$_POST['tax'];
$donation=$_POST['donation'];
$extra=$_POST['extra'];
$jd1=$_POST['jd1'];




if(empty($username))
{
    echo "<center><font color=white>ENTER THE USERNAME !</font></center>";
}
else if(empty($family))
{
    echo "<center><font color=white>ENTER THE FAMILY NAME !</font></center>";
}
else if(empty($members))
{
    echo "<center><font color=white>ENTER THE MEMBER COUNT !</font></center>";
}
else if(empty($membername))
{
    echo "<center><font color=white>ENTER THE MEMBER NAMES !</font></center>";
}
else if(empty($phno))
{
    echo "<center><font color=white>ENTER THE PHONE NUMBER !</font></center>";
}
else if(empty($owner))
{
    echo "<center><font color=white>ENTER THE OWNER !</font></center>";
}
else if(empty($tax))
{
    echo "<center><font color=white>ENTER THE TAX AMOUNT !</font></center>";
}

else if(empty($donation))
{
    echo "<center><font color=white>ENTER THE DONATION !</font></center>";
}
else if(empty($extra))
{
    echo "<center><font color=white>ENTER THE EXTRA !</font></center>";
}
else if(empty($jd1))
{
    echo "<center><font color=white>ENTER THE JOIN DATE !</font></center>";
}


else
{


if(strlen($password)<6)
{
echo "<center><font color=white>Password should be aleast 6 characters !</font></center>";
}
else
{
if($confirm==$password)
{
   
    $sql="INSERT INTO family(family,members,membername,phno,owner,tax,donation,extra,user,jd1)values('$family',$members,'$membername',$phno,'$owner',$tax,$donation,$extra,'$username','$jd1');";
    if(mysqli_query($conn,$sql))
    {
        $sql="INSERT INTO login(username,password)values('$username','$password')";
        mysqli_query($conn,$sql);
        echo "<center><font color=white>New Account Created!</font></center>";
    }
    else
    {
        echo "error :".$conn->error;
    }
}

else
{
echo "<center><font color=white>Entered password did not match the confirmed password !</font></center>";
}
}


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




<link rel="shortcut icon" type="image/png" href="images/eedge.png"/>
<html>
<head><title>eParish</title></head>


<body>
<div class=stickify>
<a href=welcome3 class=a><div class=home><i class="fas fa-home"></i>&nbsp;HOME</div></a>
<a href=insert3 class=a><div class=insert><i class="fas fa-server"></i>&nbsp;UPDATE</div></a> 
<a href=view3 class=a><div class=view><i class="fas fa-eye"></i>&nbsp;VIEW</div></a>
<a href=settings3 class=a><div class=logout><i class="fas fa-cog"></i> &nbsp; SETTINGS</div></a>
</div>
<div class=box>
<div class=box1>
<br><br> 
<a href=# class=side><i class="fas fa-user-circle" id=aboutm>&nbsp;About </i></a>
<br><br><br><br>
<a href=# class=side><i class="fas fa-user-plus" id=newm>&nbsp;New Member </i></a>
<br><br><br><br>
<a href=# class=side><i class="fas fa-key" id=changem>&nbsp;Change Password </i></a>
<br><br><br><br>
<a href=# class=side><i class="fas fa-trash" id=deletem>&nbsp;Delete Account </i></a>
<br><br><br><br>
<a href=help class=side><i class="fas fa-question-circle">&nbsp;Help </i></a>
<br><br><br><br>
<a href=logout class=side><i class="fas fa-sign-out-alt">&nbsp;Logout </i></a>

</div>

<div class=box2>

<div id="about" class=hide>
<br>
<br><br>
<br>
Username :   <?php echo $_SESSION['username']; ?>
<br>
<br>
Position : Employee
</div>




<div id="new" class=hide style=padding-left:35px;>
<br>
<br>
<h2>Create new famaily</h2><br><br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data" autocomplete="off">


<input type="text" name="family" placeholder="FAMILY NAME" required>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="members" placeholder="NUMBER OF MEMBERS" required>
<br><br>
<textarea name="membername" placeholder="NAMES OF MEMBERS" style=width:166px;height:25px; required></textarea>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="phno" placeholder="CONTACT NUMBER" required>
<br><br>
<input type="text" name="owner" placeholder="HOUSE OWNER" required>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="tax" placeholder="SUBSCRIPTION" required>
<br><br>
<input type="text" name="donation" placeholder="DONATION" required>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="extra" placeholder="ADDITIONAL" required>
<br><br>
<input type="date" name="jd1" required required  style=width:166px;> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<input type="email" name="user" placeholder="USER ID" required autocomplete="new-username">
<br><br>
<input type="password" name=password placeholder="PASSWORD" required autocomplete="new-password">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="password" name=confirm placeholder="CONFIRM PASSWORD" required>
<br><br>            
<input type="submit" value="Create" name="form1" class=submit>
<br><br>  
<br><br>  
</form>







</div>

<div class=hide id="change">
<form method=post action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete=false>

<input type=text name=old placeholder="Old Password" autocomplete=false>
<br><br>
<input type=password name=password placeholder="New Password" autocomplete=false>
<br><br>
<input type=password name=confirm placeholder="Confirm Password">
<br><br>
<input type=submit value=change name="form2"  class=submit>
</form>
</div>



<div class=hide id="delete">

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

<br><br>
<input type="password" name=password placeholder="PASSWORD">
<br><br>
<input type="submit" value="delete" name="form3"  class=submit>
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
.fa-sign-out-alt,.fa-user-plus,.fa-user-circle,.fa-question-circle,.fa-key,.fa-trash
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
#change,#delete,#new
{
    
    width:99%;
    height:100%;
    overflow-y:scroll;
}
#new
{
    width:95% !important;
}
.submit 
{
    border:none;
	padding-top:4px;
	margin-top:10px;
	
	text-align:center;
	width:80px;
	height:25px;
	font-size:15px;
	font-family:arial;
	color:white;
	background: rgb(0,18,36);
background: linear-gradient(90deg, rgba(0,18,36,1) 0%, rgba(47,91,245,1) 0%, rgba(49,67,249,1) 100%);

}
</style>