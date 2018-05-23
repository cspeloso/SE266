<h1>Chris's Shopping Cart Website</h1>
<a href="index.php">Home Page</a> &nbsp;&nbsp;&nbsp;
<a href="cartCheckout.php">Cart</a> &nbsp;&nbsp;&nbsp;
<!--<a href="adminCPhomepage.php">Admin Control Panel</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->

<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

if(isset($_SESSION['loggedInUsername']))
{

}

else{
    $_SESSION['loggedInUsername'] = "";
}

if($_SESSION['loggedInUsername'] != "")
{
    ?>
        <a href="logout.php">Log Out</a>
    <?php
}
else
{
    ?>
        <a href="login.php">Login Page</a>
    <?php
}


?>

<br><br>