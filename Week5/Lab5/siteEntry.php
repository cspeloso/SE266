<form action="index.php" method="get">
    <input
            type="text" name="searchVar" id="searchVar" placeholder="link" pattern="https?://www.[A-z,0-9]{2,}.[A-z]{2,}" title="https://www.website.com" value="<?php
    if($_SESSION['searchVar'] != null)
    {
        echo $_SESSION['searchVar'];
    }
    else{
        echo "";
    } ?>">
    <input type="text" name="searchTerm" id="searchTerm" value="">


    <input type="submit" name="action" value="SiteSearch">
</form>