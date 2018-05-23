<link rel="stylesheet" type="text/css" href="stylesheet.css">

<?php
    session_start();

    include_once("header.php");
    include_once("functions.php");
    include_once("db.php");
    include_once("products.php");

    include_once("categoryPicker.php");


    ?>
    <hr><br>
    <?php

    if(!isset($_SESSION["cart"]))
    {
        $_SESSION["cart"] = array();
        $_SESSION["count"] = 1;

    }

    if(!isset($_FILES)){

    }

    if(!isset($_FILES['image'])){
        $_FILES['image'] = null;
    }

    $action = ( array_key_exists( 'action',$_REQUEST) ? $_REQUEST['action'] : "");

    $id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_STRING) ?? "";
    $product_id = filter_input(INPUT_GET,'product_id', FILTER_SANITIZE_STRING) ?? "";
    $product = filter_input(INPUT_GET,'product', FILTER_SANITIZE_STRING) ?? "";
    $price = filter_input(INPUT_GET,'price', FILTER_SANITIZE_STRING) ?? "";
    $image = filter_input(INPUT_GET,'image', FILTER_SANITIZE_STRING) ?? "";

    $emailVar = filter_input(INPUT_GET,'emailVar', FILTER_SANITIZE_EMAIL) ?? "";
    $passwordVar = filter_input(INPUT_GET,'passwordVar', FILTER_SANITIZE_STRING) ?? "";

    $categorySelectList = filter_input(INPUT_GET,'categorySelectList', FILTER_SANITIZE_STRING) ?? "";


    $categoryID = filter_input(INPUT_GET,'categoryID', FILTER_SANITIZE_STRING) ?? "";
    $productName = filter_input(INPUT_GET,'productName', FILTER_SANITIZE_STRING) ?? "";
    $Price = filter_input(INPUT_GET,'Price', FILTER_SANITIZE_STRING) ?? "";
    $errors = filter_input(INPUT_GET,'errors', FILTER_SANITIZE_STRING) ?? "";

    $passwordVarConfirm = filter_input(INPUT_GET,'passwordVarConfirm', FILTER_SANITIZE_STRING) ?? "";

    $password = filter_input(INPUT_GET,'password', FILTER_SANITIZE_STRING) ?? "";
    $email = filter_input(INPUT_GET,'$email', FILTER_SANITIZE_STRING) ?? "";


    //image thing
        if(isset($_FILES['image'])){
            $file_name = $_FILES["image"]["name"];
            $file_size = $_FILES["image"]["size"];
            $file_type = $_FILES["image"]["type"];
            $file_tmp = $_FILES["image"]["tmp_name"];
            $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

            if($errors == false){
                move_uploaded_file($file_tmp, "images/" . $file_name);
            }
        }






    switch($action)
    {
        case "registerUser":
            registerUserFunc($db,$emailVar,$passwordVar,$passwordVarConfirm);
            break;
        case "Login":
            loginUserFunc($db,$emailVar,$passwordVar);
            break;

        case "AddCart":
            include_once("addToCart.php");
            break;

        case "AddProduct":
            addProductFunc($db,$categoryID,$productName,$Price,$image);
            break;

        case "DeleteProduct":
            deleteProductFunc($db,$productID);
            break;

        case "Update":
            updateFunc2($db,$ProductName,$Price,$image);
            break;

        case "clearCart":
            clearCart();
            break;

        case "categorySelect":
            $products = pullTable($db,$categorySelectList);
            include_once("productTable.php");
            break;

        default:
            $categorySelectList = 3;
            $products = pullTable($db,$categorySelectList);
            include_once("productTable.php");
    }

    ?>
    <br><hr>
    <?php

    include_once("footer.php");
?>


