<?php
							$roomname = "Ogress Fire Altar";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc111j'];
//$dangerLVL = $_SESSION['dangerLVL'] = "10"; // danger level

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
// -------------------------------------------------------------------------- INITIALIZE Fire Ogress - 40%
else if($infight==0 && $endfight==0 && ($input=='attack' || $input=='attack fire ogress' || $rand <= 4 )) 
	{	if ($input=='attack fire ogress') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Fire Ogress'");
		include ('battle.php');	}
// -------------------------------------------------------------------------- INITIALIZE Ogre Guard - 10%
else if( $infight==0 && $endfight==0 && ($input=='attack ogre guard' || $rand == 5 ) ) 
	{	if ($input=='attack ogre guard') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Ogre Guard'");
		include ('battle.php'); }				
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{ 	if($input=='attack fire ogress' || $input=='attack ogre guard') { $input = 'attack'; } 
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

else if($input=='w' || $input=='west') 
{	echo 'You travel west<br/>';
   	$message="<i>You travel west</i></br>".$_SESSION['desc111i'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '111i'"); // -- room change
   	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	$_SESSION['ogresearch'] = 0;	
}
else if($input=='s' || $input=='south') 
{	echo 'You travel south<br/>';
   	$message="<i>You travel south</i></br>".$_SESSION['desc111k'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '111k'"); // -- room change
   	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}

// ----------------------------------- end of room function
include ('function-end.php');
}
?>
