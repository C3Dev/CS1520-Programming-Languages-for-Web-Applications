<!DOCTYPE html> 
<html>
<?php

require('config.php'); 
 

$con = mysqli_connect('localhost', 'CrooksC', 'lulls.dug', 'CrooksC') or trigger_error("Unable to connect to the database: " . mysqli_error()); 
 
// value sent from form
if(isset($_POST['email'])){
$email = $_POST['email'];
$eEmail = mysqli_real_escape_string($con, $email); 
$sql="SELECT password FROM users WHERE email = '" . $eEmail . "' LIMIT 1"; 
$result=mysqli_query($con, $sql);
$count=mysqli_num_rows($result);
$sentmail = false; 
		if($count==1){
			$rows=mysqli_fetch_array($result);
			if(!empty($rows)){
				$your_password=$rows['password'];
				$to=$eEmail; 
				$subject="Your password here"; 
				$header="from: Corey <ccc35@pitt.edu>"; 
				$messages= "Your password for login to our website \r\n";
				$messages.="Your password is $your_password \r\n";
				$messages.="Please login to play Lingo \r\n";
			// send email 
			$sentmail = mail($to,$subject,$messages,$header); 
		
				}
		}
// else if $count not equal 1 
		else {
				echo "Not found your email in our database";
			}

// if your email succesfully sent 
if($sentmail){
echo " Your Password Has Been Sent To Your Email Address.";
echo "</br>";
  echo '<a href="Login.php">Click Here to Login</a>.'; 


}
else {
echo " Cannot send password to your e-mail address";
}
}
?>


	<title> Forgot Password </title>
		<head>	<h1> Please Enter in your email address </h1> </head>
		<body>
			<form name = "input" action="forgot.php" method = "post">
				Email: <input type = "text" name = "email">
					<input type = "submit" value = "Submit">
				</form>
		<body>
</html>
		