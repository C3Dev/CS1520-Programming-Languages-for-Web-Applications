<?php
require_once('includes/config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Schedule</title>
</head>
<style>

body {
margin: auto;
padding: 0px;
height: 100%;
width: 80%;
word-wrap: break-word;
display:block;
}
.menu {
font-size: 14px;
margin: 0px 70px 0 0;
background: #3d6fa9;
height: 60px;
width: 100%;
margin-top: 40px;
padding: 0;
list-style: none;
}
.menu li {
	list-style: none;
    position: relative;
	float:left;
	display: list-item;
    text-align: -webkit-match-parent;
}
.menu li a {
float: left;
display: block;
height: 60px;
line-height: 60px;
padding: 0 35px;
font-size: 15px;
color: #ffffff;
text-align: center;
text-decoration: none;
font-weight: normal;
outline: none;
border: none;
font-family: 'Merienda One', cursive;
}
</style>
<body>
<body style="height:700px;background:#20C8EE">
<h1 style="margin:auto;text-align:center">Schedule Management System</h1>
<ul class="menu">
  <li><a href="new_schedule.php">Create a New Schedule</a></li>
  <li><a href="schedule_final_list.php">Finalize a schedule</a></li>
  <!-- For finalizing the schedule: 
  
  
   Finalize a schedule.  For this option the maker will select an already existent schedule from his / her list of schedules.  Finalizing the schedule will do the following:
i)      Count the number of users who have selected each available slot, and determine the slot with the greatest number of available users.  If there is a tie you may break it in an arbitrary way.
ii)    Send an email to the list of users for the schedule indicating the chosen slot (date and time, nicely formatted).
  
  
  --> 
  
    
  <li><a href="schedule_list.php">View Schedule</a></li>
  <li><a style="float:right" href="logout.php">Logout</a></li>
  <!-- logout... end session --> 
  
   </ul>
   <table width="80%" border="1" style="margin:auto;border-radius:10px;;-webkit-border-radius:10px;border-color:#CCCCCC;">
   <tr>
   <th width="10%">S. No.</th>
   <th width="60%">Schedule Name</th>
   <th width="30%">Options</th>
   </tr>
   <?php
   
$con=mysqli_connect('localhost', 'CrooksC', 'lulls.dug', 'CrooksC'); 
   $user_id = $_SESSION['user_id'];
  // echo $user_id;
   $q = "SELECT * FROM schedule where user_id = '$user_id' group by `schedule_id`";
  // echo $q;
   $r = mysqli_query($con, "SELECT * FROM schedule where user_id = '$user_id' group by `schedule_id`");
   $i=1;
   if(mysqli_num_rows($r))
   {
   while($row = mysqli_fetch_array($r,MYSQLI_BOTH)){?>  
	   <tr>
       <td><?php echo $i; $i++; ?></td>
       <td><?php echo $row['sc_name']; ?></td>
       <td><a href="schedule.php?id=<?php echo $row['schedule_id']; ?>" >View/Edit</a>&nbsp;<a href="schedule_final.php?id=<?php echo $row['schedule_id']; ?>">Send Mail</a>&nbsp;<a href="delete_schedule.php?id=<?php echo $row['schedule_id']; ?>" >Delete</a></td>
       </tr>
	  <?php }
	  }
	  else
	  {?>
      <tr>
      <td colspan="3">You have no Schedule Created Before. <a href="new_schedule.php">Click here</a> to create your first Schedule.</td>
      </tr>
      <?php
	  }?>
   </table>
</body>
</html>
