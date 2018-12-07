<?php
	require_once('database.php');	
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Courses Bought</title>
  <meta charset="utf-8">
</head>

<body>
<h1>Courses Bought</h1>
<!-- Display table data. -->
<table border="1" cellpadding="2" cellspacing="2">
	<tr>
		<td>Course Type</td>
		<td>Price</td>
		<td>Total Number</td>
		<td>Remaining Number</td>
	</tr>
		<?php
		$thisCourseID = 1;
		$result = mysqli_query($mysqli, "
			SELECT `Course_Type`,`Price`, `Number_of_Period`,`Remaining_Number`
			FROM `course`
			WHERE `course`.`Course_ID`=$thisCourseID
		"); 
		while($query_data = mysqli_fetch_row($result)) {
		  echo "<tr>";
		  echo "<td>",$query_data[0], "</td>",
			   "<td>",$query_data[1], "</td>",
			   "<td>",$query_data[2], "</td>",
			   "<td>",$query_data[3], "</td>";
		  echo "</tr>";
		}
		?>
	
</body>
</html>