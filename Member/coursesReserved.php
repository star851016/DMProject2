<?php
	require_once('database.php');	
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Courses Reserved</title>
  <meta charset="utf-8">
</head>

<body>
<h1>Courses Reserved</h1>
<!-- Display table data. -->
<table border="1" cellpadding="2" cellspacing="2">
		<tr>
		<td>Instructor ID</td>
		<td>Course Type</td>
		<td>Begin Time</td>
		<td>Checkin</td>
		<td>Delete</td>
		</tr>
		<?php
		/* 
		SQL：
		1. (V)會員ID=SESSION
		2. (V)appoint和course的Course_ID來join
		3. (V)Status=Appoint
		*/
		$sessionID=1;
		$result = mysqli_query($mysqli, "
		SELECT `I_ID`, `Course_Type`, `Begin_Time` 
		FROM `appoint`,  `course`
		WHERE `M_ID`= $sessionID AND `status`='Appoint' AND `appoint`.`Course_ID`=`course`.`Course_ID`
		"); 
		//列出該會員已經預約的課
		while($query_data = mysqli_fetch_row($result)) {
		  echo "<tr>";
		  echo "<td>",$query_data[0], "</td>",
			   "<td>",$query_data[1], "</td>",
			   "<td>",$query_data[2], "</td>";
		  echo "<td> <button type='button'>Roll in</button> </td>";
		  echo "<td> <button type='button'>Delete</button> </td>";
		  echo "</tr>";
		}

		//報到：更新Status: Checkin
		//刪除：delete Appoint where I_ID = ‘I_ID’ and Begin_Time = ‘Begin_Time’ 

		?>
</body>
</html>