<link rel="stylesheet" type="text/css" href="stylesheet.css">

<?php
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

    include_once("header.php");
    include_once("db.php");
        ?>

        <h3>Login</h3>
        <form action="index.php" method="get">
            <input type="text" name="emailVar" id="emailVar" pattern="[A-z,0-9]{2,}@[A-z]{2,}.[A-z]{2,}"
                   title="example@email.com" placeholder="email" value="" required>
            <input type="password" name="passwordVar" id="passwordVar" placeholder="password" required>

            <input type="submit" name="action" value="Login">


        </form>


        <br><hr><br>

        <h3>Register</h3>


<?php

    include_once("register.php");

?>