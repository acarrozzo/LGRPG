<?php
						$roomname = "Stone Mine Gate";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc205'];
//$dangerLVL = $_SESSION['dangerLVL'] = "1"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

$quest19=$row['quest19']; 


include ('battle-sets/thief.php'); 

	
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
{	
	if ($quest19 >= 2)
	{
	echo 'You travel west to the stone mine map<br/>';
 	$message="<i>You travel west to the stone mine map.</i><br/>".$_SESSION['desc301'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = 301"); // -- room change
	}
	else
	{
	echo $message="<i>As you attempt to go west you are stopped by a Dwarf Guard. You need to join the WARRIOR'S GUILD if you wish to enter the Stone Mine Map.</i><br/>";
	include ('update_feed.php'); // --- update feed	
	}
}
else if($input=='e' || $input=='east') 
{	echo 'You travel east<br/>';
   $message="<i>You travel east</i></br>".$_SESSION['desc204'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 204"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}


// ----------------------------------- end of room function
include ('function-end.php');
}
?>
