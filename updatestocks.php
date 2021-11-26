<?php
session_start();
$con=mysqli_connect('localhost','root','root');
mysqli_select_db($con,'pharmacy_management');
$q="update stocks set price='$_GET[price]' ,no_of_medicine='$_GET[quantity]',exp_date='$_GET[exp]' where batch_no='$_GET[batch_id]';";
$n=mysqli_query($con,$q);
if($n==1)
{
    echo '<script>';
    echo 'alert("Details updated successfully");';
    echo 'window.location.href="http://localhost/se%20project/pharmacy_management.github.io/stocks.php"';
    echo '</script>';
}
else
{
    echo '<script>';
    echo 'alert("An error Occured");';
    echo 'window.location.href="http://localhost/se%20project/pharmacy_management.github.io/stocks.php"';
    echo '</script>';
}
?>