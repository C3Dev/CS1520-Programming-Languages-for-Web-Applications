<?php 

session_start(); 
 
// Set the folder for our includes 
$sFolder = 'login';  
 

mysqli_connect('localhost', 'CrooksC', 'lulls.dug', 'CrooksC') or trigger_error("Unable to connect to the database: " . mysqli_error()); 
 
// require the function file 
require_once('functions.php'); 
 
// default the error variable to empty. 
$_SESSION['error'] = ""; 
 
// declare $sOutput so we do not have to do this on each page. 
$sOutput=""; 
?>