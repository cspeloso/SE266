<?php
    require_once("database.php");
    require_once("corps.php");
    $action = $_REQUEST['action'];

    //$id = $_GET['id'];
    $_SESSION['id'];

    $corp = $_POST['corp'];
    $incorp_dt = $_POST['incorp_dt'];
    $email = $_POST['email'];
    $zipcode = $_POST['zipcode'];
    $owner = $_POST['owner'];
    $phone = $_POST['phone'];

    switch($action)
    {
        case "Read":
            corpRead($db,$_SESSION['id']);
            break;

        case "Update":
            corpUpdate($db,$_SESSION['id']);
            break;

        case "Replace":
            echo "Replace";
            corpReplace($db,$_SESSION['id'],$corp,$incorp_dt,$email,$zipcode,$owner,$phone);
            break;

        case "Delete":
            corpDelete($db,$_SESSION['id']);
            break;

        default:
            $corp = getRows($db);
            include_once("corpsTable.php");
    }
?>