<?php 
	require('ajaxconfig.php');
	
	$sql = "select * from country order by country_name ASC";
	$rs = mysqli_query($conn,$sql);
	
	
	if(isset($_POST['submit']))
	{
		print_r($_POST);
	}
?>

<!DOCTYPE html>
<html>
<head>
<title>Ajax dropdown list from database using PHP and jQuery</title>
<link href="style.css" rel="stylesheet">
</head>
<body>

<div class="container">
	<form action="" method="post">
		<div class="country-container">
			<label>Country: </label>
			<select id="country" name="country_name" required>
				<option value="">Select Country</option>
				<?php 
					while($rows = mysqli_fetch_assoc($rs))
					{
						echo '<option value="'.$rows['id'].'">'.$rows['country_name'].'</option>';
					}
				?>
			</select>
			<img src="img/ajax-loader.gif" id="loader">
		</div>
		<div class="cities-container">
		</div>
		
		<div class="submit-container">
			<input type="submit" name="submit" value="submit">
		</div>
	</form>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity "sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$("#country").change(function(){
			var getCountryID = $(this).val();
			
			if(getCountryID !='')
			{
				$("#loader").show();
				$(".cities-container").html("");
				
				$.ajax({
					type:'post',
					data:{country_id:getCountryID},
					url: 'ajax_request.php',
					success:function(returnData){
						$("#loader").hide();	
						$(".cities-container").html(returnData);
					}
				});	
			}
			
		})
	});
</script>
</body>
</html>