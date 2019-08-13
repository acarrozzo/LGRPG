<?php
						$roomname = "On a Stone Path near Red Town";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc301'];
//$dangerLVL = $_SESSION['dangerLVL'] = "3-7"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

if ($row['grandquest3']=='0'){
		$query = $link->query("UPDATE $user SET grandquest3 = 1 "); 
		echo $message = "You start GRAND QUEST 3! Help the good dwarves of the Stone Mining Village and anybody else you find out on the Blue Ocean (Complete Quests 31-50)<br/>";
		include ('update_feed.php'); // --- update feed
}	


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
else if($input=='e' || $input=='east') 
{			echo 'You travel east and enter the Red Town Map<br/>';
   	$message="<i>You travel east and enter the Red Town Map</i></br>".$_SESSION['desc205'];
	include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = 205"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='w' || $input=='west') 
{			echo 'You travel west<br/>';
   	$message="<i>You travel west</i></br>".$_SESSION['desc302'];
	include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = 302"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}






// ----------------------------------- end of room function
include ('function-end.php');
}
?>