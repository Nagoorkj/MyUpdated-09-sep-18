<?php

include 'Connection.php';
//include 'dropDown.php';
$conn = new mysqli($servername, $username, $password, $dbname);

$output = NULL;
if(isset($_POST['submit'])){
	//$mysqli = NEW  mysqli("localhost","root","","firstprojectry");
	$profession = $conn->real_escape_string($_POST['profession']);
	$locality = $conn->real_escape_string($_POST['locality']);
	$resultSet = $conn->query("SELECT * FROM $table WHERE profession = '$profession' and locality ='$locality'");
	
	if($resultSet->num_rows > 0)
	{
		while($rows=$resultSet->fetch_assoc())
		{
			$Name = $rows['Name'];
			$Mobile = $rows['Mobile'];
			$profession = $rows['Profession'];
			$locality=$rows['Locality'];
			
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
		
			//$output .= "$Name  $Mobile  $profession   $locality ";  
	}
	}
	else
	{
		$output =  "No Record Fount with this criteria";
	}
}
?>
<tr><td><a href="login.php">Return TO LOGIN PAGE</a></td><tr>

<form method="POST">

<select  name="profession" >
 <option>---Select Professions--</option>
 <option value="Electrician">Electrician</option>
 <option value="Plumber">Plumber</option>
 <option value="Civil Worker">Civil Worker</option>
 <option value="Mechanic">Mechanic</option>
 <option value="Carpenter">Carpenter</option>
 
 </select >
 
 
  <select  name="locality" >
 
 <option>---Select Locality--</option>
 <option value="Triplicane">Triplicane</option>
 <option value="Mylapore">Mylapore</option>
 <option value="Lloyds road">Lloyds road</option>
 <option value="Royapettah">Royapettah</option>
 <option value="Zambazzar">Zambazzar</option>
 
 < /select>
 
<input type="submit" name="submit" value="search"/>
</form>


<?php
echo $output;
?>