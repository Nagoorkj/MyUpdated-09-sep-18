<?php
 $conn=mysqli_connect("localhost","root","","firstprojectry");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

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
	
	
	if ($result = $mysqli->query($res)) {    
     while ($row = $result->fetch_object()) {
        $dbfirstname = $row->firstname;
        $dbemail = $row->email;
        $dbpassword =$row->password;
    }
    $result->close();
	}
		else
	{
		echo'something went wrong.';
		}
	
	
	
	if($count == 1){
	
		
		
		
		echo "Send email to user with password";
		//testing php mail
		
		
		
		
	

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function


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
	$mail->addAddress('vijaygv.msec@gmail.com', 'Alean');    // Add a recipient
                 // Name is optional
    

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Your Password Test Email ';
    $mail->Body    = 'AUTO SENDING MAIL USING PROJECT <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent Successfully';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
	
		
		
		
		
		
		
		
	}else{
		echo "User name does not exist in database";
	}
}




?>





</body>
</html>