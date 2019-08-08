<?php
						$roomname = "An Underwater Alcove";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc493'];

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   



include ('battle-sets/blueocean-underwater.php'); // blue ocean battle set
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

else if($input=='nw' || $input=='northwest') 
{	if ($_SESSION['breathingwater'] >= 1)
			  { echo 'You swim northwest<br/>';
   		$message="<i>You swim northwest</i></br>".$_SESSION['desc480'];
		include ('update_feed.php');   // --- update feed
   			   $results = $link->query("UPDATE $user SET room = '480'"); // -- room change
   			   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		} else{
 		echo $message="<i>You can't swim that way! You need to be breathing water!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}
else if($input=='e' || $input=='east') 
{	
	if ($_SESSION['underwaterswitch'] != 1) 
	{ 
	echo "A massive Coral Door blocks the way to the east.<br/>";
	$message="<i>A massive Coral Door blocks the way to the east.</i><br/>";
	include ('update_feed.php'); // --- update feed
	}
	else if ($_SESSION['breathingwater'] >= 1)
			  { echo 'You swim east<br/>';
   		$message="<i>You swim east</i></br>".$_SESSION['desc494'];
		include ('update_feed.php');   // --- update feed
   			   $results = $link->query("UPDATE $user SET room = '494'"); // -- room change
   			   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		} else{
 		echo $message="<i>You can't swim that way! You need to be breathing water!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}

else if($input=='u' || $input=='up') 
{			echo 'You swim up to the surface of the Ocean.<br/>';
   	$message="<i>You swim up to the surface</i></br>".$_SESSION['desc417'];
	include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = 417"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}

// ----------------------------------- end of room function
include ('function-end.php');
}
?>