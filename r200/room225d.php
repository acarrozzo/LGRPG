<?php
						$roomname = "Guild Master Quinn's Office";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc225d'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

$ringofmanaregenII=$row['ringofmanaregenII'];



if (1==2){} //nada
// -------------------------------------------------------------------------- ROOM ACTIONS
if ($input=="grab ringOLD"){
		if ($ringofmanaregenII < 1) { 
			echo $message = "You grab a Ring of Mana Regen II.<br/>";
			$query = $link->query("UPDATE $user SET ringofmanaregenII = ringofmanaregenII + 1 "); 
			include ('update_feed.php'); // --- update feed
			}
		else { 	echo 
			$message = "You already have a Ring of Mana Regen II. Come back here if you lose it. <br/>";
			include ('update_feed.php'); // --- update feed
			}
}
// -------------------------------------------------------------------------- GRAB RING
if($input=='grab ring') 
{	if ($ringofmanaregenII >= 1)
	 	{ echo $message="<div class='menuAction'><i class='fa fa-times lightred'></i>You already have a Ring of Mana Regen II. If you lose it come back here for another one.</div>"; include ('update_feed.php'); // --- update feed
		}
	else
	 	{ echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up'></i>You grab a Ring of Mana Regen II out of the bowl.</div>"; include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET ringofmanaregenII = ringofmanaregenII + 1");
	 	}
}


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
{	echo 'You travel west<br/>';
   $message="<i>You travel west</i></br>".$_SESSION['desc225b'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '225b'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}

// ----------------------------------- end of room function
include ('function-end.php');
}
?>
