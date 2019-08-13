<?php
							  $roomname = "At a Dead End in the Sewers";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc232l'];
//$dangerLVL = $_SESSION['dangerLVL'] = "1-8"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

include ('battle-sets/sewers.php'); 

if ( 1 == 2 ) { } //nada

// -------------------------------------------------------------------------- ROOM ACTIONS
else if ($input == 'search')
{
	echo 'You search the room and find a hidden passageway to the southwest! That was easy.<br/>';
	$message="You search the room and find a hidden passageway to the southwest! That was easy.<br/>";
	include ('update_feed.php'); // --- update feed
	$_SESSION['thievesdensearch'] = 1;
}



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



else if($input=='ne' || $input=='northeast') 
{			echo 'You travel northeast<br/>';
   	$message="<i>You travel northeast</i></br>".$_SESSION['desc232h'];
	include ('update_feed.php');   // --- update feed
   		   $results = $link->query("UPDATE $user SET room = '232h'"); // -- room change
   		   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='sw' || $input=='southwest') 
{			
	if ($_SESSION['thievesdensearch'] != 1) 
	{ 
	echo "You don't see an exit to the southwest<br/>";
	$message="<i>You don't see an exit to the southwest. Why don't you SEARCH the room and see what you find.</i><br/>";
	include ('update_feed.php'); // --- update feed
	}
	else {
	echo 'You travel southwest through the hidden passageway<br/>';
	$message="<i>You travel southwest through the hidden passageway</i><br/>".$_SESSION['desc232m'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '232m'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	$_SESSION['thievesdensearch'] = 0;
	}
}


// ----------------------------------- end of room function
include ('function-end.php');
}
?>
