<!--added so the file can access the css file-->
<link rel="stylesheet" type="text/css" href="stylesheet.css">

<?php

    //includes the db.php
    include_once("db.php");

    //Grabs all the data from the account table
    $sql = "SELECT * FROM account";
    $sql = $db->prepare($sql);
    $sql->execute();
    $results = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<!--table that shows the data from account table-->
<table>

    <th>Email</th>
    <th>Phone</th>
    <th>Heard From</th>
    <th>Contact Via</th>
    <th>Comments</th>

    <?php

        //for each entry in the database...
        foreach($results as $result)
        {
            ?>

                <tr>
                    <!--...adds a new line on the table with the info stored-->
                    <td><?php echo $result["email"]; ?></td>
                    <td><?php echo $result["phone"]; ?></td>
                    <td><?php echo $result["heard"]; ?></td>
                    <td><?php echo $result["contact"]; ?></td>
                    <td><?php echo $result["comments"]; ?></td>

                </tr>

            <?php
        }

    ?>

</table>

<hr>
<br>

<!--brings user back to the main page-->
<a href="index.html">Back</a>
