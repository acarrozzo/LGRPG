<?php
// --------- Ogre Cave Exit ---------------------- 111a
$roomname = "Ogre Cave Exit";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc111a'];
//$dangerLVL = $_SESSION['dangerLVL'] = "5"; // danger level

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
// -------------------------------------------------------------------------- INITIALIZE Goblin - 10%
else if( $infight==0 && $endfight==0 && ($input=='attack' || $input=='attack goblin' || $rand == 1 ) ) 
	{	if ($input=='attack goblin') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Goblin'");
		include ('battle.php'); }	
// -------------------------------------------------------------------------- INITIALIZE Hob Goblin - 10%
else if($infight==0 && $endfight==0 && ($input=='attack hob goblin' || $rand == 3 )) 
	{	if ($input=='attack hob goblin') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Hob Goblin'");
		include ('battle.php');	}
// -------------------------------------------------------------------------- INITIALIZE Giant Rat - 10%
else if($infight==0 && $endfight==0 && ($input=='attack giant rat' || $rand == 2 )) 
	{	if ($input=='attack giant rat') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Giant Rat'");
		include ('battle.php'); }			
// -------------------------------------------------------------------------- INITIALIZE Spider - 10%
else if($infight==0 && $endfight==0 && ($input=='attack spider' || $rand == 4 )) 
	{	if ($input=='attack spider') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Spider'");
		include ('battle.php');	}		
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{ 	if($input=='attack goblin' || $input=='attack hob goblin' || $input=='attack giant rat' || $input=='attack spider') { $input = 'attack'; } 
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
   $message="<i>You travel west</i></br>".$_SESSION['desc111b'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '111b'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='s' || $input=='south') 
{	echo 'You travel south<br/>';
   $message="<i>You travel south</i></br>".$_SESSION['desc111d'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '111d'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='sw' || $input=='southwest') 
{	echo 'You travel southwest<br/>';
   $message="<i>You travel southwest</i></br>".$_SESSION['desc111c'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '111c'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='e' || $input=='east') 
{	echo 'You travel east<br/>';
   $message="<i>You travel east</i></br>".$_SESSION['desc111e'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '111e'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='u' || $input=='up') 
{	echo 'You travel up<br/>';
   $message="<i>You travel up</i></br>".$_SESSION['desc111'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 111"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
// ----------------------------------- end of room function
include ('function-end.php');
}
?>
