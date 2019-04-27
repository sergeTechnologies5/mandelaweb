<!DOCTYPE html>
<html>

<body>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<?php
		include_once("header.php");
		if(!isset($_SESSION['username'])){
			header('location:login.php');	
		  }
		?>
	</nav>
	<?php
		require_once('sidebar.php');
		include_once("../config/config.php");
		$bdd = new db();
    ?>
    
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
				<ol class="breadcrumb">
					<li><a href="#">
						<em class="fa fa-home"></em>
					</a></li>
					<li class="active">Profile</li>
				</ol>
			</div><!--/.row-->
			
			<div class="row">
				<div class="col-lg-12">
                    <h1 class="page-header"><?php
					echo $_SESSION['username']?>'s Profile</h1>
					
				</div>
			</div><!--/.row-->	
         <div class="col-md-12">
			 <?php
			 if(isset($_GET['message'])){
				echo $_GET['message'];
			 }
			 ?>
				<div class="panel panel-default">
					<div class="panel-body tabs">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab2" data-toggle="tab">Make Payments</a></li>
							<li><a href="#tab1" data-toggle="tab">Change Password</a></li>
							<li><a href="#tab3" data-toggle="tab">Delete Account</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade" id="tab1">
							<?php
								if(isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['submit']))
								{
										$mail = $_POST['email'];
										$password = $_POST['password'];
										$id = $_SESSION['id'];
										$query = "UPDATE admins SET email='$mail', password='$password' WHERE id='$id'";
										$result = $bdd->execute($query);
										if($result>=1){
											echo "Password and Emain Updated";
											}else{
											header('location:/mandela/dashboard/index.php');
										}
								}
							?>
							<form method="POST" class="form-horizontal" role="form" action="admin.php">

                                <div class="form-group">
                                    <label for="lastname" class="col-sm-4 control-label">Admin Email</label>
                                    <div class="col-sm-4">
                                        <input type="email" class="form-control" name="email" 
                                            placeholder="Enter Admin Email">
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-sm-4 control-label">Admin Password</label>
                                    <div class="col-sm-4">
                                          <input type="password" class="form-control" name="password" placeholder="Enter Password">
                                     </div>
                                </div>
                                <div class="form-group">
                                <label for="lastname" class="col-sm-4 control-label"></label>
                                <div class="col-sm-4">
                                <button name="submit" type="submit" class="btn btn-primary">Update</button>
                                 </div>
                                </div>
                                </form>
							</div>
							<div class="tab-pane fade in active" id="tab2">

							<?php
							include('../mpesa/index.php');
							?>
							</div>
							
							<div class="tab-pane fade" id="tab3">
								<h4>Confirm Password</h4>
								<form class="form-horizontal" role="form" action="">
                                <div class="form-group">
                                    <label for="lastname" class="col-sm-4 control-label">Admin Password</label>
                                    <div class="col-sm-4">
                                          <input type="password" class="form-control" name="password" placeholder="Enter Password">
                                     </div>
                                </div>
                                <div class="form-group">
                                <label for="lastname" class="col-sm-4 control-label"></label>
                                <div class="col-sm-4">
                                <button name="submit" type="submit" class="btn btn-danger">Delete</button>
                                 </div>
                                </div>
                                </form>
							</div>
						</div>
					</div>
				</div><!--/.panel-->
			</div><!--/.col-->
    </div>
</body>
</html>