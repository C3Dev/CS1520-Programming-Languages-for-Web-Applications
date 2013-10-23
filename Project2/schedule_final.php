<?php
require_once('includes/config.php');
$sc_id = $_REQUEST['id'];

$con=mysqli_connect('localhost', 'CrooksC', 'lulls.dug', 'CrooksC'); 
$q = "SELECT * FROM sc_user WHERE `schedule_id` = '$sc_id'";
//echo $q;
$r = mysqli_query($con, "SELECT * FROM sc_user WHERE `schedule_id` = '$sc_id'");
while($row = mysqli_fetch_array($r, MYSQLI_BOTH))
{

    $from = 'ccc35@pitt.edu';
	$to = $row['sc_email'];
	$subject = 'Link of your Schedule';
	$headers = "From: ".$from." \r\n";
	$headers .= "Reply-To: ".$from." \r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	$message = '<html><body>';
	$message .= '<h5> Hi Check this link for your Schedule <a href="cs1520.cs.pitt.edu/~ccc35/php/Assignment2/schedule_user.php?sid='.$sc_id.'&u='.$row['sc_user_id'].'">schedule</a></h5>';
	$message .= "</body></html>";
	echo $message;
	$m = mail($to,$subject,$message,$headers);
	/*
	//if($m)
	{
			echo "<h3>Link is sent to the Users via Emails.</h3>";
			echo '<META http-equiv="refresh" content="5;URL=http://'.$_SERVER['SERVER_NAME'].'/meeting">';
			echo '<h4>This Page automatically redirect to home page in 10 Second If not <a href="index.php">Click here</a></h4>';
	}	
	*/ 
	header('location:index.php');
}
?>