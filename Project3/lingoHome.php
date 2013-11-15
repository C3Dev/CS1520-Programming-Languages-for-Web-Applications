<?php
require('config.php');
require('update.php'); 




require_once("configure.php");

function getCharacter()
		{		
		$update = new Update(); 
		$rNum = $update->getRandom(); // gets a random number 
		$rWord = $update->getWord($rNum); // gets random word from random num
		echo "<script> varWord = '" . $rWord . "'; </script>";
			
		echo "<script> name = '" . $_SESSION['username'] . "'; </script>";
		
		$char = $update->getChar($rWord); // letter from word. 
		
		echo "<script> charVal= '" . $char . "'; </script>";
		
	//	echo $rWord . " </br>"; 
		echo "<font color = 'red'> $char</font>";    // sets the font 
		// use this to  call configure class with approriate methods. 
				}

if (!loggedIn()) { echo "ERROR YOU MUST LOGIN!"; }


?>






<!DOCTYPE html>
<html>
	<title> Lingo </title>
		<title> Welcome to the Game of Lingo! </title>
			<link rel="stylesheet" type="text/css" href="style.css" media="screen" />

			<head>				
				<script type="text/javascript">
		
	
	var count = 0;
	var t; 
	var timer; 
    var win = 0; 
	function addNewRows(httpRequest, charVal2, charVal3, charVal4, charVal5)
  {	 	
  	if(win == 0){
			if(httpRequest.readyState == 4)
			{
			
				if(httpRequest.status == 200)
					{
					var ack = httpRequest.responseText; 
					//alert(ack); // ack holds the text of it all.  
						if(ack == "OK")
						{
						// this needs to change to the first letter. 
						addRow(charVal2,charVal3,charVal4,charVal5, 1);
						}
						else 
						{
							var newRows = ack.split("^");
								for (var i = 0; i < newRows.length; i++)
								{
								//	var theRow = newRows[i].split("|");
								 var theRow = ack[i];
								
									addRow(theRow[1], theRow[2], theRow[3], theRow[4], theRow[5], 1);
								
								}
							
							addRow(charVal2,charVal3,charVal4,charVal5, 1);
						}
							
					} else 
							{
							alert('Problem with request');
							}
							
						pending = false; 
					
					}
			}
	} 

		
		//ajax code 
		
		// this should take 1 - 5 based on the position 
		function processData()
		{	
			var httpRequest;
			var pending = false; 
			var type = arguments[0]; // get the type of call. 
			if(window.XMLHttpRequest)
			{
				httpRequest = new XMLHttpRequest();
			} 
			else if (window.ActiveObject){
				try{
					httpRequest = new ActiveXObject("Msxml2.XMLHTTP"); 			
			}	
			catch(e){
				try{
				httpRequest = new ActiveXObject("Microsoft.XMLHTTP"); 
				}
					catch(e){}
				
			}
		}
			if(!httpRequest){
			alert('Giving Up : Cannot create an XMLHTTP instance');
			return false;
					}
						
		// -------------------- ^^^ THIS IS ALL DONE ^^^ -------------------------				
						
			//test code: NOTE INDEX IS TEST index will need to do server work behind.
			// the place where index is held will need to do all the coloring and checking
			// of the word and user input. 
			// 
			httpRequest.open('POST', 'updateFinal.php', true); 
			// updateFinal will do all of the checking..
			
			httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		
			var data;
			var rows = arguments[1];
			var charVal2 = arguments[2];
			var charVal3 = arguments[3];
			var charVal4 = arguments[4]; 	
			var charVal5 = arguments[5]; 
		
		
			//test code: NOTE INDEX IS TEST index will need to do server work behind.
			// the place where index is held will need to do all the coloring and checking
			// of the word and user input. 
		
			httpRequest.open('POST', 'updateFinal.php', true); 
			// updateFinal will do all of the checking..
			
			httpRequest.setRequestHeader('Content-Type', 'text/xml');
			// change if needed to application/x-www-form-urlencoded
			
			 data = 'type' + type + 'char1' + charVal2 + 'char2' + charVal3 + 'char3' + charVal4 + 'char4' + charVal5; 
			
			
			
			
			// time to add the row disable this tho! need to do the checking up in the
			// update final! 
			
			// addNewRows(httpRequest, charVal2, charVal3, charVal4, charVal5);
		  httpRequest.onreadystatechange = function(){
		addNewRows(httpRequest, charVal2, charVal3, charVal4, charVal5);}
		
		httpRequest.send(); 
			
		
			
		} // end function 
		
		
		function processCheck()
		{
			
			
			// type is if the timeout > 15 then type goes 1 else 0 
			var type;
			if(arguments[0] == 1)
			{
			type = 1; 
			}else {
			type = 0; 
			}
		
			
			var charVal2;
			var charVal3; 
			var charVal4;
			var charVal5;
			var ok;
			count++;
			var numrows = 1; 
			var pending = false;
			
		// type means that if its 0 then no default row and is not value null. 
		if(type == 0){
			// need to take into account for all and ones that are already written to. 
			 charVal2 = document.gameForm.secondChar.value; // check to see value of it. 
			 charVal3 = document.gameForm.thirdChar.value; 
			 charVal4 = document.gameForm.fourthChar.value; 
			 charVal5 = document.gameForm.fifthChar.value; 
			 ok = true; 
			
			} else if (type == 1)
			{
			// 
			charVal2 = " ";
			charVal3 = " ";
			charVal4 = " "; 
			charVal5 = " " 
			ok = true; 
			
			}
			
			if(ok && !pending)
			{
				pending = true; 
				document.gameForm.secondChar.value = "";
				processData(1, numrows, charVal2, charVal3, charVal4, charVal5); 
			}else if(ok)
			alert("Previous update processing....please try again"); 
			
		}			
			
			
					
	function addRow(charVal2,charVal3,charVal4,charVal5, type)
	{	var t1, t2, t3, t4;  // used for coloring purposes. 
		// test delete if needed. 
	
		
		if(type == 2)
		{
		charVal2 = "";
		charVal3 = "";
		charVal4 = "";
		charVal5 = "";
		}

		var T = document.getElementById("gameTable"); 
		var len = T.rows.length;
		var R = T.insertRow(len); 
		R.align = 'center'; 
	
		var C = R.insertCell(0); 
		var txt = document.createTextNode(charVal);
		C.appendChild(txt); 
		C.style.color="red";



		t1 = gameLogic(charVal2, varWord, 1);  
		C = R.insertCell(1);
		txt = document.createTextNode(charVal2); 
		C.appendChild(txt);
		
		if(t1 == 0) // this means its true make red. 		
			{C.style.color = "red";
			} 
			
		else if(t1 == 1){
			C.style.color = "blue";
			} 
			
		else  if(t1 == -1){
			C.style.color = "black";
			}
		

	
		t2 = gameLogic(charVal3, varWord, 2);  
		C = R.insertCell(2);
		txt = document.createTextNode(charVal3); 
		C.appendChild(txt);
		
		if(t2 == 0) // this means its true make red. 		
			{C.style.color = "red";
			} 
			
		else if(t2 == 1){
			C.style.color = "blue";
			} 
			
		else  if(t2 == -1){
			C.style.color = "black";
			}
		
		
		
		
		t3 = gameLogic(charVal4, varWord, 3);  
		C = R.insertCell(3);
		txt = document.createTextNode(charVal4); 
		C.appendChild(txt);
		
		if(t3 == 0) // this means its true make red. 		
			{C.style.color = "red";
			} 
			
		else if(t3 == 1){
			C.style.color = "blue";
			} 
			
		else  if(t3 == -1){
			C.style.color = "black";
			}
		
		t4 = gameLogic(charVal5, varWord, 4);  
		C = R.insertCell(4);
		txt = document.createTextNode(charVal5); 
		C.appendChild(txt);
		
		if(t4 == 0) // this means its true make red. 		
			{C.style.color = "red";
			} 
			
		else if(t4 == 1){
			C.style.color = "blue";
			} 
			
		else  if(t4 == -1){
			C.style.color = "black";
			}
		
		
		
		//document.getElementById("gameForm").reset();
		// use this to check the win; 
		 
		
		 if (checkWin(t1, t2, t3, t4))
		 	win = 1; 
		 
		if(count <= 4){
		moveDown(win); 
		document.getElementById("gameTable").tBodies[0].removeChild(row);  
		type = 0; 
		
		}
		else
		{
		// test alert... need to fix with other JS. or encoding...
		gameOver();
		document.getElementById("gameTable").tBodies[0].removeChild(row);  
		var ret = updateDB();  
		alert(ret); 
		type = 0; 
		}
		
		
	} // end function 
	
		
		
		
		
		
		function ajaxFunction(){
		 var ajaxRequest;  // The variable that makes Ajax possible!
	
 		try{
 		  // Opera 8.0+, Firefox, Safari
 		  ajaxRequest = new XMLHttpRequest();
		 }catch (e){
  		 // Internet Explorer Browsers
  	 try{
   			   ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   		}catch (e) {
   	   try{
    		     ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }
 // Create a function that will receive data 
 // sent from the server and will update
 // div section in the same page.
 ajaxRequest.onreadystatechange = function(){
   if(ajaxRequest.readyState == 4){
      var ajaxDisplay = document.getElementById('roundNum');
      ajaxDisplay.innerHTML = ajaxRequest.responseText;
   }
 }
 // Now get the value from user and pass it to
 // server script.
 
 //var queryString = "?name=" + name ;
 ajaxRequest.open("GET", "updateRoundsWins.php", true);
 ajaxRequest.send(null); 
}
	
	

	function updateWins(){
		 var ajaxRequest;  // The variable that makes Ajax possible!
	
 		try{
 		  // Opera 8.0+, Firefox, Safari
 		  ajaxRequest = new XMLHttpRequest();
		 }catch (e){
  		 // Internet Explorer Browsers
  	 try{
   			   ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   		}catch (e) {
   	   try{
    		     ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }
 // Create a function that will receive data 
 // sent from the server and will update
 // div section in the same page.
 ajaxRequest.onreadystatechange = function(){
   if(ajaxRequest.readyState == 4){
      var ajaxDisplay = document.getElementById('winNum');
      ajaxDisplay.innerHTML = ajaxRequest.responseText;
   }
 }
 // Now get the value from user and pass it to
 // server script.
 
 //var queryString = "?name=" + name ;
 ajaxRequest.open("GET", "updateWins.php", true);
 ajaxRequest.send(null); 
}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	       // time to do game logic. 
	       //-------------------THIS IS MOST IMPORTANT-------------------------
       		 function gameLogic(input, word, location)
        	{
        			// -1 make black
        			// 0 make red
        			// 1 make blue 
        	
        	var character = word.charAt(location);
        		
				        	if(input == character)
				        	{	
				        //	alert("They are Equal Make RED"); 
				        	return 0; 
				        	} 
        		
        		
        		 // check to see if its in the word.
        	 		for(var i = 0; i <=4; i++)
        	 		{
        	 		character = word.charAt(i); 
        	 		if(character == input)
        	 		{ 
        	 			return 1;	// print blue. 
        	 		} 
        	} // end for 
        	 		
        	 	
    
        	// check to see if its in the word.
        	 		for(var i = 0; i <=4; i++)
        	 		{
        	 		character = word.charAt(i); 
        	 		if(character != input)
        	 		{ 
        	 			return -1;	// print blue. 
        	 		} 
        	} // end for 
        	 		
        	
        	
        	} // end function 
   
   			// this will take all of the input and check to see if user won. 
		function checkWin(t1, t2, t3, t4)
		{
		
			clearTimeout(timer); // stop the timer 
			if(t1 == 0 && t2 == 0 && t3 == 0 && t4 == 0){ 

				clearTimeout(timer); // stop the timer 
				var row = document.getElementById("try1");  
				document.getElementById("gameTable").tBodies[0].removeChild(row);  
			
			//alert("You Win!!! Congrats"); 
			var element=document.getElementById("textable");
	    element.innerHTML="Congratulations! You guessed the word " + varWord;
		
		
		
			document.getElementById('btn').style.visibility = 'hidden';
			 
		  document.getElementById('newGame').style.visibility = 'visible'; // set play again to visibile 
		 // update database with rounds ++ and wins based on user id 
		 
		 
		  timer = window.setTimeout("processCheck(1)", 15000); //start timer again.  
		
		 updateWins();
		 return true;
		 } // end if 
		
		 
		 
		  timer = window.setTimeout("processCheck(1)", 15000); //start timer again.  
		
		 
		return false; 
		}
	 

				
		function gameOver()
		{
		clearTimeout(timer); // stop the timer 
		var row = document.getElementById("try1");  
		document.getElementById("gameTable").tBodies[0].removeChild(row);  
		//alert("Game Over! You did not successfully get the right word " +varWord); 
			
		var element=document.getElementById("textable");
	    element.innerHTML="Game Over! You did not successfully get the right word: " + varWord;
		
		
		
		 document.getElementById('btn').style.visibility = 'hidden';
		 // update database with rounds ++ based on user id
		  document.getElementById('newGame').style.visibility = 'visible'; // set play again to visibile 
		}		
				
				
				
				
	// test to move the row down; 
	function moveDown() {  
		var num = arguments[0]; 
		
		
		if (num == 0){
   	     var row = document.getElementById("try1");  
   		 var clone = row.cloneNode(true);  
   		 var trNumber = 0;  
    	var nextElement = row;  
   
  		  while(trNumber < 2 && nextElement != null) {  
    		  nextElement = nextElement.nextSibling;  
				if (nextElement != null && nextElement.nodeName == "TR")  
 				 trNumber++;  
 			   }  
   
    document.getElementById("gameTable").tBodies[0].insertBefore(clone, nextElement);  
    document.getElementById("gameTable").tBodies[0].removeChild(row);  
    
    
 	/*
 		This below will set them to blank. 
 	*/ 
 
   			var charVal2 = document.gameForm.secondChar.value = ""; 
			var charVal3 = document.gameForm.thirdChar.value = "";
			var charVal4 = document.gameForm.fourthChar.value = "";  
			var charVal5 = document.gameForm.fifthChar.value = ""; //set them blank?  
			
			} 
			
   }
   



	// use to clear or refresh the page. 
	function playAgain()
	{ 	// this will let the user get another word and play again. 
		// wipe the entire board clean and start with new board. 
			/*
			document.getElementById("gameForm").reset(); 
			var Parent = document.getElementById("gameTable");
			while(Parent.hasChildNodes())
				{
 			  Parent.removeChild(Parent.firstChild);
				}
				*/ 
				
				win = 0; 
			document.gameForm.submit();	
				
				
	}
			
	
	
	function startRefresh()
	{  // 15000
		ajaxFunction();
		// if the timer runs out from 15 seconds. go to process check
		clearTimeout(timer);
		timer = window.setTimeout("processCheck(1)", 15000); 
		
	}
	

	function moveOnMax(field,nextFieldID){
 		 if(field.value.length >= field.maxLength){
    document.getElementById(nextFieldID).focus();
  }
}
	
	
						
				
</script>
			</head>
				<body onload = "startRefresh()" >
				<div id="wrap">
 				 <div id="top">
  			  <h2> <a href="index.php">Corey Crooks Lingo</a></h2>
   			 <div id="menu">
      <ul>
        <li><a href="lingoHome.php" class="current">New Game</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="Login.php?action=logout">Logout</a></li>
        
        
        
        
      </ul>
    </div>
  </div>
				<center>
					<form name = "gameForm" id ="gameForm">
						<table id = "gameTable" border = "3" width = "90%" height = "125%" cellpadding ="7" cellspacing = "5" class="theTable">
							<!-- <caption class = "title"> Lingo </br></caption> -->
							<h3> Lingo </h3>
							<tr id="try1" align = 'center'>
							<td><?php getCharacter(); ?> </td>
							<td id = "char1"> <input type = "text" name = "secondChar" value = "" maxlength = "1" onKeyup = "moveOnMax(this,'thirdChar')" /></td>
							<td> <input type = "text" id = "thirdChar" name = "thirdChar" value = "" maxlength = "1" onKeyup = "moveOnMax(this,'fourthChar')" /></td>
							<td> <input type = "text" id = "fourthChar" name = "fourthChar" value = "" maxlength = "1" onKeyup = "moveOnMax(this,'fifthChar')"/></td>
							<td> <input type = "text" id = "fifthChar" name = "fifthChar" value = "" maxlength = "1" onKeyup = "moveOnMax(this,'btn')"/></td>
							</tr>
				<!-- need to dynamically update with rows -->

						</table>
						<br>
						<input type = 'button' id="btn" value="Submit"  onclick = 'processCheck()' >
						<input type = 'button' id="newGame" value="Play Again"  onclick = 'playAgain()' style = "visibility: hidden" >
						<input type = 'button' id="index" value="Quit"  onclick = "location.href='index.php'">
						<div id='roundNum'>  </div>
						<div id='winNum'> </div>
					</form>
						<h2 id = 'textable'>  </h2>		
					</center>
					
					
				</body>
</html>