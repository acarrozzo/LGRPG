<?php
						$roomname = "Near an Oasis";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc420'];
//$dangerLVL = $_SESSION['dangerLVL'] = "13"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

$equipMount = $row['equipMount'];
include ('battle-sets/blueocean.php'); // blue ocean battle set


if (1==2){} //nada


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
else if($input=='sw' || $input=='southwest') 
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel southwest.<br/>';
   		$message="<i>You travel southwest.</i></br>".$_SESSION['desc422'];
		include ('update_feed.php');   // --- update feed
   			   $results = $link->query("UPDATE $user SET room = '422'"); // -- room change
   			   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		} else{
 		echo $message="<i>You can't go that way! You need to be in a boat!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}
else if($input=='e' || $input=='east') 
{	
		echo 'You travel east.<br/>';
   		$message="<i>You travel east.</i></br>".$_SESSION['desc413'];
		include ('update_feed.php');   // --- update feed
   			   $results = $link->query("UPDATE $user SET room = '413'"); // -- room change
   			   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='d' || $input=='down') 
{	if ($_SESSION['breathingwater'] >= 1)
			  { echo 'You swim underwater!<br/>';
   		$message="<i>You swim underwater!</i></br>".$_SESSION['desc482'];
		include ('update_feed.php');   // --- update feed
   			   $results = $link->query("UPDATE $user SET room = '482'"); // -- room change
   			   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		} else{
 		echo $message="<i>You can't go below the ocean! You need to be breathing water!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}






// ----------------------------------- end of room function
include ('function-end.php');
}
?>