<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
include_once("header.php");
include_once("db.php");
unset($_SESSION['loggedInUsername']);
$_SESSION["cart"] = array();
?>
<br>
<a href="index.php">Back</a>

<!---placed here so i could include the css style sheet-->
<!DOCTYPE HTML>
<HTML>
<head>
    <!---loads up css page-->
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

</body>
</HTML>
