<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../Mailer/src/Exception.php';
require '../Mailer/src/PHPMailer.php';
require '../Mailer/src/SMTP.php';


   $name = $_POST['name'];
   $correo = $_POST['email'];
   $asunto = $_POST['subject'];
   $message = $_POST['message'];

//$mail = new PHPMailer(true);
$mail = new PHPMailer;//Create a new PHPMailer instance
$mail->isSMTP();//Tell PHPMailer to use SMTP
//$mail->SMTPDebug = 2;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tsl';
$mail->IsHTML(true);
$mail->SMTPAuth = true;
$mail->Username = '';
$mail->Password = '';
$mail->setFrom($correo, $name);
$mail->addAddress($correo, $name);
$mail->addAddress('', $name);
$mail->Subject = $asunto;
$mail->Body = $message;
$mail->AltBody = 'This is a plain-text message body';

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
  }
?>
