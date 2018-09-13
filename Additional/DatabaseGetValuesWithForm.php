<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "firstprojectry";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sqlSearch = "SELECT  firstname, email FROM newuser";
$result = $conn->query($sqlSearch);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo  " - Name: " . $row["firstname"]. " email" . $row["email"]. "<br>";
		
		$sqlUpdate = "UPDATE Newuser SET firstname='Jamal Mohideen' WHERE email='test@gmail.com'";

if ($conn->query($sqlUpdate) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
    }
} else {
    echo "0 results";
}




$conn->close();
?>