<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
  <li><?php if(@$_SESSION['user_id'] != ''){?><a style="float:right" href="logout.php">Logout</a><?php }else{?> <a style="float:right" href="login.php">Login</a><?php }?></li>
  <!-- logout... end session --> 
  
   </ul>
</body>
</html>
