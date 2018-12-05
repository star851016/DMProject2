<?php
require_once('database.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Arrange Period</title>
</head>

<body>
	<h3>Arrange Periods</h3> 
	<form action="Instructor_Center.php" method="POST">
	
		<p>Instructor:</p>
		<input type="Instructor" value=1 name="Instructor">

		<p>Date:</p>
		<input type="date" value='<?php echo date("Y-m-d");?>' name="Period_Date">
		
		<p>Time(s):</p>
		<input type="checkbox" value='09:00:00' name="time[]"><label>9~10</label><br>
		<input type="checkbox" value='10:00:00' name="time[]"><label>10~11</label><br>
		<input type="checkbox" value='11:00:00' name="time[]"><label>11~12</label><br>
		<input type="checkbox" value='12:00:00' name="time[]"><label>12~13</label><br>
		<input type="checkbox" value='13:00:00' name="time[]"><label>13~14</label><br>
		<input type="checkbox" value='14:00:00' name="time[]"><label>14~15</label><br>
		<input type="checkbox" value='15:00:00' name="time[]"><label>15~16</label><br>
		<input type="checkbox" value='16:00:00' name="time[]"><label>16~17</label><br>
		<input type="checkbox" value='17:00:00' name="time[]"><label>17~18</label><br>
		<input type="checkbox" value='18:00:00' name="time[]"><label>18~19</label><br>
		<input type="checkbox" value='19:00:00' name="time[]"><label>19~20</label><br>
	
		<input type="submit" value="Submit" />
	</form>	
	
	
		

</body>
	
</html>