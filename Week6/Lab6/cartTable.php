<?php
    if(!isset($_SESSION["subtotal"]))
    {
        $_SESSION["subtotal"] = 0;
    }
?>

<table id="cartTable">
    <tr>
        <th id="cartTableHEAD">Product ID</th>
        <th id="cartTableHEAD">Product Name</th>
        <th id="cartTableHEAD">Price</th>
        <th id="cartTableHEAD">Image</th>
        <th id="cartTableHEAD">Quantity</th>
        <th id="cartTableHEAD">Subtotal</th>
    </tr>


    <?php

    foreach ($_SESSION["cart"] as $items) {
        ?>
        <tr>
            <?php  ?>
            <td id="cartTableHEAD"><?php echo $items["product_id"] ?></td>
            <td id="cartTableHEAD"><?php echo $items["product"] ?></td>
            <td id="cartTableHEAD"><?php echo "$" . $items["price"] ?></td>
            <td id="cartTableHEAD"><img src="images/<?php echo $items["image"] ?>" height="50" width="50"></td>
            <td id="cartTableHEAD"><?php echo $items["quantity"] + 1; ?></td>
            <td id="cartTableHEAD"></td>
        </tr>


        <?php
    }
    ?>


    <tr>
        <td id="cartTableHEAD"></td>
        <td id="cartTableHEAD"></td>
        <td id="cartTableHEAD"></td>
        <td id="cartTableHEAD"></td>
        <td id="cartTableHEAD"></td>
        <td id="cartTableHEAD"><b>$<?php
                foreach ($_SESSION["cart"] as $items) {
                    $priceVar = $items["price"];
                    $quantityVar = $items["quantity"] + 1;

                    $_SESSION["subtotal"] += ($priceVar * $quantityVar);
                }
                echo $_SESSION["subtotal"];
                ?></b></td>

    </tr>


</table>