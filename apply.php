<link rel="shortcut icon" type="image/png" href="images/eedge.png"/>
<link href="fontawesome-free-5.11.2-web/css/all.min.css" rel=stylesheet>
<head><title>eParish</title></head>
<?php
include("session.php");
   
    if(isset($_POST['apply']))
{
    $b=$_POST["id"];
    $sql="SELECT * FROM death where num=$b";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    $des="death";
    $status="processing";
    $id=$row["num"];

    $d=date("yy-m-d");

    $sql="INSERT INTO logs(des,status,id,ldate)values('$des','$status',$id,'$d')";   
    if($conn->query($sql))
    {
    
        echo '<script>alert("Application Submitted Sucessfully");';
        echo 'window.location="view2.php";</script>';

    }
    else
    {
        echo '<script>alert("Application Submission Failed");';
        echo 'window.location="view2.php";</script>';
    }
    
}
if(isset($_POST['cancel']))
{
   header("location:view2.php");
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

$k=$_GET['c'];
$b=$_GET['v'];
$sql="SELECT * FROM death INNER JOIN family ON death.id=family.num where family.num=$b";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
echo "Name: ".$row["dname"]."<BR>";
echo "Family Name: ".$row["family"]."<BR>";
echo "Family Head: ".$row["owner"]."<BR>";
echo "Phone Number: ".$row["phno"]."<BR>";
echo "Father's Name: ".$row["so"]."<BR>";
echo "Date: ".$row["date"]."<BR>";


?>
<BR><BR><BR><BR>
<form method=post action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
<input type=hidden name=id value=<?php echo $k; ?>>


<button class=apply name=apply><i class="far fa-check-circle"></i> Apply</button>
<button class=cancel name=cancel><i class="far fa-times-circle"></i> Cancel</button>
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