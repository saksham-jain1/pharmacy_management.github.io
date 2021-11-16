<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sellers</title>
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
        function hello()
        {
            alert("hello");
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
            <h2>Sellers</h2>
        </div>
        <div class="col-10 shodow-lg mt-3">
<table class="table table-striped shadow-lg" style="border-radius:15px">
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>License No.</th>
        <th>Gst No.</th>
        <th>E-mail</th>
        <th></th>
        <th>Phone No</th>
        <th>Age</th>
        <th></th>
    </tr>
    </thead> 
    <?php
    for($i=0;$i<10;$i++)
        {
            ?>
            <tr>
            <td>Id</td>
            <td>Name</td>
            <td>License No.</td>
            <td>Gst No.</td>
            <td colspan="2">E-mail</td>
            <td>Phone No.</td>
            <td>Age</td>
            <td class="p-0"><button class="btn btn-success m-0 py-2" onclick="hello()" style="width:50%">Update Details</button><button class="btn btn-danger m-0 py-2" onclick="hello()" style="width:50%">Remove Seller</button></td>
            </tr>
<?php
        }
        ?>
</table>

</div>
</center>
</body>
</html>