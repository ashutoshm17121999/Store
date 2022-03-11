<?php
session_start();
require_once("classes/DB.php");
require_once("classes/User.php");

$st = $_POST['Status'];
$em = $_POST['Email'];
//$pend = $_POST['pending'];
print_r($_POST);
//print_r($_POST);
if (isset($_POST['approved'])) {
    $ap = $_POST['approved'];
    if ($st == 'Approved') {
        $stmt = DB::getInstance()->prepare("UPDATE Users SET Status='Restricted' WHERE Email='$em';");
        $stmt->execute();
        // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        // $result = $stmt->fetchAll();
    } elseif ($st != 'Approved') {
        $stmt = DB::getInstance()->prepare("UPDATE Users SET Status='Approved' WHERE Email='$em'");
        $stmt->execute();
    }
    header("location: dashboard.php");
} elseif (isset($_POST['delete'])) {
    // $pend = $_POST['delete'];
    // if (($st == 'Restricted')) {
    $stmt = DB::getInstance()->prepare("DELETE FROM Users WHERE Email='$em';");
    $stmt->execute();
}
header("Location: dashboard.php");
