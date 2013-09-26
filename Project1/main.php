


<?php
//$i=3;
//echo 'Cookie='.$_COOKIE["line$i"];
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
	$line_no = substr($_POST['update'],strlen($_POST['update'])-1);
	//echo $line_no;
	if(isset($_POST['name'.$line_no]))
	$s = "\n".$_POST['name'.$line_no]."^";
	
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
	$s = substr($s,0, -1);
	$text = "user.txt";     // open  up the user file. 
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
    fclose($f1);	
}
global $c;
global $lno;
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
	<h2>
	
	<center>Select Your Meeting Times</center></h2>
	<?php 
		echo "<table border= '1'
				cellpadding='10'>
				<tr>
				<th>User</th>
				<th>Action</th>";		
	
	   date_default_timezone_set('America/New_York');
		//error_reporting(1);
		getTimes();
		displaySchedule($c,$lno); 
		
		
		
		function displaySchedule(&$c,&$lno)
		{
			
					// used for displaying schedule times 
					$text = "user.txt";     // open  up the user file. 
					$f  = fopen($text, "r+");
					
							
					
					if (file_exists("user.txt"))
					{
						
						
						while($line = fgets($f,1000))
						{
						$name = getUsers($text, $line);
						$j=0;
						echo '<tr><form action="" method="post">' . '<td class="unedit'.$lno.'">' . $name . '</td>';
						if($lno>2){
							//$flag=0;
							//for($k=3;$k<50;$k++){
								if(isset($_COOKIE["line".$lno]))
							    { 
								echo '<td class="edit_hide'.$lno.' edit_add'.$lno.'"><input type="text" name="name'.$lno.'" value="'.$name.'"/></td><td class="unedit'.$lno.'"><input type="button" name="edit'.$lno.'" id="edit'.$lno.'" class="edit0" value="edit" /> </td><td class="edit_hide'.$lno.' edit_add'.$lno.'"><input type="submit" name="update" id="edit'.$lno.'" class="edit'.$lno.'" value="update'.$lno.'"/> </td>';
								}
								else
								{
									echo '<td></td>';
									}//}
								
								}else { echo '<td></td>';
								
								}
						
						foreach($GLOBALS['count'] as $n)
						{
							
						   for($i=$j;$i<9;$i++)
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
						while($j<9)
						{
							echo '<td class="unedit'.$lno.'"></td><td class="edit_hide'.$lno.' edit_add'.$lno.'"><input type="checkbox" name ="add_right'.$j.'"  /></td>';
							$j++;
							}
						echo "</tr></form>\n";
						//$s = setTimes($name, &$num1)
		                $lno++;	
						}
							
										
					}else{
						#create the file method. 
					}
							     
			echo '<tr></tr>';
			
		}
		
		
		#this method gets the users from the text file and diplays them. 
		function getUsers(&$text1, &$line)
		{
				 list($name, $num) = explode('^', $line);
				 $num1 = explode('|', $num); // num 1 now holds the number where the time entry mark goes   
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
			
		 function getTimes()
		{
			
	
					$file = file("schedule.txt"); // open up the schedule file 
				
			
											// loop through the schedule file 
						foreach($file as $s){			   					
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
        echo '<form action = "" method = "post" >';
		echo '<th><input type="text" name="add1name" width="50px" class="hide add1"/></th><td><input type="button" id="new" value="new" class="new" /><input type="submit" value="submit'.$lno.'" name="submit" id="submit"  class="hide add1"/></td>';
		for($i=0;$i<9;$i++)
	    {
		   	echo '<td><input type="checkbox" name ="add_right'.$i.'" class="hide add1" /></td>';
		}
			  echo "</tr>";
				echo"<tr>
				<th>Total</th><td></td>";
				for($i=0;$i<9;$i++)
	            {
		   	         echo "<td>" .$c[$i].  "</td>";
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js" type="text/javascript"></script>
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
