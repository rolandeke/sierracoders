<?php

require 'assets/phpmailer/PHPMailerAutoload.php';
require_once 'db_model/constants.php';

$email_error = '';

function sendVerificationEmail($useremail, $token,$isVerified)
{
    $messageBody = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Verify Account</title>
    </head>
    <body>
        <div>
            <h1>
               Thank you for Registering to Sierra Coders.
                <a href="http://' . $_SERVER['SERVER_NAME'] . '/web%20dev%20project/sierracoders/verify.php?token=' . $token . '">Click on this Link to Verify your account</a>
            </h1>
        </div>
    </body>
    </html>';
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = EMAIL;                                  // SMTP username
        $mail->Password   = PASS;                                    // SMTP password
        $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 465;                                    // TCP port to connect to
        $mail->setFrom(EMAIL, 'Sierra Coders');

        //Recipients
        $mail->addAddress($useremail);                              // Add a recipient

        // Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = 'Email Verification';
        $mail->Body  = $messageBody;

        if (!$mail->send()) {
            //$email_error = 'Message Could not be sent.';
            return false;
        } else {
            return true;
            //$email_error =  'Message Sent';
        }
    } catch (Exception $e) {
        $email_error =  "Message could not be sent. Mailer Error";
    }
}
