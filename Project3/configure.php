<?php
class Configure
{
    var $admin_email;
    var $from_address;
    var $username;
    var $pwd;
    var $database;
    var $tablename;
    var $connection;
    var $rand_key;
    var $error_message;


  //-----Initialization -------
    function Configure()
    {
        $this->sitename = 'CoreyCrooksLingo.com';
        $this->rand_key = '0iQx5oBk66oVZep';
    }
    
    function InitDB()
    {
        $this->db_host  = 'localhost';
        $this->username = 'CrooksC';
        $this->pwd  = 'lulls.dug';
        $this->database  = 'CrooksC';
        $this->tablename = 'users';
        
    }
    function SetAdminEmail($email)
    {
        $this->admin_email = $email;
    }
    
    function SetWebsiteName($sitename)
    {
        $this->sitename = $sitename;
    }
    
    function SetRandomKey($key)
    {
        $this->rand_key = $key;
    }
    
    
    //-------Main Operations ----------------------
    function RegisterUser() // this will ultimately register the user for the application
    {
        if(!isset($_POST['submitted']))
        {
           return false; // double check 
        }
        // open the connection
  		$con = mysqli_connect('localhost','CrooksC','lulls.dug','CrooksC');
  		
  		// key for auto increment each created user 
  		$key = 0; 
  		
  		 $username= $_POST['username']; // id_user
  		 $sSelect = "SELECT FROM users WHERE username = ".$username." LIMIT 1";
	
		$result = mysqli_query($con, "SELECT FROM users WHERE username = ".$username." LIMIT 1");
     if ($result) {

    /* determine number of rows result set */
    $row_cnt = mysqli_num_rows($result);

	if ($rows > 0) {
  			   echo 'error, it exists!';
 			}

  		   	else 
  		   	{ // register user.
  		   	
  		   	$name = $_POST['name'];
  		   	$password = $_POST['password']; 
  		   	$username = $_POST['username'];
  		   	$email = $_POST['email']; 
  		   	
  		   	$query = "INSERT INTO `users` (`id_user`,`name`,`password`,`username`,`email`,`num_wins`,`num_games`) VALUES ($key, '".$name."', '".$password."', '".$username."', '".$email."', 0, 0);";
		
			if($con->query($query))
			{echo "A new entry has been added with the `id` of {$con->insert_id}.";
				$key++;
				header("Location: Login.php"); 
			} 
		}
	
  		   	
  		}
  		
  
  		
    }
    
    
    
    
    function checkUser()
    {
     $username= $_POST['username']; // id_user
  		 $result = mysqli_query($con, "SELECT * FROM users WHERE username = '" . mysql_escape_string($_POST['username']) . "';");
  		 
  		   	if($result){
  		   	   	// false = user is already registered.
  		   	echo "Error: user account already registered";  
  		  // 	header("Location: register.php"); // redirects back to register. 
  		   	}
  		   	else 
    	{
    	}
    
    
    
    }
    
    


   function countWins()
    {


    }

    function gamesPlayed()
    {

    }
    
    
    function updateWins()
    {
    }
    
    function updateGames()
    {
    }



 function DBLogin()
    {

        $this->connection = mysqli_connect($this->db_host,$this->username,$this->pwd);
        return true;
    }    


function CreateTable()
    {
    $con = mysqli_connect('localhost','CrooksC','lulls.dug','CrooksC');
    /*
    	$sql = "CREATE TABLE `users` (
 		`id_user` INT NOT NULL,
 		`name` VARCHAR(25) NOT NULL,
 		`password` VARCHAR(100) NOT NULL,
 		`username` VARCHAR(100) NOT NULL,
 		`email` VARCHAR(100) NOT NULL,
 		`num_wins` INT NOT NULL,
 		`num_games` INT NOT NULL, 
 		 PRIMARY KEY ( id_user )
 		
 		)"; 
	*/ 
	
	$sql = "CREATE TABLE `users` (
 		`uid` INT NOT NULL auto_increment,
 		`username` VARCHAR(20) NOT NULL,
 		`password` char(40) NOT NULL,
 		`email`    VARCHAR(200) NOT NULL,
 		`num_rounds` INT NOT NULL, 
 		`num_wins`	INT NOT NULL, 
 	 		 PRIMARY KEY (uid),
 		 UNIQUE KEY (username)
 		)"; 
	
	
	
               $conn = $this->connection;
        
if ($con->query($sql) === TRUE) {
  echo 'Table "users" successfully created';
}
else {
 echo 'Error: '. $con->error;
}
        return true;
    }





function ResetPassword()
    {
        if(empty($_GET['email']))
        {
           echo "Email is empty!";
            return false;
        }
        if(empty($_GET['code']))
        {
            echo"reset code is empty!";
            return false;
        }
        $email = trim($_GET['email']);
        $code = trim($_GET['code']);
        
        if($this->GetResetPasswordCode($email) != $code)
        {
           echo "Bad reset code!";
            return false;
        }
        
        $user_rec = array();
        if(!$this->GetUserFromEmail($email,$user_rec))
        {
            return false;
        }
        
        $new_password = $this->ResetUserPasswordInDB($user_rec);
        if(false === $new_password || empty($new_password))
        {
            echo "Error updating new password";
            return false;
        }
        
        if(false == $this->SendNewPassword($user_rec,$new_password))
        {
            echo "Error sending new password";
            return false;
        }
        return true;
    }
    
    function ChangePassword()
    {
        if(!$this->CheckLogin())
        {
            echo "Not logged in!";
            return false;
        }
        
        if(empty($_POST['oldpwd']))
        {
            echo "Old password is empty!";
            return false;
        }
        if(empty($_POST['newpwd']))
        {
            echo "New password is empty!";
            return false;
        }
        
        $user_rec = array();
        if(!$this->GetUserFromEmail($this->UserEmail(),$user_rec))
        {
            return false;
        }
        
        $pwd = trim($_POST['oldpwd']);
        
        if($user_rec['password'] != md5($pwd))
        {
          echo "The old password does not match!";
            return false;
        }
        $newpwd = trim($_POST['newpwd']);
        
        if(!$this->ChangePasswordInDB($user_rec, $newpwd))
        {
            return false;
        }
        return true;
    }

    function RedirectToURL($url)
    {
        header("Location: $url");
        exit;
    }
    

 function CheckLogin()
    {
         if(!isset($_SESSION)){ session_start(); }

         $sessionvar = $this->GetLoginSessionVar();
         
         if(empty($_SESSION[$sessionvar]))
         {
            return false;
         }
         return true;
    }
    
     function GetSelfScript()
    {
        return htmlentities($_SERVER['PHP_SELF']);
    }    
    
    function SafeDisplay($value_name)
    {
        if(empty($_POST[$value_name]))
        {
            return'';
        }
        return htmlentities($_POST[$value_name]);
    }
    
    
    
    function UserFullName()
    {
        return isset($_SESSION['name_of_user'])?$_SESSION['name_of_user']:'';
    }
    
    function UserEmail()
    {
        return isset($_SESSION['email_of_user'])?$_SESSION['email_of_user']:'';
    }
    
    function LogOut()
    {
        session_start();
        
        $sessionvar = $this->GetLoginSessionVar();
        
        $_SESSION[$sessionvar]=NULL;
        
        unset($_SESSION[$sessionvar]);
    }
    
    function EmailResetPasswordLink()
    {
        if(empty($_POST['email']))
        {
            $this->HandleError("Email is empty!");
            return false;
        }
        $user_rec = array();
        if(false === $this->GetUserFromEmail($_POST['email'], $user_rec))
        {
            return false;
        }
        if(false === $this->SendResetPasswordLink($user_rec))
        {
            return false;
        }
        return true;
    }
    









} // end class



?>