<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="fontawesome-free-5.15.3-web\css\all.css" rel="stylesheet">
  </head>
<body  onload="setTimeout(fade,3000)" class="bg-light"> 
  <script src="bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script>
    function fade()
    {
      document.getElementById("fade").style.visibility="hidden";
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
                  <a class="nav-link active" href="home.php"><i class="fas fa-home">&nbsp;Home</i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php"><i class="fas fa-info-circle">&nbsp;About Us</i></a>
                </li>
                <?php
                if(isset($_SESSION["id"]))
                  {
                ?>
                <li class="nav-item">
                  <a class="nav-link" href="order.php"><i class="fas fa-shopping-bag">&nbsp;My Orders</i></a>
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
                        <li><a class="dropdown-item" href="seller.php"><i class="fas fa-users-cog">&nbsp;Sellers</i></a></li>
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
    <div class="alert-success px-4 py-2" id="fade" style="position: relative; top: 70px;width: fit-content;z-index:1;visibility:<?php
      if(isset($_SESSION["try"]) && $_SESSION['try']==1)
      {
        echo "block";
      }
      else
      {
        echo "hidden";
      }
        ?>">
        <h6><i class="fa fa-check"></i> Successful login</h6>
    </div>
    <div id="carouselExampleIndicators" class="carousel slide m-3" data-bs-ride="carousel" style="height: 350px;">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active bg-dark" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="bg-dark" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="bg-dark" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="PHARMA-1.jpg" height="350px" width="auto" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="PHARMA-2.jpg" height="350px" width="auto" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="PHARMA-3.jpg" height="350px" width="auto" class="d-block w-100">
        </div>
      </div>
      <button class="carousel-control-prev" style="background-color: rgba(158, 151, 151, 0.267);" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <i class="fas fa-3x fa-angle-left" style="color: black;"></i>
      </button>
      <button class="carousel-control-next" style="background-color: rgba(158, 151, 151, 0.267);" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <i class="fas fa-3x fa-angle-right" style="color: black;"></i>
      </button>
    </div>
    <h3>Medicines</h3>
<table style="width:100%;display:block;overflow-x:auto">
  <tr>
    <td>
    <div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Medicine 1</h5>
    <p class="card-text">Some quick example text to build on the Medicine and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Buy</a>
  </div>
</div>
    </td>
    <td>
    <div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Medicine 2</h5>
    <p class="card-text">Some quick example text to build on the Medicine and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Buy</a>
  </div>
</div>
    </td>
    <td>
    <div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Medicine 3</h5>
    <p class="card-text">Some quick example text to build on the Medicine and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Buy</a>
  </div>
</div>
    </td>
    <td>
    <div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Medicine 4</h5>
    <p class="card-text">Some quick example text to build on the Medicine and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Buy</a>
  </div>
</div>
    </td>
    <td>
    <div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Medicine 5</h5>
    <p class="card-text">Some quick example text to build on the Medicine and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Buy</a>
  </div>
</div>
    </td>
    <td>
    <div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Medicine 6</h5>
    <p class="card-text">Some quick example text to build on the Medicine and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Buy</a>
  </div>
</div>
    </td>
    <td>
    <div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Medicine 7</h5>
    <p class="card-text">Some quick example text to build on the Medicine and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Buy</a>
  </div>
</div>
    </td>
    <td>
    <div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Medicine 8</h5>
    <p class="card-text">Some quick example text to build on the Medicine and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Buy</a>
  </div>
</div>
    </td>
    <td>
    <div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Medicine 9</h5>
    <p class="card-text">Some quick example text to build on the Medicine and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Buy</a>
  </div>
</div>
    </td>
    <td>
    <div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Medicine 10</h5>
    <p class="card-text">Some quick example text to build on the Medicine and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Buy</a>
  </div>
</div>
    </td>
  </tr>
</table>
<div class="row mt-5">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Book Appointment For Online Consltancy</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">BOOK</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Book Appointment For Offline Consltancy</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">BOOK</a>
      </div>
    </div>
  </div>
</div>
<div class="row mt-5">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Get 25% OFF on Selected Medicine</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Buy</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Get 10% OFF on all Medicines</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Buy</a>
      </div>
    </div>
  </div>
</div>
    <br>
    More Content Uploading Soon..
    <div class="spinner-border" role="status"  style="color: blueviolet; margin-top: 10px;"></div>
    </center>
</body>
</html>