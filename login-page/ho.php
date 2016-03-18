<?php
include '../data.php';
$obj=new data();
if(isset($_POST['colgr']))
{
	$cname=trim($_POST['cname']);
	$amt=trim($_POST['amt']);
	$loc=trim($_POST['loc']);
	if(!empty($cname) and !empty($amt) and !empty($loc))
	{
		$obj->registercol($cname,$amt,$loc);
	}
	else
	{
		$_SESSION['error']='Input all Fields';
		header('Location: register.php');
	}
}
else if (isset($_POST['stdr']))
{
	# code...
	$sname=trim($_POST['sname']);
	$sid=trim($_POST['sid']);
	$sloc=trim($_POST['sloc']);
	if(!empty($sname) and !empty($sid) and !empty($sloc))
	{
		$obj->registerstd($sname,$sid,$sloc);
	}
	else
	{
		$_SESSION['error']='Input all Fields';
		header('Location: register.php');
	}
}
else
{
	$_SESSION['error']='Input all the Fields';
	header('Location: register.php');
}

?>