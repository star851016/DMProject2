<?php
require_once('database.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Arrange Period</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
	<!-- Import nav bar -->
	<?php echo file_get_contents('../navbar_I.html'); ?>
	<br>
	<div class="container">
	<h3>Arrange Periods</h3> 
	<hr>
	</div>
	<div class="container">
	<form action="Instructor_Center.php" method="POST">
		<div class="container">
			<div class="form-group row">				
				<label class="col-sm-2 col-form-label">Instructor ID</label>
				<div class="col-sm-4">
					<input type="Instructor" class="form-control" value=1 name="Instructor">
				</div>
			</div>
			<hr>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Date</label>
				<div class="col-sm-4">
					<input type="date" class="form-control" value='<?php echo date("Y-m-d");?>' name="Period_Date">
				</div>
			</div>
			<hr>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Time Periods</label>
				<div class="col-sm-4">
				<input type="checkbox" value='09:00:00' name="time[]"> <label> 9~10</label><br>
				<input type="checkbox" value='10:00:00' name="time[]"> <label> 10~11</label><br>
				<input type="checkbox" value='11:00:00' name="time[]"> <label> 11~12</label><br>
				<input type="checkbox" value='12:00:00' name="time[]"> <label> 12~13</label><br>
				<input type="checkbox" value='13:00:00' name="time[]"> <label> 13~14</label><br>
				<input type="checkbox" value='14:00:00' name="time[]"> <label> 14~15</label><br>
				<input type="checkbox" value='15:00:00' name="time[]"> <label> 15~16</label><br>
				<input type="checkbox" value='16:00:00' name="time[]"> <label> 16~17</label><br>
				<input type="checkbox" value='17:00:00' name="time[]"> <label> 17~18</label><br>
				<input type="checkbox" value='18:00:00' name="time[]"> <label> 18~19</label><br>
				<input type="checkbox" value='19:00:00' name="time[]"> <label> 19~20</label><br>
				</div>
			</div>
			<hr>
			<div class="container right">
				<input class="btn btn-outline-secondary btn-sm" type="submit" value="Submit">
			</div>
		</div>
	</form>	
	<br>

	</div>
<!--BOOSTRAP樣式-->
	<script src="../js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>		

</body>

	
</html>