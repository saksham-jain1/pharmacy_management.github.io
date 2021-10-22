<?php
session_start();
session_destroy();
header('location:http://localhost/SE-Project/home.php');
?>