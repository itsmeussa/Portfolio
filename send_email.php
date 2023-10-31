<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect data from the POST request
    $data = json_decode(file_get_contents('php://input'), true);

    $fullName = $data['fullName'];
    $email = $data['email'];
    $mobileNumber = $data['mobileNumber'];
    $emailSubject = $data['emailSubject'];
    $message = $data['message'];

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'whatsappcompanyads@gmail.com'; // Replace with your Gmail email address
        $mail->Password = 'pqzjpszunnwgtgyl';  // Replace with your Gmail password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom($email, $fullName);
        $mail->addAddress('oussama.mounajjim@centrale-casablanca.ma'); // Replace with your recipient's email address

        // Content
        $mail->isHTML(true);
        $mail->Subject = $emailSubject;
        $mail->Body = $message;

        $mail->send();
        echo 'Email sent successfully!';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    }
} else {
    echo 'Invalid request';
}
