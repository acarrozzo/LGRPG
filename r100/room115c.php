<?php
							  $roomname = "Kobold Twisted Path";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc115c'];
//$dangerLVL = $_SESSION['dangerLVL'] = "7"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   


	
// -------------------------------------------------------------------------- BATTLE VARIABLES		
 	$infight = $row['infight']; $endfight = $row['endfight']; $enemy=$row['enemy'];
// -------------------------------------------------------------------------- After Battle - SAFE ROOM		
if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
		$input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
		$input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
		$input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
		$input!='u' && $input!='up' && $input!='d' && $input!='down' ) { echo "This room is safe.<br/>"; }	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
	{	$rand = rand (1,10);$randrare = rand (1,50);  }	else {$rand=0;$randrare=0;}
// -------------------------------------------------------------------------- INITIALIZE SUPER RARE - Kobold Monk - 1/50
if(($randrare == 1 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Kobold Monk'"); include ('battle.php'); }		
// -------------------------------------------------------------------------- INITIALIZE kobold - 3/10
else if(($rand <= 3 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Kobold'"); include ('battle.php'); }	
// -------------------------------------------------------------------------- INITIALIZE flying kobold - 1/10
else if(($rand == 4 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Flying Kobold'"); include ('battle.php'); }	
// -------------------------------------------------------------------------- INITIALIZE kobold shaman - 1/10
else if(($rand == 5 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Kobold Shaman'"); include ('battle.php'); }					
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	
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
{	echo 'You travel southeast<br/>';
   $message="<i>You travel southeast</i></br>".$_SESSION['desc115e'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '115e'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='w' || $input=='west') 
{	echo 'You travel west<br/>';
   $message="<i>You travel west</i></br>".$_SESSION['desc115a'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '115a'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}else if($input=='nw' || $input=='northwest') 
{	echo 'You travel northwest<br/>';
   $message="<i>You travel northwest</i></br>".$_SESSION['desc115d'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '115d'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
// ----------------------------------- end of room function
include ('function-end.php');
}
?>
