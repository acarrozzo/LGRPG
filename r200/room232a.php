<?php
							  $roomname = "South Sewer EXIT";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc232a'];
//$dangerLVL = $_SESSION['dangerLVL'] = "1-8"; // danger level

include ('function-start.php'); 
include ('battle-sets/sewers.php'); 


// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   


if ( 1 == 2 ) { } //nada

// -------------------------------------------------------------------------- ROOM ACTIONS




// -------------------------------------------------------------------------- END BATTLE BLOCK


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
   	$message="<i>You travel west</i></br>".$_SESSION['desc232f'];
	include ('update_feed.php');   // --- update feed
   		   $results = $link->query("UPDATE $user SET room = '232f'"); // -- room change
   		   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='nw' || $input=='northwest') 
{			echo 'You travel nortwesth<br/>';
   	$message="<i>You travel northwest</i></br>".$_SESSION['desc232e'];
	include ('update_feed.php');   // --- update feed
   		   $results = $link->query("UPDATE $user SET room = '232e'"); // -- room change
   		   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='ne' || $input=='northeast') 
{			echo 'You travel northeast<br/>';
   	$message="<i>You travel northeast</i></br>".$_SESSION['desc232b'];
	include ('update_feed.php');   // --- update feed
   		   $results = $link->query("UPDATE $user SET room = '232b'"); // -- room change
   		   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='u' || $input=='up') 
{			echo 'You travel up<br/>';
   	$message="<i>You travel up</i></br>".$_SESSION['desc232'];
	include ('update_feed.php');   // --- update feed
   		   $results = $link->query("UPDATE $user SET room = '232'"); // -- room change
   		   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}


// ----------------------------------- end of room function
include ('function-end.php');
}
?>
