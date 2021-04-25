<?php
include('config.php');
include "session.php";
if($_SESSION['type']!="admin")
{
    header("location:loginform.php");
}
?>

<html>
<head><title>eParish</title>
<link href="fontawesome-free-5.11.2-web/css/all.min.css" rel=stylesheet>
<link rel="shortcut icon" type="image/png" href="images/eedge.png"/>
<style>
*
{
padding:0;
margin:0;
}
::-webkit-scrollbar
{
    display:none;
}
body
{
    background:url("29.jpg");
    background-size:cover;
    background-attachment:fixed;

}
.stickify
{
    width:100%;
    height:15vh;
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
    height:40px;
    border-radius:15px;
}
.stickify .none:hover
{
    COLOR:white;
    background-color:rgba(34,83,189,0);
    height:40px;
    border-radius:15px;
}

a
{
    margin-left:20px;
    margin-right:20px;
    height:40%;
    background-color:rgba(255,255,255,0);
    text-decoration:none; 
    width:30%;

    align-items:center;
    display:flex;
    color:black;
}
.stickify a:nth-child(4)
{
    background-color:rgba(34,83,189,.3);
    color:white;
    height:40px;
    border-radius:15px;
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
a:nth-child(7):hover i
{
    animation:animate 2s linear infinite;
}
.fab
{
    font-size:50px;
    color:white;
    
}
.logo 
{
    margin-left:12px;
}
.odometer
{
        font-size:100px;
        margin:200px 0;
        text-align: center;
        width: 100%;
        -webkit-animation-duration: 3s;
        animation-duration: 3s;
}
.bible 
{
    width:auto;
    height:100px;
    float:left;  
}
.song 
{
    width:auto;
    height:100px;
    float:right;
    
}
.speech
{
    width:auto;
    height:100px;
    float:left;
}
.mess
{
    width:auto;
    height:100px;
    float:right;
}
.sub1
{
    display:block;
    border:1px solid white;
    border-radius:1px;
    margin-top:120px;
    
    margin-left:45px;
    width:55vw;
    background-color:#fffe;
    height:100.8px;
    animation:animate1 2s 1;
    
}
.sub2
{
    display:block;
    border:1px solid white;
    border-radius:1px;
    margin-top:85px;
    margin-right:40px;
    width:55vw;
    background-color:#fffe;
    height:100.7px;
    float:right;
    animation:animate2 2s 1;
}
.sub3
{
    display:block;
    border:1px solid white;
    border-radius:1px;
    margin-top:85px;
    margin-left:45px;
    width:55vw;
    background-color:#fffe;
    height:100.7px;
    float:left;
    animation:animate3 2s 1;
}
.sub4
{
    display:block;
    border:1px solid white;
    border-radius:1px;
    margin-top:85px;
    margin-right:40px;
    width:55vw;
    background-color:#fffe;
    height:100.7px;
    float:right;
    animation:animate4 2s 1;
}


.main 
{
    
    margin-bottom:50px;
    background-color:rgba(0,0,0,.3);
    height:900px;
}
@keyframes animate1
{
    0%
    {
        margin-left:-900px;
        opacity:0;
    }
    100%
    {
        margin-left:45px;
        opacity:1;
    }
}
@keyframes animate2
{
    0%
    {
        margin-right:-900px;
        opacity:0;
        
        
        
    }
    100%
    {
        margin-right:40px;
        opacity:1;
    }
}
@keyframes animate3
{
    0%
    {
        margin-left:-900px;
        opacity:0;
        margin-top:400px;
    }
    100%
    {
        margin-left:45px;
        opacity:1;
    }
}
@keyframes animate4
{
    0%
    {
        margin-right:-900px;
        opacity:0;
        
        
    }
    100%
    {
        margin-right:40px;
        opacity:1;
    }
}
@keyframes animate11
{
    0%
    {
        
        opacity:0;
        
        
    }
    100%
    {
        
        opacity:1;
    }
}
</style>
</head>
<body>
<div class=head>
<!--navigation-->
<div class=stickify>
<div class=logo><i class="fab fa-edge">&nbsp;Parish</i></div>
<a href=# class=none><div ></div></a>
<a href=# class=none><div ></div></a>
<a href=welcome.php><div class=home><i class="fas fa-home"></i>&nbsp;HOME</div></a>
<a href=insert.php><div class=insert><i class="fas fa-server"></i>&nbsp;UPDATE</div></a>
<a href=view.php><div class=view><i class="fas fa-eye"></i>&nbsp;VIEW</div></a>
<a href=settings.php><div class=logout><i class="fas fa-cog"></i> &nbsp; SETTINGS</div></a>
<!--/navigation-->
</div>
</div>
<br><br><br>
<h1 style='margin-top:100px;width:780px;margin-left:245px;font-size:46px;animation:animate11 3s 1'><center>"

<?php
$ssql="select tfd from priest";
$sresult=$conn->query($ssql);
$srow=$sresult->fetch_assoc();
echo $srow["tfd"];
?>
 "</center></h1>

<br><br><br><br><br><br><br><br><br>
<br><br><br><br><br>
<font size=5 style=float:right;color:white;margin-top:7px;> &nbsp;Members &nbsp;</font><font class="number-animation" style=float:right;color:white; size=6>


<?php 
$sql="SELECT COUNT(num) FROM family";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
echo $row['COUNT(num)'];

?>





  </font>


<div class=main>

<br>

<div class="sub1">
<img src=bible.jpg class=bible> 
<?php 
$sql="SELECT * FROM events where name='bible1'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
echo "<b><div style='margin-left:20vw;font-size:1.4vw'><br>Chapter 1 : ".$row['value']."<br>";

$sql="SELECT * FROM events where name='bible2'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
echo "<br>Chapter 2 : ".$row['value']."</div></b>";


?>

</div>

<div class="sub2">
<img src=song.jpg class=song> 


<?php 
$sql="SELECT * FROM events where name='song1'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
echo "<b><div style='margin-left:10vw;font-size:1.4vw'><br>Song 1 : ".$row['value']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

$sql="SELECT * FROM events where name='song2'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
echo "Song 2 : ".$row['value']."<br>";

$sql="SELECT * FROM events where name='song3'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
echo "<br>Song 3 : ".$row['value']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

$sql="SELECT * FROM events where name='song4'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
echo " Song 4 : ".$row['value']."</div></b>";



?>



</div>

<div class="sub3">
<img src=speech.jfif class=speech>


<?php 
$sql="SELECT * FROM events where name='speech'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
echo "<b><div style='margin-left:23vw;font-size:1.7vw;margin-top:2.5vh;'><br> Speech : ".$row['value']."</div></b>";




?>


</div>

<div class="sub4">
<img src=mess.jpg class=mess> 

<?php 
$sql="SELECT * FROM events where name='msg'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
echo "<b><div style='font-size:1.7vw;display:flex;justify-content:center;align-items:center;margin-left:10px;margin-right:185px;'><br>  ".$row['value']."</div></b>";

?>
</div>
<br>
</div>
<!--number animation-->
<div class="odometer animated fadeIn" id="odometer"></div>

<script>
    var odometer=new Odometer({
        el:$('.odometer')[0]
,
value:1234,
theme: 'minimal'
duration:3000
    });
    odometer.render();
    $($'odometer').text(5445);
    
</script>
<!--number animation-->
</body>
</html>

