<?php
						$roomname = "Dwarf Guard - Bounty Board";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc306'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

$quest38=$row['quest38']; 
$quest39=$row['quest39']; 
$quest40=$row['quest40'];  

$KLredbeard=$row['KLredbeard']; 
$KLtrollking=$row['KLtrollking']; 
$KLgatekeeper=$row['KLgatekeeper']; 


$arrows=$row['arrows']; 
$bolts=$row['bolts']; 
$polearm=$row['polearm']; 
$javelin=$row['javelin']; 
$irondagger=$row['irondagger']; 


if($input=='grab arrows')  // ---- GRAB ARROWS
{
	if ( $arrows >= 50 )
	{
	echo $message="<div class='menuAction'><i class='fa fa-times-circle lightred'></i>You already have more than 50 arrows! Come back if you run low.</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You grab a bundle of arrows! [ +50 arrows ]</div>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET arrows = 50");
	}
}
if($input=='grab bolts')  // ---- GRAB BOLTS
{
	if ( $bolts >= 50 )
	{
	echo $message="<div class='menuAction'><i class='fa fa-times-circle lightred'></i>You already have more than 50 bolts! Come back if you run low.</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You grab a bundle of bolts! [ +50 bolts ]</div>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET bolts = 50");
	}
}
if($input=='grab javelins')  // ---- GRAB ARROWS
{
	if ( $javelin >= 10 )
	{
	echo $message="<div class='menuAction'><i class='fa fa-times-circle lightred'></i>You already have more than 10 javelins! Come back if you run low.</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You grab a bundle of javelins! [ +10 javelins ]</div>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET javelin = 10");
	}
}
if($input=='grab iron daggers')  // ---- GRAB ARROWS
{
	if ( $irondagger >= 3 )
	{
	echo $message="<div class='menuAction'><i class='fa fa-times-circle lightred'></i>You already have more than 3 iron daggers! Come back if you run low.</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You grab a bundle of iron daggers! [ +3 iron daggers ]</div>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET irondagger = 3");
	}
}

if($input=='grab polearm') 
{	if ($polearm >= 1)
	 	{ echo $message="<div class='menuAction'><i class='fa fa-times-circle lightred'></i>You already have a polearm. If you lose it come back here for another free one.</div>"; include ('update_feed.php'); // --- update feed
		}
	else
	 	{ echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up'></i>You grab a polearm and put in your pack! [ +3 polearm ]</div>"; include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET polearm = 1");
	 	}
}



		
	// ---------------------- START ALL QUESTS ---------------------- //
  if($input=='start quests') {
	 if ($quest38 <1 || $quest39 <1 || $quest40 <1) {	
		echo $message = "<div class='menuAction'><em class='gold'>You start the Dwarf Bounty Board Quests! (38 - 40)</em><br>Check your Quests tab to review what needs to be done.</div> ";		
		include ('update_feed.php'); // --- update feed
   		$results = $link->query("UPDATE $user SET quest38 = 1");
   		$results = $link->query("UPDATE $user SET quest39 = 1");
   		$results = $link->query("UPDATE $user SET quest40 = 1");
	  	}
}
			
// ---------------------- QUEST 38) Red Beard Bounty ---------------------- //
if($input=='info 38') { 
		echo $message="<div class='menuAction'><strong class='green px30'>Quest 38 Info</strong><br>
		Head to the Red Fort and defeat Red Beard to receive a powerful war axe.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 38') 
{	if ($quest38 == 1 && $KLredbeard >= 1)
	{	echo $message="<div class='questWin'>
		<h3>Quest 38 Completed!</h3>
		<h4>Red Beard Bounty</h4>
		Congrats! Congrats! You have defeated the outlaw Red Beard. You are handed a deadly war axe and huge amount of coin as a reward. 
	  	<h4>Rewards</h4>
  	  	[ + 1000 xp  ]<br />
      	[ + 5000 $currency ]<br />
      	[ + War Axe! ]</div>";	
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET xp = xp + 1000"); 
	   	$results = $link->query("UPDATE $user SET currency = currency + 5000"); 
		$results = $link->query("UPDATE $user SET waraxe = waraxe + 1");
		$results = $link->query("UPDATE $user SET quest38 = 2");
	} 
	else if ($quest38 == 1)
	{	echo $message="<div class='menuAction'><strong class='green px30'>Quest 38 Not Complete</strong><br>
		To complete this quest you need to defeat Red Beard. Find him in his Fort southwest of here.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}

// ---------------------- QUEST 39) Troll King Bounty ---------------------- //
if($input=='info 39') { 
		echo $message="<div class='menuAction'><strong class='green px30'>Quest 39 Info</strong><br>
		Slay the Troll King found in the the depths of the Dark Forest for a huge reward.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 39') 
{	if ($quest39 == 1 && $KLtrollking >= 1)
	{	echo $message="<div class='questWin'>
		<h3>Quest 39 Completed!</h3>
		<h4>Troll King Bounty</h4>
		Congrats! You have indeed defeated the vicious Troll King! You are handed a very powerful magical scepter and big time XP and coin!  
	  	<h4>Rewards</h4>
  	  	[ + 5000 xp  ]<br />
      	[ + 5000 $currency ]<br />
      	[ + King's Sceptor! ]</div>";
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET xp = xp + 5000"); 
	   	$results = $link->query("UPDATE $user SET currency = currency + 5000"); 
		$results = $link->query("UPDATE $user SET kingsscepter = kingsscepter + 1");
		$results = $link->query("UPDATE $user SET quest39 = 2");	
	} 
	else if ($quest39 == 1)
	{	echo $message="<div class='menuAction'><strong class='green px30'>Quest 39 Not Complete</strong><br>
		To complete this quest you need to defeat the Troll King. Find him deep within the Dark Forest.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}

// ---------------------- QUEST 40) Gatekeeper Bounty ---------------------- //
if($input=='info 40') { 
		echo $message="<div class='menuAction'><strong class='green px30'>Quest 40 Info</strong><br>
		Slay the Troll King found in the the depths of the Dark Forest for a huge reward.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 40') 
{	if ($quest40 == 1 && $KLgatekeeper >= 1)
	{	echo $message="<div class='questWin'>
		<h3>Quest 40 Completed!</h3>
		<h4>Gatekeeper Bounty</h4>
		Congrats! Wowza! You have indeed defeated the powerful Gatekeeper! Your reward is the powerful gold falcion! and big time XP and coin.  
	  	<h4>Rewards</h4>
  	  	[ + 10,000 xp  ]<br />
      	[ + 5000 $currency ]<br />
      	[ + Gold Falcion! ]</div>";	
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET xp = xp + 10000"); 
	   	$results = $link->query("UPDATE $user SET currency = currency + 5000"); 
		$results = $link->query("UPDATE $user SET goldfalcion = goldfalcion + 1");
		$results = $link->query("UPDATE $user SET quest40 = 2");
	} 
	else if ($quest40 == 1)
	{	echo $message="<div class='menuAction'><strong class='green px30'>Quest 40 Not Complete</strong><br>
		To complete this quest you need to defeat the Troll King. Find him deep within the Dark Forest.</div>";
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
   	$message="<i>You travel west</i></br>".$_SESSION['desc303'];
	include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = 303"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='n' || $input=='north') 
{			echo 'You travel north<br/>';
   	$message="<i>You travel north</i></br>".$_SESSION['desc307'];
	include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = 307"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='se' || $input=='southeast') 
{			echo 'You travel southeast<br/>';
   	$message="<i>You travel southeast</i></br>".$_SESSION['desc301'];
	include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = 301"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}







// ----------------------------------- end of room function
include ('function-end.php');
}
?>