<?php
include_once("./classes/DB.php");
include_once("./classes/User.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Signin Template · Bootstrap v5.1</title>    

    <!-- Bootstrap core CSS -->
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="./assets/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form method="POST" action="function.php">
    <h1 class="h3 mb-3 fw-normal">Sign Up</h1>

    <div class="form-floating">
    <input type="text" class="form-control" name="Firstname" id="floatingInput" placeholder="Firstname">
      <label for="floatingInput">Firstname</label>
      <div class="form-floating">
    <input type="text" class="form-control" name="Lastname" id="floatingInput" placeholder="Lastname">
      <label for="floatingInput">Lastname</label>
      <div class="form-floating">
    <input type="text" class="form-control" name="Username" id="floatingInput" placeholder="Username">
      <label for="floatingInput">Username</label>
      <div class="form-floating">
        <!-- <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput"></label>
        <div class="form-floating"> -->
    <input type="email" class="form-control" name ="email" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" name="sign-up" type="submit">Sign up</button>
    <!-- <a href="./singup.php" class="w-100 btn btn-lg btn-primary" type="submit">Sign up</a> -->
    <p class="mt-5 mb-3 text-muted">&copy; CEDCOSS Technologies</p>
  </form>
</main>


    
  </body>
</html>