<?php
						$roomname = "Dark Forest Outpost | Ranger Guard";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc502'];

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

$quest51=$row['quest51']; 
$quest52=$row['quest52']; 
$quest53=$row['quest53']; 

$KLbowman=$row['KLbowman']; 
$KLhighwayman=$row['KLhighwayman']; 

$KLtrollelder=$row['KLtrollelder']; 

$KLlurker=$row['KLlurker']; 
$KLwingeddemon=$row['KLwingeddemon']; 
$KLundeadorc=$row['KLundeadorc']; 





// ---------------------- START ALL QUESTS ---------------------- //
if($input=='start quests') {
	 if ($quest51 <1 || $quest52 <1 || $quest53 <1) {	
		echo $message = "<div class='menuAction'><em class='gold'>You start the Ranger Guard's Quests! (51 - 53)</em><br>Check your Quests tab to review what needs to be done.</div> ";		
		include ('update_feed.php'); // --- update feed
   		$results = $link->query("UPDATE $user SET quest51 = 1");
   		$results = $link->query("UPDATE $user SET quest52 = 1");
   		$results = $link->query("UPDATE $user SET quest53 = 1");
	  	}
}


// ---------------------- QUEST 51) Protect the Mountain Path ---------------------- //
if($input=='info 51') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 51 Info</strong><br>
		The Bowmen and Highwaymen are thieves who prey on those who travel the Mountain Path! Protect the path by removing 5 of each.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 51') 
{	if ( $KLbowman >=5 && $KLhighwayman >=5 )
	{	echo $message="<div class='questWin'>
		<h3>Quest 51 Completed!</h3>
		<h4>Protect the Mountain Path</h4>
 		CONGRATS! You have indeed defeated 5 Bowmen & 5 Highwaymen. The Ranger Guard rewards you with a deadly Black Blade! 
		<h4>Rewards</h4>
  	  	[ + 1000 xp  ]<br />
      	[ + 5000 $currency ]<br />
      	[ + Black Blade! ]</div>";	
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET xp = xp + 1000"); 
	   	$results = $link->query("UPDATE $user SET currency = currency + 5000"); 
		$results = $link->query("UPDATE $user SET blackblade = blackblade + 1");
		$results = $link->query("UPDATE $user SET quest51 = 2");
	} 
	else if ($quest51 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 51 Not Complete</strong><br>
	To complete this quest you must defeat 5 Bowmen & 5 Highwaymen. They can be found patrolling the stone path to the mountains.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}

// ---------------------- QUEST 52) Elder Slayer ---------------------- //
if($input=='info 52') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 52 Info</strong><br>
		Defeat 3 devious Troll Elders and make the Dark Forest a safer place.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 52') 
{	if ( $KLtrollelder >=3 )
	{	echo $message="<div class='questWin'>
		<h3>Quest 52 Completed!</h3>
		<h4>Elder Slayer</h4>
		CONGRATS! You have indeed defeated 3 Troll Elders. The Ranger Guard whistles and a Dire Wolf comes running in. The wolf is now yours!
		<h4>Rewards</h4>
  	  	[ + 1500 xp  ]<br />
      	[ + 5000 $currency ]<br />
      	[ + Dire Wolf! ]</div>";	
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET xp = xp + 1500"); 
	   	$results = $link->query("UPDATE $user SET currency = currency + 5000"); 
		$results = $link->query("UPDATE $user SET MOUNTdirewolf = MOUNTdirewolf + 1");
		$results = $link->query("UPDATE $user SET quest52 = 2");
	} 
	else if ($quest52 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 52 Not Complete</strong><br>
	To complete this quest you need to defeat 3 Troll Elders. They can be found in the Dark Forest.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}


// ---------------------- QUEST 53) Dark Keep First Floor ---------------------- //
if($input=='info 53') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 53 Info</strong><br>
		Defeat the 3 enemies on the First Floor of the Dark Keep. A Lurker, a Winged Demon, and an Undead Orc.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 53') 
{	if ( $KLlurker >=1 && $KLwingeddemon >=1 && $KLundeadorc >=1 )
	{	echo $message="<div class='questWin'>
		<h3>Quest 53 Completed!</h3>
		<h4>Dark Keep First Floor</h4>
		CONGRATS! You have indeed defeated a Lurker, a Winged Demon, and an Undead Orc. The Ranger Guard hands you a mean looking Demon Cape!
		<h4>Rewards</h4>
  	  	[ + 2000 xp  ]<br />
      	[ + 5000 $currency ]<br />
      	[ + Demon Cape! ]</div>";	
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET xp = xp + 2000"); 
	   	$results = $link->query("UPDATE $user SET currency = currency + 5000"); 
		$results = $link->query("UPDATE $user SET demoncape = demoncape + 1");
		$results = $link->query("UPDATE $user SET quest53 = 2");
	} 
	else if ($quest53 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 53 Not Complete</strong><br>
	To complete this quest you need to defeat the 3 enemies found on the First Floor of the Dark Keep. The Dark Keep can be reached by heading west in the Dark Forest.	</div>";
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
   	$message="<i>You travel west</i></br>".$_SESSION['desc503'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '503'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='s' || $input=='south') 
{			echo 'You travel south<br/>';
   	$message="<i>You travel south</i></br>".$_SESSION['desc501'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '501'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='ne' || $input=='northeast') 
{	
	if ( $quest51 >=2 && $quest52 >=2 && $quest53 >=2 ) 
	{
	echo 'You travel northeast to the Dark Forest<br/>';
 	$message="<i>You travel northeast to the Dark Forest</i><br/>".$_SESSION['desc507'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = 507"); // -- room change
	}
	else
	{
	echo $message="<i>You cannot enter the Dark Forest from here until you complete all 3 of these quests..</i><br/>";
	include ('update_feed.php'); // --- update feed	
		
	}
}



// ----------------------------------- end of room function
include ('function-end.php');
}
?>