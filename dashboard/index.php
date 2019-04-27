
<?php

?>
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
		 $group_id = $_SESSION['id'];
		include_once("../config/config.php");
		$bdd = new db();
		$querymembers = "SELECT * FROM members WHERE group_id='$group_id'";
		$querycomments = "SELECT * FROM comments WHERE group_id='$group_id'";
	   $members =$bdd->getAll($querymembers);
		
		$comments =$bdd->getAll($querycomments);
			//total amount
		$querytransations = "SELECT * FROM transations WHERE group_id='$group_id'";
	  $transations =$bdd->getAll($querytransations);
			//comments count
			//users count
			$users_count = count($members);
			$comments_count = count($comments);

	?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
			<div class="row">
				<ol class="breadcrumb">
					<li><a href="#">
						<em class="fa fa-home"></em>
					</a></li>
					<li class="active">Dashboard</li>
				</ol>
			</div><!--/.row-->
			
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Dashboard</h1>
				</div>
			</div><!--/.row-->			
			<div class="panel panel-container">
				<div class="row">
				
				<a href="#">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
						<div class="panel panel-blue panel-widget border-right">
							<div class="row no-padding"><em class="fa fa-xl fa-comments color-orange"></em>
								<div class="large"><?php
								echo 	$comments_count; ?></div>
								<div class="text-muted">Comments</div>
							</div>
						</div>
					</div>
				</a>
					<a href="view.php">
					<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
						<div class="panel panel-orange panel-widget border-right">
							<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
								<div class="large"><?php echo $users_count?></div>
								<div class="text-muted">All Users</div>
							</div>
						</div>
					</div>
					</a>
					
					<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
						<div class="panel panel-orange panel-widget border-right">
							<div class="row no-padding"><em class="fa fa-xl fa-money color-teal"></em>
								<div class="large">$<?php
									$total = 0;
									foreach ($transations as $value) {
										$total = $total + $value['amount'];
									}
									echo $total;
								?></div>
								<div class="text-muted">Total Amount</div>
							</div>
						</div>
					</div>
					
				</div><!--/.row-->
			</div>
			
			<?php
			require_once("footer.php");
			?>
	</div>	<!--/.main-->		
</body>
</html>