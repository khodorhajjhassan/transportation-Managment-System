<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

require_once 'env.php';
loadEnv(__DIR__ . '/.env');


function sendEmailWithCC($to, $cc, $subject, $message) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server address
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['email']; // Replace with your email address
        $mail->Password = $_ENV['email_password']; // Replace with your email password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('your_email@example.com', 'SkyLine');
        $mail->addAddress($to);
        $mail->addCC($cc);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
        echo "Email sent successfully!";
    } catch (Exception $e) {
        echo "Failed to send email. Error: {$mail->ErrorInfo}";
    }
}

// Usage example
$to = "recipient@example.com";
$cc = "cc@example.com";
$subject = "Test Email";
$message = "This is a test email with CC.";

//sendEmailWithCC($to, $cc, $subject, $message);
?>
