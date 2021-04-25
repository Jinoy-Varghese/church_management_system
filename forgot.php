
<?php
include("config.php");
    use PHPMailer\PHPMailer\PHPMailer; 
    use PHPMailer\PHPMailer\Exception; 
    use PHPMailer\PHPMailer\SMTP; 





if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['mail']))
{
$username=$_POST['user'];
$sql="SELECT * FROM login WHERE username='$username'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
if($result->num_rows==1)
{


    
    
      
    require 'vendor/autoload.php'; 
      
    $mail = new PHPMailer(true); 
      $mail->isSMTP();
    try { 
       
        $mail->SMTPDebug = 1;  
        $mail->Mailer='smtp';                                      
        $mail->isSMTP();                                             
        $mail->Host       = 'smtp.migadu.com';                     
        $mail->SMTPAuth   = true;                              
        $mail->Username   = 'admin@eparish.ml';                  
        $mail->Password   = 'jinoyparayil';                         
        $mail->SMTPSecure = 'STARTTLS';                               
        $mail->Port       = 587;   
        $mail->IsHTML(TRUE);
        $mail->setFrom('admin@eparish.ml', 'eParish'); 
        $maill=$username;           
        $mail->addAddress($maill); 
                       
        $mail->Subject = 'Reset Your Password'; 
        $mail->Body    = 'A request for forget password has been produced <br><br>click on the following link to reset your password<br><br><a href=http://localhost/project/reset.php?a='.$row['username'].'&b='.$row['password'].'>Reset Password</a>';

        $mail->AltBody = 'Body in plain text for non-HTML mail clients'; 
        $mail->send(); 
        echo "Mail has been sent successfully!"; 
    } catch (Exception $e) { 
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
    } 
    






   





    



}
else
{
    echo "<center><font color=white>The entered user name does not exist !</font></center>";
}

}

?>


<html>
    <body>











    
    <div>
    <font size=6 class=h1><b>RESET PASSWORD</b></font>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <center>
        
        <br><br>
        <br>
           <font size=4> &#128102;</font> <input type="email" name="user" placeholder="USER ID" required>
            <hr width=263px >
            <br><br>
            
        
            <br>
            
            <input type="submit" value="Send Mail" name=mail>
           <br><br>
           Already know the password?<font color=#2253bd>&nbsp;<A HREF="loginform.php">login here</A></font>
            </center>
        </form>
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
    background-color:#265fd9;
}
div
{
    width:100%;
    height:100vh;
    background-image:url("23.jpg");
    position:absolute;
    justify-content:center;
    align-items:center;
    display:flex;
    background-size:cover;
    background-repeat:no-repeat;
}
form
{
    width:310px;
    height:250px;
    background-color:rgba(255,255,255,.5);
    border-radius:15px;
    border-top:50px solid #2253bd;
   
    }
.h1
{
    color:white;
    position:absolute;
    z-index:1;
    margin-top:-120px;
    
}
input[type=submit]
{
width:270px;
height:27px;
text-decoration:none;
background-color:rgba(0,0,0,0);
border:2px solid #2253bd;
font-size:17px;
color:#2253bd;
}
input[type=email]
{
    outline:none;
    border:none;
    background-color:rgba(0,0,0,0);
    width:235px;
    height:30px;
    font-size:17px;
    color:white;
   
}
::placeholder{
    color:white;
}
input[type=password]:focus,input[type=text]:focus
{
    background-color:#2253bd;
}
hr{
border:1px solid #2253bd;

}
input[type=submit]:hover
{
    background-color:#2253bd;
    color:white;
    opacity:.8;
}
a
{
    text-decoration:none;
    color:#2253bd;
}



</style>
