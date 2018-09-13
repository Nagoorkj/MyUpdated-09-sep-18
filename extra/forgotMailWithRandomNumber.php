<?php
 use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include 'RandomNumber.php';
include 'Config.php';


//Load composer's autoloader
require 'vendor/autoload.php';

//echo $OTP;

 //require 'vendor/autoload.php';
?>
<html>
<head>
<style type="text/css">
 input{
 border:1px solid olive;
 border-radius:5px;
 }
 h1{
  color:darkgreen;
  font-size:22px;
  text-align:center;
 }

</style>
</head>
<body>
<h1>Forgot Password<h1>
<form action='#' method='post'>
<table cellspacing='5' align='center'>
<tr><td>Email id:</td><td><input type='text' name='email'/></td></tr>
<tr><td></td><td><input type='submit' name='submit' value='Submit'/></td></tr>
</table>
</form>

<?php




if(isset($_POST) & !empty($_POST)){
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$sql = "select * from NewUser where email='".$email."' ";
	$res = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($res);
	if($count == 1){
		echo "Sending email to user with password";
		$sqlUpdate = "UPDATE NewUser SET otp='" . $OTP . "' WHERE email='$email'";

if ($conn->query($sqlUpdate) === TRUE) {
    echo "Record updated successfully";
	
	
	

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
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
    $mail->addAddress('nagoorkj@gmail.com', 'Nagoor'); 
	$mail->addAddress('.$email.', 'User'); 
	// Add a recipient
                 // Name is optional
    

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'OTP Password Email ';
    $mail->Body    = 
	
	'<b>Use this OTP to change your password!</b>
OTP:  '.$OTP.'</br>	';

	
	
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent Successfully';
	 header("Location: ChangePasswordUsingOTP.php"); 
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
	
	
	
	
} else {
    echo "Error updating record: " . $conn->error;
}
		
		
		
		
		
		//testing php mail
		
		
		
		
	

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

	
		
		
		
		
		
		
		
	}else{
		echo "User name does not exist in database";
	}
}




?>





</body>
</html>