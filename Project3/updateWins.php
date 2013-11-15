<?php
require('config.php');
require('update.php'); 
require_once("configure.php");

$dbhost = "localhost";
$dbuser = "CrooksC";
$dbpass = "lulls.dug";
$dbname = "CrooksC";
	//Connect to MySQL Server
$con = mysqli_connect($dbhost, $dbuser, $dbpass);
	//Select Database
mysqli_select_db($con, $dbname) or die(mysqli_error());
	// Retrieve data from Query String
$username = $_SESSION['username'];

	// Escape User Input to help prevent SQL Injection
$username= mysqli_real_escape_string($con, $username);
	//build query
$query = "SELECT num_wins FROM users WHERE username = '$username'";

	//Execute query
$qry_result = mysqli_query($con, $query) or die(mysqli_error());
$row = $qry_result->fetch_array();

$count = $row['num_wins'];  
$count = $count + 1;



 $query = "update users set num_wins = '$count' where username = '$username'";
		

	//Execute query
$qry_result = mysqli_query($con, $query) or die(mysqli_error());








	//Build Result String
$display_string = "<table>";
$display_string .= "<tr>";
$display_string .= "<th>Number of Wins: </th>";
//$display_string .= "</tr>";

// Insert a new row in the table for each person returned
//while($row = mysqli_fetch_array($qry_result, MYSQLI_BOTH)){
//	$display_string .= "<tr>";
	$display_string .= "<td>$row[num_wins]</td>";
	$display_string .= "</tr>";
	
// }








$display_string .= "</table>";
echo $display_string;
?>