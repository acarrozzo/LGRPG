<?php
						$roomname = "Mining Guild Headquarters - Guild Leader";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc308c'];

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   


$quest32=$row['quest32'];  
$KLphoenix=$row['KLphoenix']; 
$quest33=$row['quest33'];  
$KLcyclops=$row['KLcyclops']; 
$quest34=$row['quest34'];  
$KLminotaur=$row['KLminotaur']; 


// ---------------------- START ALL QUESTS ---------------------- //
  if($input=='start quests') {
	 if ($quest32 <1 ) {	
		echo $message = "<div class='menuAction'><em class='gold'>You start the Mining Guild Leaders Quests! (31)</em><br>Check your Quests tab to review what needs to be done.</div> ";		
		include ('update_feed.php'); // --- update feed
   		$results = $link->query("UPDATE $user SET quest32 = 1");
   		$results = $link->query("UPDATE $user SET quest33 = 1");
   		$results = $link->query("UPDATE $user SET quest34 = 1");
	  	}
}
// ---------------------- QUEST 32) Iron Boss: Phoenix ---------------------- //
if($input=='info 32') { 
		echo $message="<div class='menuAction'><strong class='green px30'>Quest 32 Info</strong><br>
		Defeat the Phoenix at Mine level 10 to gain the ability to craft with Iron. Be prepared, the Phoenix is only damaged by ranged attacks.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 32') 
{	if ($KLphoenix >= 1)
	{	echo $message="<div class='questWin'>
		<h3>Quest 32 Completed!</h3>
		<h4>Iron Boss: Phoenix</h4>
		CONGRATS! You have indeed defeated the ferocious Iron Boss, the Phoenix! You can now craft with Iron!
	  	<h4>Rewards</h4>
  	  	[ + 2000 xp  ]<br />
      	[ + 20k $currency ]<br />
      	[ + Iron Pickaxe ]<br />
      	[ + Iron Hammer ]<br />
      	[ + Can Craft with IRON! ]</div>";	
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET xp = xp + 2000"); 
	   	$results = $link->query("UPDATE $user SET currency = currency + 20000"); 
		$results = $link->query("UPDATE $user SET ironpickaxe = ironpickaxe + 1");
		$results = $link->query("UPDATE $user SET ironhammer = ironhammer + 1");
		$results = $link->query("UPDATE $user SET crafting = crafting + 1");
		$results = $link->query("UPDATE $user SET quest32 = 2");
	} 
	else if ($quest32 == 1)
	{	echo $message="<div class='menuAction'><strong class='green px30'>Quest 32 Not Complete</strong><br>
	To complete this quest you need to defeat the Phoenix. Dig down the neverending mine and you will surely find what you're looking for.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}





// ---------------------- QUEST 33) Steel Boss: Cyclops ---------------------- //
if($input=='info 33') { 
		echo $message="<div class='menuAction'><strong class='green px30'>Quest 33 Info</strong><br>
		Defeat the Cyclops at Mine level 20 to gain the ability to craft with Steel. Don't worry about your DEF though, the Cyclops attacks are pure, meaning they bypass your defenses altogether!</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 33') 
{	if ($KLcyclops >= 1)
	{	echo $message="<div class='questWin'>
		<h3>Quest 33 Completed!</h3>
		<h4>Steel Boss: Cyclops</h4>
		CONGRATS! You have indeed defeated the Steel Boss, the Cyclops! You can now craft with Steel!
	  	<h4>Rewards</h4>
  	  	[ + 3000 xp  ]<br />
      	[ + 30k $currency ]<br />
      	[ + Steel Pickaxe ]<br />
      	[ + Steel Hammer ]<br />
      	[ + Can Craft with STEEL! ]</div>";	
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET xp = xp + 3000"); 
	   	$results = $link->query("UPDATE $user SET currency = currency + 30000"); 
		$results = $link->query("UPDATE $user SET steelpickaxe = steelpickaxe + 1");
		$results = $link->query("UPDATE $user SET steelhammer = steelhammer + 1");
		$results = $link->query("UPDATE $user SET crafting = crafting + 1");
		$results = $link->query("UPDATE $user SET quest33 = 2");
	} 
	else if ($quest33 == 1)
	{	echo $message="<div class='menuAction'><strong class='green px30'>Quest 33 Not Complete</strong><br>
	To complete this quest you need to defeat the Cyclops. Dig down the neverending mine and you will surely find what you're looking for.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}


// ---------------------- QUEST 34) Mithril Boss: Minotaur ---------------------- //
if($input=='info 34') { 
		echo $message="<div class='menuAction'><strong class='green px30'>Quest 34 Info</strong><br>
		Defeat the Minotaur at Mine level 30 to gain the ability to craft with Mithril. Prepare yourself, the Minotaur is strong and attacks with power and rage.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 34') 
{	if ($KLminotaur >= 1)
	{	echo $message="<div class='questWin'>
		<h3>Quest 34 Completed!</h3>
		<h4>Mithril Boss: Minotaur</h4>
		CONGRATS! You have indeed defeated the very mean Mithril Boss, the Minotaur! You can now craft with Mithril!
	  	<h4>Rewards</h4>
  	  	[ + 4000 xp  ]<br />
      	[ + 40k $currency ]<br />
      	[ + Mithril Pickaxe ]<br />
      	[ + Mithril Hammer ]<br />
      	[ + Can Craft with MITHRIL! ]</div>";	
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET xp = xp + 4000"); 
	   	$results = $link->query("UPDATE $user SET currency = currency + 40000"); 
		$results = $link->query("UPDATE $user SET mithrilpickaxe = mithrilpickaxe + 1");
		$results = $link->query("UPDATE $user SET mithrilhammer = mithrilhammer + 1");
		$results = $link->query("UPDATE $user SET crafting = crafting + 1");
		$results = $link->query("UPDATE $user SET quest34 = 2");
	} 
	else if ($quest34 == 1)
	{	echo $message="<div class='menuAction'><strong class='green px30'>Quest 34 Not Complete</strong><br>
	To complete this quest you need to defeat the Minotaur. Dig down the neverending mine and you will surely find what you're looking for.</div>";
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
else if($input=='n' || $input=='north') 
{			echo 'You travel north<br/>';
   	$message="<i>You travel north</i></br>".$_SESSION['desc308a'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '308a'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}









// ----------------------------------- end of room function
include ('function-end.php');
}
?>