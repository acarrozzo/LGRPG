<?php
						$roomname = "Red Town Living Quarters";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc213'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   



//include ('battle-sets/thief.php'); 
$meat = $row['cookedmeat'];

// -------------------------------------------------------------------------- ROOM ACTIONS
if($input=='grab meat') 
{	if ($meat >= 5)
	 	{ echo $message="<div class='menuAction'><i class='fa fa-times lightred'></i>You already have 5 pieces of meat you carnivore! Come back later if you eat them all.</div>"; include ('update_feed.php'); // --- update feed
		}
	else
	 	{ echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up'></i>You grab 5 pieces of meat off the table!</div>"; include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET cookedmeat = 5");
	 	}
}
// -------------------------------------------------------------------------- ROOM ACTIONS
if ($input=="get cooked meatOLD" || $input == "get meatOLD"){
		if ($meat < 5) { 
			echo $message = "You grab some meat off the table!<br/>";
			$query = $link->query("UPDATE $user SET cookedmeat = cookedmeat + 1 "); 
			include ('update_feed.php'); // --- update feed
			}
		else { 	echo $message = "You already have 5 pieces of meat you carnivore! Come back later if you eat them all.<br/>";
			include ('update_feed.php'); // --- update feed
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
   $message="<i>You travel west</i></br>".$_SESSION['desc212'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 212"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}



// ----------------------------------- end of room function
include ('function-end.php');
}
?>
