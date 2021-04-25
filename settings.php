<?php
include 'session.php';

if($_SESSION['type']!="admin")
{
    header("location:loginform.php");
}





if (isset($_POST['upload']))
 {
  	$image = $_FILES['image']['name'];
  	
  	$target = "images/".basename($image);

  	$sql = "UPDATE priest set image='$image'";
  	mysqli_query($conn, $sql);

  	move_uploaded_file($_FILES['image']['tmp_name'], $target);
 }


if (isset($_POST['checkb']))
 {
    $sjql="select * from priest";
    $result=$conn->query($sjql);
    $row=$result->fetch_assoc();
    
 if($row['flag']==0)
 {
     $x=1;
     $sjql="UPDATE priest set flag='$x'";
     $conn->query($sjql);
     
 }
 }
 if (!isset($_POST['checkb']))
 {
    $sjql="select * from priest";
    $result=$conn->query($sjql);
    $row=$result->fetch_assoc();
 if($row['flag']==1)
 {
    $x=0;
    $sjql="UPDATE priest set flag='$x'";
    $conn->query($sjql);
 }



 }


if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['save4']))
{
    $d1=$_POST['edit441'];

    if(empty($d1))
    {
        echo "<div class=update><center><font  color=white>THE FIELD IS EMPYT !</font></center></div>";
    }
 
else
{

$sql="UPDATE priest set jd='$d1';";


if($conn->query($sql))
{
        echo "<center><font color=white>UPDATED SUCESSFULLY !</font></center>";
}

else
{
    echo "<center><font color=white>UPDATION FAILED !</font></center>";
}
}
}



if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['save5']))
{
    $d1=$_POST['edit551'];
    
    if(empty($d1))
    {
        echo "<div class=update><center><font  color=white>THE DATE FIELD IS EMPYT !</font></center></div>";
    }
 
else
{

$sql="UPDATE priest set dob='$d1';";


if($conn->query($sql))
{
        echo "<center><font color=white>UPDATED SUCESSFULLY !</font></center>";
}

else
{
    echo "<center><font color=white>UPDATION FAILED !</font></center>";
}
}
}




if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['save1']))
{
$username=$_POST['edit11'];

$sql="UPDATE priest set username='$username'";


if($conn->query($sql))
{
        echo "<center><font color=white>UPDATED SUCESSFULLY !</font></center>";
}

else
{
    echo "<center><font color=white>UPDATION FAILED !</font></center>";
}
}



if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['save2']))
{
$username=$_POST['edit22'];

$sql="UPDATE priest set cbefore='$username'";


if($conn->query($sql))
{
        echo "<center><font color=white>UPDATED SUCESSFULLY !</font></center>";
}

else
{
    echo "<center><font color=white>UPDATION FAILED !</font></center>";
}
}



if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['save3']))
{
$username=$_POST['edit33'];

$sql="UPDATE priest set tfd='$username'";


if($conn->query($sql))
{
        echo "<center><font color=white>UPDATED SUCESSFULLY !</font></center>";
}

else
{
    echo "<center><font color=white>UPDATION FAILED !</font></center>";
}
}




if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['save6']))
{
$username=$_POST['edit66'];

$sql="UPDATE priest set experience='$username'";


if($conn->query($sql))
{
        echo "<center><font color=white>UPDATED SUCESSFULLY !</font></center>";
}

else
{
    echo "<center><font color=white>UPDATION FAILED !</font></center>";
}
}







if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['form3']))
{
$username=$_SESSION['username'];
$id=$_POST['id'];

$sql="SELECT * FROM login WHERE type='sub' and num='$id'";

$result=$conn->query($sql);
if($result->num_rows==1)
{
    $sql="DELETE FROM login WHERE num='$id'";
    if(mysqli_query($conn,$sql))
    {
        echo "<center><font color=white>DELETED SUCESSFULLY !</font></center>";
    }
    else
    {
        echo "<center><font color=white>DELETION FAILED !</font></center>";
    }
}

else
{
    echo "<center><font color=white>Invalid ID !</font></center>";
}
}

if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['form1']))
{
$username=$_POST['user'];
$password=md5($_POST['password']);
$confirm=md5($_POST['confirm']);

if(strlen($password)<6)
{
echo "<center><font color=white>Password should be aleast 6 characters !</font></center>";
}
else
{
if($confirm==$password)
{
   
    $sql="INSERT INTO login (username,password,type)values('$username','$password','sub');";
    if(mysqli_query($conn,$sql))
    {
        echo "<center><font color=white>New Account Created!</font></center>";
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
<link rel="shortcut icon" type="image/png" href="images/eedge.png"/>

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


$("#edit1").click(function(){
    $("#edit11").toggleClass("show");
    $("#save1").toggleClass("show");
});

$("#edit2").click(function(){
    $("#edit22").toggleClass("show");
    $("#save2").toggleClass("show");
});


$("#edit3").click(function(){
    $("#edit33").toggleClass("show");
    $("#save3").toggleClass("show");
});

$("#edit4").click(function(){
    $("#edit441").toggleClass("show");
    $("#edit442").toggleClass("show");
    $("#edit443").toggleClass("show");
    $("#save4").toggleClass("show");
});

$("#edit5").click(function(){
    $("#edit551").toggleClass("show");
    $("#edit552").toggleClass("show");
    $("#edit553").toggleClass("show");
    $("#save5").toggleClass("show");
});

$("#edit6").click(function(){
    $("#edit66").toggleClass("show");
    $("#save6").toggleClass("show");
});

$("#pic1").click(function(){
    $("#pic2").addClass("show");
    
});






});
</script>





<html>
<head><title>eParish</title></head>
<body>
<div class=stickify>
<a href=welcome.php class=a><div class=home><i class="fas fa-home"></i>&nbsp;HOME</div></a>
<a href=insert.php class=a><div class=insert><i class="fas fa-server"></i>&nbsp;UPDATE</div></a> 
<a href=view.php class=a><div class=view><i class="fas fa-eye"></i>&nbsp;VIEW</div></a>
<a href=settings.php class=a><div class=logout><i class="fas fa-cog"></i> &nbsp; SETTINGS</div></a>
</div>
<div class=box>
<div class=box1>
<br><br> 
<a href=# class=side><i class="fas fa-user-circle" id=aboutm>&nbsp;About </i></a>
<br><br><br><br>
<a href=# class=side><i class="fas fa-user-plus" id=newm>&nbsp;New User </i></a>
<br><br><br><br>
<a href=# class=side><i class="fas fa-key" id=changem>&nbsp;Change Password </i></a>
<br><br><br><br>
<a href=# class=side><i class="fas fa-trash" id=deletem>&nbsp;Delete Account </i></a>
<br><br><br><br>
<a href=help.php class=side><i class="fas fa-question-circle">&nbsp;Help</i></a>
<br><br><br><br>
<a href=logout.php class=side><i class="fas fa-sign-out-alt">&nbsp;Logout </i></a>

</div>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
<div style=margin-top:485px;margin-left:680px;position:absolute;>Allow employee access and edit the death, birth and marriage records
<div style=margin-top:-21px;position:absolute;margin-left:450px;>
<label class="switch">
  <input type="checkbox" name=checkb value=1 onchange=this.form.submit()  
  
  <?php
  $jql="select flag from priest";
  $result=$conn->query($jql);
  $row=$result->fetch_assoc();
  if($row["flag"]==1)
  {
  echo "checked";
  }
  ?>
  >
  <span class="slider round"></span>
</label>
</div>
</div>
</form>
<div class=box2>






<div id="about" class=hide>

<?php
$result = mysqli_query($conn, "SELECT * FROM priest");
$row = mysqli_fetch_array($result); 
echo "<i class='fas fa-edit' id=picedit style=position:absolute;margin-left:705px;margin-top:129px;z-index:1;color:black></i><img style=z-index:0;margin-top:40px;border-radius:15px; src='images/".$row['image']."'>";
?>
 <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
<input type="file" name="image" class=pic1 id=pic1 style=z-index:3;><input type=submit value=save name=upload class='pic2 hide' id=pic2> 
</form>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
<div class=aboutbox>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM priest");
    $row = mysqli_fetch_array($result); 
    ?>
<b>User Name:</b> <?php echo $row['username']; ?><input type=text name=edit11 id=edit11 class=hide placeholder="edit name">&nbsp;<i class="fas fa-edit" id="edit1"></i>
<input type=submit name=save1 id=save1 value=save class=hide>
<br><br>
<b>Previous Church:</b> <?php echo $row['cbefore']; ?><input type=text name=edit22 id=edit22 class=hide placeholder="edit previous church">&nbsp;<i class="fas fa-edit" id="edit2"></i>
<input type=submit name=save2 id=save2 value=save class=hide>
<br><br>
<b>Message:</b> <?php echo $row['tfd']; ?><textarea id=edit33 name=edit33 class=hide placeholder="edit message"></textarea>&nbsp;<i class="fas fa-edit" id="edit3"></i>
<input type=submit name=save3 id=save3 value=save class=hide style="margin-top:-17px;margin-left:124px;">
<br><br>
<b>Join date:</b> <?php echo $row['jd']; ?><input type=DATE STYLE="width:auto;" name=edit441 id=edit441 class=hide placeholder="dd" >&nbsp;<i class="fas fa-edit" id="edit4"></i>
<input type=submit name=save4 id=save4 value=save class=hide style="margin-left:141px;height:22px;">
<br><br>
<b>Date of Birth:</b> <?php echo $row['dob']; ?><input type=DATE STYLE="width:auto;" name=edit551 id=edit551 class=hide placeholder="dd" >&nbsp;<i class="fas fa-edit" id="edit5"></i>
<input type=submit name=save5 id=save5 value=save class=hide style="margin-left:141px;height:22px;">
<br><br>
<b>Experience:</b> <?php echo $row['experience']; ?><input type=text name=edit66 id=edit66 class=hide placeholder="edit experience">&nbsp;<i class="fas fa-edit" id="edit6"></i>
<input type=submit name=save6 id=save6 value=save class=hide>

</form>
</div>


</div>

</FORM>



<div id="new" class=hide>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

<div style=margin-left:30px;margin-top:20px;>

<br>
<h2>Create a new employee account</h2>
<br>
<br>
<input type="email" name="user" placeholder="USER NAME" required>
<br><br>
<input type="password" name=password placeholder="PASSWORD" required>
<br><br>
<input type="password" name=confirm placeholder="CONFIRM PASSWORD" required>
<br><br>       
       

<input class=submit type="submit" value="Create" name="form1">
</form>

</div>





</div>

<div class=hide id="change">
<form method=post action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

<input type=text name=old placeholder="Old Password" required>
<br><br>
<input type=password name=password placeholder="New Password" required>
<br><br>
<input type=password name=confirm placeholder="Confirm Password" required>
<br><br>
<input type=submit value=change name="form2">
</form>
</div>



<div class=hide id="delete">

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

<br><br>
Enter the employee id: 
<input type="text" name=id placeholder="EMPLOYEE ID" required>
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
.submit 
{
    border:none;
	padding-top:4px;
	margin-top:10px;
	
	text-align:center;
	width:80px;
	height:24px;
	font-size:15px;
	font-family:arial;
	color:white;
	background: rgb(0,18,36);
background: linear-gradient(90deg, rgba(0,18,36,1) 0%, rgba(47,91,245,1) 0%, rgba(49,67,249,1) 100%);

}
img 
{
    float: left;
   	margin: 0px;
   	width: 120px;
   	height: 110px;
    float:left;
    position:absolute;
    margin-left:700px;
    margin-top:20px;
    border-radius:15px;
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
    background:url("30.jpg",.3);
    background-size:cover;
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

.box1 .fas:hover
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
.aboutbox 
{
    width:800px;
    height:400px;
    padding-top:10%;
    padding-left:2.5%;
    font-size:18px;

}
.aboutbox i
{
    margin-left:1px;
    font-size:11px;
}
.aboutbox input 
{
    position:absolute;
    border:1px solid #1a75ff;
}
#save1,#save2,#save3,#save4,#save5,#save6 
{
    margin-left:130px;
    background-color:#1a75ff;
    border:0;
    height:17.2px;
    width:35px;
    color:white;
}
.pic1
{
    position:absolute;
    opacity:0;
    margin-left:700px;
    margin-top:130px;
    width:20px;
}
.pic2 
{
    position:absolute;  
    margin-left:700px;
    margin-top:155px;
    background-color:#1a75ff;
    border:0;
    height:17.2px;
    width:120px;
    color:white;
}
#edit441,#edit442,#edit443,#edit551,#edit552,#edit553
{
    width:60px;
}
.switch {
  position: relative;
  display: inline-block;
  width: 48px;
  height: 23px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 20px;
  width: 20px;
  left: 1px;
  bottom: 1.4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
