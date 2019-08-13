<?php
// -- 114 -- On a Stone Path by a Magical Gate
$roomname = "On a Stone Path by a Magical Gate";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc114'];
//$dangerLVL = $_SESSION['dangerLVL'] = "1"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

$quest20=$row['quest20']; 


include ('battle-sets/forest-path.php'); 

	
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


else if($input=='n' || $input=='north') 
{	
	if ($quest20 >=2 ) 
	{
	echo 'You travel north through Magical Gate the and enter the Path to the Mountains<br/>';
 	$message="<i>You travel north through Magical Gate the and enter the Path to the Mountains</i><br/>".$_SESSION['desc501'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = 501"); // -- room change
	}
	else
	{
	echo $message="<i>You cannot pass the Magical Gate yet! Join the Wizard's Guild to pass.</i><br/>";
	include ('update_feed.php'); // --- update feed	
		
	}
}
else if($input=='sw' || $input=='southwest') 
{	echo 'You travel southwest<br/>';
   $message="<i>You travel southwest</i></br>".$_SESSION['desc115'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 115"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='s' || $input=='south') 
{	echo 'You travel south<br/>';
   $message="<i>You travel south</i></br>".$_SESSION['desc113'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 113"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
// ----------------------------------- end of room function
include ('function-end.php');
}
?>
