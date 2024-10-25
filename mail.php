<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';   // Set your SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'abdulrahim74264@gmail.com';   // Your email username
        $mail->Password   = 'iotg jqut wkks sjrt';   // Your app-specific password from Google
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   // Enable SSL encryption
        $mail->SMTPSecure = 'ssl';   // Enable SSL encryption
        $mail->Port       = 465;   // TCP port for SSL

        // Recipients
        $mail->setFrom($email, $name);    // From who the email will be sent
        $mail->addAddress('yashtalati07@gmail.com', 'Yash Talati');   // Where the email will be sent

        // Content
        $mail->isHTML(true);    // Set email format to HTML
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = "<p><strong>Name:</strong> $name</p>
                          <p><strong>Email:</strong> $email</p>
                          <p><strong>Message:</strong><br>$message</p>";
        $mail->AltBody = "Name: $name\nEmail: $email\nMessage: $message";

        // Send the email
        $mail->send();
        echo 'Message has been sent successfully.';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
    }
}
?>