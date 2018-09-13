
<?php
//session_start();

echo 'welcome to my project' ;

?>


<br><a href="RegistrationForm.php">New User</a> <br>
<p><br></p>
 
 <a href="UpdatePasswordUsingOldPassword.php">Update your Password?</a><br>
<a href="Testing.php">Update your profile?</a><br>

<br><a href="PUpdate.php">Update Things?</a>

 
 
 <?php

include 'Connection.php';
$conn = new mysqli($servername, $username, $password, $dbname);

$output = NULL;
if(isset($_POST['submit'])){
	//$mysqli = NEW  mysqli("localhost","root","","database");
	$search = $conn->real_escape_string($_POST['search']);
	$resultSet = $conn->query("SELECT * FROM $table WHERE Name LIKE '%$search%'");
	
	if($resultSet->num_rows > 0)
	{
		while($rows=$resultSet->fetch_assoc())
		{
			$password = $rows['Password'];
			$username = $rows['Name'];
			$Email = $rows['Email'];
			$output .= "customer UserName: $username<br/>customer userid:$Email<br/><br/>"; 
	}
	}
	else
	{
		$output =  "no results";
	}
}
?>
<tr><td><a href="login.php">CLICK HERE TO GO TO LOGIN PAGE</a></td><tr>

<form method="POST">
<label for="username">Search your needs :</label>
<input type="text" name="search" required>
<input type="submit" name="submit" value="search"/>
</form>


<?php
echo $output;
?>

<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo $_SESSION['username']; ?></b>. Welcome to our site.</h1>
    </div>
    <p><a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
</body>
</html>



