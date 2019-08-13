<?php
// -- 011 -- Spider Cave
$roomname = "Spider Cave";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc011'];
//$dangerLVL = $_SESSION['dangerLVL'] = "3"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 
	$infight = $row['infight']; $endfight = $row['endfight']; $enemy=$row['enemy'];

// -------------------------------------------------------------------------- After Battle - SAFE ROOM		
if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
		$input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
		$input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
		$input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
		$input!='u' && $input!='up' && $input!='d' && $input!='down' ) { echo "This room is safe.<br/>"; }		
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1 && $input!='attack spider' && $input!='attack scorpion' && $input!='attack' && $input!='a') 
	{	$rand = rand (1,10); 
	}	else {$rand=0;}
// -------------------------------------------------------------------------- After Battle - SAFE ROOM		
if ($endfight == 1 && $input != 'ne' && $input != 'n' && $input != 'e') { echo "This room is safe.<br/>"; }	
// -------------------------------------------------------------------------- INITIALIZE SPIDER	3/10
else if(($input=='attack spider' || $rand >= 7 ) && $infight==0 && $endfight==0) 
	{
		if ($input=='attack spider') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Spider'");
		include ('battle.php');
	}
// -------------------------------------------------------------------------- INITIALIZE SCORPION	2/10
else if(($input=='attack scorpion' || $rand <= 2 ) && $infight==0 && $endfight==0) 
	{
		if ($input=='attack scorpion') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Scorpion'");
		include ('battle.php');
	}
	
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{
	if($input=='attack scorpion' || $input=='attack spider') { $input = 'attack'; }
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
else if($input=='s' || $input=='south') 
{
	echo 'You travel south<br/>';
 	$message="<i>You travel south</i><br/>".$_SESSION['desc010'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	$results = $link->query("UPDATE $user SET room = '010'"); // -- room change
}
else if($input=='w' || $input=='west') 
{
	echo 'You travel west<br/>';
   	$message="<i>You travel west</i><br/>".$_SESSION['desc008'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	$results = $link->query("UPDATE $user SET room = '008'"); // -- room change
}
else if($input=='e' || $input=='east') 
{
	echo 'You travel east<br/>';
   	$message="<i>You travel east</i><br/>".$_SESSION['desc012'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	$results = $link->query("UPDATE $user SET room = '012'"); // -- room change
}
else if($input=='sw' || $input=='southwest') 
{
	echo 'You travel southwest<br/>';
   	$message="<i>You travel southwest</i><br/>".$_SESSION['desc009'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	$results = $link->query("UPDATE $user SET room = '009'"); // -- room change
}

// ----------------------------------- end of room function
include ('function-end.php');

}

?>
