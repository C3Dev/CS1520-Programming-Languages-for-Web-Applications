<?php

$con=mysqli_connect('localhost', 'CrooksC', 'lulls.dug', 'CrooksC'); 


if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}
 
echo 'Success... ' . "<br />";
echo 'Retrieving dumpfile' . "<br />";
 
$sql = file_get_contents('/afs/pitt.edu/home/c/c/ccc35/public/csweb/php/Assignment2/meeting.sql');
if (!$sql){
	die ('Error opening file');
}
 
echo 'processing file <br />';
mysqli_multi_query($con,$sql);
 
echo 'done.';
$con->close();

?>