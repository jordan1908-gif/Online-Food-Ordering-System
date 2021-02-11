<?php

require_once 'vendor/autoload.php';
require_once 'constant2.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
  ->setUsername(EMAIL)
  ->setPassword(PASSWORD);

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);


function sendVerificationEmail($userEmail, $token)
{   
    global $mailer; 

    $body = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTD-8">
        <title>Verify Email</title>
    </head>
    <body>
        <div class="wrapper">
            <p>
                Thank you for signing up on our website. Please click on the link below to verify your email.
            </p>
            <a href="http://localhost/foodorderingsystem/ownerindex.php?token=' . $token .'">Verify your email address now</a>
        </div>
    </body>
    </html>'; 

    // Create a message
    $message = (new Swift_Message('Please verify your email address'))
        ->setFrom(EMAIL)
        ->setTo($userEmail)
        ->setBody($body, 'text/html');
        

    // Send the message
    $result = $mailer->send($message);
   
}

function sendPasswordResetLink($userEmail, $token)
{
    global $mailer; 

    $body = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTD-8">
        <title>Verify Email</title>
    </head>
    <body>
        <div class="wrapper">
            <p>
                Hello there, 

                Please click on the link below to reset your password.
            </p>
            <a href="http://localhost/foodorderingsystem/ownerindex.php?password-token=' . $token .'">Reset your password</a>
        </div>
    </body>
    </html>'; 

    // Create a message
    $message = (new Swift_Message('Reset your password'))
        ->setFrom(EMAIL)
        ->setTo($userEmail)
        ->setBody($body, 'text/html');
        

    // Send the message
    $result = $mailer->send($message);  
}

