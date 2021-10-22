<?php
session_start();
$id=$_POST['id'];
$password=$_POST['password'];
$con=mysqli_connect('localhost','root','root');
mysqli_select_db($con,'pharmacy_management');
$q1="select * from user where id='$id' and password='$password';";
$q2="select * from seller where id='$id' and password='$password';";
$q3="select * from admin where id='$id' and password='$password';";
$result1=mysqli_query($con,$q1);
$row1=mysqli_fetch_array($result1);
$num1=mysqli_num_rows($result1);

$result2=mysqli_query($con,$q2);
$row2=mysqli_fetch_array($result2);
$num2=mysqli_num_rows($result2);

$result3=mysqli_query($con,$q3);
$row3=mysqli_fetch_array($result3);
$num3=mysqli_num_rows($result3);
if($num1==1)
{
    $_SESSION['id']=$id;
    $_SESSION['name']=$row1['name'];
    $_SESSION['role']="user";
}
if($num2==1)
{
    $_SESSION['id']=$id;
    $_SESSION['name']=$row2['name'];
    $_SESSION['role']="seller";
}
if($num3==1)
{
    $_SESSION['id']=$id;
    $_SESSION['name']=$row3['name'];
    $_SESSION['role']="admin";
}
if($num1||$num2||$num3)
{
    $_SESSION['try']=1;
    header('location:http://localhost/SE-Project/home.php?');
}
else
{
    $_SESSION['try']=2;
	header('location:http://localhost/SE-Project/login.php?');
}
mysqli_close($con);
?>