<?php
 // this script will be used for updating the database getting storing into server 
 // this will create the tables and insert 
 // also need to import other methods from configure.php and use this as default
class Update{

  public $charVal = ""; 
  public $randomNum = ""; 
  public  $rWord = "" ; 
  
  
  // this will send a random number and get a random word from the database. 
 /* function getWord($num)
  		{
  			// $num is the random number.
  			$con = mysqli_connect("localhost","CrooksC","lulls.dug","CrooksC"); 
			$sql = "SELECT words FROM words WHERE id = '" . mysqli_real_escape_string($con, $num) . "' LIMIT 1"; 
  			$query = mysqli_query($con, $sql) or trigger_error("Query Failed: " . mysql_error()); 
   			
			while($row = $query->fetch_assoc()){
  				  echo $row['words'] . '<br />'; // this holds the 
  				  return $row['words']; 
			}
		
			
	}// end getWord */ 


function getRandom()
{		
  // get the random number
  // use that number to pull from the index and get the word.
  $num = rand(1,2377); // the numbers in the database
  
 $randomNum = $num; 
  // getWord($num);
return $num; 
}


	// takes a random number as a parameter. 
  function getWord($num)
  		{	//$update = new Update(); 
  			//$num = getRandom(); // gets random num 
  // this will send a random number and get a random word from the database. 

  			// $num is the random number.
  			$con = mysqli_connect("localhost","CrooksC","lulls.dug","CrooksC"); 
			$sql = "SELECT words FROM words WHERE id = '" . mysqli_real_escape_string($con, $num) . "' LIMIT 1"; 
  			$query = mysqli_query($con, $sql) or trigger_error("Query Failed: " . mysql_error()); 
   			$word = ""; 
   			
			while($row = $query->fetch_assoc()){
  			 // echo $row['words'] . '<br />'; // this holds the 
  			   $word = $row['words']; 
			}

			$rWord = $word;
		//	getChar($word);  
		return $rWord; 
	}// end getWord



	function getChar($word)
	{
		//$char = substr($word, 1); 
		//echo $word[0];   // position start. 
		$c = $word[0]; 
		
		$charVal = $c; 
		
		return $c; 
	}










 function createTable()
 {
 $con = mysqli_connect('localhost','CrooksC','lulls.dug','CrooksC');
 
 $sql = "CREATE TABLE IF NOT EXISTS `words` (
 		`id` INT NOT NULL auto_increment,
 		`words` varchar(500) NOT NULL, 
 	 	 PRIMARY KEY (id)
 		)"; 
 		
 	if ($con->query($sql) === TRUE) {
  		echo 'Table "users" successfully created';
		}
			else {
			 echo 'Error: '. $con->error;
			}
   		     return true;

 }
 
 
function insertTable()
 {
  $con = mysqli_connect('localhost','CrooksC','lulls.dug','CrooksC');

	$filecontent = file_get_contents('words5.txt');

$words = preg_split('/[\s]+/', $filecontent, -1, PREG_SPLIT_NO_EMPTY);
$count = 0; 
foreach($words as $value)
{
//	echo $value . "</br>"; // good this needs to be stored into the database.
	
 $sql = "INSERT INTO words (`words`) VALUES ('".$value."');"; 
  $query = mysqli_query($con, $sql) or trigger_error("Query Failed: " . mysqli_error()); 
       
      if ($query) { 
        echo $count . " Word Inserted " . "</br>"; 
      }   else { echo "Insert Failed" . "</br>"; }
      $count++; 

	} // end foreach 
} // end method 
	
}
 
?>