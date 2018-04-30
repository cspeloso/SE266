<?php
    session_start();

    if(isset($_SESSION['searchVar']))
    {

    }
    else{
        $_SESSION['searchVar'] = "";
    }

    if(isset($searchVar)) {
        if ($searchVar != null) {
            $_SESSION['searchVar'] = $searchVar;
        }

        if ($searchVar == null) {
            $_SESSION['searchVar'] = null;
        }
    }

    include_once("header.php");
    require_once("db.php");
    require_once("functions.php");
    include_once("siteEntry.php");

    $action = ( array_key_exists( 'action',$_REQUEST) ? $_REQUEST['action'] : "");

    $searchVar = filter_input(INPUT_GET,'searchVar', FILTER_SANITIZE_STRING) ?? "";
    $searchTerm = filter_input(INPUT_GET,'searchTerm', FILTER_SANITIZE_STRING) ?? "";




    switch($action)
    {
        case "SiteSearch":
            $_SESSION['searchVar'] = $searchVar;
            siteSearchFunc($db,$searchVar);
            break;
    }

?>







































