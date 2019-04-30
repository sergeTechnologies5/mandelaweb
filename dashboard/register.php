<!DOCTYPE html>
<html>
	<head>
		
	</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
			<?php
			include_once("header.php");
		
			?>
	</nav>
	<?php
		require_once('sidebar.php');
		
	?>
	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
					<em class="fa fa-user"></em>
				</a></li>
				<li class="active">Member Registration</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				
				
				<div class="panel panel-default">
					<div class="panel-heading">Fill All Fields</div>
					<div class="panel-body">
						<div class="col-md-6">
							<form action="createmember.php" method="POST">
								<div class="form-group">
									<label>First Name</label>
									<input name="firstname" class="form-control" placeholder="Enter First Name">
								</div>
								<div class="form-group">
									<label>Email</label>
									<input name="email" type="email" placeholder="Enter Email" class="form-control">
								</div>
								<div class="form-group">
									<label>Description</label>
									<textarea
									name="description"
									placeholder="Describe Member" class="form-control" rows="3"></textarea>
								</div>
								<button name="submit" type="submit" class="btn btn-primary">Create New Member</button>
								</div>
								<div class="col-md-6">
								<div class="form-group">
									<label>Last Name</label>
									<input name="lastname" class="form-control" placeholder="Enter Last Name">
								</div>
								<div class="form-group">
									<label>National ID</label>
									<input name="nationalid" placeholder="Enter National ID" type="text" class="form-control">
								</div>
								<div class="form-group">
									<label>Phone Number</label>
									<input name="phonenumber" placeholder="Enter Phone Number" type="text" class="form-control">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input name="password" placeholder="Enter Password" type="password" class="form-control">
								</div>
									
								</div>
							</form>
						</div>
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
			<?php
			require_once("footer.php");
			?>
		</div><!-- /.row -->
	</div><!--/.main-->
	
	
</body>
</html>
