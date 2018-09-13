<?php
include_once 'dbconfig.php';


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$("#loding1").hide();
	$("#loding2").hide();
	$(".country").change(function()
	{
		$("#loding1").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
		$(".state").find('option').remove();
		$(".city").find('option').remove();
		$(".area").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "get_state.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding1").hide();
				$(".state").html(html);
			} 
		});
	});
	
	
	
	function getDist(val){
        $.ajax({
            type: "POST",
            url: "location.php",
            data:'states_id='+val,
            success: function(data){
            $(".state").html(data);
            }
        });
	
	

	
	$(".state").change(function()
	{
		$("#loding2").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "get_city.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding2").hide();
				$(".city").html(html);
			} 
		});
	});


$(".city").change(function()
	{
		$("#loding2").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "get_area.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding2").hide();
				$(".area").html(html);
			} 
		});
	});
	
});
</script>
<style>
label
{
font-weight:bold;
padding:10px;
}
div
{
	margin-top:100px;
}
select
{
	width:200px;
	height:35px;
	border:2px solid #456879;
	border-radius:10px;
}

.color {
	color:green;
}

.link {
	color:red;
}
</style>
</head>



<body>

<center>

	<tr>
	
     	<td>
<label>Country :</label></td> 
		<td>
<select id ="country" name="country" class="country">
<option selected="selected">--Select Country--</option>
<img src="ajax-loader.gif" id="loding3"></img>
<?php
	$stmt = $DB_con->prepare("SELECT * FROM country");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
	   <option value="<?php echo $row['country_id']; ?>"><?php echo $row['country_name']; ?></option>

</td>
    </tr>
        <?php
	} 
?>
</select>
<br><br><br>

<tr>

	<td>

<label>State :</label></td>
<td>
 <select name="state" class="state">
<option selected="selected">--Select State--</option>
</select>

</td>
    </tr>

<img src="ajax-loader.gif" id="loding1"></img>
<br><br><br>

<tr>

	<td>


<label>City :</label> </td>
<td>
<select name="city" class="city">
<option selected="selected">--Select City--</option>
</select>

</td>
    </tr>



<img src="ajax-loader.gif" id="loding2"></img>
<br><br><br>
</td></tr>
<br><br><br>

<tr>
	<td>
<label>Area :</label> </td>

<td>

<select id ="myarea" name="area" class="area" >


<option selected="selected">--Select Area--</option>
</select>

</td>
    </tr>




		
</td>
</tr>


<br />
</center>




<body>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#myarea").change(function () {
                if ($(this).val() == "1") {
                    $("#OtherTexts").show();
                } else {
                    $("#OtherTexts").hide();
                }
            });
        });
    </script>
    <hr />


<tr>

	<td>

<div id="OtherTexts" style="display: none">


        Enter your Area Properly 

    </td>
        <td>
        <input type="text" id="txtPassportNumber" />

    
</td>
</tr>

</div>


    
</body>




</body>
</html>
