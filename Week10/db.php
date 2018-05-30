<?php

    $dsn = "mysql:host=localhost;dbname=phpclassspring2018";
    $userName = "PHPClassSpring2018";
    $pWord = "se266";
    try{
        $db = new PDO($dsn,$userName,$pWord);
    }
    catch(PDOException $e){
        die("Can't connect to the database.");
    }
?>