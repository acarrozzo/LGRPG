<?php
						$roomname = "Underwater Flower Patch";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc494'];

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   






	
	
	if($input=='get flower' || $input=='pick flower' || $input=='pick up flower')  // ---- PICK FLOWER
	{
		if ( $row['flower'] <= 1 )
		{
		echo $message="FOOL! You just wasted a trip. You can only pick a flower here if you already have 2 in your inventory. Return to the Grassy Field and then the Red Town Babylon Gardens to get the first 2.
<br/>";
		include ('update_feed.php'); // --- update feed
		}
		else if ( $row['flower'] >= 3 )
		{
		echo 'You cannot pick up another flower here. You already have 3.<br/>';
		$message="<i>You cannot pick up another flower here. You already have 3.</i></br>";
		include ('update_feed.php'); // --- update feed
		}
		else {
		echo 'You pick a flower up from the ocean floor. You now have 3 flowers!<br/>';
		$message="<i>You pick a flower up from the ocean floor. You now have 3 flowers!</i></br>";
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET flower = flower + 1");
		}
	}
	
	

//include ('battle-sets/blueocean-underwater.php'); // blue ocean battle set
include ('random-encounters/blueocean-underwater.php'); // blue ocean battle set

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
{	if ($_SESSION['breathingwater'] >= 1)
			  { echo 'You swim west<br/>';
   		$message="<i>You swim west</i></br>".$_SESSION['desc493'];
		include ('update_feed.php');   // --- update feed
   			   $results = $link->query("UPDATE $user SET room = '493'"); // -- room change
   			   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		} else{
 		echo $message="<i>You can't swim that way! You need to be breathing water!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}

// ----------------------------------- end of room function
include ('function-end.php');
}
?>