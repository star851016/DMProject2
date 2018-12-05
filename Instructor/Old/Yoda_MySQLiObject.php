<?php
require_once('database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <title>DM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

</head>
<body>
  <div class="container">
    <h1>部門</h1>

  <br><br>
    <table class="table table-striped">
      <tr>
        <td>ID</td>
        <td>名稱</td>

      </tr>
      
      <?php
	define('eHappy',"文淵閣工作室");
	const eHappyUrl = "http://www.e-happy.com.tw";
	echo "您好，歡迎光臨".eHappy."的網站<br>";
	echo "網址為：".eHappyUrl."<br>";
    ?>
	<?php
	echo "目前系統的 PHP 版本為：";
	echo PHP_VERSION;
	$myLanguage = "PHP"; 
	echo '我最喜愛的網頁程式是 $myLanguage <br />'; 
	echo "我最喜愛的網頁程式是 $myLanguage"; 
?>
<?php
	$a = 2;
	$b = ($a > 0 || $a < 10) ? "正數" : "負數";  # || 
	echo $b;
	
	$a = 2;
	$c = $a  ? : $b;   # if a exist , than $c=$a
	echo $c;
?>

<?php
	$score = 85;
	if($score>=60 && $score<70){
		echo '丙等';
	}elseif($score>=70 && $score<80){
		echo '乙等';
	}elseif($score>=80 && $score<90){
		echo '甲等';		
	}elseif($score>=90 && $score<=100){
		echo '優等';		
	}else{
		echo '不及格';
	}
?>

<?php
	$countI = 0;
	for ($i=1;$i<=10;$i++){
		$countI += $i;
	}
	echo $countI;
?>
<?php
$season = array('春', '夏', '秋', '冬'); 

echo "每年的四季分別為：";
foreach ($season as $value){
	echo $value;
}
?>

<?php
	function showName($myName){
		echo "大家好，我的名字叫：" . $myName . "。<br />";
	}
	showName("David");
	showName("Lily");
	
	$ErrorReason =[];
	echo sizeof($ErrorReason);
	$ErrorReason[] =1111;
	$ErrorReason[] = $countI."111";
	
	if ($ErrorReason){
		foreach ($ErrorReason as $item) {
			echo $item;}
	}		

?>
	
  </table>
  </div>
</body>
</html>
