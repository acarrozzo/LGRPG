<?php
						$roomname = "Dark Forest Silver Chest";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc512'];

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

include ('battle-sets/dark-forest.php');
include ('function-choptree.php');
include ('function-silverchest.php'); 











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
else if($input=='sw' || $input=='southwest') 
{			echo 'You travel southwest<br/>';
   	$message="<i>You travel southwest</i></br>".$_SESSION['desc505'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '505'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='n' || $input=='north') 
{			echo 'You jump off the silver chest ledge and land on the bloody path<br/>';
   	$message="<i>You jump off the silver chest ledge and land on the bloody path</i></br>".$_SESSION['desc510'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '510'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
// ----------------------------------- end of room function
include ('function-end.php');
}
?>