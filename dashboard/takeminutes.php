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
		
			if(isset($_POST['typing'])&&isset($_POST['submit'])&&isset($_POST['title']))
			{
			include_once("../config/config.php");
			
			$bdd = new db(); // create a new object, class db()
			$minutes = 'CREATE TABLE IF NOT EXISTS minutes (
			id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			minutes VARCHAR(1000) NOT NULL,
			title VARCHAR(1000) NOT NULL,
			group_id INT NOT NULL,
			user_id INT NOT NULL,
			FOREIGN KEY (user_id) REFERENCES members(id) ON DELETE CASCADE,
				  FOREIGN KEY (group_id) REFERENCES groups(id) ON DELETE CASCADE,
			date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
			date_modified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
			)';
		   
			try {
				$response = $bdd->execute($minutes);
			} catch (Exception $th) {
				echo $th->getMessage();
			}

			$group_id =  $_SESSION['group_id'];
			$user_id =  $_SESSION['id'];
				$typing = $_POST['typing'];
				$title  = $_POST['title'];
			
				$query = "INSERT INTO minutes (minutes,user_id,group_id,title) VALUES ('$typing','$user_id','$group_id','$title')";
				try {
					
					$response = $bdd->execute($query);	
					if($response ==1){
					
					}else{
                     
                       
               
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
					<em class="fa fa-book"></em>
				</a></li>
				<li class="active">Minutes</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Take Minutes</div>
					
					<div class="container">
					<hr>
						<div class="col-md-6">
							<form method="POST" action="takeminutes.php">
								<div class="form-group">
								<label>Title</label>
									<input name="title"  placeholder="Type Title" class="form-control">
								</div>
								<div class="form-group">
								<textarea class="form-control" name="typing" id="type" placeholder="Type Here" cols="2" rows="10">
								</textarea>
								</div>
								<div class="form-group">
								<hr>
								<button name="submit" class="btn btn-primary" type="submit">Submit</button>
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
