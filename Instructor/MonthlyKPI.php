<?php
require_once('database.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>MonthlyKPI</title>
</head>

<body>
	<h3>monthly kpi report</h3> 
	
	<table border="1" cellpadding="2" cellspacing="2">
			<tr>
				<td>instructor ID</td>
				<td>instructor Name</td>
				<td>KPI ID</td>
				<td>Amount Standard</td>
				<td>ThisMounthSaleAmount</td>
			</tr>
	  
		<?php
		$result = mysqli_query($mysqli, "SELECT * FROM `monthly_kpi_report`
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
	  
	</table>
	
		

</body>
	
</html>