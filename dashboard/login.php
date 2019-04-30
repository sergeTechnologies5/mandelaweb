<!DOCTYPE html>
<html>

<body>
<?php
	include_once("header.php");
    if(isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['login']))
	{
        include_once("../config/config.php");
        $bdd = new db();
		$username = $_POST['email'];
		$password = $_POST['password'];

		$role_id = 1;
		
		// //build query
		$query = "SELECT * FROM members WHERE email='$username' AND password='$password' AND role_id='$role_id'";
		//Execute query
			$user = $bdd->getAll($query); // select ALL from allrecoards	
			$count = count($user);
			echo($count);
			if($count>=1){
				if(session_id() == '' || !isset($_SESSION)){session_start();}
				foreach($user as $value){
					$id =$value['id'];
				}
				$_SESSION['username'] = $username;
				$_SESSION['id'] = $id;

				$query = "SELECT * FROM groups WHERE  admin_id='$id'";
				$user = $bdd->getOne($query); // select ALL from allrecoards	
				$count = count($user);
				if($count>=1){
					$_SESSION['group_id']=$user['id'];
				}else{
						//Execute query
					$_SESSION['group_id'] = 1;
				}
				
				header("location:../dashboard/index.php");
			
			}else{
				$message = "Try with Different Username or Password";
				header("location:../dashboard/login.php");
			}
	}
    
?>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
		
		<?php
		if (isset($_GET['message'])) {
			echo $_GET['message'] ;
		}
		?>
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form action="login.php" method="POST" role="form">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<button name="login" class="btn btn-primary">Login</button></fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	<?php
			require_once("footer.php");
	?>
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
