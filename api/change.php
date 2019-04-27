<?php
//endpoint for mobile app to change password
include('../config/config.php');

$data = file_get_constents('php://input');
$json_data = json_decode($data , true);
if(isset($json_data['email'])&&
isset($json_data['password'])&&
isset($json_data['user_id']))
{
    $bdd = new db(); 
    $mail = $json_data['email'];
    $password = $json_data['password'];
    $id = $json_data['user_id'];
    $query = "UPDATE members SET email='$mail', password='$password' WHERE id='$id'";
    $result = $bdd->execute($query);
    if($result>=1)
    {
        var_dump(json_encode(array('status'=>200,'message'=>'update success')));
    }
    else
    {
        var_dump(json_encode(array('status'=>201,'message'=>'update failed')));
	}
}

?>