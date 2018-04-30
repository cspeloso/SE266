<!---form for entering sites-->
<form action="index.php" method="get">
    <!--textbox for user to enter a site. uses a regex pattern for validation.-->
    <input type="text" name="searchVar" id="searchVar" placeholder="link" pattern="https?://www.[A-z,0-9]{2,}.[A-z]{2,}" title="https://www.website.com" value="<?php
    //keeps the session variable searchVar in the box
    //if it exists already
    if($_SESSION['searchVar'] != null)
    {
        echo $_SESSION['searchVar'];
    }
    //otherwise, it puts an empty string in the box instead.
    else{
        echo "";
    } ?>">

    <!--submit button-->
    <input type="submit" name="action" value="SiteSearch">
</form>