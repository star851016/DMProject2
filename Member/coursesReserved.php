<?php if (!isset($_SESSION)){ session_start(); } ?>
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
		<th>No.</th>	
		<th>Instructor ID</th>
		<th>Course Type</th>
		<th>Begin Time</th>
		<th>Checkin</th>
		<th>Cancel</th>
		</tr>
	  </thead>
  	  <tbody>
  	  	<form id="myform" action="updateDB.php" method="POST">
		<?php
		/* 
		SQL：
		1. (V)會員ID=SESSION
		2. (V)appoint和course的Course_ID來join
		3. (V)Status=Appoint
		ONCLICK=function 更新空白表單的VALUE為index，呼叫PHP中的更新SQL
		用type=submit去傳送form的值
		*/
		$ID=$_SESSION['ID'];
		$result = mysqli_query($mysqli, "
		SELECT `I_ID`, `Course_Type`, `Begin_Time`, `appoint`.`Course_ID` 
		FROM `appoint`,  `course`
		WHERE `M_ID`= '$ID' AND `status`='Appoint' AND `appoint`.`Course_ID`=`course`.`Course_ID` 
		"); 
		//列出該會員已約未上的課
		$i=0;
		while($query_data = mysqli_fetch_row($result)) {
			//存入隱藏表單傳送給另一個PHP
			echo "<input type='hidden' name='IIDArray[]' value='",$query_data[0],"'>";
			echo "<input type='hidden' name='courseIDArray[]' value='",$query_data[3],"'>";
			echo "<input type='hidden' name='beginTimeArray[]' value='",$query_data[2],"'>";
			   #$IIDArray[$i]=$query_data[0];#I_ID
			   #$courseIDArray[$i]=$query_data[3];#Course_ID
			   #$beginTimeArray[$i]=$query_data[2];#Begin_Time	
		  echo "<tr><td>",$i+1,"</td>";
		  echo "<td>",$query_data[0], "</td>", 
			   "<td>",$query_data[1], "</td>", 
			   "<td>",$query_data[2], "</td>"; 
		  echo "<td> <input onClick='updateIndexValueInHiddenInput(",$i,")' type='submit' class='btn btn-outline-secondary btn-sm' name='rollinbtn' value='報到'> </td>";
		  echo "<td> <input onClick='updateIndexValueInHiddenInput(",$i,")' type='submit' class='btn btn-outline-secondary btn-sm' name='cancelbtn' value='取消'></td>";
		  echo "</tr>";
		  $i++;
		} 
		?>
		
			<!--按下按鈕紀錄第幾列，傳送到PHP-->
			<input id="hiddenBlock" type="hidden" name="currentindex" value="">
		</form>
	  </tbody>

		<script language="javascript">
			//抓取第幾列的值
			function updateIndexValueInHiddenInput(i) {
				var index=i;
				document.getElementById("hiddenBlock").setAttribute('value',index);
				var show=parseInt(document.getElementById("hiddenBlock").value)+1;
				alert("您更改的是第"+show+"筆資料？");
				//更新隱藏表單的值
			}
		</script>
</table>
</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>