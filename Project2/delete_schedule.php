<?php
$con=mysqli_connect('localhost', 'CrooksC', 'lulls.dug', 'CrooksC'); 
$sc_id = $_REQUEST['id'];
$q = "DELETE FROM `schedule` WHERE `schedule_id` = '$sc_id'";
echo $q;
$r = $con->query($q);
$q = "DELETE FROM `sc_user` WHERE `schedule_id` = '$sc_id'";
echo $q;
$r = $con->query($q);
$q = "DELETE FROM `schedule_count` WHERE `sc_id` = '$sc_id'";
echo $q;
$r = $con->query($q);
header('Location:schedule_list.php');
?>