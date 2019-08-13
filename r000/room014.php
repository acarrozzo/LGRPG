<?php
// -- 014 -- Dirt Road West
$roomname = "Dirt Road West";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc014'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 

// -------------------------------------------------------------------------- ROOM ACTIONS




// -------------------------------------------------------------------------- TRAVEL
if($input=='w' || $input=='west') 
{	echo 'You travel west<br/>';
 	$message="<i>You travel west</i><br/>".$_SESSION['desc017'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '017'"); // -- room change
}
else if($input=='e' || $input=='east') 
{	echo 'You travel east<br/>';
 	$message="<i>You travel east</i><br/>".$_SESSION['desc004'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '004'"); // -- room change
}


// ----------------------------------- end of room function
include ('function-end.php');
}
?>
