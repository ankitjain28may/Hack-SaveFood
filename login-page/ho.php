<?php
include '../data.php';
$obj=new data();

$cname=$_POST['cname'];
$amt=$_POST['amt'];
$loc=$_POST['loc'];
$obj->registercol($cname,$amt,$loc);


?>