<?php
	require_once('database.php');	
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Courses Taken</title>
  <meta charset="utf-8">
</head>

<body>
<h1>Courses Taken</h1>
<!-- Display table data. -->
<table border="1" cellpadding="2" cellspacing="2">
	<tr>
		<td>Instructors ID</td>
		<td>Course Type</td>
		<td>Begin Time</td>
		<td>Taken Numbers</td>
	</tr>
		<?php

		$result = mysqli_query($mysqli, "SELECT `I_ID`, `Course_Type`, `Begin_Time`, `Number_of_Session`-`Remaining_Number`
		FROM `course`, `appoint`
		WHERE `course`.`Course_ID`=`appoint`.`Course_ID` and `appoint`.`If_Checkin`='Appoint'
		"); 
		#因為資料庫裏面沒有值沒辦法抓資料，所以上面的SQL的If_Checkin可先用Appoint替代來看是否能成功抓取值
		#等資料庫新增己底資料之後要記得改成Checkin
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