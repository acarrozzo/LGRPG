<?php
						$roomname = "Great White Gauntlet";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc496'];

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

 


//------------------------------------------------------------------ BATTLE VARIABLES		
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
// -------------------------------------------------------------------------- INITIALIZE - 7/10
if(($rand <= 7 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Great White'"); include ('battle.php'); }
// -------------------------------------------------------------------------- INITIALIZE - 1/10
else if(($rand == 8 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Hammerhead'"); include ('battle.php'); }		
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	 
// -------------------------------------------------------------------------- END BATTLE BLOCK


 
include ('random-encounters/blueocean-underwater.php'); // blue ocean battle set
// include ('battle-sets/blueocean-underwater.php'); // blue ocean battle set



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

else if($input=='nw' || $input=='northwest') 
{	if ($_SESSION['breathingwater'] >= 1)
			  { echo 'You swim northwest into the lair of the Kraken!<br/>';
   		$message="<i>You swim northwest</i></br>".$_SESSION['desc499'];
		include ('update_feed.php');   // --- update feed
   			   $results = $link->query("UPDATE $user SET room = '499'"); // -- room change
   			   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		} else{
 		echo $message="<i>You can't swim that way! You need to be breathing water!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}
else if($input=='e' || $input=='east') 
{	if ($_SESSION['breathingwater'] >= 1)
			  { echo 'You swim east<br/>';
   		$message="<i>You swim east</i></br>".$_SESSION['desc495'];
		include ('update_feed.php');   // --- update feed
   			   $results = $link->query("UPDATE $user SET room = '495'"); // -- room change
   			   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		} else{
 		echo $message="<i>You can't swim that way! You need to be breathing water!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}

// ----------------------------------- end of room function
include ('function-end.php');
}
?>