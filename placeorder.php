<?php
session_start();
$con=mysqli_connect('localhost','root','root');
mysqli_select_db($con,'pharmacy_management');
$q="";
$n=mysqli_query($con,$q);
if($n==1)
{
    echo '<script>';
    echo 'alert("Order Placed Successfully\nThanks for shoping");';
    echo 'window.location.href="http://localhost/se%20project/pharmacy_management.github.io/home.php"';
    echo '</script>';
}
else
{
    echo '<script>';
    echo 'alert("An error Occured\nPlz try again...");';
    echo 'window.location.href="http://localhost/se%20project/pharmacy_management.github.io/buy.php?med_id='.$_GET['med_id'].'"';
    echo '</script>';
}
?>