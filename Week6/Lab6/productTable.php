<form action="index.php" method="get">

    <table id="productsTable">

        <tr>
            <th id="productsTableHEAD">Product ID</th>
            <th id="productsTableHEAD">Product Name</th>
            <th id="productsTableHEAD">Price</th>
            <th id="productsTableHEAD">Image</th>
            <th id="productsTableHEAD">Click to add to cart</th>
        </tr>

        <?php

            foreach($products as $prod)
            {
                ?>
                <tr>

                    <td id="productsTableCOL">

                        <?php

                            echo $prod["product_id"];

                        ?>

                    </td>

                    <td id="productsTableCOL">

                        <?php

                            echo $prod["product"];

                        ?>

                    </td>

                    <td id="productsTableCOL">

                        <?php

                            echo $prod["price"];

                        ?>

                    </td>

                    <td id="productsTableCOL">

                        <?php

                            if(isset($prod['image'])){
                                ?>

                                    <img src="images/<?php echo $prod['image']; ?>" height="50" width="50">

                                <?php
                            }

                        ?>

                    </td>

                    <td id="productsTableCOL"><a href="?action=AddCart&id=<?php echo $prod["product_id"] ?>">Add to cart</a></td>

                </tr>


                <?php
            }


        ?>

    </table>

</form>