<?php
require_once('database.php');
require_once('..\Yoda\WeekCompute.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	 
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
	
	<button onclick="SubmitPeriod('2018-11-21 10:00:00', 2)">Submit</button>
</body>

<script src="../jquery-2.1.1.min.js"></script>
<script type="text/javascript">
	//按上一週或下一週
	function week(x){		
		$.ajax({
			url: 'WeekCompute.php',
			type: 'POST',
			data: {				
				calWeek: x
			},
			dataType: "text",
			success: function(response) {
				location.href = "ArrangePeriod2.php";
			}
		});	
	}
	//當教練按下Submit按鈕
	function SubmitPeriod(x,y){	
		alert(x);
		$.ajax({
			url: 'SubmitPeriod.php',
			type: 'POST',
			data: {	
				Begin_Time : x,			
				I_ID: y
			},
			dataType: "text",
			success: function(response) {
				 alert(response);
				location.href = "SubmitPeriod.php";
			}
		});	
	}
</script>
</html>