<?php
    $sql = "SELECT * FROM products";
    $sql = $db->prepare($sql);
    $sql->execute();
    $results = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<form action="index.php" method="get">

</form>

