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
         <li><a href="Login.php?action=login">Login</a></li>
		<li><a href="register.php">Register</a></li> 
        <li><a href="contact.php">Contact</a></li>
       
      </ul>
    </div>
  </div>
  <div id="content">
    <div id="left">
         <div id = "body-id">  
		 		<?php
				
 
$sOutput .= '<div id="register-body">'; 
 
if (isset($_GET['action'])) { 
  switch (strtolower($_GET['action'])) { 
    case 'register': 
      if (isset($_POST['username']) && isset($_POST['password'])) { 
        if (createAccount($_POST['username'], $_POST['password'], $_POST['email'])) { 
          header("Location:./Login.php");
        }else { 
          // unset the action to display the registration form. 
          unset($_GET['action']); 
        }         
      }else { 
        $_SESSION['error'] = "Username and or Password was not supplied."; 
        unset($_GET['action']); 
      } 
    break; 
  } 
} 
 
// If the user is logged in display them a message. 
if (loggedIn()) { 
  $sOutput .= '<h2>Already Registered</h2> 
        You have already registered and are currently logged in as: ' . $_SESSION['username'] . '. 
        <h4>Click to go <a href="index.php?action=logout">home</a>?</h4>'; 
         
// If the action is not set, we want to display the registration form 
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
   
  $sOutput .= '<h2>Register for this site</h2> 
    ' . $sError . ' 
    <form name="register" method="post" action="' . $_SERVER['PHP_SELF'] . '?action=register"> 
      Username: <input type="text" name="username" value="' . $sUsername . '" /><br /> 
      Password: <input type="password" name="password" value="" /> <br/> 
      Email: <input type="text" name="email" value="" />
    <br/> 
      <br/> 
      <input type="submit" name="submit" value="Register!" /> 
    </form> 
    <br /> '; 
} 
 
$sOutput .= '</div>'; 
 
// display our output. 
echo $sOutput; 
				?>
    
     </div>
			
  <div id="footer">
    <p>Copyright Corey Crooks</div>
</div>
</body>
</html>

