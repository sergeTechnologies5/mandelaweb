<?php

include_once("../config/config.php");
$bdd = new db();
$data = file_get_contents('php://input');
$json_data = json_decode($data , true);

$AMOUNT = $json_data['amount'];
$NUMBER = $json_data['number']; //format 254700000000
$user_id = $json_data['user_id'];

// Be sure to include the file you've just downloaded
require_once('africanstalking/AfricasTalkingGateway.php');

// Specify your authentication credentials
$username   = "locationlocation";
$apikey     = "ebd605ee02e2867bbe79ca72b7357603c95fb8e6f1029bed771edc40e7e4fcf8";

// Specify the numbers that you want to send to in a comma-separated list
// Please ensure you include the country code (+254 for Kenya in this case)
$recipients = "+".$NUMBER;

// And of course we want our recipients to know what we really do
$message    = "Chamaa WithDrawals \n"."  \n".$AMOUNT;
$gateway    = new AfricasTalkingGateway($username, $apikey);

$query = "SELECT * FROM transations WHERE user_id='$user_id'";
//Execute query
$transations = $bdd->getAll($query); // select ALL from allrecoards	

$total = 0;
foreach ($transations as $value) {
    $total = $total + $value['amount'];
}

if($total<$AMOUNT){
        try 
        { 
            $response = array('status' => "fail",'message' => 'success');
        // Thats it, hit send and we'll take care of the rest. 
        $addmess = "Insufficient Funds";
        $results = $gateway->sendMessage($recipients, $message."\n". $addmess);

        }
        catch ( AfricasTalkingGatewayException $e )
        {
        
        }
    }
    else{
        //perform withdraw
        try 
        { 
            $response = array('status' => "sucess",'message' => 'success');
        $addmess = "Transaction Success";
        // Thats it, hit send and we'll take care of the rest. 
        $results = $gateway->sendMessage($recipients, $message."\n".$addmess);
                
        }
        catch ( AfricasTalkingGatewayException $e )
        {
        
        }
}

echo json_encode($response);




?>