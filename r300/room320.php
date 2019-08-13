<?php
						$roomname = "On a Grass Path near the Savannah";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc320'];
//$dangerLVL = $_SESSION['dangerLVL'] = "3-7"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

include ('battle-sets/stoneminepath.php'); // 1/20 thief encounter

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
else if($input=='n' || $input=='north') 
{			echo 'You travel north<br/>';
   	$message="<i>You travel north</i></br>".$_SESSION['desc319'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '319'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='s' || $input=='south') 
{	if (1 == 2 ) {
	echo 'You go south!<br/>';
   $message="<i>You go south! </i></br>".$_SESSION['desc320'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '320'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	}
	else {
		echo $message = "The path to the Savannah is blocked by a Gray Guard. You're not sure what he wants.<br>";
		include ('update_feed.php'); // --- update feed
	}
}







// ----------------------------------- end of room function
include ('function-end.php');
}
?>