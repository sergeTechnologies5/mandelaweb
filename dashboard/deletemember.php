<?php

include_once("../config/config.php");

$bdd = new db(); // create a new object, class db()
//header('location:cancle.php');
$id = $_GET['id'];

$query = "DELETE FROM members WHERE id='$id'";

include_once("../config/config.php");
$bdd = new db();

$result = $bdd->execute($query);

if($result>=1){
    header('location:/mandelaweb/dashboard/cancle.php');
    }else{
    header('location:/mandelaweb/dashboard/index.php');
}
?>