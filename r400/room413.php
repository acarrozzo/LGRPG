<?php
						$roomname = "Blue Oasis - Friendly Pirate";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc413'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

$equipMount = $row['equipMount'];

$teleport6 = $row['teleport6'];


$quest41=$row['quest41']; 
$quest42=$row['quest42']; 
$quest43=$row['quest43']; 


//$KLsquid=$row['KLsquid']; 
//$KLmudcrab=$row['KLmudcrab']; 

//$KLjellyfish = $row['KLjellyfish'];
//$KLelectriceel = $row['KLelectriceel'];
//$KLpiranha = $row['KLpiranha'];
//$KLbarracuda = $row['KLbarracuda'];
//$KLcrocodile = $row['KLcrocodile'];

// -------------------------------------------------------------------------- Activate Teleport
if ($teleport6 == 0) { 	
	$results = $link->query("UPDATE $user SET teleport6 = 1");
	echo $message="<i>You can now teleport to the Blue Ocean Oasis! Click 'blue ocean' in the teleport menu to teleport to this location at any time. </i><br/>";
	include ('update_feed.php'); // --- update feed	  
	}	
	
if($input=='pick redberry' ||$input=='pick 20 redberry' || $input=='pick berry')  // ---- PICK REDBERRY
{
    $check=$row['redberry'];
	if ( $check >= 20 )
	{
	echo $message="<div class='menuAction'><i class='fa fa-times-circle lightred'></i>You already have more than 20 redberries! Come back if you run low.</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You pick up 20 redberries!</div>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET redberry = 20");
	}
}

if($input=='pick blueberry' ||$input=='pick 20 blueberry' || $input=='pick berry')  // ---- PICK blueBERRY
{
    $check=$row['blueberry'];
	if ( $check >= 20 )
	{
	echo $message="<div class='menuAction'><i class='fa fa-times-circle lightred'></i>You already have more than 20 blueberries! Come back if you run out.</div>";	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up blue'></i>You pick up 20 blueberries!</div>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET blueberry = 20");
	}
}
// --------------------------------------------------------------------------- REST HEAL
if ($input=="rest"){
		$query = $link->query("UPDATE $user SET hp = $hpmax + 50 "); 
		$query = $link->query("UPDATE $user SET mp = $mpmax + 50 "); 
		echo $message = "You rest at the Blue Oasis! (+50 HP, +50 MP)<br/>";
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
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

if ($quest41 == 2 && $quest42 == 2 && $quest43 == 2) {	
	}
	// ---------------------- START ALL QUESTS ---------------------- //
  if($input=='start quests' || $input=='start quests') {
	 if ($quest41 <1 || $quest42 <1 || $quest43 <1) {	
		echo $message = "<div class='menuAction'><em class='gold'>You start the Friendly Pirate's Quests! (41 - 43)</em><br>Check your Quests tab to review what needs to be done.</div> ";		
		include ('update_feed.php'); // --- update feed
   		$results = $link->query("UPDATE $user SET quest41 = 1");
   		$results = $link->query("UPDATE $user SET quest42 = 1");
   		$results = $link->query("UPDATE $user SET quest43 = 1");
	  	}
}
			
// ---------------------- QUEST 41) Like a Squid ---------------------- //
if($input=='info 41') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 41 Info</strong><br>
		You can find Squid both on and below the ocean. Hunt down 3 of them.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 41') 
{	if ($quest41 == 1 && $row['KLsquid']>=3)
	{	echo $message="<div class='questWin'>
		<h3>Quest 41 Completed!</h3>
		<h4>Like a Squid</h4>
		Congrats! You have indeed defeated 3 Squid! The Pirate smiles and while humming 'Like a Squid', hands you a perfectly balanced Calamari Cap! 
	  	<h4>Rewards</h4>
  	  	[ + 1000 xp  ]<br />
      	[ + 500 $currency ]<br />
      	[ + Calamari Cap! ]</div>";	
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET xp = xp + 1000"); 
	   	$results = $link->query("UPDATE $user SET currency = currency + 500"); 
		$results = $link->query("UPDATE $user SET calamaricap = calamaricap + 1");
		$results = $link->query("UPDATE $user SET quest41 = 2");
	} 
	else if ($quest41 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 41 Not Complete</strong><br>
		To complete this quest you need to hunt down 3 Squid.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}

// ---------------------- QUEST 42) Mud Crab Population Control ---------------------- //
if($input=='info 42') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 42 Info</strong><br>
		Mud island can be found to the southeast of here. Go there and eliminate 20 Mud Crabs.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 42') 
{	if ($quest42 == 1 && $row['KLmudcrab']>=20)
	{	echo $message="<div class='questWin'>
		<h3>Quest 42 Completed!</h3>
		<h4>Mud Crab Population Control</h4>
		NICE! You have indeed exterminated 20 Mud Crabs! The Pirate rummages through his bag of loot and hands you a surprisingly strong pair of Mud Boots! 
	  	<h4>Rewards</h4>
  	  	[ + 1000 xp  ]<br />
      	[ + 500 $currency ]<br />
      	[ + Mud Boots! ]</div>";	
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET xp = xp + 1000"); 
	   	$results = $link->query("UPDATE $user SET currency = currency + 500"); 
		$results = $link->query("UPDATE $user SET mudboots = mudboots + 1");
		$results = $link->query("UPDATE $user SET quest42 = 2");
	} 
	else if ($quest42 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 42 Not Complete</strong><br>
		To complete this quest you need to exterminate 20 Mud Crabs. Go find Mud Island. </div>";
		include ('update_feed.php'); // --- update feed
	}  
}



// ---------------------- QUEST 43) Ocean Hunter Pro ---------------------- //
if($input=='info 43') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 43 Info</strong><br>
		Become a Pro Ocean Hunter. Defeat a Jellyfish, Electric Eel, Piranha, Barracuda & Crocodile. Find all the fish anywhere on the Ocean and find the Crocodile near Crocodile Island. Keep hunting until you find em all.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 43') 
{	if ($quest43 == 1 && ($row['KLjellyfish'] >= 1 && $row['KLelectriceel'] >= 1 && $row['KLpiranha'] >= 1 && $row['KLbarracuda'] >= 1 && $row['KLcrocodile'] >= 1 ))
	{	echo $message="<div class='questWin'>
		<h4>Ocean Hunter Pro</h4>
		Awesome! You have indeed exterminated a Jellyfish, Electric Eel, Piranha, Barracuda & Crocodile! The Pirate reaches into his front pocket and hands you a shiny Gold Key! You're pretty sure a Gold Chest can be found somewhere under the ocean.  
	  	<h4>Rewards</h4>
  	  	[ + 1000 xp  ]<br />
      	[ + 500 $currency ]<br />
      	[ + 5 Gills Potions ]<br />
      	[ + Green Shield ]<br />
      	[ + Gold Key! ]</div>";	
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET xp = xp + 1000"); 
	   	$results = $link->query("UPDATE $user SET currency = currency + 500"); 
		$results = $link->query("UPDATE $user SET goldkey = goldkey + 1");
		$results = $link->query("UPDATE $user SET greenshield = greenshield + 1");
		$results = $link->query("UPDATE $user SET gillspotion = gillspotion + 5");
		$results = $link->query("UPDATE $user SET quest43 = 2");
	} 
	else if ($quest43 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 43 Not Complete</strong><br>
		To complete this quest you need to defeat a Jellyfish, Electric Eel, Piranha, Barracuda & Crocodile. They can all be found on the Ocean.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}

	











// -------------------------------------------------------------------------- TRAVEL
else if($input=='w' || $input=='west') 
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel west.<br/>';
   		$message="<i>You travel west.</i></br>".$_SESSION['desc420'];
		include ('update_feed.php');   // --- update feed
   			   $results = $link->query("UPDATE $user SET room = '420'"); // -- room change
   			   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		} else{
 		echo $message="<i>You can't go that way! You need to be in a boat!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}
else if($input=='se' || $input=='southeast') 
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel southeast.<br/>';
   		$message="<i>You travel southeast.</i></br>".$_SESSION['desc406'];
		include ('update_feed.php');   // --- update feed
   			   $results = $link->query("UPDATE $user SET room = '406'"); // -- room change
   			   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		} else{
 		echo $message="<i>You can't go that way! You need to be in a boat!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}
else if($input=='e' || $input=='east') 
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel east.<br/>';
   		$message="<i>You travel east.</i></br>".$_SESSION['desc407'];
		include ('update_feed.php');   // --- update feed
   			   $results = $link->query("UPDATE $user SET room = '407'"); // -- room change
   			   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		} else{
 		echo $message="<i>You can't go that way! You need to be in a boat!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}







// ----------------------------------- end of room function
include ('function-end.php');
}
?>