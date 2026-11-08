<?php
$to = "engrania@gmail.com";
$subject = "PHP task";
$message = "Thanks alot for training us";
$headers = "From: ahmed.amjad20222004@gmail.com\r\n" .
           "Reply-To: engrania@gmail.com\r\n" .
           "Content-Type: text/plain; charset=UTF-8";

if (mail($to, $subject, $message, $headers)) {
    echo "Done!";
} else {
    echo "Fail:(";
}
?>