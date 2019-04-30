<?php

                include_once("../config/config.php");
                $bdd = new db();
                $data = file_get_contents('php://input');
                $json_data = json_decode($data , true);

				$group_id   = $json_data['group_id'];
                $phonenumber = $json_data['phonenumber'];
				$firstname = $json_data['firstname'];
				$email = $json_data['email'];
				$lastname = $json_data['lastname'];
				$nationalid = $json_data['nationalid'];
				$password = $json_data['password'];
				$description = $json_data['description'];
				$role_id = 2;
				$query = "INSERT INTO members (firstname,group_id,role_id,nationalid,password,email,lastname,description,phonenumber) VALUES ('$firstname','$group_id','$role_id','$nationalid','$password','$email','$lastname','$description','$phonenumber')";
				try {
					
					$response = $bdd->execute($query);	
					if($response ==1){
						echo(json_encode(array('status'=>'success','message'=>'created successfully')));
					}else{
                     
                        echo(json_encode(array('status'=>'fail','message'=>'creation failed')));
               
                    }
                }catch(Exception $ex){

				}
				

?>