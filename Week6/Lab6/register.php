<?php
    include_once("header.php");
?>
<form action="index.php" method="get">
    <input type="text" name="emailVar" id="emailVar" pattern="[A-z,0-9]{2,}@[A-z]{2,}.[A-z]{2,}" title="example@email.com" placeholder="email" value="" required>
    <input type="password" name="passwordVar" id="passwordVar" placeholder="password" required>
    <input type="password" name="passwordVarConfirm" id="passwordVarConfirm" placeholder="confirm password" required>
    <br><br>

    <input type="submit" name="action" value="registerUser">
</form>

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

