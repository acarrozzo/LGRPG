<?php
// -- 004 -- Grassy Field West - Flower Patch
$roomname = "Grassy Field West";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc004'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 	

	$quest4=$row['quest4'];

// -------------------------------------------------------------------------- ROOM ACTIONS

if($input=='get flower' || $input=='pick flower' || $input=='pick up flower')  // ---- PICK FLOWER
{
	if ( $row['flower'] >= 1 )
	{
	echo 'You already have a flower in your inventory.<br/>';
	$message="<i>You already have a flower in your inventory.</i></br>";
	include ('update_feed.php'); // --- update feed
	}
	else {
	echo 'You pick up a flower.<br/>';
   	$message="<i>You pick up a flower.</i></br>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET flower = 1");
	}
}


// -------------------------------------------------------------------------- TRAVEL
else if($input=='s' || $input=='south') 
{
echo 'You travel south<br/>';
	$message="<i>You travel south</i><br/>".$_SESSION['desc003']; 
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '003'"); // -- room change
}
else if($input=='n' || $input=='north') 
{
echo 'You travel north<br/>';
	$message="<i>You travel north</i><br/>".$_SESSION['desc020'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '020'"); // -- room change
}
else if($input=='sw' || $input=='southwest') 
{
echo 'You travel southwest<br/>';
	$message="<i>You travel southwest</i><br/>".$_SESSION['desc003c'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '003c'"); // -- room change
}
else if($input=='e' || $input=='east') 
{
echo 'You travel east<br/>';
	$message="<i>You travel east</i><br/>".$_SESSION['desc001'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '001'"); // -- room change
}
else if($input=='w' || $input=='west') 
{
if($quest4 < 2) { 
	echo $message="<i>You're going to need a weapon to fight off the Sand Crabs down by the Beach! Complete QUEST 4 to the southwest of here to get your first weapon.</i><br/>";
	include ('update_feed.php'); // --- update feed
	}
	
	else{
	echo 'You travel west<br/>';
	$message="<i>You travel west</i><br/>".$_SESSION['desc014'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '014'"); // -- room change
	}
}





// ----------------------------------- end of room function
include ('function-end.php'); 

}
?>
