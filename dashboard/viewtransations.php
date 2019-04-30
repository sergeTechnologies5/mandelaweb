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
					<em class="fa fa-money"></em>
				</a></li>
				<li class="active">All Members</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<form action="viewtransations.php" method="POST" role="search">
					<div class="form-group col-md-12">
						<input name="searchname" type="text" class="form-control" placeholder="Search">
					</div>
				</form>
				<h2>All Transations</h2>
				<?php
					 include_once("../config/config.php");
					 $bdd = new db();
					 if(isset($_POST['searchname'])){
						$phonenumber = $_POST['searchname'];
						$query = "SELECT * FROM transations WHERE group_id='$group_id' AND phonenumber LIKE '%$phonenumber%'";
						$members =$bdd->getAll($query);
					}else {
						$query = "SELECT * FROM transations WHERE group_id='$group_id'";
						$members =$bdd->getAll($query);
					}
				?>

<div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Phone Number</th>
                                    	<th>User ID</th>
                                    	<th>Amount</th>
                                    	<th>Date Created</th>
                                    </thead>
                                    <tbody>
										<?php
										foreach ($members as $value) {
                                        echo ' <tr>
                                        	<td>'.$value['id'].'</td>
                                        	<td>'.$value['phonenumber'].'</td>
                                        	<td>'.$value['user_id'].'</td>
                                        	<td>'.$value['amount'].'</td>
											<td>'.$value['date_created'].'</td>
											<td>'.'<a href="deletetransaction.php/?id='.$value['id'].'"
											class="pull-right"><em class="fa fa-lg fa-close"></em></a>'.'</td>
										</tr>';
										}
                                        ?>
                                    </tbody>
                                </table>

                            </div>
				
				
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