<?php
// -- 0028i -- Goblin Hideout
$roomname = "Goblin Hideout";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc028i'];
//$dangerLVL = $_SESSION['dangerLVL'] = "10"; // danger level


include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 


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
if ($infight < 1 && $endfight != 1) 
	{	$rand = rand (1,10); 
		//echo "<br/>RAND: ".$rand."<br/>";
	}	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE Goblin Chief - 30%
if(($input=='attack goblin chief' || $input=='attack' || $rand <= 3 ) && $infight==0 && $endfight==0) 
	{	if ($input=='attack goblin chief') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Goblin Chief'");
		include ('battle.php'); }			
// -------------------------------------------------------------------------- INITIALIZE Goblin Bandit - 20%
else if(($input=='attack goblin bandit'  || $rand >= 9 ) && $infight==0 && $endfight==0) 
	{	if ($input=='attack goblin bandit') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Goblin Bandit'");
		include ('battle.php'); }	
// -------------------------------------------------------------------------- INITIALIZE Goblin	- 10%
else if(($input=='attack goblin' || $rand == 2 ) && $infight==0 && $endfight==0) 
	{	if ($input=='attack goblin') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Goblin'");
		include ('battle.php');	}
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{ 	if($input=='attack goblin bandit' || $input=='attack goblin' || $input=='attack goblin chief') { $input = 'attack'; }
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

// -------------------------------------------------------------------------- TRAVEL
else if($input=='s' || $input=='south') 
{
	echo 'You travel south<br/>';
	$message="<i>You travel south</i><br/>".$_SESSION['desc028h'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '028h'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
// ----------------------------------- end of room function
include ('function-end.php');

}

?>
