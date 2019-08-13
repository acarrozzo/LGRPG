<?php
							$roomname = "Ogre Path";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc111e'];
//$dangerLVL = $_SESSION['dangerLVL'] = "8"; // danger level

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
// -------------------------------------------------------------------------- INITIALIZE Ogre - 30%
else if($infight==0 && $endfight==0 && ($input=='attack' || $input=='attack ogre' || $rand <= 3 )) 
	{	if ($input=='attack ogre') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Ogre'");
		include ('battle.php');	}
// -------------------------------------------------------------------------- INITIALIZE Hob Goblin - 10%
else if( $infight==0 && $endfight==0 && ($input=='attack hob goblin' || $rand == 4 ) ) 
	{	if ($input=='attack hob goblin') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Hob Goblin'");
		include ('battle.php'); }
// -------------------------------------------------------------------------- INITIALIZE Orc - 10%
else if( $infight==0 && $endfight==0 && ($input=='attack orc' || $rand == 5 ) ) 
	{	if ($input=='attack orc') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Orc'");
		include ('battle.php'); }				
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{ 	if($input=='attack ogre' || $input=='attack hob goblin' || $input=='attack orc') { $input = 'attack'; } 
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
// --------------------------------------------------------------------------- PICK UP MAP
if ($input=="pick up map"){
	echo 'You pick up the forest underground map:<br/>';
	$message ='<br/><i>You pick up the forest underground map. Check your INV to view the map at anytime</i><br/>
	<a target="_blank" rel="map" href="img/lightgray_map_forest_underground.jpg" class="fancybox">
	<img class="mapimage" width="350" height="350" alt="View Map"  src="img/lightgray_map_forest_underground.jpg"><br/>
	click to open map in new window and view full size</a><br/>';
  	include ('update_feed_alt.php'); // --- update feed ALT
	$results = $link->query("UPDATE $user SET forestundergroundmap = 1");
}



// -------------------------------------------------------------------------- TRAVEL
else if($input=='w' || $input=='west') 
{	echo 'You travel west<br/>';
   	$message="<i>You travel west</i></br>".$_SESSION['desc111a'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '111a'"); // -- room change
   	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='se' || $input=='southeast') 
{	echo 'You travel southeast<br/>';
   	$message="<i>You travel southeast</i></br>".$_SESSION['desc111f'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '111f'"); // -- room change
   	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}

// ----------------------------------- end of room function
include ('function-end.php');
}
?>
