<?php
    //pulls all info from the sites table in the DB
    $sql = "SELECT * FROM sites";
    $sql = $db->prepare($sql);
    $sql->execute();
    $results = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<form action="sitelist.php" method="get">
    <?php
    //if siteSelectList isn't set, set it to 0.
    if(!isset($_GET['siteSelectList'])){
        $_GET['siteSelectList'] = 0;
    }
    ?>
    <!--creates a drop down list-->
    <select name="siteSelectList">
        <!---default option-->
        <option selected="selected">Choose an option</option>
        <?php
            foreach($results as $result) {
                ?>
                <!--lists every site in the sites table, sets the option as the
                default option if siteSelectList is equal to the option's site_id--->
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