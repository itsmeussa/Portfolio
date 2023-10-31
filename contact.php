<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../Email/src/Exception.php';
require '../Email/src/PHPMailer.php';
require '../Email/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["full-name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile-number"];
    $subject = $_POST["email-subject"];
    $message = $_POST["message"];

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->CharSet = "utf-8";
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->isHTML(true);
    $mail->Username = 'whatsappcompanyads@gmail.com'; // Replace with your Gmail address
    $mail->Password = 'pqzjpszunnwgtgyl'; // Replace with your Gmail password
    $mail->setFrom($email, $name);
    $mail->Subject = $subject;
    $mail->MsgHTML("Name: $name<br>Email: $email<br>Mobile: $mobile<br>Message: $message");
    $mail->addAddress('oussama.mounajjim@centrale-casablanca.ma'); // Replace with the recipient's email address

    try {
        $mail->send();
        $response = ['message' => 'Email sent successfully'];
    } catch (Exception $e) {
        $response = ['message' => 'Email could not be sent. Please try again later.'];
    }

    echo json_encode($response);
} else {
    // Handle invalid form submissions
    echo json_encode(['message' => 'Invalid request']);
}
?>
