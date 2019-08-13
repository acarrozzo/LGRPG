<?php
							$roomname = "Ogre Yard";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc111g'];
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
// -------------------------------------------------------------------------- INITIALIZE Orc - 10%
else if( $infight==0 && $endfight==0 && ($input=='attack orc' || $rand == 4 ) ) 
	{	if ($input=='attack orc') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Orc'");
		include ('battle.php'); }				
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{ 	if($input=='attack ogre' || $input=='attack orc') { $input = 'attack'; } 
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



else if ($input == 'search')
{
	$rand = rand (1,3);
	if ($rand !=3)
	{
		echo 'You search and find nothing, you should try searching again.<br/>';
	$message="You search and find nothing, you should try searching again.<br/>";
	include ('update_feed.php'); // --- update feed
		
	}
	else {
		echo 'You search the room and find a hidden passageway to the northwest!<br/>';
	$message="You search the room and find a hidden passageway to the northwest!<br/>";
	include ('update_feed.php'); // --- update feed
	$_SESSION['ogresearch'] = 1; 
	}
	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight

}
// -------------------------------------------------------------------------- TRAVEL
else if($input=='nw' || $input=='northwest') 
{ 
	if ($_SESSION['ogresearch'] != 1) 
	{ 
	echo "You don't see an exit to the northwest<br/>";
	$message="<i>You don't see an exit to the northwest.</i><br/>";
	include ('update_feed.php'); // --- update feed
   	
	}
	else {
	echo 'You travel northwest through the hidden passageway<br/>';
	$message="<i>You travel northwest through the hidden passageway</i><br/>".$_SESSION['desc111h'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '111h'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	$_SESSION['ogresearch'] = 0;
	}
}

else if($input=='s' || $input=='south') 
{	echo 'You travel south<br/>';
   	$message="<i>You travel south</i></br>".$_SESSION['desc111f'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '111f'"); // -- room change
   	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	$_SESSION['ogresearch'] = 0;	
}
else if($input=='e' || $input=='east') 
{	echo 'You travel east<br/>';
   	$message="<i>You travel east</i></br>".$_SESSION['desc111i'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '111i'"); // -- room change
   	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	$_SESSION['ogresearch'] = 0;	
}

// ----------------------------------- end of room function
include ('function-end.php');
}
?>
