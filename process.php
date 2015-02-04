<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require 'vendor/autoload.php';

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$message = filter_input(INPUT_POST, 'message');


//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "noreply@softcube.co";

//Password to use for SMTP authentication
$mail->Password = "Mys3kr3t";

//Set who the message is to be sent from
$mail->setFrom('noreply@softcube.co', 'Softcube Promo');

//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress('info@softcube.co', 'Softcube Limited');
$mail->addCC('aafetsrom@softcube.co', 'Anthony Afetsrom');
$mail->addCC('badjornor@softcube.co', 'Benjamin Adjornor');
$mail->addCC('nnyarko@softcube.co', 'Nancy Nyarko');

//Set the subject line
$mail->Subject = 'Promo enquiry from '.$name;

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
$mail->msgHTML($message."<p>".$name.' <br /> '.$email.'</p>');

//Replace the plain text body with one created manually
$mail->AltBody = $message;

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "error";// . $mail->ErrorInfo;
} else {
    echo "sent";
}