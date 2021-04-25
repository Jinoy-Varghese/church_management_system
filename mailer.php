<?php 
  
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
use PHPMailer\PHPMailer\SMTP; 
  
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
    $maill="jinoy.v2000@gmail.com";           
    $mail->addAddress($maill); 
                   
    $mail->Subject = 'Subject'; 
    $mail->Body    = 'helloo ashlyyy.aa....  this is a message from eparish '; 
    $mail->AltBody = 'Body in plain text for non-HTML mail clients'; 
    $mail->send(); 
    echo "Mail has been sent successfully!"; 
} catch (Exception $e) { 
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
} 
  

?> 