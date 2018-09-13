<!doctype html>  
<html>  
<head>  
<title>Login</title>  
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
     <center><h1>Welcome TO Near2Home </h1></center>  
   <p><a href="RegistrationForm.php">New User </a> | <a href="Login.php">To Login</a> | <a href="Search.php">SEARCH DETAILS</a></p>  
<h3>Login with your N2H Credentials</h3>  
<form action="" method="POST">  
User ID : <input type="text" name="Mobile" placeholder="Registered Mobile Number" pattern="^\d{10}"  maxlength="10" required>  <br/>  
Password: <input type="password" name="pass" required> <br/> 
<tr><td></td><td> <span><a href="forgotPasswordWithOTP.php">Forgot password</a></span></td></tr>  
<tr><td></td><td> <span></span></td></tr>  
<input type="submit" class="btn btn-primary" value="Login" name="submit" />  
</form>  
 

<?php

include 'Connection.php';

if(isset($_POST["submit"])){  
  
if(!empty($_POST['Mobile']) && !empty($_POST['pass'])) {  
    $Mobile=$_POST['Mobile'];  
    $pass=$_POST['pass'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM $table where Mobile ='" . $Mobile . "' and Password='" . $pass . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		
		$dbuser=$row["Name"];
		$dbMobile=$row["Mobile"];
		$dbpass=$row["password"];
		
		 if($Mobile == $dbMobile && $pass == $dbpass)
			 
echo "valid user ";			 
    {  
	
	
	
    session_start();  
    //$_SESSION['sess_user']SS=$user;  
	
	$_SESSION['username'] = $dbuser; 
  $_SESSION['Mobile'] = $dbMobile; 
	
  
    /* Redirect browser */  
    header("Location: Homepage.php");	
    }  
		
		
		
		
		echo "you are going right path";
        //echo "id: " . $row["id"]. " - Name: " . $row["Name"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "Oops! your user name or password incorrect";
}
$conn->close();

}
}else {  
    echo "All fields are required!";  
}  
?>

</body>  
</html> 
  