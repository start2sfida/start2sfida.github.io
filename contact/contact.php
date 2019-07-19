<?php

if($_POST) {
    $visitor_name = "";
    $visitor_email = "";
    $visitor_budget = "";
    $visitor_message = "";
    $recipient="GabrieleRC00@gmail.com";

    if(isset($_POST['visitor_name'])) {
        $visitor_name = filter_var($_POST['visitor_name'], FILTER_SANITIZE_STRING);
    }

    if(isset($_POST['visitor_email'])) {
        $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['visitor_email']);
        $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
    }


    if(isset($_POST['visitor_budget'])) {
        $visitor_budget = filter_var($_POST['visitor_budget'], FILTER_SANITIZE_STRING);
    }

    if(isset($_POST['visitor_message'])) {
        $visitor_message = htmlspecialchars($_POST['visitor_message']);
    }



    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";

    if(mail($recipient, $visitor_budget, $visitor_message, $headers)) {
        echo "<p>Thank you for contacting me, $visitor_name. You will get a reply within 24 hours.</p>";
    } else {
        echo '<p>We are sorry but the email did not go through.</p>';
    }

} else {
    echo '<p>Something went wrong</p>';
}


?>
