<?php
    $sql = "SELECT * FROM sites";
    $sql = $db->prepare($sql);
    $sql->execute();
    $results = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<form action="sitelist.php" method="get">
    <?php
    /*foreach($results as $result)
    {
        print_r($result['site']);
        echo "<br>";
    }*/
    ?>
    <select name="siteSelectList">
        <option selected="selected">Choose an option</option>
        <?php
            foreach($results as $result) {
                ?>
                <option value="<?php print_r($result['site_id']); ?>"><?php print_r($result['site']); ?></option>
                <?php
            }
            ?>
    </select>
    <input type="submit" name="action" value="SiteSelect" />
</form>