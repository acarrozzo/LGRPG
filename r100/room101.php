<?php
// -- 101 -- Path to the Forest
$roomname = "Path to the Forest";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc101'];
//$dangerLVL = $_SESSION['dangerLVL'] = "1"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   



include ('battle-sets/forest-path.php'); 

	
// -------------------------------------------------------------------------- ROOM ACTIONS




// -------------------------------------------------------------------------- Battle TRAVEL
if ((	$input=='n' || $input=='north' || $input=='ne' || $input=='northeast' ||
		$input=='e' || $input=='north' || $input=='se' || $input=='southeast' ||
		$input=='s' || $input=='south' || $input=='sw' || $input=='southwest' ||
		$input=='w' || $input=='west' || $input=='nw' || $input=='northwest' ||
		$input=='u' || $input=='up' || $input=='d' || $input=='down' )  && $infight >= 1) {
	echo 'You cannot leave the room in the middle of battle!<br/>';
   	$message="<i>You cannot leave the room in the middle of battle!</i><br/>";
	include ('update_feed.php'); // --- update feed
	}
// -------------------------------------------------------------------------- TRAVEL
else if($input=='w' || $input=='west') 
{	echo 'You travel west and enter the grassy field<br/>';
 	$message="<i>You travel west and enter the grassy field</i><br/>".$_SESSION['desc023'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = 23"); // -- room change
}
else if($input=='se' || $input=='southeast') 
{	echo 'You travel southeast';
 	$message="<i>You travel southeast</i><br/>".$_SESSION['desc102'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = 102"); // -- room change
}



// ----------------------------------- end of room function
include ('function-end.php');
}
?>
