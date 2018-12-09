<?php	require_once('database.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Courses Reserved</title>
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
	<h1>Courses Reserved</h1>
</div>
<div class="container">
<!-- Display table data. -->
<table  class="table table-hover" cellpadding="2" cellspacing="2">
	  <thead>
		<tr>
		<th>Instructor ID</th>
		<th>Course Type</th>
		<th>Begin Time</th>
		<th>Checkin</th>
		<th>Cancel</th>
		</tr>
	  </thead>
  	  <tbody>
		<?php
		function rollin($i){
			//報到：更新Status: Checkin
			$checkinBtn=mysqli_query($mysqli2, "
			UPDATE `appoint` 
			SET `Status`='Checkin'
			WHERE `I_ID`= '$IIDArray[$i]' AND `Course_ID`='$courseIDArray[$i]' AND `Begin_Time`='$courseIDArray[$i]'
			"); 
		}
		function cancel($i){
			//刪除：更新Status: Cancel (上面SQL抓Course_ID, I_ID, Begin_Time的值存入變數，按下按鈕再透過這些變數去改變相對應STATUS的值)
			$cancelBtn=mysqli_query($mysqli3, "
			UPDATE `appoint` 
			SET `Status`='Cancel'
			WHERE `I_ID`='$IIDArray[$i]'  AND `Course_ID`='$courseIDArray[$i]' AND `Begin_Time`='$beginTimeArray[$i]'
			");
		}
		/* 
		SQL：
		1. (V)會員ID=SESSION
		2. (V)appoint和course的Course_ID來join
		3. (V)Status=Appoint
		*/
		$sessionID=1;
		$result = mysqli_query($mysqli, "
		SELECT `I_ID`, `Course_Type`, `Begin_Time`, `Course_ID` 
		FROM `appoint`,  `course`
		WHERE `M_ID`= $sessionID AND `status`='Appoint' 
		"); 
		//列出該會員已約未上的課
		$i=0;
		while($query_data = mysqli_fetch_row($result)) {
			   $IIDArray[$i]=$query_data[0];#I_ID
			   $courseIDArray[$i]=$query_data[3];#Course_ID
			   $beginTimeArray[$i]=$query_data[2];#Begin_Time	
		  echo "<tr>";
		  echo "<td>",$query_data[0], "</td>", 
			   "<td>",$query_data[1], "</td>", 
			   "<td>",$query_data[2], "</td>"; 
		  echo "<td> <button onclick='",rollin($i),"' type='button' class='btn btn-outline-secondary btn-sm' id='rollinbtn"$i"'>報到</button> </td>";
		  echo "<td> <button onclick='",cancel($i),"' type='button' class='btn btn-outline-secondary btn-sm' id='cancelbtn"$i"'>取消</button> </td>";
		  echo "</tr>";
		  $i++;
		} 
		?>
	  </tbody>

		<!--
		<script language="javascript">
			function rollin(i) {
				var index=i;
				//執行SQL
			}		
			function cancel(i) {
				var index=i;
				//執行SQL
			}
		</script>
		-->
</table>
</div>
	<script src="../js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>