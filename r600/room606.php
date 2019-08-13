<?php
						$roomname = "Stone Mountain Lift";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc606'];

include ('function-start.php'); 
 
// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   


// -------------------------------------------------------------------------- BATTLE VARIABLES		
 	$infight = $row['infight'];
 	$endfight = $row['endfight'];
 	$enemy=$row['enemy'];
	
	$cash = $row['currency'];


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
{			echo 'You travel south<br/>';
   	$message="<i>You travel south</i></br>".$_SESSION['desc030'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '030'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
// -------------------------------------------------------------------------- LIFT NORTH		
else if ($input == 'take lift north')
{
	if ($cash < 500) {
		echo $message="<div class='menuAction'><i class='fa fa-times lightred'></i>You don’t have enough coin to take the lift. go get rich fool.</div>";	
		include ('update_feed.php'); // --- update feed	
	}
	else {
		echo "You pay Merl 500 coin and take the lift north!</br>"; 
		 $message="<div class='menuAction'><i class='fa fa-arrow-circle-up'></i>You pay Merl 500 coin and take the lift north!</div><br/>".$_SESSION['desc607']; 
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '607'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	$query = $link->query("UPDATE $user SET currency = currency - 500"); 
	}
}









// ----------------------------------- end of room function
include ('function-end.php');
}
?>