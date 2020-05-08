<?php session_start(); ?>

<?php include('head.php');?>

<!--
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable = no">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="apple-mobile-web-app-capable" content="yes">


<link type="text/css" rel="stylesheet" href="css/lg.css" />
<link rel="stylesheet" type="text/css" href="css/font-awesome.css" >
</head>
-->
<?php



$username = $_SESSION['username'] = null;
$pass = $_SESSION['pass'] = null;


 //$past = time() - 100;

 //this makes the time in the past to destroy the cookie
 //setcookie(ID_my_site, $username, $past);
 //setcookie(Key_my_site, $pass, $past);

echo '<div id="title" class="">
<h3>You have Logged Out</h3>
<a class="btn" href="index.php">RETURN HOME</a>
</div> ';
//echo '<a class="btn" href="login.php">Login</a> ';
//echo '<a class="btn" href="register.php">Register</a> </div>';

// header("Location: login.php");
?>
<?php session_destroy(); ?>
