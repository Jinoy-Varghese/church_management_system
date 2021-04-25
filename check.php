<link rel="shortcut icon" type="image/png" href="images/eedge.png"/>
<link href="fontawesome-free-5.11.2-web/css/all.min.css" rel=stylesheet>
<head><title>eParish</title></head>
<?php
include("session.php");
   

    if(isset($_POST['apply']))
{
 

    
$b=$_POST["id"];
    
    
    $sql="UPDATE logs set status='approved' where num='$b'";   
    if($conn->query($sql))
    {
        echo '<script>alert("Application Approved");';
        echo 'window.location="insert.php";</script>';

    }
    
}
if(isset($_POST['cancel']))
{
    $b=$_POST["id"];


    $sql="UPDATE logs set status='rejected' where num='$b'";   
    if($conn->query($sql))
    {
        echo '<script>alert("Application Rejected");';
        echo 'window.location="insert.php";</script>';

    }
}








?>
<br>
<h1 align=center>Are You Sure. Do You Want To Approve ?</h1>

<br>
<br>
<br>
<h2 align=center>
Certificate Details
</h2>
<br>
<div style=margin-left:35%;>

<?php

$k=$_GET['k'];

$sql="SELECT * FROM logs where num=$k";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$v=$row["id"];

$sql="SELECT * FROM birth INNER JOIN family ON birth.id=family.num where birth.num='$v'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
echo "<b>Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp; </b>".ucfirst($row["bname"])."<BR><BR>";
echo "<b>Family Name&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp; </b>".ucfirst($row["family"])."<BR><BR>";
echo "<b>Family Head &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp; </b>".ucfirst($row["owner"])."<BR><BR>";
echo "<b>Phone Number&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp; </b>".ucfirst($row["phno"])."<BR><BR>";
echo "<b>Father's Name&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp; </b>".ucfirst($row["so"])."<BR><BR>";
echo "<b>Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp; </b>".date('d-m-Y',strtotime($row["date"]))."<BR><BR>";
echo "<b>Type  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp; </b>Baptism"


?>
</div>
<BR><BR><BR><BR>
<form method=post action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
<input type=hidden name=id value=<?php echo $k; ?>>


<button class=apply name=apply><i class="far fa-check-circle"></i> Approve</button>
<button class=cancel name=cancel><i class="far fa-times-circle"></i> Reject</button>
</form>
<style>

.apply 
{

    border:none;
    background:#29a329;
    color:white;
    width:10vw;
    height:6vh;
    font-size:18px;
    margin-left:36vw;
}
.cancel
{
    border:none;
    color:white;
    background:#ff1a1a;
    width:10vw;
    height:6vh;
    font-size:18px;
    margin-left:100px;
}

</style>