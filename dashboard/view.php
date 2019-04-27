<!DOCTYPE html>
<html>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<?php
		include_once("header.php");
		?>
	</nav>
	<?php
		require_once('sidebar.php');
		$group_id = $_SESSION['id'];
		include_once("../config/config.php");
		$bdd = new db();
		if(isset($_POST['searchname'])){
			$username = $_POST['searchname'];
			$query = "SELECT * FROM members WHERE group_id='$group_id' AND firstname LIKE '%$username%'";
			$members =$bdd->getAll($query);
		}else {
			$query = "SELECT * FROM members WHERE group_id='$group_id'";
			$members =$bdd->getAll($query);
		}
		
	    
	?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">View Members</li>
			</ol>
		</div><!--/.row-->
	<div class="row">
			<div class="col-lg-12">
				
				<form action="view.php" method="POST" role="search">
					<div class="form-group col-md-12">
						<input name="searchname" type="text" class="form-control" placeholder="Search by Name">
					</div>
				</form>
				<h2 >All Members</h2>
				
			</div>
			
			<?php
				foreach ($members as $value) {
					echo '<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">'.$value['firstname'].'</div>
						<div class="panel-body">
							<p>Email : '.$value['email'].'</br> Phonenumber : '.$value['phonenumber'].'</br>Description : '.$value['description'].'</br> Created on
							 : '.$value['date_created'].'</p>
						</div>
					</div>
					</div>';

				}?>
			
		</div><!-- /.row -->
		<div class="row">
			<?php
			require_once("footer.php");
			?>
		</div><!--/.row-->
	</div>	<!--/.main-->
	  
	
</body>
</html>
