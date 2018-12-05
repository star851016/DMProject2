<?php
require_once('database.php');

/* Add an Course and acoording instructor to table Course and table Compose. */
function AddCourse($connection, $CourseType, $Instructors1, $Instructors2, $Instructors3, $Price, $NumberofSession, $Student, $StudentPassword) {
	$AC_I1 = mysqli_real_escape_string($connection, $Instructors1);
	$AC_I2 = mysqli_real_escape_string($connection, $Instructors2);
	$AC_I3 = mysqli_real_escape_string($connection, $Instructors3);
	$AC_P = mysqli_real_escape_string($connection, $Price);
	$AC_CT = mysqli_real_escape_string($connection, $CourseType);
	$AC_NS = mysqli_real_escape_string($connection, $NumberofSession);
	$AC_S = mysqli_real_escape_string($connection, $Student);
	$AC_SP = mysqli_real_escape_string($connection, $StudentPassword);

	$query1_INSERT = "INSERT INTO `Course` (`M_ID`, `Price`, `Course_Type`, `Number_of_Session`, `Remaining_Number` ) VALUES ('$AC_S', '$AC_P', '$AC_CT', '$AC_NS', '$AC_NS');";

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
</head>

<body>

<?php


/* If input fields are populated, call AddCourse function. */
if (isset($_POST["Instructors1"]))
{
$CourseType = htmlentities($_POST['CourseType']);
$Instructors1 = htmlentities($_POST['Instructors1']);
$Instructors2 = htmlentities($_POST['Instructors2']);
$Instructors3 = htmlentities($_POST['Instructors3']);
$Price = htmlentities($_POST['Price']);
$NumberofSession = htmlentities($_POST['NumberofSession']);
$Student = htmlentities($_POST['Student']);
$StudentPassword = htmlentities($_POST['StudentPassword']);
}
	
$ErrorReason =[]

#Check All Blanks is Filled in 
if ( (strlen($Instructors1)||strlen($Instructors2)||strlen($Instructors3)) AND strlen($Price)AND strlen($NumberofSession)AND strlen($Student)AND strlen($StudentPassword)) {
}else{
echo 'Having Empty Blank(s)';
$ErrorReason[] = 'Having Empty Blank(s)'
}

#Check The Instructors EXISTS
if (strlen($Instructors1)) {
$query1_select = "SELECT Count(*) FROM Instructor WHERE I_ID = $Instructors1";
if(!mysqli_query($mysqli, $query1_select)) echo "NO Instructors:".$Instructors1 ;
}
if (strlen($Instructors2)) {
$query2_select = "SELECT Count(*) FROM Instructor WHERE I_ID = $Instructors2";
if(!mysqli_query($mysqli, $query2_select)) echo "NO Instructors:".$Instructors2 ;
}
if (strlen($Instructors3)) {
$query3_select = "SELECT Count(*) FROM Instructor WHERE I_ID = $Instructors3";
if(!mysqli_query($mysqli, $query3_select)) echo "NO Instructors:".$Instructors3 ;
}
	
	#Check The M_Password is Correct
		$query0_select = "select member.M_Password FROM `member` WHERE Member.M_ID = $Student "; 
		$result0_SP = mysqli_fetch_row(mysqli_query($mysqli,  $query0_select))[0]; 
		echo "StudentPassword:", $result0_SP;
		if ($result0_SP == $StudentPassword){
		
		#Call Function AddCourse
		AddCourse($mysqli, $CourseType, $Instructors1, $Instructors2, $Instructors3, $Price, $NumberofSession, $Student, $StudentPassword);
		
		}else{
		echo 'Wrong Student ID or Password';
		}
?>


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

    <tr> <td>Number of Session</td><td>
        <input type="text" name="NumberofSession" maxlength="20" size="20"  value=24 />
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
	<td>Number of Session</td>
	<td>Remaining Number</td>
    <td>Student</td>
    <td>Student's Password</td>
  </tr>
  
<?php

$result = mysqli_query($mysqli, "SELECT Course.Course_ID, GROUP_CONCAT(compose.I_ID SEPARATOR '+'), Price, Course_Type, Number_of_Session, Remaining_Number, Course.M_ID, member.M_Password
FROM `Course`, `member`, `compose`
WHERE Course.M_ID = Member.M_ID AND Course.Course_ID = compose.Course_ID
GROUP BY Course.Course_ID
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

</body>
</html>


