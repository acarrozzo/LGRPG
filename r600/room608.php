<?php
						$roomname = "Blue Guard | Mountain Outpost";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc608'];

include ('function-start.php'); 
 
// -------------------------DB CONNECT!
include ('db-connect.php');   
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){    


$quest64=$row['quest64']; 
$quest65=$row['quest65']; 
$quest66=$row['quest66']; 


$steeldagger = $row['steeldagger'];
$steelsword = $row['steelsword'];
$steelstaff = $row['steelstaff'];

//$steelmaul = $row['steelmaul'];
$steel2hsword = $row['steel2hsword'];
$steelbattlestaff = $row['steelbattlestaff'];
$steelnunchaku = $row['steelnunchaku'];

$steelboomerang = $row['steelboomerang'];
$steelchakram = $row['steelchakram'];
$steelbow = $row['steelbow'];
$steelcrossbow = $row['steelcrossbow'];

$steelshield = $row['steelshield'];
$steelkiteshield = $row['steelkiteshield'];

$steelhelmet=$row['steelhelmet']; 
$steelhood=$row['steelhood']; 

$steelarmor=$row['steelarmor']; 
$steelcape=$row['steelcape']; 

$steelgauntlets=$row['steelgauntlets']; 
$steelgloves=$row['steelgloves']; 

$steelboots=$row['steelboots']; 



$equipR=$row['equipR']; 
$equipL=$row['equipL']; 
$equipHead=$row['equipHead']; 
$equipBody=$row['equipBody']; 
$equipHands=$row['equipHands']; 
$equipFeet=$row['equipFeet']; 


$KLyeti=$row['KLyeti']; 
$KLdragon=$row['KLdragon']; 


// ---------------------- START ALL QUESTS ---------------------- //
if($input=='start quests') {
	 if ($quest64 <1 || $quest65 <1 || $quest66 <1) {	
		echo $message = "<div class='menuAction'><em class='gold'>You start the Blue Guards Quests! (64 - 66)</em><br>Check your Quests tab to review what needs to be done.</div> ";		
		include ('update_feed.php'); // --- update feed
   		$results = $link->query("UPDATE $user SET quest64 = 1");
   		$results = $link->query("UPDATE $user SET quest65 = 1");
   		$results = $link->query("UPDATE $user SET quest66 = 1");
	  	}
}




// ---------------------- QUEST 64) Steel Warrior ---------------------- //
if($input=='info 64') { 
		echo $message="<div class='menuAction'><strong class='green px30'>Quest 64 Info</strong><br>
		Impress Hector, the Blue Guard Captain, in a full set of Steel Armor. Collect, buy or craft the armor and return here with it equipped.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 64') 
{	if ( 

 		(( ($equipR == 'steel boomerang' || $equipR == 'steel chakram' || $equipR == 'steel dagger' || $equipR == 'steel sword' || $equipR == 'steel staff') 
			&& ($equipL == 'steel shield' || $equipL == 'steel kite shield' )) 
		||
		( 	$equipR == 'steel maul' || $equipR == 'steel 2h sword' || $equipR == 'steel battlestaff' || $equipR == 'steel nunchaku' ||
			$equipR == 'steel boomerang' || $equipR == 'steel chakram' || $equipR == 'steel bow' || $equipR == 'steel crossbow' )) 
		
		&& ( $equipHead == 'steel helmet' || $equipHead == 'steel hood' )
		&& ( $equipBody == 'steel armor' || $equipBody == 'steel cape' )
		&& ( $equipHands == 'steel gloves' || $equipHands == 'steel gauntlets' )
		&& ( $equipFeet == 'steel boots') 
)

	{	echo $message="<div class='questWin'>
		<h3>Quest 64 Completed!</h3>
		<h4>Steel Warrior</h4>
 		Hector is impressed! That's some nice looking steel armor you got yourself. The Captain hands you a Master Helm to show the world you are a true steel warrior!
 	  	<h4>Rewards</h4>
  	  	[ + 5000 xp  ]<br />
      	[ + 5000 $currency ]<br />
      	[ + Steel Master Helm! ]</div>";	
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET xp = xp + 1000"); 
	   	$results = $link->query("UPDATE $user SET currency = currency + 5000"); 
		$results = $link->query("UPDATE $user SET steelmasterhelm = steelmasterhelm + 1");
		$results = $link->query("UPDATE $user SET quest64 = 2");
	} 
	else if ($quest64 == 1)
	{	echo $message="<div class='menuAction'><strong class='green px30'>Quest 64 Not Complete</strong><br>
	Quest not complete. To complete this quest you need to be decked out in all steel. Equip steel weapons and armor in the top 6 slots.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}




// ---------------------- QUEST 65) Yeti Hunter ---------------------- //
if($input=='info 65') { 
		echo $message="<div class='menuAction'><strong class='green px30'>Quest 65 Info</strong><br>
		The illusive Yeti has been terrorizing the mountain side. Hector wants you to find and defeat this beast.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 65') 
{	if ( $KLyeti >=1  )
	{	echo $message="<div class='questWin'>
		<h3>Quest 65 Completed!</h3>
		<h4>Yeti Hunter</h4>
 		CONGRATS! You have indeed found and defeated the illusive Yeti! Hector hands you the cloak off his back made from a Yeti he hunted down long ago.
 	  	<h4>Rewards</h4>
  	  	[ + 5000 xp  ]<br />
      	[ + 5000 $currency ]<br />
      	[ + Yeti Cloak! ]</div>";	
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET xp = xp + 5000"); 
	   	$results = $link->query("UPDATE $user SET currency = currency + 5000"); 
		$results = $link->query("UPDATE $user SET yeticloak = yeticloak + 1");
		$results = $link->query("UPDATE $user SET quest65 = 2");
	} 
	else if ($quest65 == 1)
	{	echo $message="<div class='menuAction'><strong class='green px30'>Quest 65 Not Complete</strong><br>
	Quest not complete. To complete this quest you need to find and slay the rare Yeti. He can be found roaming the mountains.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}





// ---------------------- QUEST 66) Dragon Slayer	 ---------------------- //
if($input=='info 66') { 
		echo $message="<div class='menuAction'><strong class='green px30'>Quest 66 Info</strong><br>
		Ferocious dragons have been seen spotted soaring among the mountain tops. There is a big reward for taking one down.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 66') 
{	if ( $KLdragon >=1  )
	{	echo $message="<div class='questWin'>
		<h3>Quest 66 Completed!</h3>
		<h4>Dragon Slayer</h4>
 		CONGRATS! you have indeed slain a Dragon! Hector, most impressed, hands you a marksman orb pulsing with raw power.
 	  	<h4>Rewards</h4>
  	  	[ + 10000 xp  ]<br />
      	[ + 50000 $currency ]<br />
      	[ + Marksman Orb! ]</div>";	
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET xp = xp + 10000"); 
	   	$results = $link->query("UPDATE $user SET currency = currency + 50000"); 
		$results = $link->query("UPDATE $user SET marksmanorb = marksmanorb + 1");
		$results = $link->query("UPDATE $user SET quest66 = 2");
	} 
	else if ($quest66 == 1)
	{	echo $message="<div class='menuAction'><strong class='green px30'>Quest 66 Not Complete</strong><br>
	Quest not complete. To complete this quest you need to find and slay a Dragon. They can be found anywhere in the mountains but are seen more frequently in certain areas.</div>";
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
{
	echo 'You travel north<br/>';
	$message="<i>You travel north</i><br/>".$_SESSION['desc609'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '609'"); // -- room change
	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	}

else if($input=='w' || $input=='west') 
{
	echo 'You travel west<br/>';
  	$message="<i>You travel west</i><br/>".$_SESSION['desc610'];
	include ('update_feed.php'); // --- update feed
 	$results = $link->query("UPDATE $user SET room = '610'"); // -- room change
	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	}
	
else if($input=='e' || $input=='east') 
{
	echo 'You travel east<br/>';
   	$message="<i>You travel east</i><br/>".$_SESSION['desc605'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '605'"); // -- room change
	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	}
	
else if($input=='s' || $input=='south') 
{			echo 'You travel south<br/>';
   	$message="<i>You travel south</i></br>".$_SESSION['desc607'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '607'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}



// ----------------------------------- end of room function
include ('function-end.php');
}
?>