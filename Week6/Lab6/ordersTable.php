<?php

    $sql = "SELECT * FROM orders";
    $sql = $db->prepare($sql);
    $sql->execute();
    $resultsOrders = $sql->fetchAll(PDO::FETCH_ASSOC);

    $sql = "SELECT * FROM orderItems";
    $sql = $db->prepare($sql);
    $sql->execute();
    $resultsOrderItems = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<table id="ordersTable">

    <th id="ordersTableHEAD">Order ID</th>
    <th id="ordersTableHEAD">User ID</th>
    <th id="ordersTableHEAD">Date</th>
    <th id="ordersTableHEAD">Shipping</th>
    <th id="ordersTableHEAD">Tax</th>
    <th id="ordersTableHEAD">Total</th>

    <?php

        foreach($resultsOrders as $items){
            ?>

                <tr>

                    <td id="ordersTableCOL"><?php echo $items["Order_ID"]; ?></td>
                    <td id="ordersTableCOL"><?php echo $items["User_ID"]; ?></td>
                    <td id="ordersTableCOL"><?php echo $items["Date"]; ?></td>
                    <td id="ordersTableCOL"><?php echo $items["Shipping"]; ?></td>
                    <td id="ordersTableCOL"><?php echo $items["Tax"]; ?></td>
                    <td id="ordersTableCOL"><?php echo $items["Total"]; ?></td>

                </tr>

            <?php
        }

    ?>


</table>
<br>
<hr>
<br>

<table id="orderItemsTable">
    <tr>
        <th id="orderItemsTableHEAD">Order ID</th>
        <th id="orderItemsTableHEAD">Order Item ID</th>
        <th id="orderItemsTableHEAD">Product ID</th>
        <th id="orderItemsTableHEAD">Quantity</th>
        <th id="orderItemsTableHEAD">Price</th>
    </tr>

    <?php

        foreach($resultsOrderItems as $items){
            ?>

                <tr>

                    <td id="orderItemsTableCOL"><?php echo $items["order_id"]; ?></td>
                    <td id="orderItemsTableCOL"><?php echo $items["orderItemID"]; ?></td>
                    <td id="orderItemsTableCOL"><?php echo $items["product_id"]; ?></td>
                    <td id="orderItemsTableCOL"><?php echo $items["quantity"]; ?></td>
                    <td id="orderItemsTableCOL"><?php echo $items["price"]; ?></td>

                </tr>

            <?php
        }

    ?>

</table>