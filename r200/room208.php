<?php
						$roomname = "Rob's Farm";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc208'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php');

// -------------------------DB CONNECT!
include ('db-connect.php');
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){





// -------------------------------------------------------------------------- ROOM ACTIONS
if($input=='grab veggiesOLD')  // ---- GET VEGGIES - OLD
{
    $check=$row['veggies'];
	if ( $check >= 5 )
	{
	echo $message="<i>You can't pick more than 5 veggies here!</i></br>";
	include ('update_feed.php'); // --- update feed
	}
	else {
	echo $message="<i>You grab some veggies.</i></br>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET veggies = veggies + 1");
}
}


if($input=='grab veggies' )  // ---- GRAB veggies
{
    $check=$row['veggies'];
	if ( $check >= 5 )
	{
	echo $message="<div class='menuAction'><i class='fa fa-times-circle lightred'></i>You already have some veggies! Come back if you run out.</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You pick up some veggies (5)!</div>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET veggies = 5");
	}
}



// -------------------------------------------------------------------------- TRAVEL
if($input=='n' || $input=='north')
{	echo 'You travel north<br/>';
   	$message="<i>You travel north</i></br>".$_SESSION['desc207'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = 207"); // -- room change
   	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
elseif ($input=='se' || $input=='southeast') {
		echo 'You hop the fence and find a shortcut leading to Red Town<br/>';
		$message="<i>You hop the fence and find a shortcut leading to Red Town</i></br>".$_SESSION['desc204'];
		include('update_feed.php'); // --- update feed
$results = $link->query("UPDATE $user SET room = 204"); // -- room change
$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}


// ----------------------------------- end of room function
include ('function-end.php');
}
?>
