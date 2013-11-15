<?php
require_once("configure.php");
require_once("update.php");
$con = mysqli_connect('localhost','CrooksC','lulls.dug','CrooksC');
$configure = new Configure(); // create new object of the class. 
$update = new Update(); 
$configure->InitDB(); 
$configure->DBLogin();
$update->createTable(); 
$update->insertTable(); 




$configure->SetRandomKey('qSRcVS6DrTzrPvr'); 

$configure->CreateTable(); 

?>