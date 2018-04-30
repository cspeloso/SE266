<?php
    //the index page is the site entry page, while another page was
    //created for listing sites (sitelist.php).

    //creates a session
    session_start();

    //checks to see if the session variable searchVar is set, if it isn't
    //it assigns it a value of empty (to avoid throwing errors elsewhere)
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

    //includes and requires for different php files including header, functions,
    //db connection, and the site entry form.
    include_once("header.php");
    require_once("db.php");
    require_once("functions.php");
    include_once("siteEntry.php");

    //initializes different variables
    $action = ( array_key_exists( 'action',$_REQUEST) ? $_REQUEST['action'] : "");

    $searchVar = filter_input(INPUT_GET,'searchVar', FILTER_SANITIZE_STRING) ?? "";
    $searchTerm = filter_input(INPUT_GET,'searchTerm', FILTER_SANITIZE_STRING) ?? "";

    //creates a switch
    switch($action)
    {
        case "SiteSearch":
            $_SESSION['searchVar'] = $searchVar;
            siteSearchFunc($db,$searchVar);
            break;
    }

    //footer included
    include_once("footer.php");

?>
<!---placed here so i could include the css style sheet-->
<!DOCTYPE HTML>
<HTML>
<head>
    <!---loads up css page-->
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

</body>
</HTML>






































