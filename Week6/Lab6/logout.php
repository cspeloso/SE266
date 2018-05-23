<link rel="stylesheet" type="text/css" href="stylesheet.css">

<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
include_once("header.php");
include_once("db.php");
unset($_SESSION["loggedInUsername"]);
$_SESSION["loggedIn"] = false;
$_SESSION["cart"] = array();
?>
<br>
<a href="index.php">Back</a>