<?php require('countries.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Hackers Poulette</title>
</head>

<body class="d-flex justify-content-center align-items-center m-0 p-0 bg-dark">
    <form method="POST" class="border p-5 rounded bg-light mt-2 font-weight-bold">
        <!-- <div class="form-group mt-2 d-flex justify-content-center align-items-center">
            <img class="col-6" src="./img/hackers-poulette-logo.png" alt="">
        </div> -->
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname" aria-describedby="emailHelp" required onchange="validLastname();">
        </div>
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname" aria-describedby="emailHelp" required onchange="validFirstname();">
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" id="gender" name="gender">
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required onchange="validEmail();">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="country">Country</label></br>
            <select id="country" name="country" required>
                <option value=""> Select a country</option>
                <?php foreach ($countries as $country) {
                    echo "<option value='" . array_search($country, $countries, true) . "'> $country </option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="gender">Subject</label>
            <select class="form-control" id="subject" name="subject">
                <option>Technical Issue</option>
                <option>Question</option>
                <option>Other</option>
            </select>
            <small id="emailHelp" class="form-text text-muted">A correct subject will help us.</small>
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" rows="3" name="message" required></textarea>
        </div>
        <div class="form-group d-flex justify-content-center align-items-center">
            <button type="submit" class="btn bg-info text-light" onclick="sendEmail();">Send feedback</button>
        </div>
    </form>
    </div>

    <?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'countries.php';
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
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                                                           // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

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
    ?>

    <script src="js/validator.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>