<?php
    //controller
    require_once("db.php");
    require_once("people.php");
    $action = $_REQUEST['action'];

    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $age = $_POST["age"];

    switch ($action)
    {
        case "Add":
            include_once("personForm.php");
            break;
        case "Save";
            personAdd($db,$firstName,$lastName,$age);
            //get all the rows
            $people = getRows();
            //display the rows
            include_once("peopleTable.php");
            break;
        default:
            //get all the rows
            $people = getRows();
            //display the rows
            include_once("peopleTable.php");
    }
?>