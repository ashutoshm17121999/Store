<?php
require_once("classes/User.php");
require_once("classes/Product.php");
//require_once("function.php");
session_start();
if (isset($_POST['sign-up'])) {
    header("Location: login.php");
}
if (isset($_POST['sign-up'])) {
    print_r($_POST);
    $user = new User($_POST['Firstname'], $_POST['Lastname'], $_POST['Username'], $_POST['email'], $_POST['password'], "User", "Restricted");
    $user->addUser();
}
if (isset($_POST['login'])) {
    $user = new User("", "", "", $_POST['email'], $_POST['password'], "", "");
    $user->userExists();

    $_SESSION['firstname'] = $user->firstname;
    $_SESSION['lastname'] = $user->lastname;
    $_SESSION['username'] = $user->username;
    $_SESSION['email'] = $user->email;
    $_SESSION['password'] = $user->password;

    header("Location: userProfile.php");
}
if (isset($_POST['Update'])) {
    $user = new User($_POST['First-name'], $_POST['Last-name'], $_POST['User-name'], $_POST['Email'], $_POST['Password'], "", "");
    $user->userUpdate();

    $_SESSION['firstname'] = $user->firstname;
    $_SESSION['lastname'] = $user->lastname;
    $_SESSION['username'] = $user->username;
    $_SESSION['email'] = $user->email;
    $_SESSION['password'] = $user->password;

    header("Location: userProfile.php");
}
