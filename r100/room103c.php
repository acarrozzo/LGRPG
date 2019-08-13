<?php
// -- 103c -- More Cows
$roomname = "More Cows";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc103c'];
//$dangerLVL = $_SESSION['dangerLVL'] = "2"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

	$infight = $row['infight'];
 	$endfight = $row['endfight'];
 	$enemy=$row['enemy'];
 	$wood=$row['wood'];
	
if($input=='get wood')  // ---- Get wood
{
	if ( $wood >= 5 )
	{
	echo $message="<div class='menuAction'><i class='fa fa-times lightred'></i>You can't pick up more than 5 pieces of wood here!</i></div>";
	include ('update_feed.php'); // --- update feed
	}
	else {
	echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up''></i>You grab a stack of 5 wood!</i></div>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET wood = 5");
}
}
	

// -------------------------------------------------------------------------- After Battle - SAFE ROOM		
if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
		$input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
		$input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
		$input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
		$input!='u' && $input!='up' && $input!='d' && $input!='down' ) { echo "This room is safe.<br/>"; }	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1) 
	{	$rand = rand (1,10); 
	}	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE Cow - 50%
if(($input=='attack cow' || $input=='attack' || $rand <= 5 ) && $infight==0 && $endfight==0) 
	{	if ($input=='attack cow') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Cow'");
		include ('battle.php'); }
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{ 	if($input=='attack cow') { $input = 'attack'; }
		include ('battle.php');	}		


// -------------------------------------------------------------------------- ROOM ACTIONS



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
{	echo 'You travel east<br/>';
 	$message="<i>You travel east</i><br/>".$_SESSION['desc103b'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '103b'"); // -- room change
   	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight	
}


// ----------------------------------- end of room function
include ('function-end.php');
}
?>
