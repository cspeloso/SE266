<?php
    //twin page to index.php

    //starts a session
    session_start();

    //includes different php pages
    include_once('header.php');
    require_once("db.php");
    require_once("functions.php");
    include_once("sitelistings.php");

    //initializes variables
    $action = ( array_key_exists( 'action',$_REQUEST) ? $_REQUEST['action'] : "");

    $siteSelectList = filter_input(INPUT_GET,'siteSelectList', FILTER_SANITIZE_STRING) ?? "";

    //switch for action
    switch($action)
    {
        case "SiteSelect":
            siteSelectFunc($db,$siteSelectList);
            break;
    }

    //includes footer at bottom of page
    include_once("footer.php");
?>

<!---includes the css stylesheet-->
<!DOCTYPE HTML>
<HTML>
<head>
    <!---loads up css page-->
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

</body>
</HTML>
