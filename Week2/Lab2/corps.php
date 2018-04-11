<?php
    function getRows()
    {
        global $db;
        $stmt = $db->prepare("SELECT * FROM corps");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    function corpRead($db,$corpID,$corp,$incorp_dt,$email,$zipcode,$owner,$phone)
    {
        //$sql = "SELECT corps (corp,incorp_dt,email,zipcode,owner,phone) VALUES (:corp, :incorp_dt, :email, :zipcode, :owner, :phone)";
        //$sql = "SELECT * FROM corps";
        //$stmt = $db->prepare($sql);

        $sql = $db->prepare("SELECT * FROM corps WHERE id= :id");
        $sql->bindParam(':id', $corpID, PDO::PARAM_INT);
        $sql->execute();
        $corporation = $sql->fetch(PDO::FETCH_ASSOC);
        ?>

        <form method="post" action="index.php">
            <label for="corp"><b>Corporation:</b> <?php echo $corporation['$corp']; ?> </label>
            <br><br>

            <label for="incorp_dt">Date: </label>
            <br><br>

            <label for="email">Email: </label>
            <br><br>

            <label for="zipcode">Zip Code: </label>
            <br><br>

            <label for="owner">Owner: </label>
            <br><br>

            <label for="phone">Phone: </label>
            <br><br>
        </form>

        <?php

        return $corporation;

        //echo "<b>CORPORATION: </b>" . $corp . "<br><b>DATE: </b>" . $incorp_dt . "<br><b>EMAIL: </b>" . $email . "<br><b>ZIP CODE: </b>" . $zipcode . "<br><b>OWNER: </b>" . $owner . "<br><b>PHONE: </b>" . $phone;
        //$sql = $db->prepare("DELETE FROM corps WHERE corpid = :id");
        /*$sql = $db->prepare("SELECT FROM corps WHERE corp = :corp");
        $sql->bindParam(':corp',$corp,PDO::PARAM_INT);
        $sql->execute();

        $row = $sql->fetch(PDO::FETCH_ASSOC);
        return $row;*/

    }

    function corpUpdate($db,$corpID,$corp,$incorp_dt,$email,$zipcode,$owner,$phone)
    {
        $sql = $db->prepare("SELECT * FROM corps WHERE id= :id");
        $sql->bindParam(':id', $corpID, PDO::PARAM_INT);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        return $row;

        echo "UPDATE";
        //$sql = $db->prepare("update `corps` SET corp = :corp,incorp_dt = :incorp_dt.... WHERE id = :id");
    }

    function corpDelete($db,$corp,$incorp_dt,$email,$zipcode,$owner,$phone)
    {
        echo "DELETE";
    }


?>