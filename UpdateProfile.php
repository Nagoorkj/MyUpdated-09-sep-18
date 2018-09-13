



<?php

include 'Connection.php';
$conn = new mysqli($servername, $username, $password, $dbname);

$output = NULL;

session_start();

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;

}
else{
  $username=$conn->real_escape_string($_SESSION['username']);


//echo'$username';


	$resultSet = $conn->query("SELECT * FROM $table WHERE Name = '".$_SESSION['username']."' ");
	
	if($resultSet->num_rows > 0)

	{


		while($rows=$resultSet->fetch_assoc())

			
		{
			$Name = $rows['Name'];
			$Email=$row['email'];
			$Mobile=$row['Mobile'];
    		$Profession=$row['Profession'];
			$Experience=$row['Experience'];
			$Country=$row['Country'];
			$State=$row['State'];
			$City=$row['City'];
			$Locality=$row['Locality'];
			$Availability=$row['Availability'];
	     echo "$Email";

			
			$output .= "  
			<table>
			
			<tr>
			<td>$Name</td>
			<td>$Mobile</td>
			<td>$profession</td>
			<td>$locality</td>
			
			</tr>
			</Table>
			
			";
		
			$output .= "$Name  $Mobile  $profession   $locality ";  
	}
	}
	else
	{
		$output =  "No Record Fount with this criteria";
	}
}










{

	//declare the output

	
    	

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
<title>Update Your Profile </title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<form action='#' method='post'>

<center><h1><b>Update your Details<b></h1></center>
<div class="form">
<form action="" method="POST">

<center>

<table >  
<tr>
<th></th> 

</tr>
<tr>
<td>Name:*</td>
<td><input type="text" name="Name" value =<?php echo $_SESSION['username']; ?> placeholder="enter your name"  maxlength="20"required></td>
</tr>

<tr>
<td>Contact Number: *</td>
<td><input type="text" name="Mobile" placeholder="10 digit Mobile number" pattern="^\d{10}" maxlength="10" required="Please enter valid mobile Number" ></td>
</tr>

<tr>
<td>Email: *</td>
<td><input type="email" name="email" value='' placeholder="enter your Email" required></td>
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
<td><input type="Button" value="GetData" name="GetData"></td>
</tr>

 


</table>




</form>
</body></html>


</html>
