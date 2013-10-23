<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Create a New Schedule</title>
</head>
<?php
require_once('includes/config.php');
if(isset($_POST['new_schedule']))
{

$con=mysqli_connect('localhost', 'CrooksC', 'lulls.dug', 'CrooksC'); 

	 $user_id = $_SESSION['user_id'];
	 $q = "SELECT * from schedule_count order by sc_id DESC";
	 $r = mysqli_query($con, $q);
	 $row = mysqli_fetch_array($r, MYSQLI_BOTH);
	 $sc_id = $row['sc_id'];
	 $sc_id++;
	 $sc_count = 0;
     $sc_name = $_POST['sc_name'];
	 $date1 = @$_POST['date1'];
	 $date2 = @$_POST['date2'];
	 $date3 = @$_POST['date3'];
	 $date4 = @$_POST['date4'];
	 $date5 = @$_POST['date5'];
	 $time1 = @$_POST['time1'];
	 $time2 = @$_POST['time2'];
	 $time3 = @$_POST['time3'];
	 $time4 = @$_POST['time4'];
	 $time5 = @$_POST['time5'];
	 $time6 = @$_POST['time6'];
	 $time7 = @$_POST['time7'];
	 $time8 = @$_POST['time8'];
	 $time9 = @$_POST['time9'];
	 $time10 = @$_POST['time10'];
	 $time11 = @$_POST['time11'];
	 $time12 = @$_POST['time12'];
	 $time13 = @$_POST['time13'];
	 $time14 = @$_POST['time14'];
	 $time15 = @$_POST['time15'];
	 $time16 = @$_POST['time16'];
	 $time17 = @$_POST['time17'];
	 $time18 = @$_POST['time18'];
	 $time19 = @$_POST['time19'];
	 $time20 = @$_POST['time20'];
	 if($date1 != '')
	 {
		 $sc_dt = $date1.'^';
		     if($time1 != '')
		     {
		     
			   $sc_dt .= $time1;
			   $sc_count++; 
	         }
		     if($time2 != '')
		     {
			  $sc_count++;
			  $sc_dt .= '|'.$time2; 
			 }
			 if($time3 != '')
		     {
				$sc_count++;
			    $sc_dt .= '|'.$time3; 
			 }
			 if($time4 != '')
		     { 
			    $sc_count++;
			    $sc_dt .= '|'.$time4; 
			 }
			 
			 
			 
			 $q = "INSERT INTO meeting . schedule (`user_id`, `schedule_id`, `sc_name`, `sc_dt`) VALUES ('$user_id', '$sc_id', '$sc_name', '$sc_dt');";
			 
	 
			   
			 mysqli_query($con, "INSERT INTO schedule (`user_id`, `schedule_id`, `sc_name`, `sc_dt`) VALUES ('$user_id', '$sc_id', '$sc_name', '$sc_dt');");
		
			 echo "1 row inserted";
		}
		if($date2 != '')
	 {
		 $sc_dt = $date2.'^';
		     if($time5 != '')
		     {
			     $sc_count++;
				 $sc_dt .= $time5; 
	         }
		     if($time6 != '')
		     {
				$sc_count++; 
			    $sc_dt .= '|'.$time6; 
			 }
			 if($time7 != '')
		     {
			     $sc_count++;
				 $sc_dt .= '|'.$time7; 
			 }
			 if($time8 != '')
		     {
			     $sc_count++;
				 $sc_dt .= '|'.$time8; 
			 }
			 
			 $q = "INSERT INTO meeting . schedule (`user_id`, `schedule_id`, `sc_name`, `sc_dt`) VALUES ('$user_id', '$sc_id', '$sc_name', '$sc_dt');";
			
			
			mysqli_query($con, "INSERT INTO schedule (`user_id`, `schedule_id`, `sc_name`, `sc_dt`) VALUES ('$user_id', '$sc_id', '$sc_name', '$sc_dt');");
			



			 echo "1 row inserted";
		}
		if($date3 != '')
	 {
		 $sc_dt = $date3.'^';
		     if($time9 != '')
		     {
				 $sc_count++;
			     $sc_dt .= $time9; 
	         }
		     if($time10 != '')
		     {
				 $sc_count++;
			     $sc_dt .= '|'.$time10; 
			 }
			 if($time11 != '')
		     {
				 $sc_count++;
			     $sc_dt .= '|'.$time11; 
			 }
			 if($time12 != '')
		     {
				 $sc_count++;
			     $sc_dt .= '|'.$time12; 
			 }
			 $q = "INSERT INTO meeting . schedule (`user_id`, `schedule_id`, `sc_name`, `sc_dt`) VALUES ('$user_id', '$sc_id', '$sc_name', '$sc_dt');";
		
		    mysqli_query($con, "INSERT INTO schedule (`user_id`, `schedule_id`, `sc_name`, `sc_dt`) VALUES ('$user_id', '$sc_id', '$sc_name', '$sc_dt');");
			 echo "1 row inserted";
		}
		if($date4 != '')
	 {
		 $sc_dt = $date4.'^';
		     if($time13 != '')
		     {
				 $sc_count++;
			     $sc_dt .= $time13; 
	         }
		     if($time14 != '')
		     {
				 $sc_count++;
			     $sc_dt .= '|'.$time14; 
			 }
			 if($time15 != '')
		     {
				 $sc_count++;
			     $sc_dt .= '|'.$time15; 
			 }
			 if($time16 != '')
		     {
				 $sc_count++;
			     $sc_dt .= '|'.$time16; 
			 }
			 $q = "INSERT INTO meeting . schedule (`user_id`, `schedule_id`, `sc_name`, `sc_dt`) VALUES ('$user_id', '$sc_id', '$sc_name', '$sc_dt');";
				
			mysqli_query($con, "INSERT INTO schedule(`user_id`, `schedule_id`, `sc_name`, `sc_dt`) VALUES ('$user_id', '$sc_id', '$sc_name', '$sc_dt');");
			
			
			
			
			 echo "1 row inserted";
		}
		if($date5 != '')
	 {
		 $sc_dt = $date5.'^';
		     if($time17 != '')
		     {
				 $sc_count++;
			     $sc_dt .= $time17; 
	         }
		     if($time18 != '')
		     {
				 $sc_count++;
			     $sc_dt .= '|'.$time18; 
			 }
			 if($time19 != '')
		     {
				 $sc_count++;
			     $sc_dt .= '|'.$time19; 
			 }
			 if($time20 != '')
		     {
				 $sc_count++;
			     $sc_dt .= '|'.$time20; 
			 }
			 $q = "INSERT INTO meeting . schedule (`user_id`, `schedule_id`, `sc_name`, `sc_dt`) VALUES ('$user_id', '$sc_id', '$sc_name', '$sc_dt');";
			
			mysqli_query($con, "INSERT INTO schedule (`user_id`, `schedule_id`, `sc_name`, `sc_dt`) VALUES ('$user_id', '$sc_id', '$sc_name', '$sc_dt');");
			
			
			 echo "1 row inserted";
		}
	 $sc_user1 = @$_POST['sc_user1'];
	 $sc_user1_email = @$_POST['sc_user1_email'];
	 $sc_user2 = @$_POST['sc_user2'];
	 $sc_user2_email = @$_POST['sc_user2_email'];
	 $sc_user3 = @$_POST['sc_user3'];
	 $sc_user3_email = @$_POST['sc_user3_email'];
	 $sc_user4 = @$_POST['sc_user4'];
	 $sc_user4_email = @$_POST['sc_user4_email'];
	 $sc_user5 = @$_POST['sc_user5'];
	 $sc_user5_email = @$_POST['sc_user5_email'];
	 
	 if($sc_user1 != '')
	 {
		 $q = "INSERT INTO meeting . sc_user (`user_id`, `schedule_id`, `sc_user`, `sc_email`, `sc_user_schedule`) VALUES ('$user_id', '$sc_id', '$sc_user1', '$sc_user1_email', '$sc_user1');";
	     
	     

	     mysqli_query($con, "INSERT INTO sc_user(`user_id`, `schedule_id`, `sc_user`, `sc_email`, `sc_user_schedule`) VALUES ('$user_id', '$sc_id', '$sc_user1', '$sc_user1_email', '$sc_user1');");
	     
	     echo "1 row inserted";
		 
		 }
	if($sc_user2 != '')
	 {
		 $q = "INSERT INTO meeting . sc_user (`user_id`, `schedule_id`, `sc_user`, `sc_email`, `sc_user_schedule`) VALUES ('$user_id', '$sc_id', '$sc_user2', '$sc_user2_email', '$sc_user2');";
	     
	  
	     mysqli_query($con,"INSERT INTO sc_user(`user_id`, `schedule_id`, `sc_user`, `sc_email`, `sc_user_schedule`) VALUES ('$user_id', '$sc_id', '$sc_user2', '$sc_user2_email', '$sc_user2');");
	     
	     echo "1 row inserted";
		 
		 }
	if($sc_user3 != '')
	 {
		 $q = "INSERT INTO meeting . sc_user (`user_id`, `schedule_id`, `sc_user`, `sc_email`, `sc_user_schedule`) VALUES ('$user_id', '$sc_id', '$sc_user3', '$sc_user3_email', '$sc_user3');";
	  
	    mysqli_query($con, "INSERT INTO sc_user (`user_id`, `schedule_id`, `sc_user`, `sc_email`, `sc_user_schedule`) VALUES ('$user_id', '$sc_id', '$sc_user3', '$sc_user3_email', '$sc_user3');");
	    
	     echo "1 row inserted";
		 
		 }
	if($sc_user4 != '')
	 {
		 $q = "INSERT INTO meeting . sc_user (`user_id`, `schedule_id`, `sc_user`, `sc_email`, `sc_user_schedule`) VALUES ('$user_id', '$sc_id', '$sc_user4', '$sc_user4_email', '$sc_user4');";
	   
	 
	    mysqli_query($con, "INSERT INTO sc_user (`user_id`, `schedule_id`, `sc_user`, `sc_email`, `sc_user_schedule`) VALUES ('$user_id', '$sc_id', '$sc_user4', '$sc_user4_email', '$sc_user4');");
	     echo "1 row inserted";
		 
		 }
	if($sc_user5 != '')
	 {
		 $q = "INSERT INTO meeting . sc_user (`user_id`, `schedule_id`, `sc_user`, `sc_email`, `sc_user_schedule`) VALUES ('$user_id', '$sc_id', '$sc_user5', '$sc_user5_email', '$sc_user5');";
	 
	     mysqli_query($con, "INSERT INTO sc_user(`user_id`, `schedule_id`, `sc_user`, `sc_email`, `sc_user_schedule`) VALUES ('$user_id', '$sc_id', '$sc_user5', '$sc_user5_email', '$sc_user5');");
	    
	     echo "1 row inserted";
		 
	}
	$q = "INSERT INTO meeting . schedule_count (`sc_id`, `sc_count`) VALUES ('$sc_id', '$sc_count')";
	

	mysqli_query($con, "INSERT INTO schedule_count(`sc_id`, `sc_count`) VALUES ('$sc_id', '$sc_count')");
    header('Location:index.php');
}
?>
<body>

<body style="height:700px;background:#20C8EE">
<form id="form1" name="form1" method="post" action="">
  <table width="64%" border="1">
    <tr>
      <th colspan="2">New Schedule</th>
    </tr>
    <tr>
    <td>Enter the Name of schedule:*</td>
    <td><label for="sc_name"></label>
      <input type="text" name="sc_name" id="sc_name"  required="required"/></td>
    </tr>
    <tr>
      <td width="34%">Enter the date 1 of schedule:*</td>
      <td width="66%"><label for="date"></label>
      <input type="text" name="date1" placeholder="yyyy-mm-dd" required="required" id="date1" /></td>
    </tr>
    <tr>
      <td>Enter the times of date1 of schedule:</td>
      <td><label for="time"></label>
        <select name="time1" id="time">
          <option value="" selected="selected">--Select--</option>
          <option value="1:00">1:00</option>
          <option value="2:00">2:00</option>
          <option value="3:00">3:00</option>
          <option value="4:00">4:00</option>
          <option value="5:00">5:00</option>
          <option value="6:00">6:00</option>
          <option value="7:00">7:00</option>
          <option value="8:00">8:00</option>
          <option value="9:00">9:00</option>
          <option value="10:00">10:00</option>
          <option value="11:00">11:00</option>
          <option value="12:00">12:00</option>
          <option value="13:00">13:00</option>
          <option value="14:00">14:00</option>
          <option value="15:00">15:00</option>
          <option value="16:00">16:00</option>
          <option value="17:00">17:00</option>
          <option value="18:00">18:00</option>
          <option value="19:00">19:00</option>
          <option value="20:00">20:00</option>
          <option value="21:00">21:00</option>
          <option value="22:00">22:00</option>
          <option value="23:00">23:00</option>
          <option value="24:00">24:00</option>
          
      </select>
       <select name="time2" id="time">
          <option value="" selected="selected">--Select--</option>
          <option value="1:00">1:00</option>
          <option value="2:00">2:00</option>
          <option value="3:00">3:00</option>
          <option value="4:00">4:00</option>
          <option value="5:00">5:00</option>
          <option value="6:00">6:00</option>
          <option value="7:00">7:00</option>
          <option value="8:00">8:00</option>
          <option value="9:00">9:00</option>
          <option value="10:00">10:00</option>
          <option value="11:00">11:00</option>
          <option value="12:00">12:00</option>
          <option value="13:00">13:00</option>
          <option value="14:00">14:00</option>
          <option value="15:00">15:00</option>
          <option value="16:00">16:00</option>
          <option value="17:00">17:00</option>
          <option value="18:00">18:00</option>
          <option value="19:00">19:00</option>
          <option value="20:00">20:00</option>
          <option value="21:00">21:00</option>
          <option value="22:00">22:00</option>
          <option value="23:00">23:00</option>
          <option value="24:00">24:00</option>
          
      </select>
       <select name="time3" id="time">
          <option value="" selected="selected">--Select--</option>
          <option value="1:00">1:00</option>
          <option value="2:00">2:00</option>
          <option value="3:00">3:00</option>
          <option value="4:00">4:00</option>
          <option value="5:00">5:00</option>
          <option value="6:00">6:00</option>
          <option value="7:00">7:00</option>
          <option value="8:00">8:00</option>
          <option value="9:00">9:00</option>
          <option value="10:00">10:00</option>
          <option value="11:00">11:00</option>
          <option value="12:00">12:00</option>
          <option value="13:00">13:00</option>
          <option value="14:00">14:00</option>
          <option value="15:00">15:00</option>
          <option value="16:00">16:00</option>
          <option value="17:00">17:00</option>
          <option value="18:00">18:00</option>
          <option value="19:00">19:00</option>
          <option value="20:00">20:00</option>
          <option value="21:00">21:00</option>
          <option value="22:00">22:00</option>
          <option value="23:00">23:00</option>
          <option value="24:00">24:00</option>
          
      </select>
       <select name="time4" id="time">
          <option value="" selected="selected">--Select--</option>
          <option value="1:00">1:00</option>
          <option value="2:00">2:00</option>
          <option value="3:00">3:00</option>
          <option value="4:00">4:00</option>
          <option value="5:00">5:00</option>
          <option value="6:00">6:00</option>
          <option value="7:00">7:00</option>
          <option value="8:00">8:00</option>
          <option value="9:00">9:00</option>
          <option value="10:00">10:00</option>
          <option value="11:00">11:00</option>
          <option value="12:00">12:00</option>
          <option value="13:00">13:00</option>
          <option value="14:00">14:00</option>
          <option value="15:00">15:00</option>
          <option value="16:00">16:00</option>
          <option value="17:00">17:00</option>
          <option value="18:00">18:00</option>
          <option value="19:00">19:00</option>
          <option value="20:00">20:00</option>
          <option value="21:00">21:00</option>
          <option value="22:00">22:00</option>
          <option value="23:00">23:00</option>
          <option value="24:00">24:00</option>
          
      </select></td>
    </tr>
    <tr>
      <td width="34%">Enter the date 2 of schedule:</td>
      <td width="66%"><label for="date"></label>
      <input type="text" name="date2" placeholder="yyyy-mm-dd" id="date2" /></td>
    </tr>
    <tr>
      <td>Enter the times of date 2 of schedule:</td>
      <td><label for="time"></label>
        <select name="time5" id="time">
          <option value="" selected="selected">--Select--</option>
          <option value="1:00">1:00</option>
          <option value="2:00">2:00</option>
          <option value="3:00">3:00</option>
          <option value="4:00">4:00</option>
          <option value="5:00">5:00</option>
          <option value="6:00">6:00</option>
          <option value="7:00">7:00</option>
          <option value="8:00">8:00</option>
          <option value="9:00">9:00</option>
          <option value="10:00">10:00</option>
          <option value="11:00">11:00</option>
          <option value="12:00">12:00</option>
          <option value="13:00">13:00</option>
          <option value="14:00">14:00</option>
          <option value="15:00">15:00</option>
          <option value="16:00">16:00</option>
          <option value="17:00">17:00</option>
          <option value="18:00">18:00</option>
          <option value="19:00">19:00</option>
          <option value="20:00">20:00</option>
          <option value="21:00">21:00</option>
          <option value="22:00">22:00</option>
          <option value="23:00">23:00</option>
          <option value="24:00">24:00</option>
          
      </select>
       <select name="time6" id="time">
          <option value="" selected="selected">--Select--</option>
          <option value="1:00">1:00</option>
          <option value="2:00">2:00</option>
          <option value="3:00">3:00</option>
          <option value="4:00">4:00</option>
          <option value="5:00">5:00</option>
          <option value="6:00">6:00</option>
          <option value="7:00">7:00</option>
          <option value="8:00">8:00</option>
          <option value="9:00">9:00</option>
          <option value="10:00">10:00</option>
          <option value="11:00">11:00</option>
          <option value="12:00">12:00</option>
          <option value="13:00">13:00</option>
          <option value="14:00">14:00</option>
          <option value="15:00">15:00</option>
          <option value="16:00">16:00</option>
          <option value="17:00">17:00</option>
          <option value="18:00">18:00</option>
          <option value="19:00">19:00</option>
          <option value="20:00">20:00</option>
          <option value="21:00">21:00</option>
          <option value="22:00">22:00</option>
          <option value="23:00">23:00</option>
          <option value="24:00">24:00</option>
          
      </select>
       <select name="time7" id="time">
          <option value="" selected="selected">--Select--</option>
          <option value="1:00">1:00</option>
          <option value="2:00">2:00</option>
          <option value="3:00">3:00</option>
          <option value="4:00">4:00</option>
          <option value="5:00">5:00</option>
          <option value="6:00">6:00</option>
          <option value="7:00">7:00</option>
          <option value="8:00">8:00</option>
          <option value="9:00">9:00</option>
          <option value="10:00">10:00</option>
          <option value="11:00">11:00</option>
          <option value="12:00">12:00</option>
          <option value="13:00">13:00</option>
          <option value="14:00">14:00</option>
          <option value="15:00">15:00</option>
          <option value="16:00">16:00</option>
          <option value="17:00">17:00</option>
          <option value="18:00">18:00</option>
          <option value="19:00">19:00</option>
          <option value="20:00">20:00</option>
          <option value="21:00">21:00</option>
          <option value="22:00">22:00</option>
          <option value="23:00">23:00</option>
          <option value="24:00">24:00</option>
          
      </select>
       <select name="time8" id="time">
          <option value="" selected="selected">--Select--</option>
          <option value="1:00">1:00</option>
          <option value="2:00">2:00</option>
          <option value="3:00">3:00</option>
          <option value="4:00">4:00</option>
          <option value="5:00">5:00</option>
          <option value="6:00">6:00</option>
          <option value="7:00">7:00</option>
          <option value="8:00">8:00</option>
          <option value="9:00">9:00</option>
          <option value="10:00">10:00</option>
          <option value="11:00">11:00</option>
          <option value="12:00">12:00</option>
          <option value="13:00">13:00</option>
          <option value="14:00">14:00</option>
          <option value="15:00">15:00</option>
          <option value="16:00">16:00</option>
          <option value="17:00">17:00</option>
          <option value="18:00">18:00</option>
          <option value="19:00">19:00</option>
          <option value="20:00">20:00</option>
          <option value="21:00">21:00</option>
          <option value="22:00">22:00</option>
          <option value="23:00">23:00</option>
          <option value="24:00">24:00</option>
          
      </select></td>
    </tr>
    <tr>
      <td width="34%">Enter the date 3 of schedule:</td>
      <td width="66%"><label for="date3"></label>
      <input type="text" name="date3" placeholder="yyyy-mm-dd" id="date3" /></td>
    </tr>
    <tr>
      <td>Enter the times of date 3 of schedule:</td>
      <td><label for="time"></label>
        <select name="time9" id="time">
          <option value="" selected="selected">--Select--</option>
          <option value="1:00">1:00</option>
          <option value="2:00">2:00</option>
          <option value="3:00">3:00</option>
          <option value="4:00">4:00</option>
          <option value="5:00">5:00</option>
          <option value="6:00">6:00</option>
          <option value="7:00">7:00</option>
          <option value="8:00">8:00</option>
          <option value="9:00">9:00</option>
          <option value="10:00">10:00</option>
          <option value="11:00">11:00</option>
          <option value="12:00">12:00</option>
          <option value="13:00">13:00</option>
          <option value="14:00">14:00</option>
          <option value="15:00">15:00</option>
          <option value="16:00">16:00</option>
          <option value="17:00">17:00</option>
          <option value="18:00">18:00</option>
          <option value="19:00">19:00</option>
          <option value="20:00">20:00</option>
          <option value="21:00">21:00</option>
          <option value="22:00">22:00</option>
          <option value="23:00">23:00</option>
          <option value="24:00">24:00</option>
          
      </select>
       <select name="time10" id="time">
          <option value="" selected="selected">--Select--</option>
          <option value="1:00">1:00</option>
          <option value="2:00">2:00</option>
          <option value="3:00">3:00</option>
          <option value="4:00">4:00</option>
          <option value="5:00">5:00</option>
          <option value="6:00">6:00</option>
          <option value="7:00">7:00</option>
          <option value="8:00">8:00</option>
          <option value="9:00">9:00</option>
          <option value="10:00">10:00</option>
          <option value="11:00">11:00</option>
          <option value="12:00">12:00</option>
          <option value="13:00">13:00</option>
          <option value="14:00">14:00</option>
          <option value="15:00">15:00</option>
          <option value="16:00">16:00</option>
          <option value="17:00">17:00</option>
          <option value="18:00">18:00</option>
          <option value="19:00">19:00</option>
          <option value="20:00">20:00</option>
          <option value="21:00">21:00</option>
          <option value="22:00">22:00</option>
          <option value="23:00">23:00</option>
          <option value="24:00">24:00</option>
          
      </select>
       <select name="time11" id="time">
          <option value="" selected="selected">--Select--</option>
          <option value="1:00">1:00</option>
          <option value="2:00">2:00</option>
          <option value="3:00">3:00</option>
          <option value="4:00">4:00</option>
          <option value="5:00">5:00</option>
          <option value="6:00">6:00</option>
          <option value="7:00">7:00</option>
          <option value="8:00">8:00</option>
          <option value="9:00">9:00</option>
          <option value="10:00">10:00</option>
          <option value="11:00">11:00</option>
          <option value="12:00">12:00</option>
          <option value="13:00">13:00</option>
          <option value="14:00">14:00</option>
          <option value="15:00">15:00</option>
          <option value="16:00">16:00</option>
          <option value="17:00">17:00</option>
          <option value="18:00">18:00</option>
          <option value="19:00">19:00</option>
          <option value="20:00">20:00</option>
          <option value="21:00">21:00</option>
          <option value="22:00">22:00</option>
          <option value="23:00">23:00</option>
          <option value="24:00">24:00</option>
          
      </select>
       <select name="time12" id="time">
          <option value="" selected="selected">--Select--</option>
          <option value="1:00">1:00</option>
          <option value="2:00">2:00</option>
          <option value="3:00">3:00</option>
          <option value="4:00">4:00</option>
          <option value="5:00">5:00</option>
          <option value="6:00">6:00</option>
          <option value="7:00">7:00</option>
          <option value="8:00">8:00</option>
          <option value="9:00">9:00</option>
          <option value="10:00">10:00</option>
          <option value="11:00">11:00</option>
          <option value="12:00">12:00</option>
          <option value="13:00">13:00</option>
          <option value="14:00">14:00</option>
          <option value="15:00">15:00</option>
          <option value="16:00">16:00</option>
          <option value="17:00">17:00</option>
          <option value="18:00">18:00</option>
          <option value="19:00">19:00</option>
          <option value="20:00">20:00</option>
          <option value="21:00">21:00</option>
          <option value="22:00">22:00</option>
          <option value="23:00">23:00</option>
          <option value="24:00">24:00</option>
          
      </select></td>
    </tr>
    <tr>
      <td width="34%">Enter the date 4 of schedule:</td>
      <td width="66%"><label for="date4"></label>
      <input type="text" name="date4" placeholder="yyyy-mm-dd" id="date4" /></td>
    </tr>
    <tr>
      <td>Enter the times of date 4 of schedule:</td>
      <td><label for="time"></label>
        <select name="time13" id="time">
          <option value="" selected="selected">--Select--</option>
          <option value="1:00">1:00</option>
          <option value="2:00">2:00</option>
          <option value="3:00">3:00</option>
          <option value="4:00">4:00</option>
          <option value="5:00">5:00</option>
          <option value="6:00">6:00</option>
          <option value="7:00">7:00</option>
          <option value="8:00">8:00</option>
          <option value="9:00">9:00</option>
          <option value="10:00">10:00</option>
          <option value="11:00">11:00</option>
          <option value="12:00">12:00</option>
          <option value="13:00">13:00</option>
          <option value="14:00">14:00</option>
          <option value="15:00">15:00</option>
          <option value="16:00">16:00</option>
          <option value="17:00">17:00</option>
          <option value="18:00">18:00</option>
          <option value="19:00">19:00</option>
          <option value="20:00">20:00</option>
          <option value="21:00">21:00</option>
          <option value="22:00">22:00</option>
          <option value="23:00">23:00</option>
          <option value="24:00">24:00</option>
          
      </select>
       <select name="time14" id="time">
          <option value="" selected="selected">--Select--</option>
          <option value="1:00">1:00</option>
          <option value="2:00">2:00</option>
          <option value="3:00">3:00</option>
          <option value="4:00">4:00</option>
          <option value="5:00">5:00</option>
          <option value="6:00">6:00</option>
          <option value="7:00">7:00</option>
          <option value="8:00">8:00</option>
          <option value="9:00">9:00</option>
          <option value="10:00">10:00</option>
          <option value="11:00">11:00</option>
          <option value="12:00">12:00</option>
          <option value="13:00">13:00</option>
          <option value="14:00">14:00</option>
          <option value="15:00">15:00</option>
          <option value="16:00">16:00</option>
          <option value="17:00">17:00</option>
          <option value="18:00">18:00</option>
          <option value="19:00">19:00</option>
          <option value="20:00">20:00</option>
          <option value="21:00">21:00</option>
          <option value="22:00">22:00</option>
          <option value="23:00">23:00</option>
          <option value="24:00">24:00</option>
          
      </select>
       <select name="time15" id="time">
          <option value="" selected="selected">--Select--</option>
          <option value="1:00">1:00</option>
          <option value="2:00">2:00</option>
          <option value="3:00">3:00</option>
          <option value="4:00">4:00</option>
          <option value="5:00">5:00</option>
          <option value="6:00">6:00</option>
          <option value="7:00">7:00</option>
          <option value="8:00">8:00</option>
          <option value="9:00">9:00</option>
          <option value="10:00">10:00</option>
          <option value="11:00">11:00</option>
          <option value="12:00">12:00</option>
          <option value="13:00">13:00</option>
          <option value="14:00">14:00</option>
          <option value="15:00">15:00</option>
          <option value="16:00">16:00</option>
          <option value="17:00">17:00</option>
          <option value="18:00">18:00</option>
          <option value="19:00">19:00</option>
          <option value="20:00">20:00</option>
          <option value="21:00">21:00</option>
          <option value="22:00">22:00</option>
          <option value="23:00">23:00</option>
          <option value="24:00">24:00</option>
          
      </select>
       <select name="time16" id="time">
          <option value="" selected="selected">--Select--</option>
          <option value="1:00">1:00</option>
          <option value="2:00">2:00</option>
          <option value="3:00">3:00</option>
          <option value="4:00">4:00</option>
          <option value="5:00">5:00</option>
          <option value="6:00">6:00</option>
          <option value="7:00">7:00</option>
          <option value="8:00">8:00</option>
          <option value="9:00">9:00</option>
          <option value="10:00">10:00</option>
          <option value="11:00">11:00</option>
          <option value="12:00">12:00</option>
          <option value="13:00">13:00</option>
          <option value="14:00">14:00</option>
          <option value="15:00">15:00</option>
          <option value="16:00">16:00</option>
          <option value="17:00">17:00</option>
          <option value="18:00">18:00</option>
          <option value="19:00">19:00</option>
          <option value="20:00">20:00</option>
          <option value="21:00">21:00</option>
          <option value="22:00">22:00</option>
          <option value="23:00">23:00</option>
          <option value="24:00">24:00</option>
          
      </select></td>
    </tr>
    <tr>
      <td width="34%">Enter the date 5 of schedule:</td>
      <td width="66%"><label for="date5"></label>
      <input type="text" name="date5" placeholder="yyyy-mm-dd" id="date5" /></td>
    </tr>
    <tr>
      <td>Enter the times of date 5 of schedule:</td>
      <td><label for="time"></label>
        <select name="time17" id="time">
          <option value="" selected="selected">--Select--</option>
          <option value="1:00">1:00</option>
          <option value="2:00">2:00</option>
          <option value="3:00">3:00</option>
          <option value="4:00">4:00</option>
          <option value="5:00">5:00</option>
          <option value="6:00">6:00</option>
          <option value="7:00">7:00</option>
          <option value="8:00">8:00</option>
          <option value="9:00">9:00</option>
          <option value="10:00">10:00</option>
          <option value="11:00">11:00</option>
          <option value="12:00">12:00</option>
          <option value="13:00">13:00</option>
          <option value="14:00">14:00</option>
          <option value="15:00">15:00</option>
          <option value="16:00">16:00</option>
          <option value="17:00">17:00</option>
          <option value="18:00">18:00</option>
          <option value="19:00">19:00</option>
          <option value="20:00">20:00</option>
          <option value="21:00">21:00</option>
          <option value="22:00">22:00</option>
          <option value="23:00">23:00</option>
          <option value="24:00">24:00</option>
          
      </select>
       <select name="time18" id="time">
          <option value="" selected="selected">--Select--</option>
          <option value="1:00">1:00</option>
          <option value="2:00">2:00</option>
          <option value="3:00">3:00</option>
          <option value="4:00">4:00</option>
          <option value="5:00">5:00</option>
          <option value="6:00">6:00</option>
          <option value="7:00">7:00</option>
          <option value="8:00">8:00</option>
          <option value="9:00">9:00</option>
          <option value="10:00">10:00</option>
          <option value="11:00">11:00</option>
          <option value="12:00">12:00</option>
          <option value="13:00">13:00</option>
          <option value="14:00">14:00</option>
          <option value="15:00">15:00</option>
          <option value="16:00">16:00</option>
          <option value="17:00">17:00</option>
          <option value="18:00">18:00</option>
          <option value="19:00">19:00</option>
          <option value="20:00">20:00</option>
          <option value="21:00">21:00</option>
          <option value="22:00">22:00</option>
          <option value="23:00">23:00</option>
          <option value="24:00">24:00</option>
          
      </select>
       <select name="time19" id="time">
          <option value="" selected="selected">--Select--</option>
          <option value="1:00">1:00</option>
          <option value="2:00">2:00</option>
          <option value="3:00">3:00</option>
          <option value="4:00">4:00</option>
          <option value="5:00">5:00</option>
          <option value="6:00">6:00</option>
          <option value="7:00">7:00</option>
          <option value="8:00">8:00</option>
          <option value="9:00">9:00</option>
          <option value="10:00">10:00</option>
          <option value="11:00">11:00</option>
          <option value="12:00">12:00</option>
          <option value="13:00">13:00</option>
          <option value="14:00">14:00</option>
          <option value="15:00">15:00</option>
          <option value="16:00">16:00</option>
          <option value="17:00">17:00</option>
          <option value="18:00">18:00</option>
          <option value="19:00">19:00</option>
          <option value="20:00">20:00</option>
          <option value="21:00">21:00</option>
          <option value="22:00">22:00</option>
          <option value="23:00">23:00</option>
          <option value="24:00">24:00</option>
          
      </select>
       <select name="time20" id="time">
          <option value="" selected="selected">--Select--</option>
          <option value="1:00">1:00</option>
          <option value="2:00">2:00</option>
          <option value="3:00">3:00</option>
          <option value="4:00">4:00</option>
          <option value="5:00">5:00</option>
          <option value="6:00">6:00</option>
          <option value="7:00">7:00</option>
          <option value="8:00">8:00</option>
          <option value="9:00">9:00</option>
          <option value="10:00">10:00</option>
          <option value="11:00">11:00</option>
          <option value="12:00">12:00</option>
          <option value="13:00">13:00</option>
          <option value="14:00">14:00</option>
          <option value="15:00">15:00</option>
          <option value="16:00">16:00</option>
          <option value="17:00">17:00</option>
          <option value="18:00">18:00</option>
          <option value="19:00">19:00</option>
          <option value="20:00">20:00</option>
          <option value="21:00">21:00</option>
          <option value="22:00">22:00</option>
          <option value="23:00">23:00</option>
          <option value="24:00">24:00</option>
          
      </select></td>
    </tr>
    <tr>
    <td>Name of User 1</td>
    <td><label for="sc_user1"></label>
      <input type="text" name="sc_user1" id="sc_user1" /></td>
    </tr>
    <tr>
    <td>Email of User 1</td>
    <td><label for="sc_user1_email"></label>
      <input type="email" name="sc_user1_email" id="sc_user1_email" /></td>
    </tr>
    <tr>
    <td>Name of User 2</td>
    <td><label for="sc_user1"></label>
      <input type="text" name="sc_user2" id="sc_user2" /></td>
    </tr>
    <tr>
    <td>Email of User 2</td>
    <td><label for="sc_user2_email"></label>
      <input type="email" name="sc_user2_email" id="sc_user2_email" /></td>
    </tr>
    <tr>
    <td>Name of User 3</td>
    <td><label for="sc_user3"></label>
      <input type="text" name="sc_user3" id="sc_user3" /></td>
    </tr>
    <tr>
    <td>Email of User 3</td>
    <td><label for="sc_user3_email"></label>
      <input type="email" name="sc_user3_email" id="sc_user3_email" /></td>
    </tr>
    <tr>
    <td>Name of User 4</td>
    <td><label for="sc_user4"></label>
      <input type="text" name="sc_user4" id="sc_user4" /></td>
    </tr>
    <tr>
    <td>Email of User 4</td>
    <td><label for="sc_user4_email"></label>
      <input type="email" name="sc_user4_email" id="sc_user4_email" /></td>
    </tr>
    <tr>
    <td>Name of User 5</td>
    <td><label for="sc_user5"></label>
      <input type="text" name="sc_user5" id="sc_user5" /></td>
    </tr>
    <tr>
    <td>Email of User 5</td>
    <td><label for="sc_user5_email"></label>
      <input type="email" name="sc_user5_email" id="sc_user5_email" /></td>
    </tr>
    <tr>
    <!-- 
    IMPORTANT! 
    
    Need to also have a list of names and email addresses (will be the users of the schedule)
	NOTE all users of the site do not have to have accounts! 
	
	once submitted then a link to the site will be emailed to the list of address that were 
	entered for that schedule. 
	
	Each new instance of a schedule will have an identifier to distinguish it from other instances.  
	This identifier will be embedded in the link (i.e. using GET) that is sent to the email recipients of the schedule.  
	Also embedded in the link will be an identifier to indicate the person that the link is being sent to.  
	Both of these identifiers will be used by the site to retrieve the information required for that schedule. 
	The idea is that when a user receives the email and clicks on the link the two identifiers in the 
	URL will uniquely identify the schedule and user who will be accessing it.
    
    -->
    
      <td><input type="submit" name="new_schedule" id="submit" value="Submit" /></td>    
      <td><input type="reset" name="reset" id="reset" value="Reset" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>