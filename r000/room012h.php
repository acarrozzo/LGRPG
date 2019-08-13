<?php
$roomname = "Scorpion Throne Room";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc012h'];
//$dangerLVL = $_SESSION['dangerLVL'] = "30"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 

   	$clicks = $row['clicks'];
// -------------------------------------------------------------------------- BATTLE VARIABLES		
 	$infight = $row['infight']; $endfight = $row['endfight']; $enemy=$row['enemy'];
// -------------------------------------------------------------------------- After Battle - SAFE ROOM		
if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
		$input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
		$input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
		$input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
		$input!='u' && $input!='up' && $input!='d' && $input!='down' ) { echo "This room is safe.<br/>"; }	// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1 && $input!='attack scorpion king' && $input!='attack' && $input!='a') 
	{	$rand = rand (1,10); 
	}	else {$rand=0;}
// -------------------------------------------------------------------------- INITIALIZE KING - 4/10
if(($input=='attack scorpion king' || $rand <= 4 ) && $infight==0 && $endfight==0) 
	{
		if ($input=='attack scorpion king') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Scorpion King'");
		include ('battle.php');
	}

// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{
	if($input=='attack scorpion king') { $input = 'attack'; }
	include ('battle.php');
	}




// -------------------------------------------------------------------------- ROOM ACTIONS




// -------------------------------------------------------------------------- gray chest - reset after 100 clicks
if ($_SESSION['graychest'] == 0) {$_SESSION['graychestcheck'] = 0;} 
	else { $_SESSION['graychest'] = $clicks;}

if($input=='open chest') 
{	
	if ($_SESSION['graychest'] >= $_SESSION['graychestcheck'])
	{
   	$_SESSION['graychest'] = $clicks;	
	$_SESSION['graychestcheck'] = $_SESSION['graychest'] + 100;
	// -------------------------------------------------------------------------- chest rewards
		$rand = rand (1,9);
		if ($rand == 1) { 
			$qty = rand (50,100);
			echo 'You open the gray chest and find '.$qty.' '.$currency.'!<br/>';
			$message = "You open the gray chest and find $qty $currency!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET currency = currency + $qty"); }
		if ($rand == 2) { 
			$qty = rand (20,50);
			echo 'You open the gray chest and gain '.$qty.' XP!<br/>';
			$message = "You open the gray chest and gain $qty XP!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET xp = xp + $qty"); }
		if ($rand == 3) { 
			$qty = rand (3,6);
			echo 'You open the gray chest and find '.$qty.' Red Potions!<br/>';
			$message = "You open the gray chest and find $qty Red Potions!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET redpotion = redpotion + $qty"); }	
		if ($rand == 4) { 
			echo 'You open the gray chest and find an Iron Dagger!<br/>';
			$message = "You open the gray chest and find an Iron Dagger!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET irondagger = irondagger + 1"); }
		if ($rand == 5) { 
			$qty = rand (20,30);
			echo 'You open the gray chest and find '.$qty.' arrows!<br/>';
			$message = "You open the gray chest and find $qty arrows!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET arrows = arrows + $qty"); }	
		if ($rand == 6) { 
			$qty = rand (10,20);
			echo 'You open the gray chest and find '.$qty.' bolts!<br/>';
			$message = "You open the gray chest and find $qty bolts!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET bolts = bolts + $qty"); }	
		if ($rand == 7) { 
			$rand2 = rand(1,4);
			if ($rand2 == 1 ){
				$bonus = 'Ring of Strength';
				$results = $link->query("UPDATE $user SET ringofstrength = ringofstrength + 1"); }
			if ($rand2 == 2 ){
				$bonus = 'Ring of Dexterity';
				$results = $link->query("UPDATE $user SET ringofdexterity = ringofdexterity + 1"); }
			if ($rand2 == 3 ){
				$bonus = 'Ring of Magic';
				$results = $link->query("UPDATE $user SET ringofmagic = ringofmagic + 1"); }
			if ($rand2 == 4 ){
				$bonus = 'Ring of Defense';
				$results = $link->query("UPDATE $user SET ringofdefense = ringofdefense + 1"); }	
			echo 'You open the gray chest and find a '.$bonus.'!<br/>';
			$message = "You open the gray chest and find a $bonus!<br/>";
			include ('update_feed.php'); // --- update feed
 			}	
		if ($rand == 8) { 
			echo 'You open the gray chest and find a Claymore!<br/>';
			$message = "You open the gray chest and find a Claymore!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET claymore = claymore + 1"); }
		if ($rand == 9) { 
			echo 'You open the gray chest and find a Gladius!<br/>';
			$message = "You open the gray chest and find a Gladius!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET gladius = gladius + 1"); 
			}	
		$results = $link->query("UPDATE $user SET graychests = graychests + 1");				
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
else if($input=='s' || $input=='south') 
{  	echo 'You travel south<br/>';
   	$message="<i>You travel south</i></br>".$_SESSION['desc012g'];
	include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '012g'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}


// ----------------------------------- end of room function
include ('function-end.php');

}
?>
