<?php

include_once("../config/config.php");
$bdd = new db(); // create a new object, class db()
//header('location:cancle.php');
$id = $_GET['id'];

$query = "DELETE FROM transactions  WHERE id='$id'";

$result = $bdd->execute($query);

if($result==1){
    header('location:/mandelaweb/dashboard/viewtransactions.php');
    }else{
    header('location:/mandelaweb/dashboard/viewtransations.php');
}
?>