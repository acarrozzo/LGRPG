<?php
							$roomname = "Ogre Treasure Room";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc111h'];
//$dangerLVL = $_SESSION['dangerLVL'] = "8"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

   	$clicks = $row['clicks'];

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
	{	$rand = rand (1,10);$randrare = rand (1,20);  }	else {$rand=0;$randrare=0;}
// -------------------------------------------------------------------------- INITIALIZE SUPER RARE - Ogre Priest - 1/20 PLUS!!
if(($randrare == 1 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Ogre Priest'"); include ('battle.php'); }			
// -------------------------------------------------------------------------- INITIALIZE Ogre - 20%
else if($infight==0 && $endfight==0 && ($input=='attack' || $input=='attack ogre' || $rand <= 2 )) 
	{	if ($input=='attack ogre') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Ogre'");
		include ('battle.php');	}
// -------------------------------------------------------------------------- INITIALIZE Ogre Guard - 20%
else if( $infight==0 && $endfight==0 && ($input=='attack ogre guard' || $rand == 3 || $rand == 4 ) ) 
	{	if ($input=='attack ogre guard') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Ogre Guard'");
		include ('battle.php'); }				
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{ 	if($input=='attack ogre' || $input=='attack ogre guard') { $input = 'attack'; } 
		include ('battle.php');	}	


// -------------------------------------------------------------------------- END BATTLE BLOCK


// echo 'OT: '.$_SESSION['ogretreasure'].'<br/> OTC: '.$_SESSION['ogretreasurecheck'];



// -------------------------------------------------------------------------- gray chest - reset after 100 clicks
if ($_SESSION['graychest'] == 0) {$_SESSION['graychestcheck'] = 0;} 
	else { $_SESSION['graychest'] = $clicks;}

//echo ' CLICKS: '.$clicks;
//echo ' CHEST: '.$_SESSION['graychest'];
//echo ' CHESTCK: '.$_SESSION['graychestcheck'];


if($input=='open chest') 
{	
	if ($_SESSION['graychest'] >= $_SESSION['graychestcheck'])
	{
   	$_SESSION['graychest'] = $clicks;	
	$_SESSION['graychestcheck'] = $_SESSION['graychest'] + 100;
	// -------------------------------------------------------------------------- chest rewards
		$rand = rand (1,7);
		if ($rand == 1) { 
			$qty = rand (20,100);
			echo 'You open the gray chest and find '.$qty.' '.$currency.'!<br/>';
			$message = "You open the gray chest and find $qty $currency!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET currency = currency + $qty"); }
		if ($rand == 2) { 
			$qty = rand (10,30);
			echo 'You open the gray chest and gain '.$qty.' XP!<br/>';
			$message = "You open the gray chest and gain $qty XP!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET xp = xp + $qty"); }
		if ($rand == 3) { 
			$qty = rand (2,4);
			echo 'You open the gray chest and find '.$qty.' Red Potions!<br/>';
			$message = "You open the gray chest and find $qty Red Potions!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET redpotion = redpotion + $qty"); }	
		if ($rand == 4) { 
			echo 'You open the gray chest and find some Iron!<br/>';
			$message = "You open the gray chest and find some Iron!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET iron = iron + 1"); }
		if ($rand == 5) { 
			$qty = rand (10,20);
			echo 'You open the gray chest and find '.$qty.' arrows!<br/>';
			$message = "You open the gray chest and find $qty arrows!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET arrows = arrows + $qty"); }	
		if ($rand == 6) { 
			$qty = rand (5,10);
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
		$results = $link->query("UPDATE $user SET graychests = graychests + 1");	
	}
	else { 
	echo $message= "<i>For some reason you can't open the chest now, you should try again later.</i><br/>";
	include ('update_feed.php'); // --- update feed
	}
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

else if($input=='se' || $input=='southeast') 
{	echo 'You travel southeast<br/>';
   	$message="<i>You travel southeast</i></br>".$_SESSION['desc111g'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '111g'"); // -- room change
   	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	$_SESSION['ogresearch'] = 0;	
}


// ----------------------------------- end of room function
include ('function-end.php');
}
?>
