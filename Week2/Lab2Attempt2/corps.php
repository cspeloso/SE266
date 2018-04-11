<?php
    function getRows($db)
    {
        $stmt = $db->prepare("SELECT * FROM corps");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    function corpRead($db,$id)
    {
        $sql = $db->prepare("SELECT * FROM corps WHERE id = :id");
        $sql->bindParam(':id',$id,PDO::PARAM_INT);
        $sql->execute();
        $results = $sql->fetch(PDO::FETCH_ASSOC);

        echo "<b>Corporation ID: </b>" . $results['id'] . "<br>";
        echo "<b>Corportation Name: </b>" . $results['corp'] . "<br>";
        echo "<b>Date: </b>" . $results['incorp_dt'] . "<br>";
        echo "<b>Email: </b>" . $results['email'] . "<br>";
        echo "<b>Zip Code: </b>" . $results['zipcode'] . "<br>";
        echo "<b>Owner: </b>" . $results['owner'] . "<br>";
        echo "<b>Phone: </b>" . $results['phone'] . "<br>";
        ?>

        <a href="?action=Update&id=<?php echo $results['id'] ?>">Update</a>
        <a href="?action=Delete&id=<?php echo $results['id'] ?>">Delete</a>
        <a href="index.php">Back</a>
        <?php
    }

    function corpUpdate($db,$id)
    {
        $sql = $db->prepare("SELECT * FROM corps WHERE id = :id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        $results = $sql->fetch(PDO::FETCH_ASSOC);
        ?>

        <form method="post" action="index.php">

            <label for="id">Corporation ID: <?php echo $results['id']; ?></label>
            <br><br>

            <label for="id">Corporation Name </label><input type="text" name="corp" id="corp" value="<?php echo $results['corp']; ?>"/>
            <br><br>

            <label for="id">Date </label><input type="text" name="incorp_dt" id="incorp_dt" value="<?php echo $results['incorp_dt']; ?>"/>
            <br><br>

            <label for="id">Email </label><input type="text" name="email" id="email" value="<?php echo $results['email']; ?>"/>
            <br><br>

            <label for="id">Zip Code </label><input type="text" name="zipcode" id="zipcode" value="<?php echo $results['zipcode']; ?>"/>
            <br><br>

            <label for="id">Owner </label><input type="text" name="owner" id="owner" value="<?php echo $results['owner']; ?>"/>
            <br><br>

            <label for="id">Phone </label><input type="text" name="phone" id="phone" value="<?php echo $results['phone']; ?>"/>
            <br><br>

            <input type="hidden" name="id" value="<?php echo $id ?>" />

            <input type="submit" name="action" value="Replace">

            <a href="index.php">Back</a>

        </form>

    <?php
    }

    function corpReplace($db,$id,$corp,$incorp_dt,$email,$zipcode,$owner,$phone)
    {
        echo $id;

        echo "Here's what you changed: ";
        echo "<br>";
        echo $id . "<br>" . $corp . "<br>" . $incorp_dt.  "<br>" . $email . "<br>" . $zipcode . "<br>" . $owner . "<br>" . $phone . "<br><br>";


        $sql = $db->prepare("UPDATE corps SET corp = :corp, incorp_dt = :incorp_dt, email = :email, zipcode = :zipcode, owner = :owner, phone = :phone WHERE id = :id");
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->bindParam(':corp', $corp, PDO::PARAM_STR);
        $sql->bindParam(':incorp_dt', $incorp_dt, PDO::PARAM_STR);
        $sql->bindParam(':email', $email, PDO::PARAM_STR);
        $sql->bindParam(':zipcode', $zipcode, PDO::PARAM_INT);
        $sql->bindParam(':owner', $owner, PDO::PARAM_STR);
        $sql->bindParam(':phone', $phone, PDO::PARAM_STR);
        $sql->execute();


        $sql = $db->prepare("SELECT * FROM corps WHERE id= :id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        $results = $sql->fetch(PDO::FETCH_ASSOC);

        echo "here's the corp name from the db: <br>";
        echo "<b>Corporation ID: </b>" . $results['id'] . "<br>";
        echo "<b>Corportation Name: </b>" . $results['corp'] . "<br>";
        echo "<b>Date: </b>" . $results['incorp_dt'] . "<br>";
        echo "<b>Email: </b>" . $results['email'] . "<br>";
        echo "<b>Zip Code: </b>" . $results['zipcode'] . "<br>";
        echo "<b>Owner: </b>" . $results['owner'] . "<br>";
        echo "<b>Phone: </b>" . $results['phone'] . "<br>";

        ?>
        <a href="index.php">Back</a>
        <?php
    }

    function corpDelete($db,$id)
    {
        $sql = $db->prepare("SELECT * FROM corps WHERE id= :id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        $results = $sql->fetch(PDO::FETCH_ASSOC);

        $sql = $db->prepare("DELETE FROM corps WHERE id= :id");
        $sql->bindParam(':id',$id,PDO::PARAM_INT);
        $sql->execute();

        echo $results['corp'] . " was deleted!";
        echo "<br>";
        ?>

        <a href="index.php">Back</a>
        <?php
    }

?>