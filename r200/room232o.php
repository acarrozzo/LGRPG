<?php
							  $roomname = "Thieve's Den Treasure Room";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc232o'];
//$dangerLVL = $_SESSION['dangerLVL'] = "14"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   


if ( 1 == 2 ) { } //nada

// -------------------------------------------------------------------------- ROOM ACTIONS











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
// -------------------------------------------------------------------------- INITIALIZE Master Thief - 3/10
if(($rand <= 3 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Master Thief'"); include ('battle.php'); }	
// -------------------------------------------------------------------------- INITIALIZE Thief Brute - 1/10
else if(($rand == 4 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Thief Brute'"); include ('battle.php'); }						
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	


$clicks = $row['clicks'];

// -------------------------------------------------------------------------- gray chest - reset after 100 clicks
if ($_SESSION['graychest'] == 0) {$_SESSION['graychestcheck'] = 0;} 
	else { $_SESSION['graychest'] = $clicks; }



// $clicks = $row['clicks'];


if($input=='open chest') 
{	
	if ($_SESSION['graychest'] >= $_SESSION['graychestcheck'])
	{
	//echo 'You open the treasure chest<br/>';
   	//$message="<i>You open the treasure chest</i></br>";
	//include ('update_feed.php'); // --- update feed
   	$_SESSION['graychest'] = $clicks;	
	$_SESSION['graychestcheck'] = $_SESSION['graychest'] + 100;
	// -------------------------------------------------------------------------- chest rewards
		$rand = rand (1,7);
		if ($rand == 1) { 
			$qty = rand (100,400);
			echo 'You open the gray chest and find '.$qty.' '.$currency.'!<br/>';
			$message = "You open the gray chest and find $qty $currency!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET currency = currency + $qty"); }
		if ($rand == 2) { 
			$qty = rand (50,100);
			echo 'You open the gray chest and gain '.$qty.' XP!<br/>';
			$message = "You open the gray chest and gain $qty XP!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET xp = xp + $qty"); }
		if ($rand == 3) { 
			$qty = rand (3,5);
			echo 'You open the gray chest and find '.$qty.' Red Potions!<br/>';
			$message = "You open the gray chest and find $qty Red Potions!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET redpotion = redpotion + $qty"); }	
		if ($rand == 4) { 
			echo 'You open the gray chest and find a Hunter Bow!<br/>';
			$message = "You open the gray chest and find a Hunter Bow!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET hunterbow = hunterbow + 1"); }
		if ($rand == 5) { 
			$qty = rand (20,30);
			echo 'You open the gray chest and find '.$qty.' arrows!<br/>';
			$message = "You open the gray chest and find $qty arrows!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET arrows = arrows + $qty"); }	
		if ($rand == 6) { 
			$qty = rand (20,30);
			echo 'You open the gray chest and find '.$qty.' bolts!<br/>';
			$message = "You open the gray chest and find $qty bolts!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET bolts = bolts + $qty"); }	
		if ($rand == 7) { 
			$rand2 = rand(1,4);
			if ($rand2 == 1 ){
				$bonus = 'Ring of Strength II';
				$results = $link->query("UPDATE $user SET ringofstrengthII = ringofstrengthII + 1"); }
			if ($rand2 == 2 ){
				$bonus = 'Ring of Dexterity II';
				$results = $link->query("UPDATE $user SET ringofdexterityII = ringofdexterityII + 1"); }
			if ($rand2 == 3 ){
				$bonus = 'Ring of Magic II';
				$results = $link->query("UPDATE $user SET ringofmagicII = ringofmagicII + 1"); }
			if ($rand2 == 4 ){
				$bonus = 'Ring of Defense II';
				$results = $link->query("UPDATE $user SET ringofdefenseII = ringofdefenseII + 1"); }	
			echo 'You open the gray chest and find a '.$bonus.'!<br/>';
			$message = "You open the gray chest and find a $bonus!<br/>";
			include ('update_feed.php'); // --- update feed
 			}					
	}
	else { 
	echo "For some reason you can't open the chest now, you should try again later.<br/>";
   	$message="<i>For some reason you can't open the chest now, you should try again later.<br/></i></br>";
	include ('update_feed.php'); // --- update feed
	}
}





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



else if($input=='w' || $input=='west') 
{			echo 'You travel west<br/>';
   	$message="<i>You travel west</i></br>".$_SESSION['desc232n'];
	include ('update_feed.php');   // --- update feed
   		   $results = $link->query("UPDATE $user SET room = '232n'"); // -- room change
   		   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		   	$_SESSION['thievesdensearch'] = 0;
}



// ----------------------------------- end of room function
include ('function-end.php');
}
?>
