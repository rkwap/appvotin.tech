<?php
// PHP Mailer Path
require("phpmailer/vendor/phpmailer/phpmailer/PHPMailerAutoload.php");

$mail = new PHPMailer();
// set mailer to use SMTP
$mail->IsSMTP();
$mail->Host = "smtp.gmail.com";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "rkwap2011@gmail.com";  // SMTP username
$mail->Password = "6445645223+6445645223"; // SMTP password
$mail->From = $fromEmail; //sender's Email
$mail->AddAddress($rEmail, $rName);  // Add Reciptant
// $mail->WordWrap = 50; // setting words limit
$mail->IsHTML(true);   // set email format to HTML
$mail->Subject = $subject;   //subject of email
$mail->Body    = $message;  // declaring body of message
$mail->AltBody = $message;  // declaring alternate body of message
$mail->FromName = $fromName;

if(!$mail->Send()){ 
    echo "Message could not be sent.<br>";
    echo "Mailer Error: " . $mail->ErrorInfo;
    exit;}
    echo "Message has been sent. Please Verify your account in your email.";
?>