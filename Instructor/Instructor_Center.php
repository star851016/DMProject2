<?php
	require_once('database.php');
	
	#[待改]要抓Period的教練
	if(isset($_POST ["Instructor"])){
		$Instructor =  $_POST ["Instructor"];
	}else{
		$Instructor =  1;
	}
	
	
	
	
	/* Add an Period and acoording instructor to table Period */
	function AddPeriod($connection, $Instructor, $Begin_Time) {
		$Checked_Begin_Time = mysqli_real_escape_string($connection, $Begin_Time);
		
		$query1_INSERT = "INSERT INTO `period`(`I_ID`, `Begin_Time`) VALUES ($Instructor, '$Checked_Begin_Time');";
		if(!mysqli_query($connection, $query1_INSERT)){
			echo("Error Arranged Period Data Below:<br>");
		}else{
			print('Successfully Arranged Your Periods Below:<br>');	
		}
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

		
	<!--add  Period-->
	<?php
		if (isset($_POST["Period_Date"])){
			
			$Period_Date = $_POST["Period_Date"];
			$time = $_POST ["time"];	
			
			
			#法1:用for迴圈
			
			for($j=0 ; $j< count($time) ; $j++){
				$Begin_Time = $Period_Date.' '.$time[$j];
				AddPeriod($mysqli, $Instructor, $Begin_Time);
				print($Begin_Time.'<br>');
			}
			
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
			#print($Instructor_Begin_Time);
			#$query2_INSERT = "INSERT INTO `TTT`(`I_ID`, `Begin_Time`) VALUES ".$Instructor_Begin_Time;
			$query2_INSERT = "INSERT INTO `TTT`(`I_ID`, `Begin_Time`) VALUES ".$Instructor_Begin_Time;

			print($query2_INSERT);
			#print($chainBegin_Time);
			
		}
		
		

	?>
	
	<!--show all Course-->
	<h2>all Courses</h2>
	<table border="1" cellpadding="2" cellspacing="2">
			<tr>
				<td>instructor ID</td>
				<td>instructor Name</td>
				<td>Course_ID</td>
				<td>M_ID</td>
				<td>Price</td>
				<td>Course_Type</td>
				<td>Number_of_Period</td>
				<td>Remaining_Number</td>
			</tr>
	  
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
	  
	</table>
	
	<!--show all period-->

	  
	<div class="form">

		<h2>all period</h2>
		
		<table width="100%" border="1" style="border-collapse:collapse;">
			<thead>
				<tr>
				<th><strong>I_ID</strong></th>
				<th><strong>Begin_Time</strong></th>
				<th><strong>Delete</strong></th>
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
					<td align="center"><?php echo $row["I_ID"]; ?></td>
					<td align="center"><?php echo $row["Begin_Time"]; ?></td>
					<td align="center">
						<a href="Delete.php?id=<?php echo $row["I_ID"].",'".$row["Begin_Time"]."'"; ?>"><?php 
							#如果["Status"]不等於'appoint'，代表該時段沒被預約<才可以刪除
							if(!$row["Status"]=='appoint'){ echo 'Delete'; }else{echo '' ;};
						?></a>
					</td>
				</tr>
				<?php $count++; } 
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