<?php

            include_once("../config/config.php");
            session_start();
			$bdd = new db(); // create a new object, class db()
			$members = 'CREATE TABLE IF NOT EXISTS members (
			  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			  firstname VARCHAR(100) NOT NULL,
			  group_id INT NOT NULL,
				role_id INT NOT NULL,
			  nationalid VARCHAR(100) NOT NULL,
					password VARCHAR(100) NOT NULL,
					email VARCHAR(100) NOT NULL,
					lastname VARCHAR(100) DEFAULT "",
					phonenumber VARCHAR(100) NOT NULL,
					description VARCHAR(1000) DEFAULT "",
					FOREIGN KEY (group_id) REFERENCES admins(id) ON DELETE CASCADE,
			  date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
			  date_modified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
			  )';
			  try{
			   $response = $bdd->execute($members);  
			} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
			$group_id =  $_SESSION['group_id'];
			if(isset($_POST['phonenumber'])&&isset($_POST['firstname'])&&isset($_POST['lastname'])&&isset($_POST['email'])
			&&isset($_POST['password'])&&isset($_POST['description'])&&isset($_POST['submit'])&&isset($_POST['nationalid']))
			{
				$phonenumber = $_POST['phonenumber'];
				$firstname = $_POST['firstname'];
				$email = $_POST['email'];
				$lastname = $_POST['lastname'];
				$nationalid = $_POST['nationalid'];
				$password = $_POST['password'];
				$description = $_POST['description'];
				$role_id = 2;
				$query = "INSERT INTO members (firstname,group_id,nationalid,password,email,lastname,description,phonenumber,role_id) VALUES ('$firstname','$group_id','$nationalid','$password','$email','$lastname','$description','$phonenumber','$role_id')";
				try {
					
					$response = $bdd->execute($query);	
					if($response ==1){
						
						header('location:view.php');
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