<?php 

require('config.php'); 

?>

<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>
<body>
<div id="wrap">
  <div id="top">
    <h2> Corey Crooks Lingo</h2>
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
		 		<?php 
			
$sOutput .= '<div id="body-id">'; 
if (loggedIn()) { 
  $sOutput .= ' Welcome, ' . $_SESSION['username'];  
}else { 
  $sOutput .= '<h2>Welcome to Lingo</h2><br />';
} 
$sOutput .= '</div>'; 

echo $sOutput;  
?>
		 
      <p>Rules:</p>
      <ul>
        <li>You have 5 guesses to complete the word.</li>
        <li>The first letter of the word is given to you. </li>
        <li>You have 15 seconds to guess a word.</li>
        <li>If the character lights up black, the character is not in the word.</li>
        <li>If the character lights up blue, the character is in the word but in the wrong position.</li>
		<li>If the word is red, then the character is in the correct position. </li>
	</ul>
    
	<?php
	if (loggedIn()) { 

	echo '<br> Would you like to <a href="lingoHome.php" class="current">play? </a>'; 
	}?>
     </div>
			
  <div id="footer">
    <p>Copyright Corey Crooks</div>
</div>
</body>
</html>
