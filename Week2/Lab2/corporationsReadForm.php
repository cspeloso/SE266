<form method="post" action="index.php">
    <label for="corp">Corporation: <?php echo $corporationSQL['$corp']; ?> </label>
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

    <?php
        $sql = $db->prepare("DELETE FROM `corps` WHERE id = :id");
        $sql->bindParam(':id',$id,PDO::PARAM_INT);
        $sql->execute();
    ?>

    <!--
    $sql = "SELECT * FROM corps";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $corps = $sql->fetchAll(PDO::FETCH_ASSOC);

    $stmt->bindParam(':corp', $corp);
    $stmt->bindParam(':incorp_dt', $incorp_dt);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':zipcode', $zipcode);
    $stmt->bindParam(':owner', $owner);
    $stmt->bindParam(':phone', $phone);
    $stmt->execute();
    echo "<b>CORPORATION: </b>" . $corp . "<br><b>DATE: </b>" . $incorp_dt . "<br><b>EMAIL: </b>" . $email . "<br><b>ZIP CODE: </b>" . $zipcode . "<br><b>OWNER: </b>" . $owner . "<br><b>PHONE: </b>" . $phone;-->

</form>