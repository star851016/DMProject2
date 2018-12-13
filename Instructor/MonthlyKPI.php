<?php if (!isset($_SESSION)){ session_start(); } ?>
<?php
require_once('database.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>MonthlyKPI</title>
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
	<h3>Monthly KPI Report</h3> 
</div>
<div class="container">	
	<table class="table table-hover" cellpadding="2" cellspacing="2">
		<thead>
			<tr>
				<td>instructor ID</td>
				<td>instructor Name</td>
				<td>KPI ID</td>
				<td>Amount Standard</td>
				<td>Sale Amount</td>
			</tr>
    	</thead>
		<tbody>
		<?php
		$result = mysqli_query($mysqli, "SELECT * FROM `Monthly_KPI_Report`;			
			"); 
		while($query_data = mysqli_fetch_row($result)) {
		  echo "<tr>";
		  echo "<td>",$query_data[0], "</td>",
			   "<td>",$query_data[1], "</td>",
			   "<td>",$query_data[2], "</td>",
			   "<td>",$query_data[3], "</td>",
			   "<td>",$query_data[4], "</td>";
		  echo "</tr>";
		}
		?>  
	  	</tbody>
	</table>
</div>	
	<!--BOOSTRAP樣式-->
	<script src="../js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>	

</body>
	
</html>