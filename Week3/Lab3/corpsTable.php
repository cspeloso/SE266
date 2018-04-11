<form action="index.php" method="get">
    <!--begins table that stores all the rows of the database-->
    <table id="corpTable">
        <tr>
            <th>Corporation Name</th>
            <th>Click to read company info</th>
            <th>Click to update company info</th>
            <th>Click to delete company from DB</th>
        </tr>
        <center>
        <a id="addNewCorp" href="?action=Add2">Add New Corporation</a>
        </center>

        <?php

    //foreach loop to print out every row of the database
    foreach($corp as $corporation) {
        ?>

        <!--continues with making the table...-->
        <tr><br>
            <td id="corpNameTD">
                <?php
                    //echos corporation name into the table
                    echo $corporation["corp"];
                ?>
                <!--prints buttons for read, update, and delete
                for each individual company. uses php commands inside the
                HTML to print the individual company ID for the link-->
            </td>
            <td><a href="?action=Read&id=<?php echo $corporation['id'] ?>">Read</a></td>
            <td><a href="?action=Update&id=<?php echo $corporation['id'] ?>">Update</a></td>
            <td><a href="?action=Delete&id=<?php echo $corporation['id'] ?>">Delete</a></td>
        </tr>
        <?php
    }
    ?>
        <br />


        <!--ends the table-->
    </table>


</form>
