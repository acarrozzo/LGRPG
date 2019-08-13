<?php
						$roomname = "On a Muddy Path approaching a Swamp";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc316'];
//$dangerLVL = $_SESSION['dangerLVL'] = "3-7"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   


include ('battle-sets/stoneminepath.php'); // stone mine path enemies

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

else if($input=='w' || $input=='west') 
{	
	if (1==2) // swamp check - something from BLUE CITY!
	{
	echo 'You travel west into the swamp.<br/>';
 	$message="<i>You travel west into the swamp.</i><br/>".$_SESSION['desc316'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = 316"); // -- room change
	}
	else
	{
	echo $message="<i>The Blue Guard prevent you from entering the Swamp.</i><br/>";
	include ('update_feed.php'); // --- update feed	
		
	}
}
else if($input=='se' || $input=='southeast') 
{			echo 'You travel southeast<br/>';
   	$message="<i>You travel southeast</i></br>".$_SESSION['desc314'];
	include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = 314"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}





// ----------------------------------- end of room function
include ('function-end.php');
}
?>