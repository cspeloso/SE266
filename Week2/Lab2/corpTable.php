<!--
//echo "<b>CORPORATION NAME:</b> " . $corporation["corp"] . "<br><b>DATE:</b>" . $corporation["incorp_dt"] . "<br><b>EMAIL: </b>" . $corporation["email"] . "<br><b>ZIP CODE: </b>" . $corporation["zipcode"] . "<br><b>OWNER: </b>" . $corporation["owner"] . "<br><b>PHONE: </b>" . $corporation["phone"];
//echo $corporation["corp"];
//echo "<br>";
-->
<form action="index.php" method="get">
    <?php
        foreach($corp as $corporation)
        {
            echo $corporation["corp"];
            ?>
            <input type="submit" name="action" value="Read"/>
            <input type="submit" name="action" value="Update"/>
            <input type="submit" name="action" value="Delete"/>
            <?php
            echo "<br>";
        }
    ?>
    <!--<input type="submit" name="action" value="Add"/>-->
</form>
