<?php
session_start();
include_once("classes/DB.php");
//$id = $_GET['id'];
if (isset($_POST['Update'])) {
    $id = $_POST['Id'];
    $name = $_POST['Name'];
    $price = $_POST['Price'];
    $quantity = $_POST['Quantity'];
    $category = $_POST['Category'];
    print_r(($_POST));
    $stmt = DB::getInstance()->prepare("UPDATE Products SET product_id='$id', product_name='$name', product_price='$price', product_quantity='$quantity', Category='$category' WHERE product_id='$id'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
}
