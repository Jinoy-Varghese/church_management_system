<link rel="shortcut icon" type="image/png" href="images/eedge.png"/>
<link href="fontawesome-free-5.11.2-web/css/all.min.css" rel=stylesheet>
<head><title>eParish</title></head>
<?php
include("session.php");
   
    if(isset($_POST['apply']))
    {
    $b=$_POST["id"];
    
    $sql="SELECT * FROM wedding where id=$b";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    $des="wedding";
    $status="processing";
    $id=$row["id"];
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
<h1 align=center>Are You Sure. Do You Want To Apply ?</h1>


<br>

<br>
<h2 align=center>
Certificate Details
</h2><br>
<div style=margin-left:35%;>

<?php

$k=$_GET['c'];
$b=$_GET['v'];
$sql="SELECT * FROM wedding INNER JOIN family ON wedding.wid=family.num where wedding.id=$b";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
echo "<b>Groom Name &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b>".ucfirst($row["bride"])."<BR><BR>";
echo "<b>Bride Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b>".ucfirst($row["groom"])."<BR><BR>";
echo "<b>Family Name&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b>".ucfirst($row["family"])."<BR><BR>";
echo "<b>Family Head &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b>".ucfirst($row["owner"])."<BR><BR>";
echo "<b>Phone Number &nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b>".ucfirst($row["phno"])."<BR><BR>";
echo "<b>Father's Name&nbsp; :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> ".ucfirst($row["so"])."<BR><BR>";
echo "<b>Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b>".date('d-m-Y',strtotime($row["date"]))."<BR><BR>";


?>


</div>
<BR><BR><BR><BR>
<form method=post action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
<input type=hidden name=id value="<?php echo $b; ?>">


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