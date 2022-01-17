<?php
						$roomname = "Dark Elf | Tree Hut";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc506'];

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

$quest54=$row['quest54']; 
$quest55=$row['quest55']; 
$quest56=$row['quest56']; 

$wood=$row['wood']; 
$KLtrollshaman=$row['KLtrollshaman']; 
$KLtrollsorcerer=$row['KLtrollsorcerer']; 

$KLent=$row['KLent']; 


// --------------------------------------------------------------------------- REST HEAL
if ($input=="rest"){
		$query = $link->query("UPDATE $user SET hp = $hpmax + 75 "); 
		$query = $link->query("UPDATE $user SET mp = $mpmax + 75 "); 
		echo $message = "you rest at the Tree Huts fireplace and super charge you health and mana (+75 HP, +75 MP)<br/>";
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
// -------------------------------------------------------------------------- GRAB tea
if($input=='grab tea' || $input=='get tea'  )  
{
    $check=$row['tea'];
	if ( $check >= 5 )
	{
	echo $message="<div class='menuAction'><i class='fa fa-times-circle lightred'></i>You already have tea! Come back if you run out.</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You pick up 5 cups o' tea from the table!</div>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET tea = 5");
	}
}


// ---------------------- START ALL QUESTS ---------------------- //
if($input=='start quests') {
	 if ($quest54 <1 || $quest55 <1 || $quest56 <1) {	
		echo $message = "<div class='menuAction'><em class='gold'>You start the Dark Elf Quests! (54 - 56)</em><br>Check your Quests tab to review what needs to be done.</div> ";		
		include ('update_feed.php'); // --- update feed
   		$results = $link->query("UPDATE $user SET quest54 = 1");
   		$results = $link->query("UPDATE $user SET quest55 = 1");
   		$results = $link->query("UPDATE $user SET quest56 = 1");
	  	}
}


// ---------------------- QUEST 54) Dark Forest Lumberjack ---------------------- //
if($input=='info 54') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 54 Info</strong><br>
		You ready for a big order traveler? Return here with 50 wood.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 54') 
{	if ( $wood >=50 )
	{	echo $message="<div class='questWin'>
		<h3>Quest 54 Completed!</h3>
		<h4>Dark Forest Lumberjack</h4>
		CONGRATS! You have indeed gathered 50 pieces of wood. That’s a lot of wood! The Dark Elf hands you a freshly crafted Mithril Hatchet.
		<h4>Rewards</h4>
  	  	[ + 1000 xp  ]<br />
      	[ + 5000 $currency ]<br />
      	[ + Ring of Health Regen V ]<br />
      	[ + Ring of Mana Regen V ]<br />
      	[ + Mithril Hatchet! ]</div>";	
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET xp = xp + 1000"); 
	   	$results = $link->query("UPDATE $user SET currency = currency + 5000"); 
		$results = $link->query("UPDATE $user SET mithrilhatchet = mithrilhatchet + 1");
		$results = $link->query("UPDATE $user SET ringofhealthregenV = ringofhealthregenV + 1");
		$results = $link->query("UPDATE $user SET ringofmanaregenV = ringofmanaregenV + 1");
		$results = $link->query("UPDATE $user SET quest54 = 2");
	} 
	else if ($quest54 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 54 Not Complete</strong><br>
	To complete this quest pick up a hatchet and go into the Forest and chop down some wood. Return when you have 50 pieces.
	</div>";
		include ('update_feed.php'); // --- update feed
	}  
}

// ---------------------- QUEST 55) Shaman & Sorcerer Slayer ---------------------- //
if($input=='info 55') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 55 Info</strong><br>
		I have a shiny gold key with your name on it. Return here after you slay a Troll Shaman and a Troll Sorcerer and it’s all yours.
		</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 55') 
{	if ( $KLtrollshaman >=1 && $KLtrollsorcerer >=1 )
	{	echo $message="<div class='questWin'>
		<h3>Quest 55 Completed!</h3>
		<h4>Shaman & Sorcerer Slayer</h4>
CONGRATS! You have indeed slain a Shaman and Sorcerer. I present to you this marvelous Gold Key. Use it to open the Dark Forest Gold Chest or any other Gold Chest you like.
		<h4>Rewards</h4>
  	  	[ + 1500 xp  ]<br />
      	[ + 5000 $currency ]<br />
      	[ + Gold Key! ]</div>";	
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET xp = xp + 1500"); 
	   	$results = $link->query("UPDATE $user SET currency = currency + 5000"); 
		$results = $link->query("UPDATE $user SET goldkey = goldkey + 1");
		$results = $link->query("UPDATE $user SET quest55 = 2");
	} 
	else if ($quest55 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 55 Not Complete</strong><br>
To complete this quest you need to defeat a Troll Shaman and a Troll Sorcerer. They can both be found in the Dark Forest.
	</div>";
		include ('update_feed.php'); // --- update feed
	}  
}


// ---------------------- QUEST 56) Ent Hunter ---------------------- //
if($input=='info 56') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 56 Info</strong><br>
Trees have been coming to life and attacking the wildlife. They are difficult to spot but when you do send it back into the ground.
		</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 56') 
{	if ( $KLent >=1 )
	{	echo $message="<div class='questWin'>
		<h3>Quest 56 Completed!</h3>
		<h4>Ent Hunter</h4>
CONGRATS! You have indeed beat up a tree! A marvelous blue falcon flies in from the sky. With glowing feathers that look like tempered mithril, this bird is ready to go.
		<h4>Rewards</h4>
  	  	[ + 2000 xp  ]<br />
      	[ + 5000 $currency ]<br />
      	[ + Blue Falcon! ]</div>";	
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET xp = xp + 2000"); 
	   	$results = $link->query("UPDATE $user SET currency = currency + 5000"); 
		$results = $link->query("UPDATE $user SET MOUNTbluefalcon = MOUNTbluefalcon + 1");
		$results = $link->query("UPDATE $user SET quest56 = 2");
	} 
	else if ($quest56 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 56 Not Complete</strong><br>
To complete this quest you need to defeat an Ent. They are rare creatures found in the Dark Forest.
		</div>";
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
else if($input=='nw' || $input=='northwest') 
{			echo 'You travel northwest to the Dark Forest Teleport<br/>';
   	$message="<i>You travel northwest to the Dark Forest Teleport</i></br>".$_SESSION['desc507'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '507'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='se' || $input=='southeast') 
{			echo 'You travel southeast<br/>';
   	$message="<i>You travel southeast</i></br>".$_SESSION['desc505'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '505'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}

// ----------------------------------- end of room function
include ('function-end.php');
}
?>