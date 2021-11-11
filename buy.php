<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy</title>
    <link href="bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="fontawesome-free-5.15.3-web\css\all.css" rel="stylesheet">
    <style>
      input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
                 -webkit-appearance: none;
                  margin:0;
}
    </style>
</head>
<body>
    <script src="bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script>
      function decrement()
      {
        if(document.getElementById('quantity').value>0)
        {
          document.getElementById('quantity').value-=1;
        }
      }
      function increment()
      {
        if(document.getElementById('quantity').value<10)
        {
          document.getElementById('quantity').value++;
        }
      }
    </script>
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
        <div class="p-2 bg-info sticky-top my-5">
            <h2>Medicine Name</h2>
        </div>
        <table class="col-8 shadow-lg" style="border-radius:5px">
          <tr>
            <td>
              <img src="pharma.jpg" height="400px" width="100%" alt="" srcset="">
            </td>
          </tr>
          <tr>
            <td>
            <div class="col-3" style="float:right">
        <div class="input-group p-2">
          <h5>Quantity: &nbsp;&nbsp;&nbsp;</h5>
          <span class="input-group-text fas fa-minus" onclick="decrement()"></span>
            <input type="number" class="form-control" min="0" max="10" value="0" id="quantity" disabled>
          <span class="input-group-text fas fa-plus" onclick="increment()"></span>
        </div>
        </div>
        <br>
        <br>
        <h4>Discription</h4>
        <div id="description">
hello
        </div>
        <h4>Used For</h4>
        <div id="role">
hello
        </div>
        <h4>Price per piece</h4>
        <div id="price">
          hrllo
        </div>
        <h4>Instructions</h4>
        <div id="instructions">
          hello
        </div>
     <div class="input-group">
        <input type="text" class="form-control bg-warning" placeholder="Total :  ₹500/-" id="basic-url" aria-describedby="basic-addon3" disabled>
        <span class="input-group-text col-5 justify-content-center btn btn-warning" id="">Place Order</span>
      </div>
            </td>
          </tr>
        </table>
    </center>

</body>
</html>