<?php
	#這個頁面專們用來刪除Instructor_Center的資料，刪除後就跳回Instructor_Center
	#https://www.allphptricks.com/insert-view-edit-and-delete-record-from-database-using-php-and-mysqli/
	require_once('database.php');
	
	$id=$_REQUEST['id'];
	print('Delete this record :(I_ID,Begin_Time)=('.$id.')<br>');
	$id_array = explode(',',$id); #用逗點分割字串成array
	$query = "DELETE FROM period WHERE I_ID = $id_array[0] AND Begin_Time = $id_array[1]"; 
	print($query );
	if(!mysqli_query($mysqli, $query)) echo("<p>Error DELETE period data.</p>");
	header( "Location: Instructor_Center.php" )
?>