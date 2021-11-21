<?php
session_start();
include('smtp/PHPMailerAutoload.php');
function smtp_mailer($to,$subject, $msg){
    echo '<div id="mail" hidden>';
	$mail = new PHPMailer();
	$mail->SMTPDebug  = 3;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "phamacy.management.syatem@gmail.com";
	$mail->Password = "ssspharmacy";
	$mail->SetFrom("phamacy.management.syatem@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
    $mail->Send();
    echo "</div>";
}
if(!isset($_POST['otp2']))
{
    $_SESSION['otp']=rand(1000,10000);
    $_SESSION['email']=$_POST["email"];
    $_SESSION['password']=$_POST['password1'];
    $_SESSION['phone_no']=$_POST['phone_no'];
    $_SESSION['email']=$_POST['email'];
    $_SESSION['age']=$_POST['age'];
    $_SESSION['name']=$_POST['name'];

$html='The one time password for email verification on Pharmacy Management System is: '.$_SESSION['otp'];
echo smtp_mailer($_SESSION['email'],'OTP',$html);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="bootstrap-5.0.2-dist\bootstrap-5.0.2-dist\css\bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
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
        top: 60px;
        padding: 30px;
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
<body class="bg-light" onload="setTimeout(delete1,10)">  
  <script src="bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script>
    function delete1()
    {
      document.getElementById("mail").innerHTML=" ";
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
              <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i>&nbsp;Login</a>
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
      <div class="blur">
        <h3>E-Mail Verification</h3>
        <p>The OTP has been send to your registered email address <br>To verify email Please enter OTP</p>
        <form method="post">
        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-5">OTP</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="inputEmail3" name="otp2" required>
          </div>
        </div>
        <button class="btn btn-success" type="submit">Verify</button>
        </form>
      </center>
</body>
</html>
<?php
}
if(isset($_POST['otp2']))
{
    if($_SESSION['otp']==$_POST['otp2'])
    {
        $con=mysqli_connect('localhost','root','root');
        mysqli_select_db($con,'pharmacy_management');
        $q="INSERT INTO user(password,phone_no,email,age,name) VALUES('$_SESSION[password]','$_SESSION[phone_no]','$_SESSION[email]','$_SESSION[age]','$_SESSION[name]');";
        $result=mysqli_query($con,$q);
        if($result)
        {
            $q1="select * from user where email='$_SESSION[email]';";
            $result1=mysqli_query($con,$q1);
            $row1=mysqli_fetch_array($result1);
            $_SESSION['name']=$row1['name'];
            $_SESSION["id"]=$row1['id'];
            $_SESSION['try']=1;
            $html="Hey $_SESSION[name] <br> Your account has been successfully created.<br> Your Id is: $_SESSION[id] <br>Have a Good Day <br> Bye";
            echo smtp_mailer($_SESSION['email'],'Account Successfully Created',$html);
            echo '<script>';
            echo 'alert("Hello '.$_SESSION["name"].' \nAccount successfully Created\nYour Id is: '.$_SESSION["id"].' ");';
            echo 'window.location.href="http://localhost/se%20project/pharmacy_management.github.io/home.php"';
            echo '</script>';
        }
        else
        {
            echo '<script>';
            echo 'alert("Error: '.mysqli_error($con).' \nPlz Try Again");';
            echo 'window.location.href="http://localhost/se%20project/pharmacy_management.github.io/addnew.php"';
            echo '</script>';
        }
    }
    else
    {
        echo '<script>';
        echo 'alert("OTP dont match\nPlz try again");';
        echo 'window.location.href="http://localhost/se%20project/pharmacy_management.github.io/addnew.php"';
        echo '</script>';

    }
}
?>

