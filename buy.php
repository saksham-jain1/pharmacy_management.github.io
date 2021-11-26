<?php
session_start();
$con=mysqli_connect('localhost','root','root');
mysqli_select_db($con,'pharmacy_management');
$q="select * from medicine where id = '$_GET[med_id]';";
$q1="select * from stocks where id = '$_GET[med_id]' order by exp_date;";
$q2="select sum(no_of_medicine) as 'quantity' from stocks where id = '$_GET[med_id]';";
$medicine_detail_list=mysqli_query($con,$q);
$medicine_price=mysqli_query($con,$q1);
$medicine_quantity=mysqli_query($con,$q2);
$medicine=mysqli_fetch_array($medicine_detail_list);
$medicine1=mysqli_fetch_array($medicine_price);
$medicine2=mysqli_fetch_array($medicine_quantity);
$price=$medicine1['price'];
$quantity=$medicine2['quantity'];
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
          document.getElementById('basic-url').placeholder="Total :  "+<?php echo $price; ?>*document.getElementById('quantity').value;

        }
      }
      function increment()
      {
        var quantity=<?php echo $quantity; ?>;
        if(document.getElementById('quantity').value<10 && document.getElementById('quantity').value<quantity)
        {
          document.getElementById('quantity').value++;
          document.getElementById('basic-url').placeholder="Total :  "+<?php echo $price; ?>*document.getElementById('quantity').value;
        }
      }
      function placeorder()
      {
        var quantity=document.getElementById('quantity').value;
        window.location ="http://localhost/se%20project/pharmacy_management.github.io/placeorder.php?med_id=<?php echo$medicine['id']; ?>&quantity="+quantity;
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
                  <a class="nav-link" href="order.php"><i class="fas fa-shopping-bag">&nbsp;My Orders</i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="medicine.php"><All class="fas fa-prescription-bottle-alt">&nbsp;All Medicine</i></a>
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
                        <li><a class="dropdown-item" href="users.php"><i class="fas fa-users">&nbsp;Users</i></a></li><hr>
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
        <div class="p-2 bg-info sticky-top my-5">
            <h2><?php echo $medicine['name']; ?>.jpg</h2>
        </div>
        <table class="col-8 shadow-lg" style="border-radius:5px">
          <tr>
            <td>
              <img src="<?php echo $medicine['id']%10; ?>.jpg" height="400px" width="100%" alt="" srcset="">
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
        <h4>Salts</h4>
        <P><?php echo $medicine['discription']; ?></P>
        <h4>Used For</h4>
        <P><?php echo $medicine['role']; ?></P>
        <h4>Price per piece</h4>
        <P><?php echo $price; ?></P>
        <h4>Instructions</h4>
        <P><?php echo $medicine['how_to_use']; ?></P>
        <h4>Side Effects</h4>
        <P><?php echo $medicine['side_effects']; ?></P>
     <div class="input-group">
        <input type="text" class="form-control bg-warning" placeholder="Total :  0" id="basic-url" aria-describedby="basic-addon3" disabled>
        <span class="input-group-text col-5 justify-content-center btn btn-success  " onclick="placeorder()">Place Order</span>
      </div>
            </td>
          </tr>
        </table>
    </center>

</body>
</html>