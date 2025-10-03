<?php
require "assets\\vendor\autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if ($_SERVER["REQUEST_METHOD"]==="POST"){


    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    try{
        $mail = new PHPMailer(true);

        $mail->SMTPDebug = SMTP::DEBUG_SERVER;

        $mail->isSMTP();
        $mail->SMTPAuth = true;

        $mail->Host = "smtp.gmail.com";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->Username = "hariprofessional2024@gmail.com";  // dkktudrftfizgbkf
        $mail->Password = "dkktudrftfizgbkf";
        $mail->setFrom($email, $name);
        $mail->addAddress("aniyorgalsih2025@gmail.com", "Hari");


        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
        //header("Location: sent.html"); 
    } catch(Exception $e){
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else{
    header(("Location: index.html"));
    exit(0);
}
?>