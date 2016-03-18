<?php
session_start();
if(isset($_SESSION['colg']))
{
	unset($_SESSION['colg']);
	header('Location: login-page/register.php');

}
else if(isset($_SESSION['std']))
{
	unset($_SESSION['std']);
	header('Location: login-page/register.php');
}
else
{
	$_SESSION['error']='You are not logged in, Please login';
	header('Location: login-page/register.php');
}

?>
