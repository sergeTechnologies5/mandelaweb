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
		include_once("../config/config.php");
		
		$bdd = new db(); // create a new object, class db()
		$user_id =  $_SESSION['id'];
			if(isset($_POST['groupname'])&&isset($_POST['groupdescription'])&&isset($_POST['target'])&&isset($_POST['submit']))
			{
				$groupname = $_POST['groupname'];
				$groupdescription = $_POST['groupdescription'];
				$target = $_POST['target'];
				
				$query = "INSERT INTO groups (groupname,admin_id,groupdescription,target) VALUES ('$groupname','$user_id','$groupdescription','$target')";
				try {
					
					$response = $bdd->execute($query);	
					if($response ==1){
						header('location:logout.php');	
					}else{
                     
                        header('location:register.php');
               
					}
				} catch (Exception $e) {
					echo"The error is : ",$e->getMessage();
				}  
			}else{
				echo("Fill All Fields");
			}
		
	?>
	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
					<em class="fa fa-group"></em>
				</a></li>
				<li class="active">Create Group</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				
				
				<div class="panel panel-default">
					<div class="panel-heading">Fill All Fields</div>
					<div class="panel-body">
						<div class="col-md-6">
							<form action="creategroup.php" method="POST">
								<div class="form-group">
									<label>Group Name</label>
									<input name="groupname" class="form-control" placeholder="Enter Group Name">
								</div>
								<div class="form-group">
									<label>Group Description</label>
									<input name="groupdescription"  placeholder="Group Description" class="form-control">
								</div>
								<div class="form-group">
									<label>Group Target</label>
									<input name="target" placeholder="Enter Group Target" class="form-control">
								</div>
								<button name="submit" type="submit" class="btn btn-primary">Create New Group</button>
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
