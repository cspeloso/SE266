<form action="index.php" method="get">
    <?php
    foreach($corp as $corporation)
    {
        echo $corporation["corp"];?>

        <a href="?action=Read&id=<?php echo $corporation['id'] ?>">Read</a>
        <a href="?action=Update&id=<?php echo $corporation['id'] ?>">Update</a>
        <a href="?action=Delete&id=<?php echo $corporation['id'] ?>">Delete</a>
        <?php echo "<br><br>";
    }
    ?>
</form>