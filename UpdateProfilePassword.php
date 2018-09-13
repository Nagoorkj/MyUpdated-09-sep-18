<?php
require 'vendor/autoload.php';
//for connection details refer below file
include 'Connection.php';
include 'SendMail.php';


session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
	

//password match validation

if (isset($_POST['submit'])) {

$currentPassword = $_POST['currentPassword'];
$newPassword = $_POST['newPassword'];
$repeatnewpassword = $_POST['confirmPassword'];


if ($newPassword != $repeatnewpassword) {

echo ("Password not match ");

}
else {
	
	
	//database  validation begins
	
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sqlSearch = "SELECT  firstname, email FROM $table where password ='" . $_POST['currentPassword'] . "' and firstname='" . $_SESSION['username'] . "'";
$result = $conn->query($sqlSearch);                                                                 

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo  " - Name: " . $row["firstname"]. " email" . $row["email"]. "<br>";
		$ToEmail=$row["email"];
		//echo $ToEmail;
		
		
		$sqlUpdate = "UPDATE $table SET password='" . $_POST["confirmPassword"] . "'where password ='" . $_POST['currentPassword'] . "' ";
		//$sqlUpdate = "UPDATE $table SET OTP='empty' where otp ='" . $_POST['confirmPassword'] . "' ";
		

if ($conn->query($sqlUpdate) === TRUE) {
    echo "Record updated successfully";
	//
	//$ToEmail='nagoorkj@gmail.com';
	
	DropMail($ToEmail);
	HomePageChange();
	
	
	
} else {
    echo "Error updating record: " . $conn->error;
}
    }
} else {
    echo "current password is incorrect or user name ";
}




$conn->close();
	
	
	



}

}


?>

<?php 
function HomePageChange() {
    echo "please wait redirecting to home page";
	
	
    
	echo'<script> window.location="HomePage.php"; </script> ';
	     
}

?>











</head>


<html>
<head>
<title>Update Profile</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<form action='#' method='post'>

<table border="0" cellpadding="10" cellspacing="0" width="500" align="center"  >
<tr class="tableheader">
<td colspan="2">Update your details</td>
</tr>

<td><label>User Name</label></td>
<td><input type="text" name="confirmPassword"  id="confirmPassword" value=" your user name" required></span></td>
</tr>


<tr>
<td><label>PhoneNumber</label></td>
<td><input type="text" name="newPassword" id="newPassword" Value ="Your Phone Number" required></span></td>
</tr>


<tr>
<td><label>New Email</label></td>
<td><input type="email" name="newPassword" id="newPassword" value="Your email"required></span></td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="submit" value="Submit" ></td>

</tr>
</table>
</form>
</body></html>


</html>
