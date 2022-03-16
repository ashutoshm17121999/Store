<?php
session_start();
include_once("classes/DB.php");
include_once("classes/cart.php");
$id = $_GET["id"];
//print_r("$id");
$stmt = DB::getInstance()->prepare("SELECT * FROM Products WHERE product_id= '$id'");
//echo $stmt;
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
foreach ($stmt->fetchAll() as $k => $v) {
    $id = $v['product_id'];
    $name = $v['product_name'];
    $price = $v['product_price'];
    $quantity = $v['quantity'];
    $image = $v['Image'];
    $category = $v['Category'];
    //print_r($v);
    $pro = new cart($id, $name, $price, $quantity, $image, $category);
    $pro->addPro($pro);
    header("location:cart.php");
}
