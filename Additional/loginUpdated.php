<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="" method="post">
            <div class="form-group ">
                <label>Username:<sup>*</sup></label>
                <input type="text" name="user" required>
                <span class="help-block"></span>
            </div>    
            <div class="form-group ">
                <label>Password:<sup>*</sup></label>
                <input type="password" name="pass" required>
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="submit" name "submit">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>    

 

<?php

include 'Connection.php';

if(isset($_POST["submit"])){  
  
if(!empty($_POST['user']) && !empty($_POST['pass'])) {  
    $user=$_POST['user'];  
    $pass=$_POST['pass'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM $table where Firstname ='" . $user . "' and Password='" . $pass . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		
		$dbuser=$row["Firstname"];
		$dbpass=$row["password"];
		
		 if($user == $dbuser && $pass == $dbpass)
echo "valid user ";			 
    {  
    session_start();  
    $_SESSION['sess_user']=$user;  
	
  
    /* Redirect browser */  
    header("Location: HomePage.php");	
    }  
		
		
		
		
		echo "you are going right path";
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "Oops! your user name or password incorrect";
}
$conn->close();

}
}
?>

</body>  
</html> 
  