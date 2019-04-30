<?php

include_once("../config/config.php");
$bdd = new db();
$data = file_get_contents('php://input');
$json_data = json_decode($data , true);

$AMOUNT = $json_data['amount'];
$NUMBER = $json_data['number']; //format 254700000000
$user_id = $json_data['user_id'];
$group_id = $json_data['group_id'];
$description = $json_data['description'];

$query = "INSERT INTO loans (amount,description,user_id,group_id) VALUES ('$AMOUNT','$description','$user_id','$group_id')";
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