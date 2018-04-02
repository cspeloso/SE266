<?php
    //people table view
    foreach($people as $person)
    {
        echo $person["firstName"] . " " . $person["lastName"] . " " . $person["age"];
        echo "<br>";
    }
?>
<form action="php.php" method="get">
    <input type="submit" name="action" value="Add"/>
</form>
