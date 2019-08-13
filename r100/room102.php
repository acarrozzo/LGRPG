<?php
// -- 102 -- Path to the Forest
$roomname = "Path to the Forest near a Farm";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc102'];
//$dangerLVL = $_SESSION['dangerLVL'] = "1"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

	$teleport2 = $row['teleport2'];


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
 	$message="<i>You travel northwest</i><br/>".$_SESSION['desc101'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = 101"); // -- room change
}
else if($input=='n' || $input=='north') 
{	echo 'You travel north<br/>';
 	$message="<i>You travel north</i><br/>".$_SESSION['desc103'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = 103"); // -- room change
}
else if($input=='e' || $input=='east') 
{	echo 'You travel east<br/>';
 	$message="<i>You travel east</i><br/>".$_SESSION['desc104'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = 104"); // -- room change
	// -------------------------------------------------------------------------- Activate Forest Path Teleport
		if ($teleport2 == 0) { 	
			$results = $link->query("UPDATE $user SET teleport2 = 1");
			echo $message="<i>You can now teleport to the Forest Path! Click 'forest path' to teleport to this location at any time. </i><br/>";
			include ('update_feed.php'); // --- update feed	  
			}	
}



// ----------------------------------- end of room function
include ('function-end.php');
}
?>
