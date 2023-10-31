<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["full-name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile-number"];
    $subject = $_POST["email-subject"];
    $message = $_POST["message"];

    $to = "oussama.mounajjim@centrale-casablanca.ma"; // Replace with the recipient's email address
    $subject = "New Contact Form Submission";
    $message = "Name: $name\nEmail: $email\nMobile: $mobile\nSubject: $subject\n\n$message";

    // Send the email
    if (mail($to, $subject, $message)) {
        // Email sent successfully
        echo "Email sent successfully. Thank you!";
    } else {
        // Email sending failed
        echo "Email could not be sent. Please try again later.";
    }
} else {
    // Handle invalid form submissions
    echo "Invalid request";
}
?>
