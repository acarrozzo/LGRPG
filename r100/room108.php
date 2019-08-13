<?php
// -- 108 -- Dirt Path Behind a Hill
$roomname = "Dirt Path Behind a Hill";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc108'];
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

else if($input=='nw' || $input=='northwest') 
{	echo 'You travel northwest<br/>';
   $message="<i>You travel northwest</i></br>".$_SESSION['desc109'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 109"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}

else if($input=='e' || $input=='east') 
{	echo 'You travel east<br/>';
   $message="<i>You travel east</i></br>".$_SESSION['desc107'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 107"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
// ----------------------------------- end of room function
include ('function-end.php');
}
?>
