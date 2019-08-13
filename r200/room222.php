<?php
						$roomname = "Red Town Royal Courtyard";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc222'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

// include ('battle-sets/thief.php');


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
else if($input=='s' || $input=='south') 
{	echo 'You travel south<br/>';
   $message="<i>You travel south</i></br>".$_SESSION['desc221'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 221"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}

else if($input=='n' || $input=='north') 
{	echo 'You travel north<br/>';
   $message="<i>You travel north</i></br>".$_SESSION['desc223'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 223"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='w' || $input=='west') 
{	echo 'You travel west<br/>';
   $message="<i>You travel west</i></br>".$_SESSION['desc224'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 224"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='u' || $input=='up') 
{	echo 'You travel up<br/>';
   $message="<i>You travel up</i></br>".$_SESSION['desc222z'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '222z'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}





// ----------------------------------- end of room function
include ('function-end.php');
}
?>
