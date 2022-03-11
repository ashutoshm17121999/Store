<?php
//print_r($_POST);
require_once("classes/DB.php");
require_once("classes/Product.php");
session_start();

if (isset($_POST['addPro'])) {
    $id = $_POST['Id'];
    $name = $_POST['Name'];
    $price = $_POST['Price'];
    $quantity = $_POST['Quantity'];
    $image = $_POST['Image'];
    $category = $_POST['Category'];
    if ($id == "" || $name == "" || $price == "" || $quantity == "" || $image == "" || $category == "") {
        $_SESSION['add_Alert'] = "***Please fill all the required details";
    } else if (isset($_POST['addPro'])) {
        $product = new Product($_POST['Id'], $_POST['Name'], $_POST['Price'], $_POST['Quantity'], $_POST['Image'], $_POST['Category']);
        $product->addProduct();
    }
}
