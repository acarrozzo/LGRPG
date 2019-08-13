<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link type="text/css" rel="stylesheet" href="style-login.css" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<?php 
session_start();

 // Connects to your Database 
 $con = mysql_connect("localhost:8889","root","root") or die(mysql_error()); 
 mysql_select_db("lg_db") or die(mysql_error()); 

 //This code runs if the form has been submitted
 if (isset($_POST['submit'])) { 
 
 //This makes sure they did not leave any fields blank
 if (!$_POST['username'] | !$_POST['pass'] | !$_POST['pass2'] ) {
 		echo'<p>You did not complete all of the required fields</p>';
		die('<a class="btn" href=register.php>Register</a>');
 	}

 // checks if the username is in use
 	if (!get_magic_quotes_gpc()) {
 		$_POST['username'] = addslashes($_POST['username']);
 	}
 $usercheck = $_POST['username'];
// $check = mysql_query("SELECT TABLE FROM $usercheck") 
//or die(mysql_error());
// $check2 = mysql_num_rows($check);
 
 $checktable = mysql_query("SHOW TABLES LIKE '$usercheck'")
 or die(mysql_error());
$check2 = mysql_num_rows($checktable); 

 //if the name exists it gives an error
 if ($check2 != 0) {
 		echo '<p>Sorry, the username '.$_POST['username'].' is already in use.</p>';
		die('<a class="btn" href=register.php>Register</a>');

 				}

 // this makes sure both passwords entered match
 	if ($_POST['pass'] != $_POST['pass2']) {
 		echo'<p>Your passwords did not match. </p>';
				die('<a class="btn" href=register.php>Register</a>');

 	}

	// here we encrypt the password and add slashes if needed
 	$_POST['pass'] = md5($_POST['pass']);
 	if (!get_magic_quotes_gpc()) {
 		$_POST['pass'] = addslashes($_POST['pass']);
 		$_POST['username'] = addslashes($_POST['username']);
 			}

 // now we insert it into the database
 //	 $insert = "INSERT INTO users (username, password)
 //		VALUES ('".$_POST['username']."', '".$_POST['pass']."')";
   
$user =	$_POST['username'];
	global $user;

$_SESSION['username']='$username';

	
 // now we insert it into the database
 	 $create = "CREATE TABLE $user (
username VARCHAR(60), 
password VARCHAR(60),
room int,

level int,
xp int,
bp int,
gold int,
 
hp int,
hpmax int,
sp int,
maxsp int,

att int,
def int,
mag int
)";
mysql_query($create,$con);
$insert = ("INSERT INTO $user VALUES ('".$_POST['username']."', '".$_POST['pass']."',0,
1,0,1,100,
10,10,2,2,
2,2,2)"); 

mysql_query($insert,$con);

	?>
 <?
 echo '<p>Thank you, you have registered - <span>'.$_POST['username'].' </span></p>';
 echo '<a class="btn" href="login.php">Login</a> ';
?>
 <?php 
 } 
 else 
 {	
 ?>
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
 <p class="lft">Username: </p>
 <span> <input type="text" name="username" maxlength="60"></span>
 <p class="lft">Password:</p>
 <span> <input type="password" name="pass" maxlength="10"></span>
 <p class="lft">Confirm Password:</p>
 <span> <input type="password" name="pass2" maxlength="10"></span>
 <input class="btn" type="submit" name="submit" value="Register">
 </form>
 <?php
		echo '<a class="btn" href=login.php>Login</a>';
 }
 ?> 

</body>
</html>