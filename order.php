<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <link href="bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="fontawesome-free-5.15.3-web\css\all.css" rel="stylesheet">
</head>
<body>
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
                  <a class="nav-link" href="home.php"><i class="fas fa-home">&nbsp;Home</i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php"><i class="fas fa-info-circle">&nbsp;About Us</i></a>
                </li>
                <?php
                if(isset($_SESSION["id"]))
                  {
                ?>
                <li class="nav-item">
                  <a class="nav-link active" href="order.php"><i class="fas fa-shopping-bag">&nbsp;My Orders</i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="medicine.php"><All class="fas fa-prescription-bottle-alt">&nbsp;All Medicine</i></a>
                </li>
                <?php
                if($_SESSION['role']=='seller')
                {
                ?>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-user-cog">&nbsp;Seller's Panel</i></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown06">
                      <li><a class="dropdown-item" href="stocks.php"><i class="fas fa-cubes">&nbsp;Stocks</i></a></li>
                    </ul>
                  </li>
                  <?php
                }
                if($_SESSION['role']=='admin')
                {
                  ?>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-user-cog">&nbsp;Admin's Panel</i></a>
                      <ul class="dropdown-menu" aria-labelledby="dropdown06">
                        <li><a class="dropdown-item" href="stocks.php"><i class="fas fa-cubes">&nbsp;Stocks</i></a></li><hr>
                        <li><a class="dropdown-item" href="allOrders.php"><i class="fas fa-clipboard-list">&nbsp;All orders</i></a></li><hr>
                        <li><a class="dropdown-item" href="users.php"><i class="fas fa-users">&nbsp;Users</i></a></li>
                      </ul>
                    </li>
                  <?php
                }
                ?>
                <li class="nav-item">
                  <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt">&nbsp;Logout</i></a>
                </li>
                <?php
              }
                  else
                  {
                ?>
                <li>
                  <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i>&nbsp;Login</a>
                </li>
                <?php
                  }
                ?>
                <hr class="bg-light">
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
            <h2>Your Ordes</h2>
        </div>
        <?php
        for($i=0;$i<10;$i++)
        {
            ?>
        <table class="col-8 shadow-lg mt-2" style="border-radius:10px;">
            <tr>
                <td>
                    <img src="pharma.jpg" height="150px" width="150px" alt="" srcset="">
                </td>
                <td class="col-6">
                    
                </td>
            </tr>
        </table>
<?php
        }
        ?>
    </center>
</body>
</html>

