<?php
require_once('database.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Arrange Period</title>
</head>

<body>
	 
	<form action="Instructor_Center.php" method="POST">
	
		<input type="Instructor" value=1 name="Instructor">

		<input type="date" value='<?php echo date("Y-m-d");?>' name="Period_Date">
		
		<select name="Period_Time">
			<option value=9:00:00>9~10</option>
		    <option value=10:00:00>10~11</option>
			<option value=11:00:00>11~12</option>
			<option value=12:00:00>12~13</option>
		</select>
		
		<input type="checkbox" value='09:00:00' name="time[]"><label>9~10</label>
		<input type="checkbox" value='10:00:00' name="time[]"><label>10~11</label>
		<input type="checkbox" value='11:00:00' name="time[]"><label>11~12</label>
		<input type="checkbox" value='12:00:00' name="time[]"><label>12~13</label>
	
		<input type="submit" value="Submit" />
	</form>	
	
	
		

</body>
	
<?php
				#Begin_Time : x,			
				#I_ID: y
				?>
</html>