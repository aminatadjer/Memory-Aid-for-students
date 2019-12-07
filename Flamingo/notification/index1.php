<?php
require 'PHPMailerAutoload.php';
     require 'credential.php'; 


     
function sendmail($email,$nom,$message)
{
     $mail = new PHPMailer;
     
     $mail->SMTPDebug = 4;                               // Enable verbose debug output
     
     $mail->isSMTP();                                      // Set mailer to use SMTP
     $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
     $mail->SMTPAuth = true;                               // Enable SMTP authentication
     $mail->Username = EMAIL;                 // SMTP username
     $mail->Password = PASS;                           // SMTP password
     $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
     $mail->Port = 587;                                    // TCP port to connect to
     
     $mail->setFrom(EMAIL, 'Flamingo');
     $mail->addAddress($email,$nom);     // Add a recipient
     
     $mail->addReplyTo(EMAIL);
     
     $mail->isHTML(true);                                  // Set email format to HTML
     
     $mail->Subject = ('Rappel');
     $mail->Body    = $message;
     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
     
     if(!$mail->send()) {
          echo 'Message could not be sent.';
          //  echo 'Mailer Error: ' . $mail->ErrorInfo;
     } else {
          echo 'Message has been sent';
     }
} ?>