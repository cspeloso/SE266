<?php
    $sql = "SELECT * FROM categories";
    $sql = $db->prepare($sql);
    $sql->execute();
    $results = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<form action="index.php" method="get">

    <select name="categorySelectList">

        <option selected="selected">choose an option</option>

        <?php

            foreach($results as $result){
                ?>

                    <option value="<?php print_r($result['category_id']); ?>"><?php print_r($result['category']); ?></option>

                <?php
            }

        ?>

    </select>
    <input type="submit" name="action" value="categorySelect" />
</form>