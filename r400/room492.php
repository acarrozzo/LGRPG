<?php
						$roomname = "Mud Crab Nest";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc492'];

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   




// -------------------------------------------------------------------------- ROOM ACTIONS
// -------------------------------------------------------------------------- BATTLE VARIABLES
	$infight = $row['infight'];
 	$endfight = $row['endfight'];
	   			   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
 	$enemy=$row['enemy'];
// -------------------------------------------------------------------------- After Battle - SAFE ROOM		
//if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
//		$input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
//		$input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
//		$input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
//		$input!='u' && $input!='up' && $input!='d' && $input!='down' ) { echo "This room is safe.<br/>"; }	
// -------------------------------------------------------------------------- ROOM READY - RAND NUM GENERATOR
if ($infight < 1) 
	{	$rand = rand (1,10); 
	} 	else {	$rand=99; } // default rand
// -------------------------------------------------------------------------- INITIALIZE mud crab - 50%
if(($input=='attack mud crab' || $input=='attack' || $rand <= 5 ) && $infight==0) 
	{	if ($input=='attack mud crab') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Mud Crab'");
		include ('battle.php');	}
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{ 	if($input=='attack mud crab') { $input = 'attack'; }
		include ('battle.php');	}	


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

else if($input=='sw' || $input=='southwest') 
{		echo 'You travel southwest.<br/>';
   		$message="<i>You travel southwest.</i></br>".$_SESSION['desc490'];
		include ('update_feed.php');   // --- update feed
   			   $results = $link->query("UPDATE $user SET room = '490'"); // -- room change
   			   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='s' || $input=='south') 
{	 	echo 'You travel south.<br/>';
   		$message="<i>You travel south.</i></br>".$_SESSION['desc491'];
		include ('update_feed.php');   // --- update feed
   			   $results = $link->query("UPDATE $user SET room = '491'"); // -- room change
   			   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}







// ----------------------------------- end of room function
include ('function-end.php');
}
?>