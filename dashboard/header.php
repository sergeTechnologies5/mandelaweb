<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Chamaa Express</title>
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="../assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="../assets/css/datepicker3.css" rel="stylesheet">
	<link href="../assets/css/styles.css" rel="stylesheet">
	<script src="../assets/js/jquery-3.3.1.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="index.php"><span>Chamaa Express</span>  Admin</a>
				<ul class="nav navbar-top-links navbar-right">
					<?php
					session_start();
					if(isset($_SESSION['username'])){
						echo '<li class="dropdown"> <a class="pull-right" href="admin.php">Profile</a></li>';
						echo '<li class="dropdown"> <a class="pull-right" href="logout.php">Logout</a></li>';	
					  }
					  else{
						echo '<li class="dropdown"><a class="pull-right" href="login.php">Log In</a></li>';
						echo '<li class="dropdown" ><a class="pull-right" href="../register.php">Register</a></li>';
					  }
					?>
					
				</ul>
			</div>
</div><!-- /.container-fluid -->