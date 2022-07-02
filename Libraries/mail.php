<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function mailTo($email,$subject,$message){
    require 'C:\xampp\htdocs\dev.jobly.com\View\vendor\autoload.php';

    $mail = new PHPMailer();

    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'omaroudjoudi16@gmail.com';                     
    $mail->Password   = 'nlolimfppkyjcdrq';                               
    $mail->SMTPSecure = "ssl";           
    $mail->Port       = 465;                                    

    $mail->setFrom('omaroudjoudi16@gmail.com','FinalProject');
    $mail->addAddress($email);  
    $mail->isHTML(true);                                  
    $mail->Subject = $subject;
    $mail->Body    = $message;

    $mail->send();
    return true;
}



