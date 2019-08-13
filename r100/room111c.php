<?php
							$roomname = "Rat's Nest";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc111c'];
//$dangerLVL = $_SESSION['dangerLVL'] = "4"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   


// -------------------------------------------------------------------------- START BATTLE BLOCK
	$infight = $row['infight'];
 	$endfight = $row['endfight'];
	$enemy=$row['enemy'];
// -------------------------------------------------------------------------- After Battle - SAFE ROOM		
if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
		$input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
		$input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
		$input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
		$input!='u' && $input!='up' && $input!='d' && $input!='down' ) { echo "This room is safe.<br/>"; }	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
	{	$rand = rand (1,10);$randrare = rand (1,50);  }	else {$rand=0;$randrare=0;}
// -------------------------------------------------------------------------- INITIALIZE SUPER RARE - Ogre Priest - 1/50
if(($randrare == 1 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Ogre Priest'"); include ('battle.php'); }			
// -------------------------------------------------------------------------- INITIALIZE Giant Rat - 50%
else if($infight==0 && $endfight==0 && ($input=='attack' || $input=='attack giant rat' || $rand <= 5 )) 
	{	if ($input=='attack giant rat') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Giant Rat'");
		include ('battle.php'); }
// -------------------------------------------------------------------------- INITIALIZE Spider - 10%
else if($infight==0 && $endfight==0 && ($input=='attack spider' || $rand == 6 )) 
	{	if ($input=='attack spider') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Spider'");
		include ('battle.php');	}					
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{ 	if($input=='spider' || $input=='attack giant rat') { $input = 'attack'; } 
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
// -------------------------------------------------------------------------- END BATTLE BLOCK




// -------------------------------------------------------------------------- ROOM ACTIONS



// -------------------------------------------------------------------------- TRAVEL
else if($input=='ne' || $input=='northeast') 
{	echo 'You travel northeast<br/>';
   $message="<i>You travel northeast</i></br>".$_SESSION['desc111a'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '111a'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}

// ----------------------------------- end of room function
include ('function-end.php');
}
?>
