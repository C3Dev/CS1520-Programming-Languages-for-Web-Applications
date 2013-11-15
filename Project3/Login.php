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
		<?php if (loggedIn()) { echo '<li><a href="Login.php?action=logout">Logout</a></li>';}
			else { echo '<li><a href="Login.php?action=login">Login</a></li>';}
		 ?>
		<li><a href="register.php">Register</a></li> 
        <li><a href="contact.php">Contact</a></li>
       
      </ul>
    </div>
  </div>
  <div id="content">
    <div id="left">
         <div id = "body-id">  
		 		<?php
				
					// If the user is logging in or out 
// then lets execute the proper functions 
if (isset($_GET['action'])) { 
  switch (strtolower($_GET['action'])) { 
    case 'login': 
      if (isset($_POST['username']) && isset($_POST['password'])) { 
        // We have both variables. Pass them to our validation function 
        if (!validateUser($_POST['username'], $_POST['password'])) { 
          // Well there was an error. Set the message and unset 
          // the action so the normal form appears. 
          $_SESSION['error'] = "Bad username or password supplied."; 
          unset($_GET['action']); 
        } 
      }else { 
        $_SESSION['error'] = "Username and Password are required to login. " . '<br>'; 
        unset($_GET['action']); 
      }       
    break; 
    case 'logout': 
      // If they are logged in log them out. 
      // If they are not logged in, well nothing needs to be done. 
      if (loggedIn()) { 
        logoutUser(); 
        $sOutput .= '<h1>Logged out!</h1><br />You have been logged out successfully.  
            <br /><h4>Thank You For Playing!'; 
      }else { 
        // unset the action to display the login form. 
        unset($_GET['action']); 
      } 
    break; 
  } 
} 
 
$sOutput .= '<div id="index-body">'; 

if (loggedIn()) { 

  $sOutput .= '<h1>Welcome to the Game of Lingo</h1><br /><br /> 
    Hello, ' . $_SESSION["username"] . ' are you ready to play?<br /><br /> 
   <br />
   
   	 
      <p>Rules:</p>
      <ul>
        <li>You have 5 guesses to complete the word.</li>
        <li>The first letter of the word is given to you. </li>
        <li>You have 15 seconds to guess a word.</li>
        <li>If the character lights up black, the character is not in the word.</li>
        <li>If the character lights up blue, the character is in the word but in the wrong position.</li>
		<li>If the word is red, then the character is in the correct position. </li>
	</ul> '; 
    
    
    
    
    
    
    
}elseif (!isset($_GET['action'])) { 
  // incase there was an error  
  // see if we have a previous username 
  $sUsername = ""; 
  if (isset($_POST['username'])) { 
    $sUsername = $_POST['username']; 
  } 
   
  $sError = ""; 
  if (isset($_SESSION['error'])) { 
    $sError = '<span id="error">' . $_SESSION['error'] . '</span><br />'; 
  } 
   
  $sOutput .= '<h1>Login to Play Lingo </h1><br /> 
    <div id="login-form"> 
      ' . $sError . ' 
      <form name="login" method="post" action="Login.php?action=login"> 
        Username: <input type="text" name="username" value="' . $sUsername . '" /><br /> 
        Password: <input type="password" name="password" value="" /><br /><br /> 
        <input type="submit" name="submit" value="Login" /> 
  		 <a href="forgot.php">Forgot Password</a>
        </form> 
    </div>     '; 
} 
 
$sOutput .= '</div>'; 
 
// lets display our output string. 
echo $sOutput; 
				
				?>
    
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
