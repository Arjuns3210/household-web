<?php
session_start();
$conn = mysqli_connect("localhost","root","","homeservices");

$_SESSION = [];
session_unset();
session_destroy();
header("Location:index.php");
?>

