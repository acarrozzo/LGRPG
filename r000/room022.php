<?php
// -- 022 -- Dirt Road East
$roomname = "Dirt Road East";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc022'];

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
 	$message="<i>You travel west</i><br/>".$_SESSION['desc006'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '006'"); // -- room change
}
else if($input=='e' || $input=='east') 
{	echo 'You travel east<br/>';
 	$message="<i>You travel east</i><br/>".$_SESSION['desc023'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '023'"); // -- room change
}


// ----------------------------------- end of room function
include ('function-end.php');
}
?>
