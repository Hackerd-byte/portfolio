<?php

$name = $_post['name'];
$email = $_post['email'];
$subjact = $_post['subjact'];
$message = $_post['message'];

require 'assets/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->SMTPAuth=true;
$mail->SMTPDebug=SMTP::DEBUG_SERVER;

$mail->Host='smtp.gmail.com';
$mail->SMTPSecure= PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port=587;


$mail->Username='hariprofessional2024@gmail.com';
$mail->Password='gdei eiqs soyf ndda';

$mail->setFrom($email, $name);

$mail->Subject=$subjact;
$mail->Body-$message;


$mail->send();




?>