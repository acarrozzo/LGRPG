<?php
						$roomname = "Blue Water Temple";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc409'];
//$dangerLVL = $_SESSION['dangerLVL'] = "35"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

$equipMount = $row['equipMount'];
$KLcoralwizard = $row['KLcoralwizard'];


// CORAL WIZARD
// -------------------------------------------------------------------------- BATTLE VARIABLES		
 	$infight = $row['infight']; $endfight = $row['endfight']; $enemy=$row['enemy'];
// -------------------------------------------------------------------------- After Battle - SAFE ROOM		
if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
		$input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
		$input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
		$input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
		$input!='u' && $input!='up' && $input!='d' && $input!='down' ) { echo "This room is safe.<br/>"; }
// -------------------------------------------------------------------------- INITIALIZE - NOPE! Need to defeat kraken
if($input=='attack temple boss' && $row['KLkraken'] == 0) 
	{
	echo $message="<div class='menuAction'><i class='fa fa-times-circle lightred'></i>You can't attack the Blue Water Temple Boss yet. You need to defeat the Kraken under the Ocean first.</div>";
	include ('update_feed.php');   // --- update feed
	}
// -------------------------------------------------------------------------- INITIALIZE CORAL WIZARD!
else if(($input=='attack temple boss' || $input=='attack' ) && $infight==0 && $endfight==0) 
	{
		if ($input=='attack temple boss') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Coral Wizard'");
		include ('battle.php');
	}
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{
	if($input=='attack temple boss') { $input = 'attack'; }
	include ('battle.php');
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
{	
		if ($KLcoralwizard >=1)
			  { echo 'You travel northeast to the Master Temple.<br/>';
   				$message="<i>You travel northeast to the Master Temple.</i></br>".$_SESSION['desc425'];
				include ('update_feed.php');   // --- update feed
   			   		$results = $link->query("UPDATE $user SET room = '425'"); // -- room change
   			   		$results = $link->query("UPDATE $user SET endfight = 2"); // -- reset fight
		}
		else { 
				echo $message="<div class='menuAction'><i class='fa fa-times-circle lightred'></i>You can't enter the Master Temple Yet! You need defeat the Blue Water Temple Boss first!</div>";
				include ('update_feed.php');   // --- update feed
	}
}

else if($input=='sw' || $input=='southwest') 
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel southwest.<br/>';
   		$message="<i>You travel southwest.</i></br>".$_SESSION['desc408'];
		include ('update_feed.php');   // --- update feed
   			   $results = $link->query("UPDATE $user SET room = '408'"); // -- room change
   			   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		} else{
 		echo $message="<i>You can't go that way! You need to be in a boat!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}
else if($input=='e' || $input=='east') 
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel east.<br/>';
   		$message="<i>You travel east.</i></br>".$_SESSION['desc402'];
		include ('update_feed.php');   // --- update feed
   			   $results = $link->query("UPDATE $user SET room = '402'"); // -- room change
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