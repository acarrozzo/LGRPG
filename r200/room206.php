<?php
						$roomname = "Iron Altar";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc206'];
//$dangerLVL = $_SESSION['dangerLVL'] = "13"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   




	
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
else if($input=='s' || $input=='south') 
{	echo 'You travel south<br/>';
   	$message="<i>You travel south</i></br>".$_SESSION['desc205'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = 205"); // -- room change
   	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}



// ----------------------------------- end of room function
include ('function-end.php');
}
?>
