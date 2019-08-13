<?php
						$roomname = "Red Dining Room";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc223'];
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

if($input=='grab veggies' )  // ---- GRAB veggies
{
    $check=$row['veggies'];
	if ( $check >= 5 )
	{
	echo $message="<div class='menuAction'><i class='fa fa-times-circle lightred'></i>You already have more than 5 veggies! Come back if you run out.</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You pick up 5 veggies from the table!</div>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET veggies = 5");
	}
}
if($input=='grab coffee' )  // ---- GRAB coffee
{
    $check=$row['coffee'];
	if ( $check >= 5 )
	{
	echo $message="<div class='menuAction'><i class='fa fa-times-circle lightred'></i>You already have more than 5 coffee! Come back if you run out.</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You pick up 5 cups o' coffee from the table!</div>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET coffee = 5");
	}
}
if($input=='grab meat' )  // ---- GRAB cooked meat
{
    $check=$row['cookedmeat'];
	if ( $check >= 10 )
	{
	echo $message="<div class='menuAction'><i class='fa fa-times-circle lightred'></i>You already have more than 10 cooked meat! Come back if you run out.</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You pick up 10 pieces of meat from the table!</div>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET cookedmeat = 10");
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
else if($input=='s' || $input=='south') 
{	echo 'You travel south<br/>';
   $message="<i>You travel south</i></br>".$_SESSION['desc222'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 222"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}







// ----------------------------------- end of room function
include ('function-end.php');
}
?>
