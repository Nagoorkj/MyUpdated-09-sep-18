<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
	function DropMail($getEmail){
		

$mail = new PHPMailer(true);      


                        // Passing `true` enables exceptions
try {
    //Server settings
     $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'firstProjectTry@gmail.com';                 // SMTP username
    $mail->Password = 'testing786';                           // SMTP password
    $mail->SMTPSecure = 'TLS';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('No-Repy@firstProjectTry.com', 'No-Reply@firstprojectry.com');
    //$mail->addAddress('nagoorkj@gmail.com', 'Nagoor'); 
	$mail->addAddress($getEmail, 'User');    // Add a recipient
                 // Name is optional
    

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Password has been updated';
    $mail->Body    = 'This is to inform you that you recently updated the password through our system!!!! <br>
Your user id and password will be send you shortly



<P>Regards,</P>
<br>FPT TEAM</br>


	<b>in bold!</b>';
    $mail->AltBody = 'Account has been successfully created';

    $mail->send();
    echo 'Message has been sent Successfully';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}

}
?>