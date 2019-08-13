<?php
						$roomname = "Mining Guild Entrance";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc308'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

$quest31=$row['quest31'];  
$KLkraken=$row['KLkraken']; 


// ---------------------- START ALL QUESTS ---------------------- //
  if($input=='start quests' || $input=='start quest 31') {
	 if ($quest31 <1 ) {	
		echo $message = "<div class='menuAction'><em class='gold'>You start the Mining Guild Initiation Quest! (31)</em><br>Check your Quests tab to review what needs to be done.</div> ";		
		include ('update_feed.php'); // --- update feed
   		$results = $link->query("UPDATE $user SET quest31 = 1");
	  	}
}
// ---------------------- QUEST 31) Stone Mine Access: Kraken ---------------------- //
if($input=='info 31') { 
		echo $message="<div class='menuAction'><strong class='green px30'>Quest 31 Info</strong><br>
		Defeat the Kraken found deep underwater to gain access to the Mining Guild and the Neverending mine.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 31') 
{	if ($KLkraken >= 1)
	{	echo $message="<div class='questWin'>
		<h3>Quest 31 Completed!</h3>
		<h4>Stone Mine Access: Kraken</h4>
		NICE! You have indeed defeated the Kraken! Your can now access the Mining Guild as well as the Neverending Mine. Time to mine some Iron!
	  	<h4>Rewards</h4>
  	  	[ + 1000 xp  ]<br />
      	[ + 200 $currency ]<br />
      	[ + 3 Pickaxe ]<br />
      	[ + Access to Guild & Mine ]</div>";	
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET xp = xp + 1000"); 
	   	$results = $link->query("UPDATE $user SET currency = currency + 200"); 
		$results = $link->query("UPDATE $user SET pickaxe = pickaxe + 3");
		$results = $link->query("UPDATE $user SET quest31 = 2");
	} 
	else if ($quest31 == 1)
	{	echo $message="<div class='menuAction'><strong class='green px30'>Quest 31 Not Complete</strong><br>
	To complete this quest you need to defeat the Kraken found deep under the Ocean.</div>";
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
{			echo 'You travel northwest<br/>';
   	$message="<i>You travel northwest</i></br>".$_SESSION['desc310'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = 310"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='n' || $input=='north') 
{			echo 'You travel north<br/>';
   	$message="<i>You travel north</i></br>".$_SESSION['desc311'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = 311"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}

else if($input=='w' || $input=='west') 
{			echo 'You travel west<br/>';
   	$message="<i>You travel west</i></br>".$_SESSION['desc307'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = 307"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight 
}

else if($input=='d' || $input=='down')  
{			
if ($quest31 >=2 ) {
	echo 'You travel down into the Mining Guild<br/>';
   $message="<i>You travel down into the Mining Guild</i></br>".$_SESSION['desc308b'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '308b'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	}
	else {
		echo $message = "You can't enter yet! You need to defeat the Kraken to become a member of the Mining Guild!<br>";
		include ('update_feed.php'); // --- update feed
	}
}






// ----------------------------------- end of room function
include ('function-end.php');
}
?>