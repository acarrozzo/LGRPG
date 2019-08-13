<?php
						$roomname = "Dark Forest Clearing";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc505'];

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   


// -------------------------------------------------------------------------- BATTLE VARIABLES		
 	$infight = $row['infight'];
 	$endfight = $row['endfight'];
 	$enemy=$row['enemy'];
	

// -------------------------------------------------------------------------- GQ4 activate
if ($row['grandquest4']=='0'){
		$query = $link->query("UPDATE $user SET grandquest4 = 1 "); 
		echo $message = "You start GRAND QUEST 4! Help the friends you find in the Dark Forest and the Stone Mountain (Complete Quests 51-70)<br/>";
		include ('update_feed.php'); // --- update feed
}


include ('battle-sets/dark-forest.php');
include ('function-choptree.php');












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
   	$message="<i>You travel northwest</i></br>".$_SESSION['desc506'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '506'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='s' || $input=='south') 
{			echo 'You travel south<br/>';
   	$message="<i>You travel south</i></br>".$_SESSION['desc137'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '137'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='ne' || $input=='northeast')  
{		
if ($_SESSION['darkforestsilverswitch'] != 1) 
	{ 
	echo $message="<i>An immovable stone door blocks your way to the northeast. There's probably a switch nearby that will open it.</i><br/>";
	include ('update_feed.php'); // --- update feed
	}
	else {
	echo 'You travel northeast through the open door to the Silver Chest!<br/>';
	$message="<i>You travel northeast through the open door to the Silver Chest!</i><br/>".$_SESSION['desc512'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '512'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	$_SESSION['darkforestsilverswitch'] = 0;
	}
}




// ----------------------------------- end of room function
include ('function-end.php');
}
?>