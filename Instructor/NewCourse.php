<?php
	require_once('database.php');

	/* Add an Course and acoording instructor to table Course and table Compose. */
	function AddCourse($connection, $CourseType, $Instructors1, $Instructors2, $Instructors3, $Price, $NumberofPeriod, $Student, $StudentPassword) {
		$AC_I1 = mysqli_real_escape_string($connection, $Instructors1);
		$AC_I2 = mysqli_real_escape_string($connection, $Instructors2);
		$AC_I3 = mysqli_real_escape_string($connection, $Instructors3);
		$AC_P = mysqli_real_escape_string($connection, $Price);
		$AC_CT = mysqli_real_escape_string($connection, $CourseType);
		$AC_NS = mysqli_real_escape_string($connection, $NumberofPeriod);
		$AC_S = mysqli_real_escape_string($connection, $Student);
		$AC_SP = mysqli_real_escape_string($connection, $StudentPassword);

		$query1_INSERT = "INSERT INTO `course` (`M_ID`, `Price`, `Course_Type`, `Number_of_Period`, `Remaining_Number` ) VALUES ('$AC_S', '$AC_P', '$AC_CT', '$AC_NS', '$AC_NS');";

		if(!mysqli_query($connection, $query1_INSERT)) echo("<p>Error adding Course data.</p>");

		if (strlen($AC_I1)) {
		   $query2_INSERT = "INSERT INTO `Compose` (`I_ID`, `Course_ID`) VALUES ('$AC_I1', LAST_INSERT_ID());";
		   if(!mysqli_query($connection, $query2_INSERT)) echo("<p>Error adding Instructors1 in Compose data.</p>");
		}
		if (strlen($AC_I2)) {
		   $query3_INSERT = "INSERT INTO `Compose` (`I_ID`, `Course_ID`) VALUES ('$AC_I2', LAST_INSERT_ID());";
		   if(!mysqli_query($connection, $query3_INSERT)) echo("<p>Error adding Instructors2 in Compose data.</p>");
		}
		if (strlen($AC_I3)) {
		   $query4_INSERT = "INSERT INTO `Compose` (`I_ID`, `Course_ID`) VALUES ('$AC_I3', LAST_INSERT_ID());";
		   if(!mysqli_query($connection, $query4_INSERT)) echo("<p>Error adding Instructors3 in Compose data.</p>");
		}
		   
		   
	   
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>DM</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>

<?php


/* If input fields are populated, call AddCourse function. */
if (isset($_POST["Instructors1"])){
	#Variables from POST
	$CourseType = htmlentities($_POST['CourseType']);
	$Instructors1 = htmlentities($_POST['Instructors1']);
	$Instructors2 = htmlentities($_POST['Instructors2']);
	$Instructors3 = htmlentities($_POST['Instructors3']);
	$Price = htmlentities($_POST['Price']);
	$NumberofPeriod = htmlentities($_POST['NumberofPeriod']);
	$Student = htmlentities($_POST['Student']);
	$StudentPassword = htmlentities($_POST['StudentPassword']);

		
	$ErrorReason =[];

	#Check All Blanks is Filled in 
	if ( (strlen($Instructors1)||strlen($Instructors2)||strlen($Instructors3)) AND strlen($Price)AND strlen($NumberofPeriod)AND strlen($Student)AND strlen($StudentPassword)) {
		
		#Check The Instructors EXISTS
		if (strlen($Instructors1)) {
		$query1_select = "SELECT 1 FROM instructor WHERE I_ID = $Instructors1";
		if(!mysqli_fetch_row(mysqli_query($mysqli, $query1_select))) $ErrorReason[] = "NO Instructors:".$Instructors1."." ;
		}
		if (strlen($Instructors2)) {
		$query2_select = "SELECT 1 FROM instructor WHERE I_ID = $Instructors2";
		if(!mysqli_fetch_row(mysqli_query($mysqli, $query2_select))) $ErrorReason[] = "NO Instructors:".$Instructors2."." ;
		}
		if (strlen($Instructors3)) {
		$query3_select = "SELECT 1 FROM instructor WHERE I_ID = $Instructors3";
		if(!mysqli_fetch_row(mysqli_query($mysqli, $query3_select))) $ErrorReason[] = "NO Instructors:".$Instructors3."." ;
		}
			
		#Check The M_Password is Correct
		$query0_select = "select member.M_Password FROM `member` WHERE member.M_ID = $Student "; 
		$result0_SP = mysqli_fetch_row(mysqli_query($mysqli,  $query0_select))[0]; 
		if($result0_SP != $StudentPassword) $ErrorReason[] = "Wrong Student ID or Student Password(".$StudentPassword."). Correct Password:".$result0_SP ;
	
	}else{
	$ErrorReason[] = 'Having Empty Blank(s)'.".";
	}

	if (!sizeof($ErrorReason)){
		
		#Call Function AddCourse
		AddCourse($mysqli, $CourseType, $Instructors1, $Instructors2, $Instructors3, $Price, $NumberofPeriod, $Student, $StudentPassword);

	}else{
		echo "ErrorReason:" ;
		foreach ($ErrorReason as $item) {
			echo $item;
			}
		}

}




?>

<!-- Import nav bar -->
<?php echo file_get_contents('../navbar_I.html'); ?>

<h1>New Course</h1>

<!-- Input form -->
<form action="NewCourse.php" method="POST">
  <table border="0">
  	<tr> <td>CourseType</td><td>
        <input type="text" name="CourseType" maxlength="20" size="20"   value="基本重訓"/>
    </td> </tr>
  
    <tr> <td>Instructors</td> <td>
        <input type="text" name="Instructors1" maxlength="20" size="20"  value=1 />
    </td> <td>
        <input type="text" name="Instructors2" maxlength="20" size="20"  value=2 />
    </td> <td>
        <input type="text" name="Instructors3" maxlength="20" size="20"  value=3 />
    </td> </tr>
    
	<tr> <td>Price</td><td>
        <input type="text" name="Price" maxlength="20" size="20" value=30000 />
    </td> </tr>

    <tr> <td>Number of Period</td><td>
        <input type="text" name="NumberofPeriod" maxlength="20" size="20"  value=24 />
    </td> </tr>
  
    <tr> <td>Student</td><td>
        <input type="text" name="Student" maxlength="20" size="20"   value=1 />
    </td> </tr>
	  
    <tr> <td>Student's Password</td><td>
        <input type="text" name="StudentPassword" maxlength="20" size="20" value=1234 />
    </td> </tr>
	  
    <tr> <td>Add Data</td><td>
        <input type="submit" value="Add Data" />
    </td> </tr>
	  
  </table>
</form>

<!-- Display table data. -->
<table border="1" cellpadding="2" cellspacing="2">
	<tr>
		<td>Course</td>
		<td>Instructors</td>
		<td>Price</td>
		<td>Course Type</td>
		<td>Number of Period</td>
		<td>Remaining Number</td>
		<td>Student</td>
	</tr>
	  
	<?php

		$result = mysqli_query($mysqli, "SELECT course.Course_ID, GROUP_CONCAT(compose.I_ID SEPARATOR '+'), Price, Course_Type, Number_of_Period, Remaining_Number, course.M_ID
		FROM `course`, `member`, `compose`
		WHERE course.M_ID = member.M_ID AND course.Course_ID = compose.Course_ID
		GROUP BY course.Course_ID
		ORDER BY course.Course_ID DESC;
		"); 

		while($query_data = mysqli_fetch_row($result)) {
		  echo "<tr>";
		  echo "<td>",$query_data[0], "</td>",
			   "<td>",$query_data[1], "</td>",
			   "<td>",$query_data[2], "</td>",
			   "<td>",$query_data[3], "</td>",
			   "<td>",$query_data[4], "</td>",
			   "<td>",$query_data[5], "</td>",
			   "<td>",$query_data[6], "</td>";
		  echo "</tr>";
		}
	?>  
  
</table>
	<!--BOOSTRAP樣式-->
	<script src="../js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>