<?php
session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="fontawesome-free-5.15.3-web\css\all.css" rel="stylesheet">
    <style>
      .blur
      {
        background-color: rgba(161, 193, 207, 0.397);
        border: 2px solid rgba(107, 201, 255, 0.747);
        border-radius: 30px;
        width: 45%;
        min-width: 400px;
        height: fit-content;
        top: 130px;
        padding: 60px;
        margin-top: 0px;
        position: relative;
        animation: drop 3500ms 1;
        animation-direction:normal;
      }
      @keyframes drop {
        0% {
          margin-top: -50%;
        }
        65% {
          margin-top: 50px;
        }
        100% {
          margin-top: 0px;
        }
      }
    </style>
  </head>
<body class="bg-light">
  <script>
    function  toggle()
    {
      const togglePassword=document.getElementById('togglePassword');
      const password=document.getElementById('inputPassword3');
      const type=password.getAttribute('type')==='password'?'text':'password';
      password.setAttribute('type', type);
      togglePassword.classList.toggle('fa-eye-slash')
    }
  </script>  
  <script src="bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand">Pharmacy Management System</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header bg-info">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body bg-dark">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link"href="home.php"><i class="fas fa-home"></i>&nbsp;Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="login.php"><i class="fas fa-sign-in-alt"></i>&nbsp;Login</a>
            </li>
            <li>
              <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search Medicine</button>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
    <center>
      <?php if (isset($_SESSION['try']) && $_SESSION['try'] == 2) { ?>
      <div class="alert-danger px-4 py-2" style="position: relative; top: 70px;width: fit-content;">
        <h6><i class="fa fa-times"></i> invalid user id or password</h6>
      </div>
      <?php } ?>
      <div class="blur">
        <form method="POST" action="validation.php" class="bg-transparent pb-0">
        <h3>Sign In</h3>
        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-12 col-form-label">Account Id / Email</label>
          <div class="col-sm-8 input-group">
            <input type="text" class="form-control" id="inputEmail3" name="id" required>
          </div>
        </div>
        <div class="row mb-3">
          <label for="inputPassword3" class="col-sm-12 col-form-label">Password</label>
          <div class="col-sm-8 input-group">
            <input type="password" class="form-control" id="inputPassword3" name="password" required>
            <span class="input-group-text">
            <i class="far fa-eye" id="togglePassword" onclick="toggle()" style="cursor: pointer;"></i>
            </span>
          </div>
        </div>
        <button type="reset" class="btn btn-warning">Reset</button>&emsp;&emsp;
        <button type="submit" class="btn btn-primary">Sign in</button>
        <br>
        <br>
        <a href="forgot.php" style="float:Left;"><i class="fas">Forgot Password</i></a>
        <a href="addnew.php" style="float:right;"><i class="fas fa-user-plus"> &nbsp;Create Account</i></a>
      </form>
      </center>
</body>
</html>