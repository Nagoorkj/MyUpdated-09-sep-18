
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


      $DbName = $row['Name'];
      $DbEmail=$row['Email'];
      $DbMobile=$row['Mobile'];
      $DbProfession=$row['Profession'];
      $DbExperience=$row['Experience'];
      $DbCountry=$row['Country'];
      $DbState=$row['State'];
      $DbCity=$row['City'];
      $DbLocality=$row['Locality'];
      $DbAvailability=$row['Availability'];
        

        echo "$DbName";
        echo "$DbEmail";
        echo "$DbMobile";
        echo "$DbProfession";
        echo "$DbExperience";
        echo "$DbCountry";
        echo "$DbState";
        echo "$DbCity";
        echo "$DbLocality";
        echo "$DbAvailability";


        
        

    }
} else {
    echo "No results found";
}

$conn->close();
?>


<a href="Homepage.php">Back to Homepage?</a>




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
<center><h1><b>Registration Form<b></h1></center>
<div class="form">
<form action="" method="POST">

<center>

<table >  
<tr>
<th></th> 

</tr>
<tr>
<td>Name:*</td>
<td><input type="text" name="Name" value="<?php echo $DbName?>" placeholder="enter your name"  maxlength="20"required></td>
</tr>

<tr>
<td>Contact Number: *</td>
<td><input type="text" name="Mobile" value="<?php echo $DbMobile?>"placeholder="10 digit Mobile number" pattern="^\d{10}" maxlength="10" required="Please enter valid mobile Number" ></td>
</tr>

<tr>
<td>Email: *</td>
<td><input type="email" name="email" value="<?php echo $DbEmail?>" placeholder="enter your Email" required></td>
</tr>
<tr>

<td><input type="password" hidden name="password" value="<?php echo $DbPassword?>"placeholder="enter your password" maxlength="20"required></td>
</tr>

<tr> 
 <td>Profession: *</td>
 <td>
 </select>
 <select name="Profession" value="<?php echo $DbProfession?>required >
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
<td><select name="Experience" value="<?php echo $DbExperience?> required>
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
<td><select Name="Country" value="<?php echo $DbCountry?> required>
<option value="" selected>Select Your Country</option>
<option value="IND">India</option>
<option value="Others">Others</option>

</select></td>
</tr>



<tr>
<td>State: *</td>
<td><select Name="State" value="<?php echo $DbState?> required>
<option value="" selected>select Your State</option>
<option value="TN">TAMILNADU</option>
<option value="BAGNLORE">MUMBAI</option>
<option value="Others">Others</option>
</select></td>
</tr>


<tr>
<td>City: *</td>
<td><select name="City" value="<?php echo $DbCity?> required>
<option value="" selected>Select Your City</option>
<option value="CH">CHENNAI</option>
<option value="BANGALORE">BANGALORE</option>
<option value="Others">Others</option>
</select></td>
</tr>
 
 
 

<tr>
<td>Locality: *</td>
<td>
<select  name="Locality" value="<?php echo $DbLocality?> >
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
<td>Available Timing: *</td>
<td><select Name="Availability"  value="<?php echo $DbAvailability?>required>
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

//for other drop down box

    if ($Locality=='Others'){

      echo"<tr>
<td>Contact Number: *</td>
<td><input type="text" name="Mobile" required="Please enter valid mobile Number" ></td>
</tr>
"

    }



  

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection




// echo $_SESSION['Mobile'];
// echo $_SESSION['username'];
  

   if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql2 = "SELECT * FROM $table where Name='".$_SESSION['username']."' and Mobile='".$_SESSION['Mobile']."'  ";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {


      echo "test success update poadu";  

      
//



$sqlUpdate = "UPDATE NewUser SET Name='" . $Name . "' WHERE Mobile='".$_SESSION['Mobile']."'";

if ($conn->query($sqlUpdate) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

        
  //      

    }
} else {
    echo "Testing fail";
}

$conn->close();








}
?>

 