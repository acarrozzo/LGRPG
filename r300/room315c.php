<?php
						$roomname = "Bleeding Nests";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc315c'];
//$dangerLVL = $_SESSION['dangerLVL'] = "20"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   






// -------------------------------------------------------------------------------------------------------------- BATTLE VARIABLES		
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
// -------------------------------------------------------------------------- INITIALIZE bleeding dartwing - 6/10
if(($rand <= 6 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Bleeding Dartwing'"); include ('battle.php'); }
// -------------------------------------------------------------------------- INITIALIZE rabid skeever - 1/10
else if(($rand == 7 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Rabid Skeever'"); include ('battle.php'); }		
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



// -------------------------------------------------------------------------- TRAVEL

else if($input=='e' || $input=='east') 
{			echo 'You travel east<br/>';
   	$message="<i>You travel east</i></br>".$_SESSION['desc315b'];
	include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '315b'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='ne' || $input=='northeast') 
{			echo 'You travel northeast<br/>';
   	$message="<i>You travel northeast</i></br>".$_SESSION['desc315d'];
	include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '315d'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}





// ----------------------------------- end of room function
include ('function-end.php');
}
?>