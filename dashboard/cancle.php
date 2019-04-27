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
	?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">All Members</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<form action="cancle.php" method="POST" role="search">
					<div class="form-group col-md-12">
						<input name="searchname" type="text" class="form-control" placeholder="Search">
					</div>
				</form>
				<h2>Registered Members</h2>
				<?php
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
				<?php
				foreach ($members as $value) {
					echo '<div class="alert bg-teal" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> <a href="deletemember.php/?id='.$value['id'].'"
					class="pull-right"><em class="fa fa-lg fa-close"></em></a>
					</br>NAME : '.$value['firstname'].'</br>EMAIL : '.$value['email'].'</br>Description : '.$value['description'].'</br> Date Created : '.$value['date_created'].'</div>';
				}
					
				?>
				
			</div>
		</div><!--/.row-->		
		
	</div><!--/.main-->
		
</body>

<footer>
<div class="row">
			<?php
			require_once("footer.php");
			?>
		</div><!--/.row-->
</footer>
</html>