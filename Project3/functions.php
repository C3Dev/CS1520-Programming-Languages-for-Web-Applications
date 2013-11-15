<?php 

 $con = mysqli_connect('localhost','CrooksC','lulls.dug','CrooksC');
 
function createAccount($pUsername, $pPassword, $pEmail) { 
  // First check we have data passed in.  		
  if (!empty($pUsername) && !empty($pPassword) && !empty($pEmail)) { 
    $uLen = strlen($pUsername); 
    $pLen = strlen($pPassword); 
     $con = mysqli_connect('localhost','CrooksC','lulls.dug','CrooksC');
 
    // escape the $pUsername to avoid SQL Injections 
    $eUsername = mysqli_real_escape_string($con, $pUsername); 
    $sql = "SELECT username FROM users WHERE username = '" . $eUsername . "' LIMIT 1"; 
 	$numRounds = 0; 
 	$numWon = 0; 
    // Note the use of trigger_error instead of or die. 
    $query = mysqli_query($con, $sql) or trigger_error("Query Failed: " . mysqli_error()); 
 
    // Error checks (Should be explained with the error) 
    if ($uLen <= 4 || $uLen >= 11) { 
      $_SESSION['error'] = "Username must be between 4 and 11 characters."; 
    }elseif ($pLen < 6) { 
      $_SESSION['error'] = "Password must be longer then 6 characters."; 
    }elseif (mysqli_num_rows($query) == 1) { 
      $_SESSION['error'] = "Username already exists."; 
    }else { 
      // All errors passed lets 
      // Create our insert SQL by hashing the password and using the escaped Username. 
      $sql = "INSERT INTO users (`username`, `password`, `email`, `num_rounds`, `num_wins`) VALUES ('" . $eUsername . "', '" . $pPassword . "', '" . $pEmail . "', 0, 0);"; 
       
      $query = mysqli_query($con, $sql) or trigger_error("Query Failed: " . mysqli_error()); 
       
      if ($query) { 
        return true; 
      }   
    } 
  } 
   
  return false; 
} 

/*********** 
  bool loggedIn 
    verifies that session data is in tack 
    and the user is valid for this session. 
************/ 
function loggedIn() { 
  // check both loggedin and username to verify user. 
  if (isset($_SESSION['loggedin']) && isset($_SESSION['username'])) { 
    return true; 
  } 
   
  return false; 
} 
 
/*********** 
  bool logoutUser  
    Log out a user by unsetting the session variable. 
************/ 
function logoutUser() { 
  // using unset will remove the variable 
  // and thus logging off the user. 
  unset($_SESSION['username']); 
  unset($_SESSION['loggedin']); 
   
  return true; 
} 
 
/*********** 
  bool validateUser 
    Attempt to verify that a username / password 
    combination are valid. If they are it will set 
    cookies and session data then return true.  
    If they are not valid it simply returns false.  
************/ 
function validateUser($pUsername, $pPassword) { 
  // See if the username and password are valid. 
  $con = mysqli_connect('localhost','CrooksC','lulls.dug','CrooksC');
 
  $sql = "SELECT username FROM users  
    WHERE username = '" . mysqli_real_escape_string($con, $pUsername) . "' AND password = '" . $pPassword . "' LIMIT 1"; 
  $query = mysqli_query($con, $sql) or trigger_error("Query Failed: " . mysql_error()); 
   
  // If one row was returned, the user was logged in! 
  if (mysqli_num_rows($query) == 1) { 
    $row = mysqli_fetch_assoc($query); 
    $_SESSION['username'] = $row['username']; 
    $_SESSION['loggedin'] = true; 
       
    return true; 
  } 
   
   
  return false; 
} 
?>