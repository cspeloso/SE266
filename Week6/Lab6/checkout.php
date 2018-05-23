<link rel="stylesheet" type="text/css" href="stylesheet.css">

<?php

    include_once("header.php");
    include_once("db.php");
    include_once("functions.php");
    include_once("products.php");

    //echo date("Y-m-d");
    $action = ( array_key_exists( 'action',$_REQUEST) ? $_REQUEST['action'] : "");

    ?>
    <hr>

    <h4><b>Subtotal: $</b><?php echo $_SESSION["subtotal"]; ?></h4>
    <h4>Shipping: $<?php $shippingVar = 4.99;
    echo $shippingVar; ?></h4>
    <h4>Tax: $<?php $taxVar = ($_SESSION["subtotal"] * .07);
    echo $taxVar ?></h4>
    <hr>
    <h5>Total: $<?php
        $_SESSION["total"] = $_SESSION["subtotal"] + $shippingVar + $taxVar;
        $_SESSION["total"] = round($_SESSION["total"],2);
        echo $_SESSION["total"]; ?></h5>
    <?php

    ?>
    <hr>
    <br><br>
    <a href="?action=order" id="orderBtn">Order</a>
    <?php
    include_once("footer.php");

    switch($action)
    {
        case "order":
            orderSubmitFunc($db,$shippingVar,$taxVar);
            break;
    }
?>






































