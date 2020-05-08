<?php
						$roomname = "Stone Mountain | Base Camp";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc607'];

include ('function-start.php'); 
 
// -------------------------DB CONNECT!
include ('db-connect.php');   
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   





$quest61=$row['quest61']; 
$quest62=$row['quest62']; 
$quest63=$row['quest63']; 

$flower=$row['flower']; 


$redpotion=$row['redpotion']; 
$bluepotion=$row['bluepotion']; 
$mud=$row['mud']; 

$KLulfberht=$row['KLulfberht']; 


// ---------------------- START ALL QUESTS ---------------------- //
if($input=='start quests') {
	 if ($quest61 <1 || $quest62 <1 || $quest63 <1) {	
		echo $message = "<div class='menuAction'><em class='gold'>You start Master Raul's Quests! (61 - 63)</em><br>Check your Quests tab to review what needs to be done.</div> ";		
		include ('update_feed.php'); // --- update feed
   		$results = $link->query("UPDATE $user SET quest61 = 1");
   		$results = $link->query("UPDATE $user SET quest62 = 1");
   		$results = $link->query("UPDATE $user SET quest63 = 1");
	  	}
}



// ---------------------- QUEST 61) Frozen Fourth Flower ---------------------- //
if($input=='info 61') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 61 Info</strong><br>
		An elderly woman at the camp requests you bring her 4 flowers. After getting the first 3 you can find the final one past the stone bridge up in the mountains.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 61')
{	if ($flower >= 4)
	{	echo $message="<div class='questWin'>
		<h3>Quest 61 Completed!</h3>
		<h4>Frozen Fourth Flower</h4>
		CONGRATS! You have 4 flowers! You hand them to the elderly lady and she gives you a pair of Glowing Gloves pulsing with magical energy.
	  	<h4>Rewards</h4>
  	  	[ + 1000 xp  ]<br />
      	[ + 5000 $currency ]<br />
      	[ + Glowing Gloves! ]</div>";	
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET xp = xp + 1000"); 
	   	$results = $link->query("UPDATE $user SET currency = currency + 5000"); 
		$results = $link->query("UPDATE $user SET glowinggloves = glowinggloves + 1");
		$results = $link->query("UPDATE $user SET flower = flower - 4");
		$results = $link->query("UPDATE $user SET quest61 = 2");
	} 
	else if ($quest61 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 61 Not Complete</strong><br>
	Quest not complete. To complete this quest you need to collect 4 flowers. Start with the one in the grassy field, then Red Town, then the ocean, and then finally the one here in the mountains over the stone bridge.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}



// ---------------------- QUEST 62) Balm Mixer ---------------------- //
if($input=='info 62') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 62 Info</strong><br>
		You see a snow covered shaman in the corner of camp mixing some potions with mud. He will teach you how make potent balms if you bring the correct ingredients.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 62')
{	if ($redpotion >= 5 && $bluepotion >= 5 && $mud >= 10)
	{	echo $message="<div class='questWin'>
		<h3>Quest 62 Completed!</h3>
		<h4>Balm Mixer</h4>
		CONGRATS! You hand the shaman the ingredients and he shows you how to make healing balms!
	  	<h4>Rewards</h4>
  	  	[ + 1000 xp  ]<br />
      	[ + 5000 $currency ]<br />
      	[ + 10  Red Balm ]<br />
      	[ + 10  Blue Balm ]
		</div>";	
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET xp = xp + 1000"); 
	   	$results = $link->query("UPDATE $user SET currency = currency + 5000"); 
		$results = $link->query("UPDATE $user SET redbalm = redbalm + 10");
		$results = $link->query("UPDATE $user SET bluebalm = bluebalm + 10");
		$results = $link->query("UPDATE $user SET quest62 = 2");
	} 
	else if ($quest62 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 62 Not Complete</strong><br>
	Quest not complete. To complete this quest you need to bring the snowy shaman 5 red potions, 5 blue potions, and 10 mud.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}



// ---------------------- QUEST 63) Ulfberht the Viking ---------------------- //
if($input=='info 63') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 63 Info</strong><br>
		The leader of the camp approaches you with a bounty. Defeat the undead viking found in the Neverending mine and you will be rewarded with a loyal companion.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 63') 
{	if ( $KLulfberht >=1  )
	{	echo $message="<div class='questWin'>
		<h3>Quest 63 Completed!</h3>
		<h4>Ulfberht the Viking</h4>
 		CONGRATS! You have defeated the mighty Ulfberht! The entire camp applauds your achievement. The leader gives a quick whistle and an ogre shieldmate comes running up to your side [ New Companion: Ogre Shieldmate ]
 	  	<h4>Rewards</h4>
  	  	[ + 3000 xp  ]<br />
      	[ + 5000 $currency ]<br />
      	[ + Ogre Shieldmate ! ]</div>";	
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET xp = xp + 3000"); 
	   	$results = $link->query("UPDATE $user SET currency = currency + 5000"); 
		$results = $link->query("UPDATE $user SET COMPogreshieldmate = COMPogreshieldmate + 1");
		$results = $link->query("UPDATE $user SET quest63 = 2");
	} 
	else if ($quest63 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 63 Not Complete</strong><br>
	Quest not complete. To complete this quest you need to defeat Ulfberht found at mine level 15 in the Neverending Mine.</div>";
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
else if($input=='ne' || $input=='northeast') 
{			echo 'You travel northeast<br/>';
   	$message="<i>You travel northeast</i></br>".$_SESSION['desc605'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '605'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='n' || $input=='north') 
{			echo 'You travel north<br/>';
   	$message="<i>You travel north</i></br>".$_SESSION['desc608'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '608'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
// -------------------------------------------------------------------------- LIFT SOUTH		
else if ($input == 'take lift south')
{
	if ($cash < 500) {
		echo $message="<div class='menuAction'><i class='fa fa-times lightred'></i>You don’t have enough coin to take the lift. stop being so poor.</div>";	
		include ('update_feed.php'); // --- update feed	
	}
	else {
		echo "You pay Raul 500 coin and take the lift south!</br>"; 
		 $message="<div class='menuAction'><i class='fa fa-arrow-circle-up'></i>You pay Raul 500 coin and take the lift south!</div><br/>".$_SESSION['desc606'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '606'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	$query = $link->query("UPDATE $user SET currency = currency - 500"); 
	}
}



// ----------------------------------- end of room function
include ('function-end.php');
}
?>