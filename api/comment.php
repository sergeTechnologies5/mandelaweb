<?php

include_once("../config/config.php");
$bdd = new db();
$data = file_get_constents('php://input');
$json_data = json_decode($data , true);


if(isset($json_data ['comment'])&&isset($json_data ['group_id'])&&isset($json_data ['user_id']))
	{

		$comment = $json_data ['comment'];
        $group_id = $json_data ['group_id'];
        $user_id = $json_data ['user_id'];
        $query = "INSERT INTO `comments` (`id`, `comments`, `group_id`, `user_id`) VALUES (NULL, '$comment', '$group_id', '$user_id')"; 

        $response = $bdd->execute($query);  
            if($response==1){
                 var_dump(json_encode(array('status'=>200,'message'=>"success"))) ;
            }else{
                var_dump(json_encode(array('status'=>201,'message'=>"fail"))) ;
            }
	
	}


?>