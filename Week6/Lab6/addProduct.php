<?php
$sql = "SELECT * FROM categories";
$sql = $db->prepare($sql);
$sql->execute();
$results = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<form action="index.php" method="get" enctype="multipart/form-data">
    <?php
    //<input type="text" name="categoryID" placeholder="Enter category" value="" required>
    if(!isset($_GET['categoryID'])){
        $_GET['categoryID'] = 0;
    }
    ?>

    <select name="categoryID">
        <option>Choose a category</option>
        <?php
            foreach($results as $result){
                ?>
                <option id="listoption" <?php
                    if($_GET['categoryID'] == $result['category_id']){
                        echo 'selected="true"';
                    }
                ?> value="<?php print_r($result['category_id']); ?>"><?php print_r($result['category']) ?></option>
                <?php
            }
        ?>
    </select>

    <input type="text" name="productName" placeholder="Enter Product Name" value="" required>
    <input type="text" name="Price" placeholder="Enter a price" value="" required>
    <!--<input type="text" name="image" placeholder="enter an image" value="">-->
    <input type="file" name="image" />

    <input type="submit" name="action" value="AddProduct">
</form>