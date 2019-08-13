<?php
						$roomname = "In the Forest atop a Hill";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc135'];
//$dangerLVL = $_SESSION['dangerLVL'] = "5-13"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

    $blueberry=$row['blueberry'];

include ('battle-sets/forest.php');
include ('function-choptree.php');

if($input=='pick blueberry' || $input=='pick berry')  // ---- PICK REDBERRY
{
	if ( $blueberry >= 15 )
	{
	echo $message="<div class='menuAction'><i class='fa fa-times-circle lightred'></i>You already have more than 15 blueberries! Come back if you run low.</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You pick up 15 blueberries!</div>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET blueberry = 15");
	}
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
else if($input=='w' || $input=='west') 
{	echo 'You travel west<br/>';
   $message="<i>You travel west</i></br>".$_SESSION['desc120'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 120"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='ne' || $input=='northeast') 
{	echo 'You travel northeast<br/>';
   $message="<i>You travel northeast</i></br>".$_SESSION['desc136'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 136"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}

else if($input=='e' || $input=='east') 
{	echo 'You travel east<br/>';
   $message="<i>You travel east</i></br>".$_SESSION['desc134'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 134"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='se' || $input=='southeast') 
{	echo 'You travel southeast<br/>';
   $message="<i>You travel southeast</i></br>".$_SESSION['desc133'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 133"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}

// ----------------------------------- end of room function
include ('function-end.php');
}
?>
