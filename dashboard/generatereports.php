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
					<em class="fa fa-book"></em>
				</a></li>
				<li class="active">Reports</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				
			<?php
					include_once("../config/config.php");
					$bdd = new db();
				
					$query = "SELECT * FROM loans WHERE group_id='$group_id'";
					$members =$bdd->getAll($query);
					
				?>
				<div class="panel panel-default">
					<div class="panel-heading">PDF REPORTS</div>
					
					<div class="panel-body">
					
					<div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Group ID</th>
                                    	<th>Status</th>
                                    	<th>User ID</th>
                                    	<th>Amount</th>
		
										<th>Date</th>
                                    </thead>
                                    <tbody>
									<?php
										foreach ($members as $value) {
                                        echo ' <tr>
											<td>'.$value['id'].'</td>
											<td>'.$value['group_id'].'</td>
                                        	<td>'.$value['status'].'</td>
                                        	<td>'.$value['user_id'].'</td>
											<td>'.$value['amount'].'</td>
											
                                        	<td>'.$value['date_created'].'</td>
										</tr>';
										}
                                        ?>
                                    </tbody>
                                </table>
								<button class="btn btn-primary">Generate</button>
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
