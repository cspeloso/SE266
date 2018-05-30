<!--added so the file can access the css file-->
<link rel="stylesheet" type="text/css" href="stylesheet.css">

<?php
    //Chris Peloso, 5/30/2018

    /*includes the db.php and functions.php files
    so users can acess the database and functions, respectively*/
    include_once("db.php");
    include_once("functions.php");

    //gets the variables from index.html form using POST
    $email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_STRING) ?? "";
    $phone = filter_input(INPUT_POST,'phone', FILTER_SANITIZE_STRING) ?? "";
    $heard_from = filter_input(INPUT_POST,'heard_from', FILTER_SANITIZE_STRING) ?? "";
    $contact_via = filter_input(INPUT_POST,'contact_via', FILTER_SANITIZE_STRING) ?? "";
    $comments = filter_input(INPUT_POST,'comments', FILTER_SANITIZE_STRING) ?? "";


?>

<!--table used to neatly display results of what
the user entered on the previous page-->
<table>

    <th>Email</th>
    <th>Phone</th>
    <th>Heard From</th>
    <th>Contact Via</th>
    <th>Comment</th>

    <tr>
        <td><?php echo $email ?></td>
        <td><?php echo $phone ?></td>
        <td><?php echo $heard_from ?></td>
        <td><?php echo $contact_via ?></td>
        <td><?php echo $comments ?></td>
    </tr>

</table>



<?php

    //submits data to the database using the submitdata function
    submitData($db,$email,$phone,$heard_from,$contact_via,$comments)

?>

<!--link that brings the user back to index.html-->
<a href="index.html">Back</a>
