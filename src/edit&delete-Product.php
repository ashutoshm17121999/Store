<?php
session_start();
include_once("classes/DB.php");
//include_once("classes/Product.php");


if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $stmt = DB::getInstance()->prepare("DELETE FROM Products WHERE product_id=$id");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //$result = $stmt->fetchAll();
    header("Location:products.php");
}
