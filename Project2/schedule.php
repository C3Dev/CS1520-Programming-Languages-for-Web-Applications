<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CS1520 Corey Crooks Scheduler </title>
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
<?php
require_once('includes/config.php');
//$i=3;
//echo 'Cookie='.$_COOKIE["line$i"];
global $sc_id,$c,$lno,$sc_count,$user_id;
$sc_id = $_REQUEST['id'];
$user_id = $_SESSION['user_id'];
if(isset($_POST['submit']))
{
	$line_no = substr($_POST['submit'],strlen($_POST['submit'])-1);
	
	if(isset($_POST['add1name']))
	$s = "\n".$_POST['add1name']."^";
	if(isset($_POST['add_right0']))
	$s .= '0|';
	if(isset($_POST['add_right1']))
	$s .= '1|';
	if(isset($_POST['add_right2']))
	$s .= '2|';
	if(isset($_POST['add_right3']))
	$s .= '3|';
	if(isset($_POST['add_right4']))
	$s .= '4|';
	if(isset($_POST['add_right5']))
	$s .= '5|';
	if(isset($_POST['add_right6']))
	$s .= '6|';
	if(isset($_POST['add_right7']))
	$s .= '7|';
	if(isset($_POST['add_right8']))
	$s .= '8|';
	//echo $s;
	$s = trim(substr($s,0, -1));
	$file  = fopen("user.txt", "a+");
	fwrite($file,PHP_EOL.$s);
    fclose($file);	
	//for($i=3;$i<100;$i++)
	//{
		if(!isset($_COOKIE["line".$line_no]))
		{ 
		  setcookie("line".$line_no,$line_no,time()+24*60*60);
		  header('Location:main.php');
		//  echo 'Cookie='.$_COOKIE["line3"];
		  //break;
		}
	//}
	
	
}
if(isset($_POST['update']))
{

$con=mysqli_connect('localhost', 'CrooksC', 'lulls.dug', 'CrooksC'); 
	$line_no = substr($_POST['update'],strlen($_POST['update'])-1);
	//echo $line_no;
	$sc_user_id = $_POST['sc_user_id'];
	if(isset($_POST['name'.$line_no]))
	$s = "\n".$_POST['name'.$line_no]."^";
	$name = $_POST['name'.$line_no];
	if(isset($_POST['add_right0']))
	$s .= '0|';
	if(isset($_POST['add_right1']))
	$s .= '1|';
	if(isset($_POST['add_right2']))
	$s .= '2|';
	if(isset($_POST['add_right3']))
	$s .= '3|';
	if(isset($_POST['add_right4']))
	$s .= '4|';
	if(isset($_POST['add_right5']))
	$s .= '5|';
	if(isset($_POST['add_right6']))
	$s .= '6|';
	if(isset($_POST['add_right7']))
	$s .= '7|';
	if(isset($_POST['add_right8']))
	$s .= '8|';
	if(isset($_POST['add_right9']))
	$s .= '9|';
	if(isset($_POST['add_right10']))
	$s .= '10|';
	if(isset($_POST['add_right11']))
	$s .= '11|';
	if(isset($_POST['add_right12']))
	$s .= '12|';
	if(isset($_POST['add_right13']))
	$s .= '13|';
	if(isset($_POST['add_right14']))
	$s .= '14|';
	if(isset($_POST['add_right15']))
	$s .= '15|';
	if(isset($_POST['add_right16']))
	$s .= '16|';
	if(isset($_POST['add_right17']))
	$s .= '17|';
	if(isset($_POST['add_right18']))
	$s .= '18|';
	if(isset($_POST['add_right19']))
	$s .= '19|';
	if(isset($_POST['add_right20']))
	$s .= '20|';
	//echo $s;
	$s = substr($s,0, -1);
	$q = "UPDATE  sc_user SET  sc_user =  '$name', sc_user_schedule =  '$s' WHERE `sc_user_id` = $sc_user_id";
	//echo $q;
	$r = mysqli_query($con,$q);
	//header('Location:schedule.php');
	/*$text = "user.txt";     // open  up the user file. 
    $f  = fopen($text, "r+");
	$l = '';
	$i=0;
	while($line = fgets($f,1000))
	{
		if($i==$line_no)
		{
			$l .= trim($s);
			$l .= PHP_EOL;
		}
		else
		$l .= $line;	
		$i++;
	}	
	fclose($f);
	$f1 = fopen('user.txt',"w");
	fwrite($f1,$l);
    fclose($f1);	*/
}
$lno=0;
$c = array(0,0,0,0,0,0,0,0,0,0);
//$c[6] = 2;
# this is a backup. 
/***************************************************************************
* Author: Corey Crooks                                                    *
* Date: 09/10/2013                                                        *
* Email: ccc35@pitt.edu                                                   *
* Purpose: Assignment 1 Scheduling Application                            *
**************************************************************************/?>
	<!DOCTYPE html>
	<html>
	 <head>
	  <title>CS 1520 Assignment 1</title>
      
      <style type="text/css">
	.hide {
		display:none;
	}
	.edit_hide {
		display:none;
	}
	</style>
	 </head>
	 <body>
	 <body style="height:700px;background:#20C8EE">
	<h2>
	
	<center>Select Your Meeting Times</center></h2>
	<?php 
	/* Schedule count*/
	
$con=mysqli_connect('localhost', 'CrooksC', 'lulls.dug', 'CrooksC'); 
	$q = "SELECT * from  schedule_count where sc_id = $sc_id";
	$r = mysqli_query($con,$q);
	$row = mysqli_fetch_array($r,MYSQLI_BOTH);
	$sc_count = $row['sc_count'];
	/* Schedule count End*/
		echo "<table border= '1'
				cellpadding='10'>
				<tr>
				<th>User</th>
				<th>Action</th>";		
	
	   date_default_timezone_set('America/New_York');
		//error_reporting(1);
		getTimes($user_id,$sc_id);
		displaySchedule($c,$lno,$sc_count,$user_id,$sc_id); 
		
		
		
		function displaySchedule(&$c,&$lno,&$sc_count,&$user_id,&$sc_id)
		{
			
$con=mysqli_connect('localhost', 'CrooksC', 'lulls.dug', 'CrooksC'); 
					// used for displaying schedule times 
					//$text = "user.txt";     // open  up the user file. 
					//$f  = fopen($text, "r+");
					//if (file_exists("user.txt"))
					//{
						$q = "SELECT * from sc_user where user_id = '$user_id' and schedule_id = $sc_id";
						$r = mysqli_query($con, $q);
						
						while($row = mysqli_fetch_array($r,MYSQLI_BOTH))
						{
						$line = $row['sc_user_schedule'];
						$name = getUsers($text, $line);
						$j=0;
						echo '<tr><form action="" method="post">' . '<td class="unedit'.$lno.'">' . $name . '</td>';
						
							//$flag=0;
							//for($k=3;$k<50;$k++){
								 
								echo '<td class="edit_hide'.$lno.' edit_add'.$lno.'"><input type="hidden" name="sc_user_id" value="'.$row['sc_user_id'].'" /><input type="text" name="name'.$lno.'" value="'.$name.'"/></td><td class="unedit'.$lno.'"><input type="button" name="edit'.$lno.'" id="edit'.$lno.'" class="edit0" value="edit" /> </td><td class="edit_hide'.$lno.' edit_add'.$lno.'"><input type="submit" name="update" id="edit'.$lno.'" class="edit'.$lno.'" value="update'.$lno.'"/> </td>';
						
						foreach($GLOBALS['count'] as $n)
						{
							
						   for($i=$j;$i<$sc_count;$i++)
						   {
							   if($i == $n)
							   {
								   
								   echo '<td align="center" class="unedit'.$lno.'"><img src="images/right.png" /></td><td class="edit_hide'.$lno.' edit_add'.$lno.'"><input type="checkbox" name ="add_right'.$i.'"  /></td></td>';
								   $j = $i+1;
								   $c[$i]++;
								   break;
								}
								else
								{
									echo '<td class="unedit'.$lno.'"></td><td class="edit_hide'.$lno.' edit_add'.$lno.'"><input type="checkbox" name ="add_right'.$i.'"  /></td>';
								}
							 }	
							 
						}
						while($j<$sc_count)
						{
							echo '<td class="unedit'.$lno.'"></td><td class="edit_hide'.$lno.' edit_add'.$lno.'"><input type="checkbox" name ="add_right'.$j.'"  /></td>';
							$j++;
							}
						echo "</tr></form>\n";
						//$s = setTimes($name, &$num1)
		                $lno++;	
						}
							
										
				//	}else{
						#create the file method. 
				//	}
							     
			echo '<tr></tr>';
			
		}
		
		
		#this method gets the users from the text file and diplays them. 
		function getUsers(&$text1, &$line)
		{
				 @list($name, $num) = @explode('^', $line);
				 $num1 = @explode('|', $num); // num 1 now holds the number where the time entry mark goes   
				/*foreach($num1 as $n)
				{
				echo "$n";
				}*/
				// setTimes($name, $num1) // sets the times for the user. 
				$GLOBALS['count'] = $num1;
				//$count = $num1;
				 return $name; 					
		}	
		
		
							
						
		#When the user is either new or active, set the times 
		function setTimes(&$name, &$num1)
		{
			 $sch = explode("|", $num1);
			 return $sch;
			
			
		}
			
		 function getTimes(&$user_id,&$sc_id)
		{
			
			$con=mysqli_connect('localhost', 'CrooksC', 'lulls.dug', 'CrooksC'); 
			$query = "SELECT * from schedule where user_id = '$user_id' and schedule_id = '$sc_id'";
		
			$r = mysqli_query($con,$query);
			while($row = mysqli_fetch_array($r,MYSQLI_BOTH))
			{
				$s = $row['sc_dt'];
			
					//$file = file("schedule.txt"); // open up the schedule file 
				   // loop through the schedule file 
				  //foreach($file as $s){			   					
				  # s = string like '2013-04-11^12:00|4:00|14:00'
							list($year, $rest) = explode("^", $s);
						    $rest_arr = explode("|", $rest); // time = 12:00 etc.. 
						    list($year, $month, $day) = explode('-', $year); // this cuts them down. 
							$year= intval($year, 10);
							$month= intval($month, 10);
							$day= intval($day, 10);							$h = mktime(0, 0, 0, $month, $day,$year);
							$d = date("F dS, Y", $h); //used to get the day of the week 
							$w= date("l", $h); // w now holds the day of the week.
				
						
						// while through the schedule file, loop through each of times and displays them. 
						 foreach($rest_arr as $time){
									//$convert = (string)$rest_arr;
									//$convertedTime = date("g:ia", strtotime($convert));
									
									echo "<th>" . $w . "<br>" . $month . "/" . $day . "/" . $year . "<br>" . $time . "</th>\n"; 
															
									// sets the header
							
						} // end this   
																			
					} // end 1st foreach for file.
		}    
			
		
		
		function createFile()
		{
			
		}
		
		function drawTable()
		{
			
			$rows = 10; // define number of rows
			$cols = 4;// define number of columns
			 
			echo "<table border='1'>"; 
			 
			for($tr=1;$tr<=$rows;$tr++){ 
			      
			    echo "<tr>"; 
			        for($td=1;$td<=$cols;$td++){ 
			               echo "<td>row: ".$tr." column: ".$td."</td>"; 
			        } 
			    echo "</tr>"; 
			} 
			 
			echo "</table>"; 
			

			
		}
        /*echo '<form action = "" method = "post" >';
		echo '<th><input type="text" name="add1name" width="50px" class="hide add1"/></th><td><input type="button" id="new" value="new" class="new" /><input type="submit" value="submit'.$lno.'" name="submit" id="submit"  class="hide add1"/></td>';
		for($i=0;$i<$sc_count;$i++)
	    {
		   	echo '<td><input type="checkbox" name ="add_right'.$i.'" class="hide add1" /></td>';
		}
			  echo "</tr>";*/
				echo"<tr>
				<th>Total</th><td></td>";
				for($i=0;$i<$sc_count;$i++)
	            {
		   	         echo "<td>" .@$c[$i].  "</td>";
		         }
		    echo'</tr></form>
			</table>'; 
		
		?>
		
	 </body>
	</html>
            <style type="text/css">
			<?php
			for($a=0;$a<=$lno;$a++)
			{
				echo '.edit_hide'.$a.'{
				display:none;
				}';
				}?>
			</style>
    <script src="includes/jquery.js" type="text/javascript"></script>
    <script type="text/javascript">

   $(document).ready(function(){
	   $("#new").click(function(){
        $("#new").addClass('hide');
	    $(".add1").removeClass('hide');
		//$(".edit_add0").removeClass("edit_hide0");
		//$(".unedit0").addClass("edit_hide0");
	   });
	   <?php
			for($a=0;$a<=$lno+1;$a++)
			{
				echo '$("#edit'.$a.'").click(function(){';
				echo '$(".edit_add'.$a.'").removeClass("edit_hide'.$a.'");';
				echo '$(".unedit'.$a.'").addClass("edit_hide'.$a.'");';
				echo '});';
			}?>
     });
   </script>
