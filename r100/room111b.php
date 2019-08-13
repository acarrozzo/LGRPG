<?php
							$roomname = "Goblin Tent";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc111b'];
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
// -------------------------------------------------------------------------- INITIALIZE Goblin - 30%
else if( $infight==0 && $endfight==0 && ($input=='attack' || $input=='attack goblin' || $rand > 7 ) ) 
	{	if ($input=='attack goblin') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Goblin'");
		include ('battle.php'); }	
// -------------------------------------------------------------------------- INITIALIZE Hob Goblin - 10%
else if($infight==0 && $endfight==0 && ($input=='attack hob goblin' || $rand == 3 )) 
	{	if ($input=='attack hob goblin') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Hob Goblin'");
		include ('battle.php');	}
// -------------------------------------------------------------------------- INITIALIZE Alpha Scorpion - 10%
else if($infight==0 && $endfight==0 && ( $rand == 2 )) 
	{	if ($input=='attack alpha scorpion') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Alpha Scorpion'");
		include ('battle.php'); }					
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{ 	if($input=='attack goblin' || $input=='attack hob goblin') { $input = 'attack'; } 
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
else if($input=='se' || $input=='southeast') 
{	echo 'You travel south<br/>';
   $message="<i>You travel south</i></br>".$_SESSION['desc111d'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '111d'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='e' || $input=='east') 
{	echo 'You travel east<br/>';
   $message="<i>You travel east</i></br>".$_SESSION['desc111a'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '111a'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}

// ----------------------------------- end of room function
include ('function-end.php');
}
?>
