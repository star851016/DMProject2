
<?php
	require_once('database.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>TEST</title>
 
</head>

<body>
	<table class="table table-hover"  cellpadding="2" cellspacing="2">
		<thead>
			<tr>
				<th>I_ID</th>
				<th>Begin_Time</th>
			</tr>
	  	</thead>
	  	<tbody>
		<?php
			$mysqli->autocommit(FALSE);
			$mysqli->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
			$result = mysqli_query($mysqli, "SELECT `I_ID`, `Begin_Time` FROM `period`  WHERE MONTH(`Begin_Time`) = MONTH(NOW());
				"); 
		while($query_data = mysqli_fetch_row($result)) {
		  echo "<tr>";
		  echo "<td>",$query_data[0], "</td>",
			   "<td>",$query_data[1], "</td>";
		  echo "</tr>";
		
		}
		
		

		?>  
	  	</tbody>
	</table>
	<br>
	<hr>
	<br>
<?php
sleep(30);
print(1);

?>  

</body>

</html>