<?php
        include "config.php";
        
        if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['send']))
        {
         $name=$_POST['name'];
         $contact=$_POST['contact'];
         $email=$_POST['email'];
         $msg=$_POST['msg'];
         if(empty($name))
         {
             echo "<center>Enter your name</center>";
         }
         elseif(empty($contact))
         {
             echo "<center>Enter your contact</center>";
         }
         elseif(empty($email))
         {
             echo "<center>Enter your email</center>";
         }
         elseif(empty($msg))
         {
             echo "<center>Enter your message</center>";
         }
         else
         {
             $sql="INSERT INTO feedback(name,phno,email,msg)values('$name','$contact','$email','$msg')";
            if($conn->query($sql))
             {
            echo "<div class=update><center><font >Feedback submitted sucessfully!</font></center></div>";
             }
            else
            {
            echo "<div class=update><center><font >Feedback submition failed!</font></center></div>";
            }
         }
        }








        ?>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="fontawesome-free-5.11.2-web/css/all.min.css" rel=stylesheet>
<script src=jquery.txt></script>
<link rel="shortcut icon" type="image/png" href="images/eedge.png"/>
<link href="https://unpkg.com/aos@2.3.0/dist/aos.css" rel="stylesheet">
<title>eParish</title>
<style>
*
{
    margin:0;
    padding: 0;
    

}
a{
    text-decoration: none;
}
.left-msg 
{
 
    width:50vw;
    float:left;
}
.right-msg 
{

    width:50vw;
    float:right;
    height:440px;
}
.vicar h1,.footer h1
{
    margin-top:-100px;
    margin-left:50px;
}
.vicar h1::after,.footer h1::after
{
    content:'';
    background: -webkit-linear-gradient(144deg, rgba(255,0,255,1) 0%, rgba(237,0,255,1) 27%, rgba(189,1,255,1) 65%, rgba(154,3,255,1) 100%);
    display:block;
    height:3px;
    width:130px;
    margin:10px auto 50px;
    position:absolute;
    left:50px;
}
.vicar ul
{
    margin-top:30px;
    margin-left:120px;
    list-style-type: none;
  
}
.vicar ul li
{
    line-height: 40px;
    font-size:15px;
    position: relative;
}
.vicar ul li::after
{
content:'';
height:8px;
width:8px;
background: -webkit-linear-gradient(144deg, rgba(255,0,255,1) 0%, rgba(237,0,255,1) 27%, rgba(189,1,255,1) 65%, rgba(154,3,255,1) 100%);
transform: rotate(45deg);
position: absolute;
top:17px;
left:-25px;
}

.footer .input1 
{
    width:300px;
    height:30px;
    padding:8px;
    margin-top:30px;
    margin-left:120px;
    border: 1px solid black;
}

.footer .input2
{
    width:300px;
    height:100px;
    padding:8px;
    margin-top:30px;
    margin-left:120px;
    border: 1px solid rgb(0, 0, 0);
}
::placeholder
{
    font-size: 13px;;
}
.footer-button 
{
    border:none;
    background: -webkit-linear-gradient(144deg, rgba(255,0,255,1) 0%, rgba(237,0,255,1) 27%, rgba(189,1,255,1) 65%, rgba(154,3,255,1) 100%);
    padding:5px;
    color:white;
    margin-top:30px;
    margin-left:120px;
    border:1px  solid blueviolet;
}
.footer-button:hover
{
background:rgba(189,1,255,.04);
color:rgb(121, 10, 224);

}
.footer 
{

    padding-bottom: 60px;
    
}
.location,.phno,.email
{
    padding:8px;
    margin-left:32px;
    margin-top: 0px;
    font-size: 19px;
}
.fa-map-marker-alt,.fa-envelope,.fa-phone
{
    margin-left:10px;
    margin-top: 10px;   
    float:left;
    font-size: 20px;
}





.imgbox
{
    width:450px;
    position:absolute;
    height:265px;
    background-color: blueviolet;
    margin-top: -265px;
    margin-left: 800px;
}
.vicarimg
{
    width:100%;
    height: 100%;
}
.footer
{


    margin-top: 310px;
    height:500px;
}
.footer h1 
{
    text-align: center;
    margin-left: -40px;
   
}
.footer h1::after
{
    left: 44%;
}
body 
{
    
}
::-webkit-scrollbar
{
    display: none;
}
.sticky
{
    width:100%;
    height:10vh;
   position: absolute;
   background-color: #0303039d;
   z-index: 1;
   position: absolute;
   display:flex;
   align-items: center;
}
.fab
{
    font-size:40px;
    color:white;
    
}
.logo 
{
    margin-left:12px;
  
}
.img 
{
    width:100%;
    height:89vh;
    background:url("back1.jpg");
    background-size:cover;
    background-attachment: fixed;
display:flex;
justify-content: center;
align-items: center;
    font-size: 70px;
    font-family:cursive;
    padding:20px;
    color:white;
}
.login
{
    position: absolute;
    border: 2px solid white;
    font-size: 20px;
    color:white;
    border-radius: 15px;
    width:80px;
    text-align: center;
    margin-left: 92%;
    text-decoration:none;
}
.menu1
{
    color:white;
    width:65px;
    text-decoration:none;
    font-size: 23px;
    position: absolute;
    text-align: center;
    margin-left: 85%;
    transition: .1s ease-in-out;
    height:23px;
}
.menu1:hover
{
    border-bottom: 2px solid white;
 
}
.b1,.b2,.b3,.b4
{
    width:250px;
    height:350px;
   text-align:center;
  color: black;
    float:left;
    cursor:pointer;
    padding-left:15px;
    padding-right:15px;
}
.b1:hover,.b2:hover,.b3:hover,.b4:hover
{
    background: -webkit-linear-gradient(144deg, rgba(255,0,255,1) 0%, rgba(237,0,255,1) 27%, rgba(189,1,255,1) 65%, rgba(154,3,255,1) 100%);
    color:white !important;
    box-shadow:-5px 5px 10px 0 rgba(0,0,0,.4);
    transition:.3s;
}
.b1:hover i,.b2:hover i,.b3:hover i,.b4:hover i
{
    color:white;
    border: 3px solid white;
    
}
.body 
{
    display:flex;
    justify-content: space-around;
    align-items: center;
    margin-top: 200px;
    margin-bottom: 200px;

 
}
.fa-calendar-alt,.fa-church,.fa-images,.fa-hand-holding-usd 
{
    font-size: 40px;
    margin-top: 20px;
    border: 3px solid rgb(193, 53, 235);
    padding:15px;
    border-radius: 100%;
    text-align: center;
    width:40px;
    height:40px;
    color:rgb(175, 1, 255);
    
}
.fa-church
{
    font-size:35px;
    text-align:center;
}
hr
{
    height:2px;
    background-color: black;
    margin-top: 20px;
    margin-bottom: 20px;
    border:0px;
}
.clouds 
{
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
}
.clouds img 
{
    position:absolute;
    bottom:0;
    max-width:100%;
    animation:cloudanimate calc(10s * var(--i)) linear infinite;
}
@keyframes cloudanimate
{
    0%
    {
        transform:translateX(-100%);
    }
    100%
    {
        transform:translateX(100%);
    }
}
</style>
</head>
<body>
<div class=sticky>
<div class=logo> 
<i class="fab fa-edge">&nbsp;Parish</i>
</div>
 <a href="http://localhost/project/loginform" class=login>
                login <i class="fa fa-sign-in-alt" style="font-size: medium;"></i>
</a>
</div>
<div class="img">
<div>Welcome to eParish</div>
<div class=clouds>
<img src="icon/cloud1.png" style="--i:1;">
<img src="icon/cloud2.png" style="--i:2;">
<img src="icon/cloud3.png" style="--i:3;">
<img src="icon/cloud4.png" style="--i:4;">
<img src="icon/cloud5.png" style="--i:5;">
</div>
</div>
<div class="body">
<a href=events>
<div class="b1" data-aos="flip-right"><h1><i class="far fa-calendar-alt"></i></h1><font size=6 >Events</font><br><br>
Do not be anxious about anything, but in every situation, by prayer and petition, with thanksgiving, present your requests to God. And the peace of God, which transcends all understanding, will guard your hearts and your minds in Christ Jesus.Be a part of every events.
</div>
</a>
<a href=history>
<div class="b2" data-aos="flip-right"><h1><i class="fas fa-church"></i></h1><font size=6>History</font><br><br>
History can be seen as the introduction of great men and heroes who established their charisma, wisdom and power to make an impact on the whole world.
People will always remember what men have done to the society and how far they have taken civilization.


</div>
    </a>
<a href=image>
<div class="b3" data-aos="flip-left"><h1><i class="far fa-images"></i></h1><font size=6>Gallery</font><br><br>
Memories without a picture are like misprints in a book. You might think their are too much cintent but when you open it their is nothing but unconnected moments which you regret that you had the time to relive it. A good picture depicts a good memory.
</div>
</a>
<a href=pay/TxnTest>
<div class="b4" data-aos="flip-left"><h1><i class="fas fa-hand-holding-usd"></h1></i><font size=6>Donation</font><br><br>
Whoever sows sparingly will also reap sparingly, and whoever sows generously will also reap generously. Each of you should give what you have decided in your heart to give, not reluctantly or under compulsion, for God loves a cheerful giver. Donate each other.
</div>
</a>
</div>
<br><br><br><br><br>
<div class=vicar>
<?php
$sql="select * from priest";
$result=$conn->query($sql);
$row=$result->fetch_assoc();

?>
<h1  data-aos="fade-right">About Vicar</h1>
<ul>
    <li data-aos="fade-right">I am <?php echo $row["username"]; ?></li>
    <li data-aos="fade-right">Joined on <?php echo date('d-m-Y',strtotime($row["jd"])); ?></li>
    <li data-aos="fade-right">Last served at <?php echo $row["cbefore"]; ?></li>
    <li data-aos="fade-right">Wish me on <?php echo date('d-m-Y',strtotime($row["dob"])); ?></li>
    <li data-aos="fade-right">Had experience about <?php echo $row["experience"]; ?> years</li>
</ul>
<div class="imgbox">
<?php

$sql = mysqli_query($conn, "SELECT * FROM priest");
$row = mysqli_fetch_array($sql);
echo "<img src='images/".$row['image']."' class=vicarimg>";
?>
</div>
</div>

<div class=footer data-aos="fade-up">
  
<h1 style="margin-top: 50px;">Get In Touch</h1>
<br><br><br><br>
<div class="left-msg">

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" data-aos="slide-up">
<input type=text name=name placeholder="Your Name" class=input1 required>
<br>
<input type=number name=contact placeholder="Phone Number" class=input1 required>
<br>
<input type=email name=email placeholder="Email ID" class=input1 required>
<br>
<textarea placeholder="Your Message" name=msg class=input2 required></textarea>
<br>
<button type="submit" name="send" class="footer-button">Send Message</button>
</form>
<br>
<br>
<br>
</div>
<div class="right-msg" data-aos="slide-up">
    <br>
<i class="fas fa-map-marker-alt"></i> 
<div class="location"> Mathra Kokkad Road</div>
<br>
<i class="fas fa-phone" style="transform:rotatey(180deg);"></i> 
<div class="phno"> +91 9207224063</div>
<br>
<i class="fas fa-envelope"></i> 
<div class="email"> admin@eparish.ml</div>
<br>
<div class="follow">
    <a href=#><i class="fab fa-facebook-square" style="color:rgb(39, 93, 209);font-size: 29px;margin-right: 18px;margin-left: 11px;"></i> </a>
    <a href=#><i class="fab fa-youtube"  style="color:rgb(255, 4, 4);font-size: 29px;margin-right: 18px;"></i> </a>
    <a href=#><i class="fab fa-twitter"  style="color:rgb(0, 140, 255);font-size: 29px;margin-right: 18px;"></i> </a>
    <a href=#><i class="fab fa-instagram"  style="color:rgb(240, 15, 101);font-size: 29px;margin-right: 18px;"></i> </a>
    <a href=#><i class="fab fa-whatsapp-square"  style="color:rgb(41, 240, 15);font-size: 29px;margin-right: 18px;"></i> </a>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.6/highlight.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        easing: 'ease-out-back',
        duration: 2000
        });
</script>
<script>
    hljs.initHighlightingOnLoad();

    $('.hero__scroll').on('click', function(e) {
        $('html, body').animate({
            scrollTop: $(window).height()
        }, 1200);
    });
</script>
</body>
</html>
