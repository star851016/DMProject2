<?php if (!isset($_SESSION)){ session_start(); } ?>
<?php
	require_once('database.php');
	
	#[待改]要抓Period的教練
	if(isset($_SESSION['ID'])){
		$Instructor =  $_SESSION['ID'];
	}else{
		$Instructor =  1;
	}
	
	
	
	
	/* Add an Period and acoording instructor to table Period */
	function AddPeriod($connection, $query2_INSERT) {
		$Checked_query2_INSERT = mysqli_real_escape_string($connection, $query2_INSERT);
		#$result_AddPeriod = mysqli_query($connection, 'call ArrgPerd(?, )'); 
		#mysqli_stmt_bind_param($result_AddPeriod, $Checked_query2_INSERT);
		#mysqli_stmt_execute($result_AddPeriod);
		print($query2_INSERT);
		print('-----<Br>');
		$sql = 'CALL ArrgPerd(?)';
		$stmt = $connection->prepare($sql);
		$stmt->bind_param('s', $query2_INSERT);
		$result = $stmt->execute();
		#$tabResultat = $stmt->fetch();
		#$Out_val = $tabResultat['Out_val'];
		#var_dump($Out_val);
		
		/*$query_data = mysqli_fetch($result);
		if ($query_data ) {
			print('in');
			while($row = $stmt->fetch()) {
				echo $query_data[0].$query_data[1];
				echo '\n';			  
			}	
			$stmt->free_result();
			$stmt->close();
		}*/
		
		/*if(!$tabResultat){
			echo("Error Arranged Period Data<br>");
		}else{
			print('Successfully Arranged Your Periods Below:<br>');		
			print('instructor ID'.'----'.'Begin Time');

			while($row = $tabResultat->fetch_row()) {
			  echo $tabResultat[0].$tabResultat[1];
			  echo '\n';			  
			}		
		}*/
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Instructor Center</title>
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
	<!--add  Period-->
	<?php
		if (isset($_POST["time"])){
			
			$Period_Date = $_POST["Period_Date"];
			$time = $_POST ["time"];	
			
			
			#法1:用for迴圈
			
			/*for($j=0 ; $j< count($time) ; $j++){
				$Begin_Time = $Period_Date.' '.$time[$j];
				AddPeriod($mysqli, $Instructor, $Begin_Time);
				print($Begin_Time.'<br>');
			}*/
			
			#法2:字串合併，呼叫一次MySQL
			for($j=0 ; $j< count($time) ; $j++){
				if ($j == 0){ 
					$Instructor_Begin_Time = '('.$Instructor.",'".$Period_Date.' '.$time[$j]."')";
					#$Instructor_Begin_Time = '('.$Instructor.','.$Period_Date.' '.$time[$j].')';					
				}else{
					$Instructor_Begin_Time = $Instructor_Begin_Time.',('.$Instructor.",'".$Period_Date.' '.$time[$j]."')";
					#$Instructor_Begin_Time = $Instructor_Begin_Time.',('.$Instructor.",".$Period_Date.' '.$time[$j].")";
				}
				
				if ($j == 0){ 
					$chainBegin_Time = '('."'".$Period_Date.' '.$time[$j]."')";
				}else{
					$chainBegin_Time = $chainBegin_Time.', ('."'".$Period_Date.' '.$time[$j]."')";
				}
				
			}
			
			#$query2_INSERT = 'call ArrgPerd('."'INSERT INTO `TTT`(`I_ID`, `Begin_Time`) VALUES ".$Instructor_Begin_Time."'".')';
			$query2_INSERT = "INSERT INTO `TTT`(`I_ID`, `Begin_Time`) VALUES ".$Instructor_Begin_Time;
			AddPeriod($mysqli, $query2_INSERT);
			#print($chainBegin_Time);
		}
		
		

	?>
	
	<!--show all Course-->
	<h2>Course List</h2>
	<table class="table table-hover"  cellpadding="2" cellspacing="2">
		<thead>
			<tr>
				<th>instructor ID</th>
				<th>instructor Name</th>
				<th>Course_ID</th>
				<th>M_ID</th>
				<th>Price</th>
				<th>Course_Type</th>
				<th>Number_of_Period</th>
				<th>Remaining_Number</th>
			</tr>
	  	</thead>
	  	<tbody>
		<?php
		$result = mysqli_query($mysqli, "SELECT instructor.I_ID, instructor.I_Name, course.Course_ID, course.M_ID, course.Price, course.Course_Type, course.Number_of_Period, course.Remaining_Number FROM course, compose,instructor WHERE course.Course_ID = compose.Course_ID AND compose.I_ID = instructor.I_ID AND instructor.I_ID = $Instructor AND course.Remaining_Number > 0;
			"); 
		while($query_data = mysqli_fetch_row($result)) {
		  echo "<tr>";
		  echo "<td>",$query_data[0], "</td>",
			   "<td>",$query_data[1], "</td>",
			   "<td>",$query_data[2], "</td>",
			   "<td>",$query_data[3], "</td>",
			   "<td>",$query_data[4], "</td>",
			   "<td>",$query_data[5], "</td>",
			   "<td>",$query_data[6], "</td>",
			   "<td>",$query_data[7], "</td>";
		  echo "</tr>";
		}
		?>  
	  	</tbody>
	</table>
	<br>
	<hr>
	<br>
	<!--show all period-->

	  
	<div class="form">

		<h2>Period List</h2>
		<table class="table table-hover">
			<thead>
				<tr>
				<th>I_ID</th>
				<th>Begin_Time</th>
				<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$count=1;
					$result = mysqli_query($mysqli, "SELECT period.I_ID, period.Begin_Time, appoint.Status FROM `period` LEFT JOIN `appoint` on period.I_ID = appoint.I_ID AND period.Begin_Time = appoint.Begin_Time WHERE period.I_ID = $Instructor AND period.Begin_Time > NOW();
					"); 
					while($row = mysqli_fetch_assoc($result)) { 
				?>
				<tr>
					<td><?php echo $row["I_ID"]; ?></td>
					<td><?php echo $row["Begin_Time"]; ?></td>
					<td>
						<?php 
							#如果["Status"]不等於'appoint'，代表該時段沒被預約<才可以刪除
							if(!$row["Status"]=='appoint'){ 
								echo "<a href='Delete.php?id=";
								echo $row["I_ID"].",\"".$row["Begin_Time"]."\"";
								echo "'>";
								echo "刪除</a>"; 
							}
							else{
								echo '已被預約' ;
							};
						?>
					</td>
				</tr>
				<?php $count++; } 
				?>
			</tbody>
		</table>
	</div>
</div>
<!--BOOSTRAP樣式-->
	<script src="../js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>