<?php
						$roomname = "Mining Guild EXIT";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc308b'];

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   


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
{			echo 'You travel west<br/>';
   	$message="<i>You travel west</i></br>".$_SESSION['desc308a'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '308a'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}

else if($input=='u' || $input=='up')  
{			
	echo 'You travel up to the Dwarf Village<br/>';
   $message="<i>You travel up to the Dwarf Village</i></br>".$_SESSION['desc308'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '308'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}






// ----------------------------------- end of room function
include ('function-end.php');
}
?>