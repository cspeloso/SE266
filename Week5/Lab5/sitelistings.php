<?php
    $sql = "SELECT * FROM sites";
    $sql = $db->prepare($sql);
    $sql->execute();
    $results = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<form action="sitelist.php" method="get">
    <?php
    if(!isset($_GET['siteSelectList'])){
        $_GET['siteSelectList'] = 0;
    }
    ?>
    <select name="siteSelectList">
        <option selected="selected">Choose an option</option>
        <?php
            foreach($results as $result) {
                ?>
                <option id="listoption" <?php
                    if($_GET['siteSelectList'] == $result['site_id']){
                        echo 'selected="true"';
                    }
                ?> value="<?php print_r($result['site_id']); ?>"><?php print_r($result['site']); ?></option>
                <?php
            }
            ?>
    </select>
    <input type="submit" name="action" value="SiteSelect" />
</form>