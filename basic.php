<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

//require 'vendor/autoload.php'; // Path to PHPMailer autoload.php file
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Instantiate PHPMailer
$mail = new PHPMailer(true); // Passing `true` enables exceptions
  $user1='ganesh';  
  $user2=123213;
try {
    // Server settings
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com'; // SMTP server
    $mail->SMTPAuth   = true; // Enable SMTP authentication
    $mail->Username   = '20093cm010@gmail.com'; // SMTP username
    $mail->Password   = 'fisl wkqx aanw dvjp'; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587; // TCP port to connect to

    // Recipients
    $mail->setFrom('20093cm010@gmail.com', 'FIND_MY_JOB'); // Sender's email address and name
    $mail->addAddress('avupatiganesh12321@gmail.com'); // Recipient's email address

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Your work offer is accepted'; // Email subject 
    $mail->Body    = '<html><body><h3>work_producer</h3></body></html>'.$user1.'<html><body><h3>contact</h3></body></html>'.$user5.'<html><body><h3>work_type</h3></body></html>'.$user2.'<html><body><h3>description</h3></body></html>'.$user3.'<html><body><h3>location</h3></body></html>'.$user4.'<html><body><h3>your_estimated_prize</h3></body></html>'.$user6;; // Email body


    $mail->send(); // Send email
    echo 'Email sent successfully!';
} catch (Exception $e) {
    echo "Failed to send email. Error: {$mail->ErrorInfo}";
}
?>
