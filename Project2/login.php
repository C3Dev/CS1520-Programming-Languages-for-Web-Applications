
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>
<body style="height:700px;background:#20C8EE">


<?php

$con=mysqli_connect('localhost', 'CrooksC', 'lulls.dug', 'CrooksC'); 

if($con->connect_error):
die("Could not connect to db: " . $db->connect_error); 
endif; 

echo '<CENTER>';
echo '<h1 style="background-color:silver; width:470px;">Welcome! Please login to make schedules! </h1>';
echo '</CENTER>';

if(isset($_POST['submit_login']))
{
	$un = $_POST['username'];
	$up = $_POST['password'];
	
	
  $result = mysqli_query($con, "SELECT * from login where user_name = '$un' and user_password = '$up'");

	
	

	if(mysqli_num_rows($result))
	{
		$row = mysqli_fetch_array($result,MYSQLI_BOTH);
		session_start();
		$_SESSION['name'] = $un;
		$_SESSION['user_id'] = $row['user_id'];
		header('location:index.php');
		
	}
	else 
	{
		echo '<CENTER>';
		echo '<h4 style="color:yellow">Wrong Username or Password Please try again.</h4>';
		echo '</CENTER>';
		
			}
	}


?>
<form action="" enctype="multipart/form-data" method="post">
<table width="37%" height="200px;" border="1" style="margin:auto;margin-top:130px;">
  <tr>
    <td width="30%">Username:</td>
    <td width="70%"><label for="Username"></label>
      <input type="text" name="username" id="username" placeholder="username" required="required" /></td>
  </tr>
  <tr>
    <td>Password:</td>
    <td><label for="password"></label>
      <input type="text" name="password" placeholder="password" required="required" id="password" /></td>
  </tr>
  <tr>
    <td><input type="submit" name="submit_login" id="submit_login" value="Submit" /></td>
    <td><input type="reset" name="Reset" id="Reset" value="Reset" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><a href="reset_pass.php">Forgot Password?</a></td>
  </tr>
</table>
</form>
</body>
</html>