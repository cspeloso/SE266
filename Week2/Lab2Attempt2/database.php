<?php
    $dsn = "mysql:host=localhost;dbname=phpclassspring2018";
    $userName = "phpclassspring2018";
    $pWord = "SE266";
    try
    {
        $db = new PDO($dsn,$userName,$pWord);
    }
    catch (PDOException $e)
    {
        die("can't connect to the database. Try again");
    }
?>