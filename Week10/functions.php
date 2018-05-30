<?php

    //submits data to the database
    function submitData($db,$email,$phone,$heard_from,$contact_via,$comments)
    {
        //tries to insert the info into the account database
        try{
            //prepares an insert statement
            $sql = "INSERT INTO account VALUES (null,:email,:phone,:heard_from,:contact_via,:comments)";
            $sql = $db->prepare($sql);
            //binds the respective variables to their statement
            //counterparts
            $sql->bindParam(':email',$email);
            $sql->bindParam(':phone',$phone);
            $sql->bindParam(':heard_from',$heard_from);
            $sql->bindParam(':contact_via',$contact_via);
            $sql->bindParam(':comments',$comments);
            //executes the statement after variables have
            //been bound correctly
            $sql->execute();
            ?>
                <!--tells the user the data was added successfully-->
                <p>Data added to the database successfully.</p>

            <?php
        }
        //if the info wasn't added correctly...
        catch(PDOException $e){
            //tells the user this.
            die("Data couldn't be added to the database.");
        }
    }
?>