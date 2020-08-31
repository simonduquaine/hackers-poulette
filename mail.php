<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require 'countries.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
$firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
$gender = filter_var($_POST['gender'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$country = filter_var($_POST['country'], FILTER_SANITIZE_STRING);
$subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

function sendEmail()
{
    global $lastname;
    global $firstname;
    global $gender;
    global $email;
    global $country;
    global $subject;
    global $message;

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                                                                    // Enable verbose debug output
        $mail->isSMTP();                                                                                                // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                                                          // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                                                          // Enable SMTP authentication
        $mail->Username   = 'ticket.hackerspoulette@gmail.com';         // SMTP username
        $mail->Password   = 'Test12341234';                                                  // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 465;                                                                           // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('ticket.hackerspoulette@gmail.com', 'Support');
        $mail->addAddress($email);     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Thank you for contacting us';
        $mail->Body    = "<p>Hello <strong>" . $lastname . " " . $firstname . ".</strong></br> Thank you for contacting us.</br>We will reply to you as soon as possible. </br> Your ticket was about a " . $subject . " :</br> <i>" . $message . "</i></br>See you soon.</p>";

        $mail->send();
    } catch (Exception $e) {
        echo "Can't send the support ticket . Error: {$mail->ErrorInfo}";
    }
}

sendEmail();
