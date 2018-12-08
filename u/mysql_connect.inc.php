<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$db_server = "localhost";
$db_name = "myadsl_gym";
$db_user = "root";
$db_passwd = "";

if(!@mysql_connect($db_server, $db_user, $db_passwd))
        die("didn't use");

mysql_query("SET NAMES utf8");

if(!@mysql_select_db($db_name))
        die("didn't use");
?>