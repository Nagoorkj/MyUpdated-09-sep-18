<?php
 
 include 'Connection.php';

 $conn = new mysqli($servername, $username, $password, $dbname);
 use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

 require 'vendor/autoload.php';
?>


<?php
function HomePage() {
    echo "please wait redirecting to home page";
	
	
    header("Location: HomePage.php"); 
	//for responsive page
    
}
	?>




<html> 
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<?php

if(isset($_POST['submit'])){	
	


//saving to variable 
    $Name=$_POST['Name'];
    $Email=$_POST['email'];
	$Mobile=$_POST['Mobile'];
    $Password=$_POST['password'];
	$Profession=$_POST['Profession'];
	$Experience=$_POST['Experience'];
	$Country=$_POST['Country'];
	$State=$_POST['State'];
	$City=$_POST['City'];
	$Locality=$_POST['Locality'];
	$Availability=$_POST['Availability'];
	$Empty='-1';

	
	//validation begins for dropdown
	
	//for other drop down box
//for other drop down box

    if ($Locality=='Others'){

      echo"<tr>
<td>Contact Number: *</td>
<td><input type='text' name='OtherText' required= ></td>
</tr>
";

    }



	
	
	
	
	
	
    $query="insert into $table(Name,Email,Password,Mobile,Profession,Experience,Country,State,City,Locality,Availability)values('$Name','$Email',
	
	'$Password','$Mobile','$Profession','$Experience','$Country','$State','$City','$Locality','$Availability')";
	$run=mysqli_query($conn,$query);
	 
	if($run){
		
		echo"Your data has been successfully updated ";
				
		HomePage();
		
		//sending welcome email
		
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
     $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = $FromMail;                 // SMTP username
    $mail->Password = $MailPassword;                           // SMTP password
    $mail->SMTPSecure = 'TLS';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('No-Repy@firstProjectTry.com', 'No-Reply@firstprojectry.com');
    //$mail->addAddress('nagoorkj@gmail.com', 'Nagoor'); 
	$mail->addAddress($Email, 'User');    // Add a recipient
                 // Name is optional
    

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Welcome to Near2Home  ';
    $mail->Body    = 
	
	'Dear '.$Name.',	
	
	<p>Please find the Login Details Below,</p> 
	
	<br>UserName:"Your Registered Mobile Number"</br>
	<br>Password:" Your Registered Password"</br>
	

	<br>Thanks for joined with us</br>

	<p>Regards,</p>
	<p>N2H TEAM</p>

	';

	
	
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent Successfully';
	 header("Location: ChangePasswordUsingOTP.php"); 
	 
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
		
		
		
		
		
	}
	else{
		echo"error:".mysqli_error($conn);
	}
}

?>



<center><h1><b>Registration Form<b></h1></center>
<div class="form">
<form action="" method="POST">

<center>

<table >  
<tr>
<th></th> 
<th><a href="login.php">Existing User Click here</a></th>
</tr>
<tr>
<td>Name:*</td>
<td><input type="text" name="Name" placeholder="enter your name"  maxlength="20"required></td>
</tr>

<tr>
<td>Contact Number: *</td>
<td><input type="text" name="Mobile" placeholder="10 digit Mobile number" pattern="^\d{10}" maxlength="10" required="Please enter valid mobile Number" ></td>
</tr>

<tr>
<td>Email: *</td>
<td><input type="email" name="email" placeholder="enter your Email" required></td>
</tr>
<tr>
<td>Password: *</td>
<td><input type="password" name="password" placeholder="enter your password" maxlength="20"required></td>
</tr>

<tr> 
 <td>Profession: *</td>
 <td>
 </select>
 <select name="Profession" required >
 <option value="" Selected>Select Your Profession </option>
 <option value="Electrician">Electrician</option>
 <option value="Plumber">Plumber</option>
 <option value="Civil Worker">Civil Worker</option>
 <option value="Mechanic">Mechanic</option>
 <option value="Carpenter">Carpenter</option>
 <option value="Others">Others</option>
 </td>
 </tr>
 
 
 <tr>
<td>Experience: *</td>
<td><select name="Experience" required>
<option value="" selected>Select Your Experience </option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="Others">Others</option>
</select></td>
</tr>

<tr>
<td>Country: *</td>
<td><select Name="Country" required>
<option value="" selected>Select Your Country</option>
<option value="IND">India</option>
<option value="Others">Others</option>

</select></td>
</tr>



<tr>
<td>State: *</td>
<td><select Name="State" required>
<option value="" selected>select Your State</option>
<option value="TN">TAMILNADU</option>
<option value="BAGNLORE">MUMBAI</option>
<option value="Others">Others</option>
</select></td>
</tr>


<tr>
<td>City: *</td>
<td><select name="City" required>
<option value="" selected>Select Your City</option>
<option value="CH">CHENNAI</option>
<option value="BANGALORE">BANGALORE</option>
<option value="Others">Others</option>
</select></td>
</tr>
 
 
 

<tr>
<td>Locality: *</td>
<td>
<select  name="Locality" >
 <option value ="" selected>Select Your Locality</option>
 <option value="Triplicane">Triplicane</option>
 <option value="Mylapore">Mylapore</option>
 <option value="Lloyds road">Lloyds road</option>
 <option value="Royapettah">Royapettah</option>
 <option value="Zambazzar">Zambazzar</option>
 <option value="Others">Others</option>
 </td>
 </tr>


<tr>
<td>Name:*</td>
<td><input type="text" name="Name" placeholder="enter your name"  maxlength="20"required></td>
</tr>



 
 <tr>
<td>Available Timing: *</td>
<td><select Name="Availability" required>
<option value="" selected>Select Your Availability</option>
<option value="FIRST">  10:00 AM - 05:00 PM</option>
<option value="SECOND"> 01:00 PM - 08:00 PM</option>
</select></td>
</tr>

 
 
 
 
 <tr>
 </select>
 <td><b>All the fields are Mandatory!<b> </td>
<td><input type="submit" value="Save" name="submit"></td>
</tr>

 


</table>
</center>
</form>
</body>

</html> 