<?php
							$roomname = "Ogre Lieutenant Quarters";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc111k'];
//$dangerLVL = $_SESSION['dangerLVL'] = "13"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

		$KLogrelieutenant=$row['KLogrelieutenant'];   


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
// -------------------------------------------------------------------------- INITIALIZE Ogre Lieutenant - 40%
else if($infight==0 && $endfight==0 && ($input=='attack' || $input=='attack ogre lieutenant' || $rand <= 4 )) 
	{	if ($input=='attack ogre lieutenant') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Ogre Lieutenant'");
		include ('battle.php');	}
// -------------------------------------------------------------------------- INITIALIZE Fire Ogress - 10%
else if( $infight==0 && $endfight==0 && ($input=='attack fire ogress' || $rand == 5 ) ) 
	{	if ($input=='attack fire ogress') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Fire Ogress'");
		include ('battle.php'); }				
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{ 	if($input=='attack ogre lieutenant' || $input=='attack fire ogress') { $input = 'attack'; } 
		include ('battle.php');	}	
// -------------------------------------------------------------------------- Battle TRAVEL
if ((	$input=='n' || $input=='north' || $input=='ne' || $input=='northeast' ||
		$input=='e' || $input=='north' || $input=='seZZZ' || $input=='southeastZZZ' ||
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

else if($input=='n' || $input=='north') 
{	echo 'You travel north<br/>';
   	$message="<i>You travel north</i></br>".$_SESSION['desc111j'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '111j'"); // -- room change
   	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	$_SESSION['ogresearch'] = 0;	
}
else if($input=='se' || $input=='southeast') 
{	
	if ($KLogrelieutenant >= 1 && $infight == 0)
	{
		echo 'You travel through a magical portal to the OGRE LAIR EXIT.<br/>';
	 	$message="<i>You travel through a magical portal to the OGRE LAIR EXIT</i><br/>".$_SESSION['desc111a'];
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET room = '111a'"); // -- room change
	}
	else if ($KLogrelieutenant == 0 && $infight == 0)
	{
		echo $message="<i>You cannot use the portal to the exit until you defeat the Ogre Lieutenant.</i><br/>";
		include ('update_feed.php'); // --- update feed	
	}
	else
	{
		echo $message="<i>You cannot use the exit portal while in battle.</i><br/>";
		include ('update_feed.php'); // --- update feed	
	}
}

// ----------------------------------- end of room function
include ('function-end.php');
}
?>
