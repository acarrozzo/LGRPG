<?php session_start(); ?>
<link type="text/css" rel="stylesheet" href="style-login.css" />

<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);
?>

<?php

$_SESSION['username'] = $username = null;
$_SESSION['pass'] = $password = null;
echo '*** username reset *** '.$username.'<br><br><a class="btn login" href="index.php">Register new user</a>';

 ?>
