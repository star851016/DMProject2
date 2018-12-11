<?php
    $DBname='myadsl_gym';
    $DBid='root';
    $DBpwd='';


    $M_ID='6';
    $M_Name='Alice';
    $M_Email='alice90270@gmail.com';
    $M_Address='TPE';
    $M_Age='20';
    $M_Phone='0921222212';
    $M_Gender='F';
    $M_Password='';

    $connection = new PDO("mysql:host=localhost;dbname=$DBname;charset=utf8", $DBid, $DBpwd);
    #執行Query
    $connection->exec("INSERT INTO member VALUES ($M_ID, $M_Name, $M_Email, $M_Address, $M_Age, $M_Phone, $M_Gender, $M_Password)");
    #PDO參考資料: https://pjchender.blogspot.com/2015/08/php-data-objects-pdo.html

?>