<?php
session_start();
class data
{

	function login($user_login)
	{
		require_once 'database.php';
		$bd = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


		if(substr($user_login,-4)=='mess')
		{
			$query="SELECT * FROM mess WHERE colg_code='$user_login'";
			$result=$bd->query($query);
			if($result->num_rows >0)
			{
				$row=$result->fetch_assoc();
				$total=$row['amt'];
				$_SESSION['colg']=$total;
				$_SESSION['colgid']=$row['colg_code'];
				header('Location: colg.php');
			}
			else
			{
				$_SESSION['error']='Invalid Login Info';
				header('Location: ../login-page/register.php');
			}

		}
		elseif (substr($user_login,-3)=='std') 
		{
			# code...
			$query="SELECT std_code FROM std WHERE std_code='$user_login'";
			$result=$bd->query($query);
			if($result->num_rows > 0)
			{
				$row=$result->fetch_assoc();
				$_SESSION['std']=$row['std_code'];
				header('Location: std.php');
			}
			else
			{
				$_SESSION['error']='Invalid Login Info';
			header('Location: ../login-page/register.php');
			}
		}
		else
		{
			$_SESSION['error']='Invalid Login Info';
			header('Location: ../login-page/register.php');
		}
		
	}

	function registercol($cname,$amt,$loc)
	{
		require_once 'database.php';
		$bd = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

		$query="CREATE TABLE IF NOT EXISTS mess (
			id int primary key auto_increment unique not null,
			colg_name varchar(255) unique not null,
			colg_code varchar(255) unique not null,
			amt int not null,
			loc varchar(255) not null
			) ENGINE=INNODB;";

		if($bd->query($query));
		else
			die("Table is not created");

		$query="SELECT colg_name FROM mess WHERE colg_name='$cname'";
		$result=$bd->query($query);
		if ($result->num_rows>0)
		{
			# code...
			$_SESSION['error']='Your College is already registered';
			header('Location: ../login-page/register.php');
		}
		else
		{
			$colg_code=substr($cname,0,1);
			$col=$cname;
			for($i=0;$i<2;$i=$i+1)
			{
				$pos=strpos($col,' ');
				$colg_code=$colg_code.substr($col,$pos+1,1);
				$col=substr($col,$pos+1);
			}
			$colg_code=$colg_code."savemess";
			$query="INSERT INTO mess VALUES(null,'$cname','$colg_code','$amt','$loc')";
			if($bd->query($query))
			{
				$_SESSION['colg']=$amt;
				$_SESSION['colgid']=$colg_code;
				$_SESSION['success']="Registration Successful<br>Your Unique Id is ".$colg_cd;;
				header('Location: ../page/colg.php');
			}
			else
			{
				echo "Query Failed";
			}

		}
	}

	function registerstd($sname,$sid,$sloc)
	{
		require_once 'database.php';
		$bd = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

		$query="CREATE TABLE IF NOT EXISTS std (
			login_id int primary key auto_increment unique not null,
			sname varchar(255) not null,
			std_code varchar(255) not null,
			colg_id varchar(255) not null,
			sloc varchar(255) not null,
			stdd int not null,
			id int not null,
			FOREIGN KEY (id) REFERENCES mess(id)
			) ENGINE=INNODB;";
		
		if($bd->query($query));
		else
			die("Student table is not created");

		$query="SELECT * FROM mess WHERE colg_code='$sid'";
		$result=$bd->query($query);
		if ($result->num_rows>0)
		{
			$row=$result->fetch_assoc();
			$id=$row['id'];

			$query="CREATE TABLE IF NOT EXISTS upp (
			varr int not null
			) ENGINE=INNODB;";
		
			if($bd->query($query));
			else
				die("upp table is not created");

			$query="SELECT varr FROM upp";
			$result=$bd->query($query);
			$row=$result->fetch_assoc();
			$offset=$row['varr'];

			$std_code=substr($sid,0,3);
			$std_code=$std_code.strval($offset);
			$offset=$offset+1;
			$query="UPDATE upp SET varr='$offset'";
			if($bd->query($query));
			else
				die("upp table is not updated");

			$std_code=$std_code."std";
			$query="INSERT INTO std VALUES(null,'$sname','$std_code','$sid','$sloc',0,'$id')";
			if($bd->query($query))
			{
				$_SESSION['std']=$std_code;
				$_SESSION['success']="Registration Successful<br>Your Unique ID is ".$std_code;
				header('Location: ../page/std.php');
			}
			else
			{
				echo "Query failed to run";
			}

		}
		else
		{
			$_SESSION['error']='Invalid College Id';
			header('Location: ../login-page/register.php');

		}
	}

	function storage()
	{

	}

}



?>