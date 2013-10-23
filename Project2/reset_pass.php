
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reset Password</title>
</head>
<?php
if(isset($_POST['submit_reset']))
{
	
	$con=mysqli_connect('localhost', 'CrooksC', 'lulls.dug', 'CrooksC'); 
	$email = $_POST['email'];
	$q = "SELECT * from login where user_email = '$email'";
	//echo $q;
	$r = mysqli_query($con,$q);
	$row = mysqli_fetch_array($r, MYSQLI_BOTH);
	$from = 'Your Email';
	$to = $email;
	$subject = 'Password Recovery';
	$headers = "From: ".$from." \r\n";
	$headers .= "Reply-To: ".$from." \r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	$message = '<html><body>';
	$message .= "<h4> Hi Your Password is ".$row['user_password']."</h4>";
	$message .= "</body></html>";
	$m = mail($to,$subject,$message,$headers);
	if($m)
	{
			echo "<h3>Please Check your email for your password.</h3>";
	}

}
	?>
<body style="height:700px;">
<form action="" enctype="multipart/form-data" method="post">
<table width="37%" height="200px;" border="1" style="margin:auto;margin-top:130px;">
  <tr>
    <td width="30%">Email:</td>
    <td width="70%"><label for="email"></label>
      <input type="email" required="required" name="email" id="email" /></td>
  </tr>
  <tr>
    <td><input type="submit" name="submit_reset" id="submit_login" value="Recover Password" /></td>
    <td><input type="reset" name="Reset" id="Reset" value="Reset" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><a href="login.php">Back to Login</a></td>
  </tr>
</table>
</form>
</body>
</html>