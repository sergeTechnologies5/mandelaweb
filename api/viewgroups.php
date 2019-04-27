<?php
    include_once("../config/config.php");
    $bdd = new db();
    //build query
    
    $query = "SELECT id,email,description FROM admins";
    //Execute query
        $groups = $bdd->getAll($query); // select ALL from allrecoards	
        $count = count($groups);
        echo($count);
        if($count>=1){
            echo(json_encode(array('status'=>'sucess','message'=>'all groups fetched success','data'=>$groups)));
        }else{
            echo(json_encode(array('status'=>'fail','message'=>'login failed','data'=>'null')));
  }

?>