<?php
include 'dbconfig.php';
if($_POST['id'])
{
	$id=$_POST['id'];
	
	$stmt = $DB_con->prepare("SELECT * FROM area WHERE city_id=:id");
	$stmt->execute(array(':id' => $id));
	?><option selected="selected">Select area:</option>
	<?php while($row=$stmt->fetch(PDO::FETCH_ASSOC))

	{

		$getArea=$row['area_name'];
		?>
		<option value="<?php echo $row['area_id']; ?>"><?php echo $getArea ?></option>
		<?php


	}
}
?>






<!-- www.techsofttutorials.com   Techsoft Tutorials, Free Latest Technology Tutorials and Demo. -->