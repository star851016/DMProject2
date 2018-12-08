<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");
echo '<a href="logout.php">登出</a><br><br>';  //這裡可以調整成你的登出設定

//member 登入後的東西

if($_SESSION['m_Name'] != null)
{
        
}
else
{
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>'; //回首頁(未登入)
}
?>