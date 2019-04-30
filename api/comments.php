<?php

include_once("../config/config.php");
$bdd = new db();
$data = file_get_contents('php://input');
$json_data = json_decode($data , true);


if(isset($json_data ['comment'])&&isset($json_data ['comment_id'])&&isset($json_data ['user_id']))
	{

		$comment = $json_data ['comment'];
        $group_id = $json_data ['comment_id'];
        $user_id = $json_data ['user_id'];
        $query = "INSERT INTO `comments` (`id`, `comments`, `group_id`, `user_id`) VALUES (NULL, '$comment', '$group_id', '$user_id')"; 

        $response = $bdd->execute($query);  
        if($response==1){
            $respons = array('status' => "true",'message' => 'success');
            
        }else{
            $message = "comment not saved";
            
            $respons = array('status'=>"false",'message'=>$message);
            
        }

        echo json_encode($respons);
	
    }
    


?>