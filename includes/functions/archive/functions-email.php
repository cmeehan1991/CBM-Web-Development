<?php

// Get the user input information
$validity = filter_input(INPUT_POST, 'valid');
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$phone = filter_input(INPUT_POST, 'phone');
$website = filter_input(INPUT_POST, 'website');
$company = filter_input(INPUT_POST, 'company');
$message_text = filter_input(INPUT_POST, 'message');

echo $name . $email . $phone . $website . $company . $message_text;


if ($validity == true) {
// Set the email variables
    $to = 'Connor.Meehan@cbmwebdevelopment.com';
    $subject = 'Webmail Form Request';
    $text = "<table>"
            . "<tr>"
            . "<td><b>Name:</b></td><td>$name</td>"
            . "</tr>"
            . "<tr>"
            . "<td><b>Email:</b></td><td>$email</td>"
            . "</tr>"
            . "<tr>"
            . "<td><b>Phone:</b></td><td>$phone</td>"
            . "</tr>"
            . "<tr>"
            . "<td><b>Website:</b></td><td>$website</td>"
            . "</tr>"
            . "<tr>"
            . "<td><b>Company</b></td><td>$company</td>"
            . "</tr>"
            . "<tr>"
            . "<td><b>Message:</b></td><td>$message_text</td>"
            . "</tr>"
            . "</table>";

// Setting content type for html email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
    $headers .= 'From: <webmail@cbmwebdevelopment.com>' . "\r\n";
    $headers .= 'Cc: cmeehan@elon.edu' . "\r\n";


   mail($to, $subject, $text, $headers);
}
