<?php
    require('countries.php');
    require('mail.php');
?>

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
                <option value="">Select a country</option>
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

    <script src="js/validator.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>