<?php
    //controller
    require_once("database.php");
    require_once("corps.php");
    /*$action = $_REQUEST['action'];

    $corpID = $_POST["id"];
    $corp = $_POST["corp"];
    $incorp_dt = $_POST["incorp_dt"];
    $email = $_POST["email"];
    $zipcode = $_POST["zipcode"];
    $owner = $_POST["owner"];
    $phone = $_POST["phone"];*/
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? "";

    $corpID = filter_input(INPUT_POST,'corpID', FILTER_SANITIZE_STRING) ?? "";
    $corp = filter_input(INPUT_POST,'corp', FILTER_SANITIZE_STRING) ?? "";
    $incorp_dt = filter_input(INPUT_POST,'incorp_dt', FILTER_SANITIZE_STRING) ?? "";
    $email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_STRING) ?? "";
    $zipcode = filter_input(INPUT_POST,'zipcode', FILTER_SANITIZE_STRING) ?? "";
    $owner = filter_input(INPUT_POST,'owner', FILTER_SANITIZE_STRING) ?? "";
    $phone = filter_input(INPUT_POST,'phone', FILTER_SANITIZE_STRING) ?? "";


    $corporationObj=[
        'corpID'=>"",
        'corp'=>"",
        'incorp_dt'=>"",
        'email'=>"",
        'zipcode'=>"",
        'owner'=>"",
        'phone'=>""
        ];



    switch($action)
    {
        case "Read":
            corpRead($db,$corpID,$corp,$incorp_dt,$email,$zipcode,$owner,$phone);
            break;

        case "Update";
            $corpVAR = corpUpdate($db,$corpID,$corp,$incorp_dt,$email,$zipcode,$owner,$phone);
            break;

        case "Delete";
            include_once("corporationsDeleteForm.php");
            break;

        default:
            $corp = getRows();
            include_once("corpTable.php");
    }

?>