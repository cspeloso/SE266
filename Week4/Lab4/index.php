<?php
    //initliazes these pages
    require_once("database.php");
    require_once("corps.php");

    //checks to see if a session has already been started
    if(!isset($_SESSION))
    {
        //if not, starts one
        session_start();
    }



    //initializing variables
    $action = ( array_key_exists( 'action', $_REQUEST) ? $_REQUEST['action'] : "");

    //initliazes session variable 'idS'
    if(isset($_SESSION['idS']))
    {
        $_SESSION['idS'];
    }
    else
    {
        $_SESSION['idS'] = 0;
    }

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING) ?? "";
    $corp = filter_input(INPUT_POST, 'corp', FILTER_SANITIZE_STRING) ?? "";
    $incorp_dt = filter_input(INPUT_POST, 'incorp_dt', FILTER_SANITIZE_STRING) ?? "";
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) ?? "";
    $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING) ?? "";
    $owner = filter_input(INPUT_POST, 'owner', FILTER_SANITIZE_STRING) ?? "";
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING) ?? "";

    $sort = filter_input(INPUT_GET, 'sort', FILTER_SANITIZE_STRING) ?? "";
    $dir = filter_input(INPUT_GET, 'dir', FILTER_SANITIZE_STRING) ?? "";
    $search = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING) ?? "";
    $term = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING) ?? "";


    //switch...
    switch($action)
    {
        //sets cases for read, update, replace, and delete.
        case "Read":
            corpRead($db,$id);
            break;

        case "Update":
            corpUpdate($db,$id);
            break;

        //replace case is used for the update case. when the button
        //is clicked, the user is immediately sent to the replace case
        //along with the session ID variable.
        case "Replace":
            corpReplace($db,$_SESSION['idS'],$corp,$incorp_dt,$email,$zipcode,$owner,$phone);
            break;

        case "Delete":
            corpDelete($db,$id);
            break;

        case "Add2":
            corpAdd2($db);
            break;

        case "Add":
            corpAdd($db,$corp,$email,$zipcode,$owner,$phone);
            break;

        case "Sort":
            $corp = corpSort($db,$sort,$dir);
            include_once("corpsTable.php");
            break;

        case "Search":
            $corp = corpSearch($db,$search,$term);
            include_once("corpsTable.php");
            break;

        //defaults to this if no case is specified for the switch
        default:
            //sets variable $corps = to the results from getRows() function.
            //then sends $corps variable to the corpsTable.php form
            $corp = getRows($db);
            include_once("corpsTable.php");
    }
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

