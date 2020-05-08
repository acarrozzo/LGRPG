<?php
						$roomname = "Ranger's Guild Entrance";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc515'];

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   


$quest57=$row['quest57']; 
$KLdarkranger=$row['KLdarkranger']; 


// -------------------------------------------------------------------------- READ SIGN!
if($input=='read sign') {  //read sign
   echo	 '<i>You read the Ranger\'s Guild Sign.</i><br>';
   
   $message="
   <i>you read the sign:</i>
   <div class='sign'>
---------------------------------------------------<br>
<span class='px30 gold'>Ranger's Guild Entrance</span><br>
---------------------------------------------------<br>
Become the most skilled bowman in all the lands. Find and defeat a Dark Ranger to join the Ranger’s Guild.<br><br>
Get a FREE BOW upon Initation! <br/>
---------------------------------------------------
</div>
";
	include ('update_feed.php'); // --- update feed	
}	



// ---------------------- START ALL QUESTS ---------------------- //
  if($input=='start quest' || $input=='start quest 57') {
	 if ($quest57 <1 ) {	
		echo $message = "<div class='menuAction'><em class='gold'>You start the Ranger's Initiation Quest! (57)</em><br>Check your Quests tab to review what needs to be done.</div> ";		
		include ('update_feed.php'); // --- update feed
   		$results = $link->query("UPDATE $user SET quest57 = 1");
	  	}
}
// ---------------------- QUEST 57) Ranger's Guild Initiation ---------------------- //
if($input=='info 57') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 57 Info</strong><br>
		To join the RANGERS Guild you have to defeat a Dark Ranger. You can find them hiding in the Dark Forest. </div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 57') 
{	if ($KLdarkranger >= 1)
	{	echo $message="<div class='questWin'>
		<h3>Quest 57 Completed!</h3>
		<h4>Ranger's Guild Initiation</h4>
		CONGRATS! You have indeed defeated a Dark Ranger! You are now an official member of the Rangers Guild. You are handed a sleek and powerful Ranger Bow!
	  	<h4>Rewards</h4>
  	  	[ + 3000 xp  ]<br />
      	[ + 5000 $currency ]<br />
		[ + Ranger Bow! ]</div>";	
		include ('update_feed.php'); // --- update feed 
		$results = $link->query("UPDATE $user SET xp = xp + 3000");
	    $results = $link->query("UPDATE $user SET currency = currency + 5000"); 
		$results = $link->query("UPDATE $user SET rangerbow = rangerbow + 1");
		$results = $link->query("UPDATE $user SET quest57 = 2");
	} 
	else if ($quest57 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 57 Not Complete</strong><br>
	To complete this quest you need to find and defeat a Dark Ranger. They rarely spawn in the Dark Forest.</div>";
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

else if($input=='se' || $input=='southeast') 
{			echo 'You travel southeast and get lost in the trees<br/>';
   	$message="<i>You travel southeast and get lost in the trees</i></br>".$_SESSION['desc514'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '514'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}

else if($input=='u' || $input=='up') 
{	
	if ($quest57 == 2)
	{
			echo 'You climb the up the ladder into the Ranger\'s Guild.<br/>';
   	$message="<i>You climb the up the ladder into the Ranger\'s Guild.</i></br>".$_SESSION['desc515e'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '515e'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	}
	else
	{
	echo $message="<i>You can't enter the Ranger's Guild until you complete this quest.</i><br/>";
	include ('update_feed.php'); // --- update feed	
	}
}



// ----------------------------------- end of room function
include ('function-end.php');
}
?>