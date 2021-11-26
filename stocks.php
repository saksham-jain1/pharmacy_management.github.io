<?php
session_start();
$con=mysqli_connect('localhost','root','root');
mysqli_select_db($con,'pharmacy_management');
$q="select * from stocks;";
$medicine_list=mysqli_query($con,$q);
$n=mysqli_num_rows($medicine_list);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stocks</title>
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
        function make_editable(id)
        {
          var cls="id"+id;
          var cells = document.getElementsByClassName(cls);
          cells[0].contentEditable='true';
          cells[1].contentEditable='true';
          cells[2].contentEditable='true';
          cells[4].style.visibility="visible";
          cells[0].parentNode.style.backgroundColor = "yellow";
          cells[3].style.visibility="hidden";
          window.location ="http://localhost/se%20project/pharmacy_management.github.io/updatestocks.php?batch_id="+id+"&quantity="+quan+"&exp="+exp+"&price="+price;
        }
        function update_stocks(id)
        {
          var cls="id"+id;
          var cells = document.getElementsByClassName(cls);
          cells[0].contentEditable='false';
          cells[1].contentEditable='false';
          cells[2].contentEditable='false';
          cells[4].style.visibility="hidden";
          cells[0].parentNode.style.backgroundColor = "";
          cells[3].style.visibility="visible";
          var quan=cells[2].innerHTML;
          var exp=cells[1].innerHTML;
          var price=cells[0].innerHTML;
          window.location ="http://localhost/se%20project/pharmacy_management.github.io/updatestocks.php?batch_id="+id+"&quantity="+quan+"&exp="+exp+"&price="+price;
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
                  <a class="nav-link" href="medicine.php"><All class="fas fa-prescription-bottle-alt">&nbsp;All Medicine</i></a>
                </li>
                <?php
                if($_SESSION['role']=='seller')
                {
                ?>
                  <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-user-cog">&nbsp;Seller's Panel</i></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown06">
                      <li><a class="dropdown-item active" href="stocks.php"><i class="fas fa-cubes">&nbsp;Stocks</i></a></li>
                    </ul>
                  </li>
                  <?php
                }
                if($_SESSION['role']=='admin')
                {
                  ?>
                    <li class="nav-item dropdown">
                      <a class="nav-link active dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-user-cog">&nbsp;Admin's Panel</i></a>
                      <ul class="dropdown-menu" aria-labelledby="dropdown06">
                        <li><a class="dropdown-item active" href="stocks.php"><i class="fas fa-cubes">&nbsp;Stocks</i></a></li><hr>
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
            <h2>Stocks</h2>
        </div>
        <div class="col-9 shodow-lg mt-3">
<table class="table table-striped shadow-lg" style="border-radius:15px">
    <thead class="">
    <tr>
        <th class="id">Batch No</th>
        <th>(Id) Name</th>
        <th>Company</th>
        <th class="">Price</th>
        <th class="">Expiery Date</th>
        <th class="">Quantity</th>
        <th class=""></th>
    </tr>
    </thead> 
    <?php
    for($i=0;$i<$n;$i++)
    {
      $medicine=mysqli_fetch_array($medicine_list);
      $q="select * from medicine where id = '$medicine[id]';";
      $medicine_=mysqli_query($con,$q);
      $medicine_n=mysqli_fetch_array($medicine_);
            ?>
            <tr>
            <td><?php echo $medicine['batch_no']; ?></td>
            <td>(<?php echo $medicine['id']; ?>) <?php echo $medicine_n['name']; ?></td>
            <td><?php echo $medicine_n['company']; ?></td>
            <td class="id<?php echo $medicine['batch_no']; ?>" contenteditable='false'><?php echo $medicine['price']; ?></td>
            <td class="id<?php echo $medicine['batch_no']; ?>"><?php echo $medicine['exp_date']; ?></td>
            <td class="id<?php echo $medicine['batch_no']; ?>"><?php echo $medicine['no_of_medicine']; ?></td>
            <td class="p-0"><button class="btn btn-success m-0 py-2 id<?php echo $medicine['batch_no']; ?>" onclick="make_editable(<?php echo $medicine['batch_no']; ?>)" style="width:100%">Update Details</button>
            <button class="btn btn-success m-0 py-2 id<?php echo $medicine['batch_no']; ?>" onclick="update_stocks(<?php echo $medicine['batch_no']; ?>)" style="width:100%;visibility:hidden">Done</button>
            </td>
            </tr>
<?php
        }
        ?>
</table>

</div>
</center>
</body>
</html>