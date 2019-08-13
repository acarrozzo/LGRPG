<?php
$roomname = "Scorpion Nest";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc012g'];
//$dangerLVL = $_SESSION['dangerLVL'] = "15"; // danger level


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
if ($infight < 1 && $endfight != 1 && $input!='attack scorpion queen' && $input!='attack' && $input!='a') 
	{	$rand = rand (1,10); 
	}	else {$rand=0;}
// -------------------------------------------------------------------------- INITIALIZE QUEEN	3/10
if(($input=='attack scorpion queen' || $rand <= 3 ) && $infight==0 && $endfight==0) 
	{
		if ($input=='attack scorpion queen') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Scorpion Queen'");
		include ('battle.php');
	}

// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{
	if($input=='attack scorpion queen') { $input = 'attack'; }
	include ('battle.php');
	}




// -------------------------------------------------------------------------- ROOM ACTIONS




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
else if($input=='n' || $input=='north') 
{  	echo 'You travel north<br/>';
   	$message="<i>You travel north</i></br>".$_SESSION['desc012h'];
	include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '012h'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='sw' || $input=='southwest') 
{
	echo 'You travel southwest<br/>';
 	$message="<i>You travel southwest</i><br/>".$_SESSION['desc012f'];
	include ('update_feed.php'); // --- update feed
   		$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		$results = $link->query("UPDATE $user SET room = '012f'"); // -- room change
}


// ----------------------------------- end of room function
include ('function-end.php');

}
?>
