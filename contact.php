<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["full-name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile-number"];
    $subject = $_POST["email-subject"];
    $message = $_POST["message"];

    $to = "oussama.mounajjim@centrale-casablanca.ma"; // Replace with your email address
    $subject = "New Contact Form Submission";
    $message = "Name: $name\nEmail: $email\nMobile: $mobile\nSubject: $subject\n\n$message";

    // Send the email
    mail($to, $subject, $message);

    // Redirect the user to a thank you page or display a confirmation message
    header("Location: index.html"); // Create a thank-you page

} else {
    // Handle invalid form submissions
    echo "Invalid request";
}
?>