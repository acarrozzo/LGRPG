<?php
						$roomname = "Red Fort Kitchen";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc325'];
//$dangerLVL = $_SESSION['dangerLVL'] = "23"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   



// -------------------------------------------------------------------------------------------------------------- BATTLE VARIABLES		
 	$infight = $row['infight']; $endfight = $row['endfight']; $enemy=$row['enemy'];
// -------------------------------------------------------------------------- After Battle - SAFE ROOM		
if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
		$input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
		$input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
		$input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
		$input!='u' && $input!='up' && $input!='d' && $input!='down' ) { echo "This room is safe.<br/>"; }	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
	{	$rand = rand (1,10); }	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE - 3/10
if(($rand <= 3 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Butcher'"); include ('battle.php'); }
// -------------------------------------------------------------------------- INITIALIZE - 1/10
else if(($rand == 4 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Bandit Marauder'"); include ('battle.php'); }		
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	
// -------------------------------------------------------------------------- END BATTLE BLOCK

// -------------------------------------------------------------------------- ROOM ACTIONS
if ($input == 'flip switch')
{
	if ($_SESSION['grottoswitch'] == 1)
	{
		echo $message = 'You already flipped this switch. A nearby path has been unlocked.<br/>';
		include ('update_feed.php'); // --- update feed
	}
	else {
		echo $message= 'You flip the switch and hear a loud noise to the southeast.<br/>';
		include ('update_feed.php'); // --- update feed
		$_SESSION['grottoswitch'] = 1;
	}
	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
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
else if($input=='n' || $input=='north') 
{			echo 'You travel north<br/>';
   	$message="<i>You travel north</i></br>".$_SESSION['desc324'];
	include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = 324"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}




// ----------------------------------- end of room function
include ('function-end.php');
}
?>