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
if($_SESSION['otp']==$_POST['otp'])
{
    $con=mysqli_connect('localhost','root','root');
    mysqli_select_db($con,'pharmacy_management');
    $q="update user set password='$_POST[password]' where email='$_SESSION[email]';";
    $result1=mysqli_query($con,$q);
    if($result1)
    {
        $html="Hey $_SESSION[name] <br> Your account password has been successfully changed.<br> Have a Good Day <br> Bye";
        echo smtp_mailer($_SESSION['email'],'Confermation',$html);
        echo '<script>';
        echo 'alert("Password has been successfully change");';
        echo 'window.location.href="http://localhost/se%20project/pharmacy_management.github.io/home.php"';
        echo '</script>';
    }
    else
    {
        echo '<script>';
        echo 'alert("Some error occured\nPlz try again");';
        echo 'window.location.href="http://localhost/se%20project/pharmacy_management.github.io/login.php"';
        echo '</script>';
    }
}
else
{
    echo '<script>';
    echo 'alert("OTP dont match\nPlz try again");';
    echo 'window.location.href="http://localhost/se%20project/pharmacy_management.github.io/login.php"';
    echo '</script>';
}
?>