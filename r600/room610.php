<?php
						$roomname = "Master Trainer | Master Skills";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc610'];

include ('function-start.php');

// -------------------------DB CONNECT!
include ('db-connect.php');
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){







// ---------------------- TEACH SKILLS ---------------------- //
























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
	echo 'You travel west<br/>';
	$message="<i>You travel west</i><br/>".$_SESSION['desc611'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '611'"); // -- room change
	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	}

else if($input=='e' || $input=='east')
{			echo 'You travel east<br/>';
   	$message="<i>You travel east</i></br>".$_SESSION['desc608'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '608'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='sw' || $input=='southwest')
{
	if ($_SESSION['flying'] >= 1)
		{
		echo 'You fly down the waterfall to the grassy field.<br/>';
   		$message="<i>You fly down the waterfall to the grassy field.</i></br>".$_SESSION['desc020'];
		include ('update_feed.php');   // --- update feed
   			   $results = $link->query("UPDATE $user SET room = '020'"); // -- room change
   			   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		}
	else{
 		echo $message="<i>You will not be able to go southwest unless you are flying.</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}


// ----------------------------------- end of room function
include ('function-end.php');
}
?>
