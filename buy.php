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
    <center>
        <div class="p-3 bg-info">
            <h1>Medicine Name</h1>
        </div>
<div class="card shadow-lg mb-10 m-5" style="max-width: 80%;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="pharma.jpg" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body px-0">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <div class="col-2 justify-content-right">
        <div class="input-group">
          <span class="input-group-text fas fa-minus" onclick="decrement()"></span>
            <input type="number" class="form-control" min="0" max="10" value="0" id="quantity">
          <span class="input-group-text fas fa-plus" onclick="increment()"></span>
        </div>
        </div>
      <div class="input-group">
        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
        <span class="input-group-text col-5 justify-content-center" id="">Place Order</span>
      </div>
      </div>
    </div>
  </div>
</div>
    </center>

</body>
</html>