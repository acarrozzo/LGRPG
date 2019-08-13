<?php
						$roomname = "Mayor Rudolf - Red Town Office";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc222z'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

$KLscorpionking=$row['KLscorpionking']; 
$quest24=$row['quest24']; 

if($input=='grab iron javelins' )  // ---- GRAB iron javelins
{
    $check=$row['ironjavelin'];
	if ( $check >= 5 )
	{
	echo $message="<div class='menuAction'><i class='fa fa-times-circle lightred'></i>You already have more than 5 iron javelins! Come back if you run out.</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You grab 5 iron javelins!</div>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET ironjavelin = 5");
	}
}

// ---------------------- START ALL QUESTS ---------------------- //
  if($input=='start quest' || $input=='start quest 24') {
	 if ($quest24 <1 ) {	
		echo $message = "<div class='menuAction'><em class='gold'>You start the Red Town Mayors Quest! (24)</em><br>Check your Quests tab to review what needs to be done.</div> ";		
		include ('update_feed.php'); // --- update feed
   		$results = $link->query("UPDATE $user SET quest24 = 1");
	  	}
}
// ---------------------- QUEST 24) Scorpion King Bounty ---------------------- //
if($input=='info 24') { 
		echo $message="<div class='menuAction'><strong class='green px30'>Quest 24 Info</strong><br>
		The Scorpion King is located at the end of the lair below the Spider Cave. You have to flip a switch down there to open a secret passageway to his throne room. </div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 24') 
{	if ($KLscorpionking >= 1)
	{	echo $message="<div class='questWin'>
		<h3>Quest 24 Completed!</h3>
		<h4>Scorpion King Bounty</h4>
		Congrats! You have defeated the very powerful Scorpion King! The Mayor hands you a large sum of $currency, a Red Talisman and a Gold Key. Head to the Babylon Gardens below this office to open the Gold Chest.
	  	<h4>Rewards</h4>
  	  	[ + 1000 xp  ]<br />
      	[ + 1000 $currency ]<br />
      	[ + Red Talisman! ]<br />
      	[ + Gold Key! ]</div>";	
		include ('update_feed.php'); // --- update feed
	    $results = $link->query("UPDATE $user SET currency = currency + 1000"); 
		$results = $link->query("UPDATE $user SET xp = xp + 1000"); 
		$results = $link->query("UPDATE $user SET redtalisman = redtalisman + 1");
		$results = $link->query("UPDATE $user SET goldkey = goldkey + 1");
		$results = $link->query("UPDATE $user SET quest24 = 2");
	} 
	else if ($quest24 == 1)
	{	echo $message="<div class='menuAction'><strong class='green px30'>Quest 24 Not Complete</strong><br>
	To complete this quest you need defeat the Scorpion King. You can find him in his lair below the Grassy Field Spider Cave.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}

		//$results = $link->query("UPDATE $user SET quest24 = 0");








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

else if($input=='d' || $input=='down') 
{	echo 'You travel down<br/>';
   $message="<i>You travel down</i></br>".$_SESSION['desc222'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 222"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}





// ----------------------------------- end of room function
include ('function-end.php');
}
?>
