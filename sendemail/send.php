<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_GET["send"])) {
    $email = $_GET['email'];
    $subject = $_GET['Subject'];
    $message = $_GET['message'];
    $yourname = $_GET['yourname'];;

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'otosamsosdenrcaraga@gmail.com'; // Your Gmail address
        $mail->Password = 'qrkm kzyb qjkk lvjf'; // Your Gmail password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('otosamsosdenrcaraga@gmail.com', $yourname); // Sender's email and name
        $mail->addAddress($email); // Recipient's email address from form input

        //Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = $subject; // Subject from form input
        $mail->Body = $message; // Message from form input
        $mail->AltBody = strip_tags($message); // Fallback for plain text email

        $mail->send();
        echo 'Message has been sent successfully';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>
