<?php 
require('config.php'); 
?>

<!DOCTYPE html>
<html>
<head>
<title>Contact</title>
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>
<body>
<div id="wrap">
  <div id="top">
    <h2> <a href = "index.php">Corey Crooks Lingo</a></h2>
    <div id="menu">
      <ul>
        <li><a href="index.php" class="current">Home</a></li>
        <?php  if (!loggedIn()) {  echo '<li><a href="Login.php?action=login">Login</a></li>'; }?>
        <?php  if(loggedIn()){ echo '<li><a href="Login.php?action=logout">Logout</a></li>'; } ?> 
      <li><a href="register.php">Register</a></li> 
        <li><a href="contact.php">Contact</a></li>
       
      </ul>
    </div>
  </div>
  <div id="content">
    <div id="left">
         <div id = "body-id">  

		 
      <p>Welcome to my CS 1520 Assignment 3 Project</p>
      <p> My name is Corey Crooks and I am currently a senior at the University of Pittsburgh. </p>
      <p>To contact me email ccc35@pitt.edu </p>
      <p>The assignment due date is 11/15/14 </p> 	

     </div>
			
  <div id="footer">
    <p>Copyright Corey Crooks</div>
</div>
</body>
</html>
