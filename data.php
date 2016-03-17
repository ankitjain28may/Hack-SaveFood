<?php

class data
{

	function login($user_login)
	{
		require_once 'database.php';
		$bd = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


		if(substr($user_login,-4)=='mess')
		{
			$query="SELECT id FROM mess WHERE colg_code='$user_login'";
			$result=$bd->query($query);
			if($result->num_rows>0)
			{
				$row=$result->fetch_assoc();
				$_SESSION['colg']=$row;
				header('Location: colg.php');
			}

		}
		elseif (substr($user_login,-3)=='std') 
		{
			# code...
			$query="SELECT id FROM std WHERE colg_code='$user_login'";
			$result=$bd->query($query);
			if($result->num_rows > 0)
			{
				$row=$result->fetch_assoc();
				header('Location: std.php');
			}
		}
		else
		{
			echo "Invalid login info";
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
		if ($result->fetch_assoc()>0)
		{
			# code...
			die("Your College is already registered");

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
				header('Location: home.php');
			}
			else
			{
				echo "Query failed to run";
			}

		}
	}

	function registerstd($name,$cname)
	{
		require_once 'database.php';
		$bd = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

		$query="CREATE TABLE IF NOT EXISTS std (
			login_id int primary key auto_increment unique not null,
			name varchar(255) unique not null,
			std_code varchar(255) not null,
			id int not null,
			FOREIGN KEY (id) REFERENCES mess(id)
			) ENGINE=INNODB;";
		
		if($bd->query($query));
		else
			die("Student table is not created");

		$query="SELECT * FROM mess WHERE colg_code='$colg_code'";
		$result=$bd->query($query);
		if ($result->fetch_assoc()>0)
		{
			$row=$result->fetch_assoc();
			$id=$row[id];

			$query="CREATE TABLE IF NOT EXISTS upp (
			varr int not null
			) ENGINE=INNODB;";
		
			if($bd->query($query));
			else
				die("upp table is not created");

			$query="SELECT varr FROM upp";
			$result=$bd->query($query);
			$row=$result->fetch_assoc();
			$offset=$row[varr];

			$std_code=substr($colg_code,0,3);
			$std_code=$std_code.strval($offset);
			$offset=$offset+1;
			$query="UPDATE upp SET var='$offset'";
			if($bd->query($query));
			else
				die("upp table is not updated");

			$std_code=$std_code."std";
			$query="INSERT INTO mess VALUES(null,'$name','$cname','$std_code',$id)";
			if($bd->query($query))
			{
				header('Location: home.php');
			}
			else
			{
				echo "Query failed to run";
			}

		}
		else
		{
			echo "Invalid college code";
		}
	}

}



?>