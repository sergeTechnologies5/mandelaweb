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
			$minutes = $_POST['searchname'];
			$query = "SELECT * FROM minutes WHERE group_id='$group_id' AND minutes LIKE '%$minutes%'";
			$members =$bdd->getAll($query);
		}else {
			$query = "SELECT * FROM minutes WHERE group_id='$group_id'";
			$members =$bdd->getAll($query);
		}
		
	    
	?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
					<em class="fa fa-book"></em>
				</a></li>
				<li class="active">View Minutes</li>
			</ol>
		</div><!--/.row-->
	<div class="row">
			<div class="col-lg-12">
				
				<form action="viewmitues.php" method="POST" role="search">
					<div class="form-group col-md-12">
						<input name="searchname" type="text" class="form-control" placeholder="Search by Name">
					</div>
				</form>
				<h2 >All Minutes</h2>
				
			</div>
			<?php
				foreach ($members as $value) {
					echo '<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">'.$value['title'].'</div>
						<div class="panel-body">
							<p>Minutes : '.$value['minutes'].'</br> Created on
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
