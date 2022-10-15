<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/* OUTLOOK MAIL SMPT SETUP */

require 'vendor/autoload.php';
$mail = new PHPMailer(true);
$mail->IsSmtp();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->IsHTML(true);
$mail->Username   = 'shoonlaeyeewin1602@gmail.com';     // your oulook mail here          
$mail->Password   = 'qcnqliogyihvwrzk';     // your mail password here
$mail->setfrom('shoonlaeyeewin1602@gmail.com');
$mail->addAddress('shoonlaeyeewin1602@gmail.com');

//Content
$mail->isHTML(true);
$mail->Subject = 'Password Reset';
$email_template = "<h2>Hey Guys!</h2>
  <h2>Verification link for your account!.</h2><br/><br/>
  <a href='http://localhost/PHP_Training/Tutorial_10/usr/reset-password-comfirm.php'>Click button</a>";
$mail->Body    = $email_template;
$mail->send();
