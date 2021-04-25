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
<h1 align=center>Are You Sure. Do You Want To Continue ?</h1>

<br>
<br>
<br>
<br>
<h3>
Certificate Details
</h3>


<?php

$k=$_GET['k'];

$sql="SELECT * FROM logs where num=$k";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$v=$row["id"];

$sql="SELECT * FROM death INNER JOIN family ON death.id=family.num where death.num='$v'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
echo "Name: ".$row["dname"]."<BR>";
echo "Family Name: ".$row["family"]."<BR>";
echo "Family Head: ".$row["owner"]."<BR>";
echo "Phone Number: ".$row["phno"]."<BR>";
echo "Father's Name: ".$row["so"]."<BR>";
echo "Age: ".$row["age"]."<BR>";
echo "Date: ".$row["date"]."<BR>";


?>
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