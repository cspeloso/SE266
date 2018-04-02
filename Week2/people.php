<?php
    function getRows()
    {
        //Select all the rows as associative array and return
        //prepared statement
        global $db;
        $stmt = $db->prepare("SELECT * FROM phpclassspring2018");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    function personAdd($db,$firstName,$lastName,$age)
    {
        $sql = "INSERT INTO phpclassspring2018 (firstName,lastName,age) VALUES (:firstName, :lastName, :age)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':firstName',$firstName);
        $stmt->bindParam(':lastName',$lastName);
        $stmt->bindParam(':age',$age, PDO::PARAM_INT);
        $stmt->execute();
    }
?>