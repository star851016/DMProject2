<?php	require_once('database.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Courses Taken</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<body>
<!-- Import nav bar -->
<?php echo file_get_contents('../navbar_M.html'); ?>
<div class="container">
	<br>
	<h1>Courses Taken</h1>
</div>
<div class="container">
<!-- Display table data. -->
<table class="table table-hover" border="1" cellpadding="2" cellspacing="2">
	<thead>
	<tr>
		<td>Instructors ID</td>
		<td>Course Type</td>
		<td>Begin Time</td>
		<td>Taken Numbers</td>
	</tr>
	</thead>
		<?php
		$result = mysqli_query($mysqli, "
		SELECT `I_ID`, `Course_Type`, `Begin_Time`, `Number_of_Period`-`Remaining_Number` FROM `course`, `appoint` WHERE `course`.`Course_ID`=`appoint`.`Course_ID` and `appoint`.`Status`='Checkin' 
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
</table>
</div>
	<script src="../js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>