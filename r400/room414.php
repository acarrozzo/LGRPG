<?php
						$roomname = "In the Ocean";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc414'];
//$dangerLVL = $_SESSION['dangerLVL'] = "13"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

$teleport6 = $row['teleport6'];


$equipMount = $row['equipMount'];

include ('battle-sets/blueocean.php'); // blue ocean battle set



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

else if($input=='n' || $input=='north') 
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel north.<br/>';
   		$message="<i>You travel north.</i></br>".$_SESSION['desc413'];
		include ('update_feed.php');   // --- update feed
   			   $results = $link->query("UPDATE $user SET room = '413'"); // -- room change
   			   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		// -------------------------------------------------------------------------- Activate Teleport
				if ($teleport6 == 0) { 	
					$results = $link->query("UPDATE $user SET teleport6 = 1");
					echo $message="<i>You can now teleport to the Blue Ocean Oasis! Click 'blue ocean' in the teleport menu to teleport to this location at any time. </i><br/>";
					include ('update_feed.php'); // --- update feed	  
					}		   
		} else{
 		echo $message="<i>You can't go that way! You need to be in a boat!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}
else if($input=='s' || $input=='south') 
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel south.<br/>';
   		$message="<i>You travel south.</i></br>".$_SESSION['desc415'];
		include ('update_feed.php');   // --- update feed
   			   $results = $link->query("UPDATE $user SET room = '415'"); // -- room change
   			   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		} else{
 		echo $message="<i>You can't go that way! You need to be in a boat!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}
else if($input=='e' || $input=='east') 
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel east.<br/>';
   		$message="<i>You travel east.</i></br>".$_SESSION['desc406'];
		include ('update_feed.php');   // --- update feed
   			   $results = $link->query("UPDATE $user SET room = '406'"); // -- room change
   			   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		} else{
 		echo $message="<i>You can't go that way! You need to be in a boat!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}







// ----------------------------------- end of room function
include ('function-end.php');
}
?>