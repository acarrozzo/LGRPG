<?php
// -- 105 -- On a Stone Path
$roomname = "Traveling Wizard - Basic Spells";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc105'];
//$dangerLVL = $_SESSION['dangerLVL'] = "9191919191919"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');   
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   


$travelingwizardFlag = $row['travelingwizardFlag'];

include ('battle-sets/forest-path.php'); 

// -------------------------------------------------------------------------- ROOM ACTIONS

// ---------------------- SKILL FLAG! ---------------------- //
if ($travelingwizardFlag==0) {
echo  $message = "<div class='menuAction'><i span class='fa fa-check-square-o'></i>
You can now learn new SPELLS from the Traveling Wizard!</div> ";
include ('update_feed.php'); // --- update feed
$results = $link->query("UPDATE $user SET travelingwizardFlag = 1");
}




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
   $message="<i>You travel south</i></br>".$_SESSION['desc104'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 104"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}

else if($input=='n' || $input=='north') 
{	echo 'You travel north<br/>';
   $message="<i>You travel north</i></br>".$_SESSION['desc112'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 112"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}

// ----------------------------------- end of room function
include ('function-end.php');
}
?>
