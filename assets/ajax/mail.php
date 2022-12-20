<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'mail.brilliantwebdesign.co.uk';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'info@brilliantwebdesign.co.uk';                     // SMTP username
    $mail->Password   = 'Alexandru92z';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 26;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('info@brilliantwebdesign.co.uk', 'Brilliant Web Design Form');
    $mail->addAddress('alex_zelea@yahoo.com', 'Joe User');     // Add a recipient
    $mail->addAddress('info@brilliantwebdesign.co.uk');               // Name is optional
    $mail->addReplyTo('info@brilliantwebdesign.co.uk', 'Information');


$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$message = $_POST['message'];

    // Content
    $mail->isHTML(true);     // Set email format to HTML
    $mail->Subject = "=?utf-8?B?".base64_encode("Website form message")."?=";
    $mail->Body    = "First name: $first_name<BR>Last name: $last_name<BR>Email: $email<BR>Message: $message";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo "Good";
} catch (Exception $e) {
    echo "Error";
}



?>
