<?php
    session_start();

    include_once('header.php');
    require_once("db.php");
    require_once("functions.php");
    include_once("sitelistings.php");

    $action = ( array_key_exists( 'action',$_REQUEST) ? $_REQUEST['action'] : "");

    $siteSelectList = filter_input(INPUT_GET,'siteSelectList', FILTER_SANITIZE_STRING) ?? "";


switch($action)
    {
        case "SiteSelect":
            siteSelectFunc($db,$siteSelectList);
            break;
    }

    include_once("footer.php");
?>

<!DOCTYPE HTML>
<HTML>
<head>
    <!---loads up css page-->
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

</body>
</HTML>
