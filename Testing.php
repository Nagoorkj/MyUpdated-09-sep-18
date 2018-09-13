
<?php

session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){

  if(!isset($_SESSION['Mobile']) || empty($_SESSION['Mobile'])){
  header("location: login.php");
  exit;
}
}
?>



<?php


 include 'Connection.php';

 //$conn = new mysqli($servername, $username, $password, $dbname);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection




// echo $_SESSION['Mobile'];
// echo $_SESSION['username'];
  

   if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM $table where Name='".$_SESSION['username']."' and Mobile='".$_SESSION['Mobile']."'  ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {


      $Name = $row['Name'];
      $Email=$row['Email'];
      $Mobile=$row['Mobile'];
      $Profession=$row['Profession'];
      $Experience=$row['Experience'];
      $Country=$row['Country'];
      $State=$row['State'];
      $City=$row['City'];
      $Locality=$row['Locality'];
      $Availability=$row['Availability'];
        

        echo "$Name";
        echo "$Email";
        echo "$Mobile";
        echo "$Profession";
        echo "$Experience";
        echo "$Country";
        echo "$State";
        echo "$City";
        echo "$Locality";
        echo "$Availability";


        
        

    }
} else {
    echo "0 results";
}

$conn->close();
?>


<a href="Homepage.php">Back to Homepage?</a>