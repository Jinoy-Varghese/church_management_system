<script src=jquery.txt></script>
<link href="fontawesome-free-5.11.2-web/css/all.min.css" rel=stylesheet>
<link rel="shortcut icon" type="image/png" href="images/eedge.png"/>
<?php
   $servername="localhost";
   $username="root";
   $password="";
   $dbname="mydb";
   //connecting...
   $conn=new mysqli($servername,$username,$password,$dbname);
   //checking...
   if($conn->connect_error)
   {
       die("connection failed:".$conn->connect_error);
   }
  $msg = "";

 
  if (isset($_POST['upload']))
 {
  	$image = $_FILES['image']['name'];
  	
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO images (image) VALUES ('$image')";
  	mysqli_query($conn, $sql);

  	move_uploaded_file($_FILES['image']['tmp_name'], $target);
 }
  $result = mysqli_query($conn, "SELECT * FROM images");
?>

<html>
<head><title>eParish</title></head>
<a href="http://localhost/project/loginform.php">
<div style="font-size: medium;position:absolute;color:white;text-decoration:none;margin-top:11px;margin-left:94.5vw;">
login <i class="fa fa-sign-in-alt"></i></div>
</a>

<a href="http://localhost/project/eparish.php" style="text-decoration:none;">
<div class="image-header"><span><i class="fas fa-arrow-left" style="position:absolute;color:white;margin-top:11px;margin-left:11px;"></i></span><div>Image Gallery</div></div>
</a>

<div class=eparish><i class="fab fa-edge">&nbsp;Parish</i></div>

           
<div class="slider">
    <ul>
       
        <?php
    while ($row = mysqli_fetch_array($result))
     {
  
      	echo "<li><img src='images/".$row['image']."'></li>";
   
     }
  ?>
    </ul>
</div>

<div class=gallery>

<?php
 $result = mysqli_query($conn, "SELECT * FROM images");
 while ($row = mysqli_fetch_array($result))
     {
  
      	echo "<a href='images/".$row['image']."' imageanchor=1 class=iimg><img src='images/".$row['image']."' class=img></a>";
   
     }
?>

	</div>
</html>
<style>
*{
		margin: 0;
		padding: 0;
		list-style: none;
        font-family: 'Helvetica','Arial',sans-serif;
 
	}
	
	body{
		width: 100%;
		
		background: rgba(200,200,300,.3);
		background-size: cover;
		overflow-x:hidden;
	}
	::-webkit-scrollbar
	{
		display:none;
	}
	.eparish 
	{
		position:absolute;
		font-size:60px;
		text-align:center;
		width:100%;
		margin-top:300px;
		margin-left:-20px;
	}
	.image-header div
	{
		width:100%;
		font-size:35px;
		text-align:center;
		font-family:"times new roman";
		font-style:italic,bold;
		margin-left:-20px;
		color:white;
		
		}
		.image-header
		{
		background-color:rgba(0,0,0,.9);
		}
	.slider{
		width: 360px;
		height: 205px;
		position: relative;
		margin: auto;
		padding-top:5%;
		perspective: 1000px;
		margin-bottom:100px;
	
	}
	.slider ul{
		height: 205px;
		position: relative;
		left: -1100px;
	}
	.iimg
  {
       float:left;
       border:0px solid black;
       width:auto;
       height:auto;
       border-radius:0px;
   }
   .gallery::before
   {
	content:'';
	position: absolute;
	background: -webkit-linear-gradient(144deg, rgba(255,0,255,1) 0%, rgba(237,0,255,1) 27%, rgba(189,1,255,1) 65%, rgba(154,3,255,1) 100%);

	   height:5px;
	   width:100vw;
	   z-index:1;
	   margin-top:-6px;
   }
   .gallery 
   {
	   width:100%;
   }
   .img
{

   	margin: 1px;
   	width: 254px;
   	height: 115px;
    float:left;
    border-radius:0px;
	border-radius:2px;
}
.slider li{
		width: 300px;
		height: 205px;
		float: left;
		box-sizing: border-box;
		padding: 0px;
		cursor: pointer;
		transform: rotateY(-60deg);
		transition: .6s;
		overflow: visible;
  
        line-height: 205px;
        font-size: 36px;
	}
	.slider li img
	{
		width: 100%;
		height: auto;
		
		width:350px;
		-webkit-box-reflect:below 0px -webkit-gradient(linear,left top,left bottom,from(transparent),color-stop(70%,transparent),to(rgba(250,250,250,0.15)));
	}
	.slider li:nth-child(4){
		width: 300px;
		transform: rotateY(0);
		transition: .6s;
	}
	.slider li:nth-child(1), .slider li:nth-child(2), .slider li:nth-child(3){
		transform: rotateY(60deg);
		
		
	}
	.sliderControl{
		width: 500px;
		margin:20px auto;
		text-align: center;
	}
	.sliderControl a{
		display:inline-block;
		width: 50px;
		height: 5px;
		background-color:#333;
		margin-right: 10px;
		cursor:pointer;
		transition: .6s;
	}
	.sliderControl a:nth-child(4){
		background-color:#F6C555;
	}
	
		
		
		.gogo{
			animation: tick-tock 5s steps(5, end) infinite;
		}
		@keyframes tick-tock {
  			to {
    		transform: translateY(-115px);
  			}
		}



</style>
<script>
$(function(){

var sliderWidth = $('.slider').width();
var nowLi = 3;
var li_count = $('.slider li').length;

$('.slider ul').css({width:li_count * sliderWidth});
$('.slider li').css({width:sliderWidth});

for(var i=0; i<li_count;i++){
    $('.sliderControl').append('<a></a>');
}


$('.sliderControl a, .slider li').click(function(){
    nowLi = $(this).index();
    sliderChange();
    $('.sliderControl a').eq(nowLi).css({'background-color':'#F6C555'});
    $('.sliderControl a').eq(nowLi).siblings().css({'background-color':'#333'});
    $('.slider li').eq(nowLi).css({'transform':'rotateY(0)'});
    $('.slider li').eq(nowLi).prevAll().css({'transform':'rotateY(60deg)'});
    $('.slider li').eq(nowLi).nextAll().css({'transform':'rotateY(-60deg)'});
    $('.slider li').eq(0).css({'left':'-60px'});
})


function sliderChange(){
    $('.slider ul').stop(true, false).animate({left: sliderWidth * nowLi * -1}, 500);
}

var timer = setInterval(perpic, 5000);

function perpic(){		
    console.log( 'nowLi = ' + nowLi)
    nowLi++;
    if(nowLi>=li_count){
        nowLi=0;
    };
    sliderChange();
    $('.sliderControl a').eq(nowLi).css({'background-color':'#F6C555'});
    $('.sliderControl a').eq(nowLi).siblings().css({'background-color':'#333'});
    $('.slider li').eq(nowLi).css({'transform':'rotateY(0)'});
    $('.slider li').eq(nowLi).prevAll().css({'transform':'rotateY(60deg)'});
    $('.slider li').eq(nowLi).nextAll().css({'transform':'rotateY(-60deg)'});
}

$('.slider').hover(function(){
    clearInterval(timer);
    $('.timer .percentage').removeClass('gogo');
},function(){
    timer = setInterval(perpic, 5000);
    $('.timer .percentage').addClass('gogo');
})

})
</script>