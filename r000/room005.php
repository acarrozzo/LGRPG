<?php
// -- 005 -- Grassy Field North
$roomname = "Grassy Field North";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc005'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){die('There was an error running the query [' . $link->error . ']');}

// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 	

$quest9=$row['quest9']; 


// -------------------------------------------------------------------------- ROOM ACTIONS
if($input=='ex tent' || $input=='examine tent') {  //ex tent
    echo $message="<i>You examine the tent to the east. It appears to be made out of pajamas.</i></br>";
	include ('update_feed.php'); // --- update feed
}


// -------------------------------------------------------------------------- ROOM ACTIONS


if($input=='pick blueberry' ||$input=='pick 5 blueberry' || $input=='pick berry')  // ---- PICK blueBERRY
{
    $check=$row['blueberry'];
	if ( $check >= 5 )
	{
	echo $message="<div class='menuAction'><i class='fa fa-times-circle red'></i>You already have a bunch of blueberries! Come back if you run out.</div>";	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up blue'></i>You pick up 5 blueberries!</div>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET blueberry = 5");
	}
}



// -------------------------------------------------------------------------- TRAVEL
else if($input=='s' || $input=='south') 
{	echo 'You travel south<br/>';
	$message="<i>You travel south</i><br/>".$_SESSION['desc001'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '001'"); // -- room change
}
else if($input=='west' || $input=='w') 
{	echo 'You travel west<br/>';
	$message="<i>You travel west</i><br/>".$_SESSION['desc020'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '020'"); // -- room change
}
else if($input=='east' || $input=='e') 
{	echo 'You travel east<br/>';
	$message="<i>You travel east</i><br/>".$_SESSION['desc021'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '021'"); // -- room change
}
else if($input=='down' || $input=='d') 
{	echo 'You travel down into the Secret Battle Arena<br/>';
	$message="<i>You travel down into the Secret Battle Arena</i><br/>".$_SESSION['desc005b'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '005b'"); // -- room change
}
else if($input=='north' || $input=='n') 
{	
	if ($quest9 <2) {	
	echo $message="<i>You cannot go north yet. Complete all 3 of Jack Lumber's quests to open this gate.</i><br/>";
	include ('update_feed.php'); // --- update feed
	}
	else {
		echo 'You travel north<br/>';
		$message="<i>You travel north</i><br/>".$_SESSION['desc029'];
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET room = '029'"); // -- room change
	}
}

// ----------------------------------- end of room function
include ('function-end.php');

}
?>
