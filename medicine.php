<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicines</title>
    <link href="bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="fontawesome-free-5.15.3-web\css\all.css" rel="stylesheet">
</head>
<body>
    <script src="bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <center>
        <div class="p-3 bg-info">
            <h1>Medicines</h1>
        </div>
<div class="row row-cols-1 row-cols-md-5 g-5 m-2 p-2">
<?php
for($i=0;$i<12;$i++)
{
    ?>
<div class="col">
    <div class="card">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-danger">
            10% OFF
        </span>
        <a href="#" class="btn btn-primary">Buy</a>
      </div>
    </div>
</div>
<?php
}
?>
</div>
    </center>

</body>
</html>