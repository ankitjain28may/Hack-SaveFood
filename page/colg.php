<?php

session_start();
if(isset($_SESSION['colg']))
{
	$total=$_SESSION['colg'];
	$colg=$_SESSION['colgid'];
	if(empty($_SESSION['success']))
	{
		require_once '../database.php';
		$bd = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$query="SELECT stdd from std WHERE colg_id='$colg' and stdd=1";
		$result=$bd->query($query);
		$row=$result->num_rows;
		$total=$total-$row;
	}
	$a=3;
	$g=1.5;
	$s=1.2;
	$b=1.6;
	$p=1.5;
	$r=2;
	$d=1.5;
	$f=1.2;
	$c=2;
	$ba=6;
	$pa=5;
	$sa=9;
	$cal=(($total/10)+1);


?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets1/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets1/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Save Food</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="assets1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets1/css/material-kit.css" rel="stylesheet"/>

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="assets1/css/demo.css" rel="stylesheet" />
	<link href="assets1/css/animate.css" rel="stylesheet" />


</head>

<body class="index-page" style="background:#fff;">
<!-- Navbar -->
<nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll">
	<div class="container">
        <div class="navbar-header">
	    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">
	        	<span class="sr-only">Toggle navigation</span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	    	</button>
	        	<div class="logo-container">
	                <div class="logo">
	                    <img src="assets1/img/logo.png" rel="tooltip">
	                </div>
	                <div class="brand">
	                    Save Food
	                </div>
				</div>
	      	</a>
	    </div>

	    <div class="collapse navbar-collapse" id="navigation-index">
	    	<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="../logout.php" class="btn">
						<i class="material-icons">dashboard</i> Log out
					</a>
				</li>
	    	</ul>
	    	<?php if(isset($_SESSION['success'])) 
           {
            ?>
           <div class="text-center">
            <?php

            echo '<h4 style="color:white">'.$_SESSION['success'].'</h4>';

            ?>
           </div>
           <?php
         }
         unset($_SESSION['success']);
         ?>
	    </div>
	</div>
</nav>
<!-- End Navbar -->

<div class="wrapper">
	<div class="header header-filter" style="background-image: url('assets1/2.jpg'); height:10vh;">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="brand">
						<h1 style="font-size:22px;">There's nothing good in not  saving <strong>Food</strong></h1>
						<h3 style="font-size:14px;">Let's join hands ! It's awesomely easy </h3>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<div class="container" >
	<div class="row">
		<br><br>
		<div class="col-sm-5 col-md-3 animated tada"><h4><strong><?php echo date("D d M Y", time()+16200); ?></strong></h4></div>
		<div class="col-sm-5 col-md-3 col-sm-offset-2 col-md-offset-6 animated wobble"><h4><strong>Students Coming :<?php echo $total; ?></strong></h4></div>
		<div class="table-responsive animated fadeInUp col-sm-12">
				            <div class="title">
				                <h2 class="text-center">Daily Chart</h2>
				            </div>

				            

				            <table class="table table-hover">

				                <thead>

				                    <tr>

				                        <th>Row</th>

				                        <th>Ingredient</th>

				                        <th>Quantity</th>

				                        <th>Nutrition Value</th>

				                    </tr>

				                </thead>

				                <tbody>

				                    <tr>

				                        <td>1</td>

				                        <td>Aloo</td>

				                        <td><?php echo $a*$cal.' Kg'; ?></td>

				                        <td>-</td>

				                    </tr>

				                    <tr>

				                        <td>2</td>

				                        <td>Gobi</td>

				                        <td><?php echo $g*$cal.' Kg'; ?></td>

				                        <td>-</td>

				                    </tr>

				                    <tr>

				                        <td>3</td>

				                        <td>Shimla Mirch</td>

				                        <td><?php echo $s*$cal.' Kg'; ?></td>

				                        <td>-</td>

				                    </tr>

				                    <tr>

				                        <td>4</td>

				                        <td>Bhindi</td>

				                        <td><?php echo $b*$cal.' Kg'; ?></td>

				                        <td>-</td>

				                    </tr>

				                    <tr>

				                        <td>5</td>

				                        <td>Palak</td>

				                        <td><?php echo $p*$cal.' Kg'; ?></td>

				                        <td>-</td>

				                    </tr>

				                    <tr>

				                        <td>6</td>

				                        <td>Rice</td>

				                        <td><?php echo $r*$cal.' Kg'; ?></td>

				                        <td>-</td>

				                    </tr>

				                    <tr>

				                        <td>7</td>

				                        <td>Dal</td>

				                        <td><?php echo $d*$cal.' Kg'; ?></td>

				                        <td>-</td>

				                    </tr>

				                    <tr>

				                        <td>8</td>

				                        <td>Flour (Atta)</td>

				                        <td><?php echo $f*$cal.' Kg'; ?></td>

				                        <td>-</td>

				                    </tr>

				                    <tr>

				                        <td>9</td>

				                        <td>Curd</td>

				                        <td><?php echo $c*$cal.' Packet'; ?></td>

				                        <td>-</td>

				                    </tr>

				                    <tr>

				                        <td>10</td>

				                        <td>Banana</td>

				                        <td><?php echo $ba*$cal.' Kg'; ?></td>

				                        <td>-</td>

				                    </tr>

				                    <tr>

				                        <td>11</td>

				                        <td>Papaya</td>

				                        <td><?php echo $pa*$cal.' Kg'; ?></td>

				                        <td>-</td>

				                    </tr>

				                    <tr>

				                        <td>12</td>

				                        <td>Salad</td>

				                        <td><?php echo $sa*$cal.' Kg'; ?></td>

				                        <td>-</td>

				                    </tr>




				                </tbody>

				            </table>



		</div>
	</div>
</div>
 <footer class="footer">
	    <div class="container">
	        <nav class="pull-left">
	            <ul>
					<li>
						<a href="http://www.creative-tim.com">
							Room 340
						</a>
					</li>
					<li>
						<a href="http://presentation.creative-tim.com">
						   About Us
						</a>
					</li>
					<li>
						<a href="http://blog.creative-tim.com">
						   Blog
						</a>
					</li>
					<li>
						<a href="http://www.creative-tim.com/license">
							Licenses
						</a>
					</li>
	            </ul>
	        </nav>
	        <div class="copyright pull-right">
	            &copy; 2016, made with <i class="material-icons">favorite</i> by Room 340 for a better community.
	        </div>
	    </div>
	</footer>
</body>
	<!--   Core JS Files   -->
	<script src="assets1/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets1/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets1/js/material.min.js"></script>

	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="assets1/js/nouislider.min.js" type="text/javascript"></script>

	<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
	<script src="assets1/js/bootstrap-datepicker.js" type="text/javascript"></script>

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="assets1/js/material-kit.js" type="text/javascript"></script>

	<script type="text/javascript">

		$().ready(function(){
			// the body of this function is in assets1/material-kit.js
			materialKit.initSliders();
			$(window).on('scroll', materialKit.checkScrollForTransparentNavbar);

            window_width = $(window).width();

            if (window_width >= 768){
                big_image = $('.wrapper > .header');

				$(window).on('scroll', materialKitDemo.checkScrollForParallax);
			}

		});
	</script>
</html>
<?php
}
 else
 {
 	$_SESSION['error']="You are not logged in";
 	header('Location: ../login-page/register.php');
 }
 ?>
