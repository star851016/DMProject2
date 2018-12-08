<?php
require_once('database.php');
	//查詢該會員所有課程
	$res1 = $mysqli->query("select Course_Type,Course_ID
							from course as c , member as m
							where 	m.M_ID = c.M_ID and m.M_ID = '1'
							and c.Remaining_Number > 0
						");
	if (!$res1) {
 		die("sql error:\n" . $mysqli->error);
	}	
require_once('..\Member\appoint.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	 <select onchange="csType()" id="ct">
	 	<option value <?php if (!isset($_SESSION["Course_ID"])) {echo "selected";}?>></option>
		 <?php while($row1 = $res1->fetch_assoc()){ ?>
		 	<!-- 如果課程ID有存入session，就將該課程ID預設被選 -->
	        <option value="<?php echo $row1["Course_ID"]; ?>"
	        	<?php if (isset($_SESSION["Course_ID"])){
	        			if ($row1["Course_ID"] == $_SESSION["Course_ID"]){
	        					echo "selected";
	        			}
	        	} ?> >  	
	        	<?php echo $row1["Course_Type"];?>
	        </option>
	    <?php } ?>
	</select>
	<button onclick="week(-1)">上一週</button>
	<button onclick="week(1)">下一週</button>
	<table>
		<tr>
			<td>時段</td>
			<td><?php  echo $Mon ; ?><br>一</td>
			<td><?php  echo $Tues ; ?><br>二</td>
			<td><?php  echo $Wed ; ?><br>三</td>
			<td><?php  echo $Thru ; ?><br>四</td>
			<td><?php  echo $Fri ; ?><br>五</td>
			<td><?php  echo $Sat ; ?><br>六</td>
			<td><?php  echo $Sun ; ?><br>七</td>
		</tr>
		<?php for ($i=1;$i<=11;$i++) { $btime = $i+8;$etime = $i+9;?>
		<tr>
			<td><?php echo $btime."-".$etime; ?></td>
			<?php if ($i < 10) {$i = "0".$i;} ?>
			<td><?php echo $_SESSION["W1_$i"];?></td>
			<td><?php echo $_SESSION["W2_$i"];?></td>
			<td><?php echo $_SESSION["W3_$i"];?></td>
			<td><?php echo $_SESSION["W4_$i"];?></td>
			<td><?php echo $_SESSION["W5_$i"];?></td>   
			<td><?php echo $_SESSION["W6_$i"];?></td>   
			<td><?php echo $_SESSION["W7_$i"];?></td>                      
		</tr>
		<?php } ?>
		
	</table>
</body>
<script src="../jquery-2.1.1.min.js"></script>
<script type="text/javascript">
	//按上一週或下一週
	function week(x){		
		$.ajax({
			url: 'appoint.php',
			type: 'POST',
			data: {				
				calWeek: x
			},
			dataType: "text",
			success: function(response) {
				location.href = "index.php";
			}
		});	
	}
	//搜尋該課程所有教練有空的時段
	function csType(){	
		$.ajax({
			url: 'appoint.php',
			type: 'POST',
			data: {				
				Course_ID: $("#ct").val()
			},
			dataType: "text",
			success: function(response) {
				location.href = "index.php";				
			}
		});	
	}
	//當使用者按下預約按鈕
	function apt(x,y){	
		$.ajax({
			url: 'addAppoint.php',
			type: 'POST',
			data: {	
				Begin_Time : x,			
				I_ID: y
			},
			dataType: "text",
			success: function(response) {
				 alert(response);
				location.href = "index.php";
			}
		});	
	}
</script>
</html>