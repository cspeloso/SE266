<?php
        if(isset($id)) {
            $sql = "SELECT * FROM products WHERE product_id = $id";
            $sql = $db->prepare($sql);
            $sql->bindParam(':id', $id, PDO::PARAM_INT);
            $sql->execute();
            $results = $sql->fetch(PDO::FETCH_ASSOC);

            if (isset($_SESSION["cart"][$results["product_id"]])) {
                $_SESSION["cart"][$results["product_id"]]["quantity"]++;
            }

            if (!isset($_SESSION["cart"][$results["product_id"]])) {
                $_SESSION["cart"][$results["product_id"]]["product_id"] = $results["product_id"];
                $_SESSION["cart"][$results["product_id"]]["product"] = $results["product"];
                $_SESSION["cart"][$results["product_id"]]["price"] = $results["price"];
                $_SESSION["cart"][$results["product_id"]]["image"] = $results["image"];
                $_SESSION["cart"][$results["product_id"]]["quantity"] = 0;
            }

            $_SESSION["subtotal"] = 0;
        }

        include_once("cartTable.php");

        ?>

        <br><br>
        <a href="?action=clearCart">Clear Cart</a>
        <br><br>
        <?php

        $id = null;
   // }

