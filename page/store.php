<?php
session_start();
if(isset($_POST['remove']))
{
require_once '../database.php';
$bd = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$offset=1;
$std_code=$_SESSION['std'];
$query="UPDATE std SET stdd='$offset' where std_code='$std_code'";
$bd->query($query);
$_SESSION['success']="Your feedback is submit, Thanks";
header('Location: std.php');
}

?>