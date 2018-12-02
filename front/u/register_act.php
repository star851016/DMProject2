<?php require_once "../backend/DB_Tool.php"; ?>
<?php require_once "../backend/tool.php"; ?>
<?php

	$db_tool = new DB_Tool;
	$db = &$db_tool->get_DB();

	$M_ID = isset($_POST['M_ID']) ? strtolower(input_filter($_POST['M_ID'])) : '';
	$M_Password = isset($_POST['M_Password']) ? input_filter($_POST['M_Password']) : '';
	$rePassword = isset($_POST['rePassword']) ? input_filter($_POST['rePassword']) : '';
	$M_Name = isset($_POST['M_Name']) ? input_filter($_POST['M_Name']) : '';
	$M_Gende = isset($_POST['M_Gende']) ? input_filter($_POST['M_Gende']) : '';
	$Year = isset($_POST['Year']) ? input_filter($_POST['Year']) : '';
	$Month = isset($_POST['Month']) ? input_filter($_POST['Month']) : '';
	$Day = isset($_POST['Day']) ? input_filter($_POST['Day']) : '';
	$M_Email = isset($_POST['M_Email']) ? input_filter($_POST['M_Email']) : '';

	$count = -1;
	$key = 1;
	$error_msg = '';

	try
	{
		if(!empty($M_ID) && !empty($M_Password) && 
		   !empty($rePassword) && !empty($M_Name) && 
		   !empty($M_Gende) &&  
		   !empty($Year) && !empty($Month) && !empty($Day) && !empty($Nickname))
		{
			if(empty($M_Email))
			{
				$M_Email = null;
			}
			else
			{
				if(strlen($M_Email) > 300)
				{
					$key = 0;
					$error_msg = 'your email account is wrong, please try again.';
				}
			}

			if($Password != $rePassword)
			{
				$key = 0;
				$error_msg = 'please confirm your password again.';
			}
			else if(strlen($Password) < 8)
			{
				$key = 0;
				$error_msg = 'your password is too short, please try again.';
			}
			


			if($key == 1)
			{
				$array = array($M_ID);
				$count = $db_tool->get_value('member', 'count(*)', 'M_ID = ?', $array);

				if($count == 0)
				{

					$dob = $Year . '-' . $Month . '-' . $Day;
					$dob = date("Y-m-d", strtotime($dob));

					$Password = SET_PASSWORD($M_ID, $Password);
					$sql = "INSERT INTO accounts(M_ID, M_Password, M_Email, M_Name, M_Gende) VALUES(?, ?, ?, ?, ?);";
					$std = $db->prepare($sql);
					$std->execute(array($SID, $Password, $Email, $Name, $Nickname, $Gender, $Department, $dob, get_date_time()));
					$arr = array('status' => '1', 'msg' => urlencode('successful'));
				} 

				else
				{
					$arr = array('status' => '0', 'msg' => urlencode('this account is already'));
				}	
			}
				else
			{
				$arr = array('status' => '0', 'msg' => urldecode($error_msg));
			}

		}
		echo urldecode(json_encode($arr));
	}
	catch(Exception $ex)
	{
		$error = $ex -> getMessage();
	}

?>