<?php
    //checks if session is already active
    if(!isset($_SESSION))
    {
        //if it's not, it starts one
        session_start();
    }

    //calls every row from the database, and returns it to wherever it was called from
    function getRows($db){
        $stmt = $db->prepare("SELECT * FROM corps");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    //pulls info from the database from whatever ID is sent in
    function corpRead($db,$id){
        //creates SQL statement pulling a specific row according to ID#
        $sql = $db->prepare("SELECT * FROM corps WHERE id = :id");
        //sets the :id = to the ID variable
        $sql->bindParam(':id',$id,PDO::PARAM_INT);
        //executes the statement
        $sql->execute();
        //puts the results from the executed statement into a variable named $results
        $results = $sql->fetch(PDO::FETCH_ASSOC);

        //sets the session variable 'idS' = to the variable $id for later use
        $_SESSION['idS'] = $id;

        //prints out the results from the SQL statement executed earlier
        //for the user to see.
        ?>
        <table>
            <tr>
                <td><b>Corporation ID: </b></td><td><?php echo $results['id']?></td>
            </tr>
            <tr>
                <td><b>Corporation Name: </b></td><td><?php echo $results['corp']?></td>
            </tr>
            <tr>
                <td><b>Date: </b></td><td><?php echo $results['incorp_dt']?></td>
            </tr>
            <tr>
                <td><b>Email: </b></td><td><?php echo $results['email']?></td>
            </tr>
            <tr>
                <td><b>Zip Code: </b></td><td><?php echo $results['zipcode']?></td>
            </tr>
            <tr>
                <td><b>Owner: </b></td><td><?php echo $results['owner']?></td>
            </tr>
            <tr>
                <td><b>Phone Number: </b></td><td><?php echo $results['phone']?></td>
            </tr>
        </table>

        <!--links to either update the information, delete the entire row from the
        database, or to go back to the full listing of every row in the database. -->
        <div id="readLinks">
            <a id="links" href="?action=Update&id=<?php echo $results['id'] ?>">Update</a>
            <a id="links" href="?action=Delete&id=<?php echo $results['id'] ?>">Delete</a>
            <a id="links" href="index.php">Back</a>
        </div>
        <?php
    }

    //part 1/2 functions to update rows in the database
    function corpUpdate($db,$id){
        //sets the session variable idS = to variable id
        $_SESSION['idS'] = $id;

        //pulls in information from the row specified by the id.
        //does the same thing as the read statement here...
        $sql = $db->prepare("SELECT * FROM corps WHERE id = :id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        $results = $sql->fetch(PDO::FETCH_ASSOC);
        ?>

        <!--creates a form, uses input boxes to pull information about each
        attribute to the row, and allows the user to edit these attributes.
        when done they click the submit button and the info is sent back to
        the replace part of the switch on the index page along with the form's
        details specified. -->
        <div id="updateForm">
        <form method="post" action="index.php">
            <b>Corporation Name </b> <input type="text" name="corp" id="corp" value="<?php echo $results['corp']; ?>" />
            <br><br>

            <b>Date </b> <input type="text" name="incorp_dt" id="incorp_dt" value="<?php echo $results['incorp_dt']; ?>" />
            <br><br>

            <b>Email </b> <input type="text" name="email" id="email" value="<?php echo $results['email']; ?>" />
            <br><br>

            <b>Zip Code </b> <input type="text" name="zipcode" id="zipcode" value="<?php echo $results['zipcode']; ?>" />
            <br><br>

            <b>Owner </b> <input type="text" name="owner" id="owner" value="<?php echo $results['owner']; ?>" />
            <br><br>

            <b>Phone Number </b> <input type="text" name="phone" id="phone" value="<?php echo $results['phone']; ?>" />
            <br><br>

                <div id="updateButtons">
                    <input type="submit" name="action" value="Replace">

                    <a style="margin-left:20px; background-color:blue;padding:5px;" href="index.php">Back</a>
                </div>

            </div>




        </form>
        <?php
    }

    //part 2/2 functions to update rows in the database
    function corpReplace($db,$id,$corp,$incorp_dt,$email,$zipcode,$owner,$phone)
    {
        //the actual command to update the row in the database chosen.
        //updates each different attribute where the id is = to $id
        $sql = $db->prepare("UPDATE corps SET corp = :corp, incorp_dt = :incorp_dt,email = :email, zipcode = :zipcode, owner = :owner, phone = :phone WHERE id = :id");

        //binds the :id to the session variable idS, used in place of
        //$id because ID was not sent with the form because it was
        //not allowed to be updated.
        $sql->bindValue(':id',$_SESSION['idS'],PDO::PARAM_INT);
        $sql->bindParam(':corp', $corp, PDO::PARAM_STR);
        $sql->bindParam(':incorp_dt', $incorp_dt, PDO::PARAM_STR);
        $sql->bindParam(':email', $email, PDO::PARAM_STR);
        $sql->bindParam(':zipcode', $zipcode, PDO::PARAM_INT);
        $sql->bindParam(':owner', $owner, PDO::PARAM_STR);
        $sql->bindParam(':phone', $phone, PDO::PARAM_STR);

        //executes the statement.
        $sql->execute();




        //pulls the data back from the database. could've used
        //the variables pulled in from the corpUpdate function,
        //but had it pull in instead so i could more easily see
        //whether or not the data made it through into the database.
        $sql = $db->prepare("SELECT * FROM corps WHERE id = :id");
        $sql->bindParam(':id',$_SESSION['idS'], PDO::PARAM_INT);
        $sql->execute();
        $results = $sql->fetch(PDO::FETCH_ASSOC);



        //tells the user the database was updated, along with the
        //changes they've made.


        //prints out the results of the row that was just
        //inserted to assure that the changes were actually made
        ?>
            <h1 id="h1replace">Updated! Here's what you changed:</h1>


            <table>
                <tr>
                    <td><b>Corporation ID: </b></td><td><?php echo $results['id']?></td>
                </tr>
                <tr>
                    <td><b>Corporation Name: </b></td><td><?php echo $results['corp']?></td>
                </tr>
                <tr>
                    <td><b>Date: </b></td><td><?php echo $results['incorp_dt']?></td>
                </tr>
                <tr>
                    <td><b>Email: </b></td><td><?php echo $results['email']?></td>
                </tr>
                <tr>
                    <td><b>Zip Code: </b></td><td><?php echo $results['zipcode']?></td>
                </tr>
                <tr>
                    <td><b>Owner: </b></td><td><?php echo $results['owner']?></td>
                </tr>
                <tr>
                    <td><b>Phone Number: </b></td><td><?php echo $results['phone']?></td>
                </tr>
            </table>

            <div id="tableReplace">
                <a href="index.php">Back</a>
            </div>


        <?php

    }

    //function to delete a row in the database
    function corpDelete($db,$id){
        //pulls in row where id = $id. does this so it can tell
        //you which row was deleted, could also implement a way for
        //user to reverse changes (put the row back into the database..)
        $sql = $db->prepare("SELECT * FROM corps WHERE id = :id");
        $sql->bindParam(':id',$id,PDO::PARAM_INT);
        $sql->execute();
        $results = $sql->fetch(PDO::FETCH_ASSOC);

        //creates a SQL statement that deletes the row specified by
        //the id
        $sql = $db->prepare("DELETE FROM corps WHERE id = :id");
        $sql->bindParam(':id',$id,PDO::PARAM_INT);
        $sql->execute();

        //echos the name of the corp that was just deleted
        ?>
        <h1 id="h1delete"><?php echo $results['corp'] ?> was deleted!</h1>

        <a id="deleteButton" href="index.php">Back</a>
        <?php
    }
?>