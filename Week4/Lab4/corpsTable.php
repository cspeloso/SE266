<div id="searchBarDiv">

    <form action="index.php" method="get">
        Sort Column: <select name="sort">
            <option value="id">ID</option>
            <option value="corp">Corporation Name</option>
            <option value="incorp_dt">Date</option>
            <option value="email">Email</option>
            <option value="zipcode">Zip Code</option>
            <option value="owner">Owner</option>
            <option value="phone">Phone</option>
        </select>
        Ascending: <input type="radio" name="dir" value="ASC">
        Descending: <input type="radio" name="dir" value="DESC">
        <input type="submit" name="action" value="Sort">
        <input type="reset">
    </form>

    <form action="index.php" method="get">
        Search Column: <select name="search">
            <option value="id">ID</option>
            <option value="corp">Corporation Name</option>
            <option value="incorp_dt">Date</option>
            <option value="email">Email</option>
            <option value="zipcode">Zip Code</option>
            <option value="owner">Owner</option>
            <option value="phone">Phone</option>
        </select>

        Term: <input type="text" name="term" id="term" value="">
        <input type="submit" name="action" value="Search">
        <input type="button" value="Reset">

    </form>
</div>

<form action="index.php" method="get">

    <!--begins table that stores all the rows of the database-->
    <table id="corpTable">
        <tr>
            <th>Corporation Name</th>
            <th>Click to read company info</th>
            <th>Click to update company info</th>
            <th>Click to delete company from DB</th>
        </tr>


        <?php

    if(($action != "Sort") && ($action != "Search"))
    {
    //foreach loop to print out every row of the database
    foreach($corp as $corporation) {
        ?>


            <!--continues with making the table...-->
            <tr>
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
    }}

    else
    {
        echo "<br><b>" . count($corp) . " rows</b>";

        //foreach loop to print out every row of the database
        foreach($corp as $corporation) {

            ?>

            <!--continues with making the table...-->
            <tr>
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
        <br>
        <a id="searchSortBackBtn" href="index.php">Back</a>
        <?php
    }

    ?>


        <a id="addNewCorp" href="?action=Add2">Add New Corporation</a>



        <!--ends the table-->
    </table>



</form>
