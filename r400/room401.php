<?php
						$roomname = "In the Ocean near the Docks";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc401'];
//$dangerLVL = $_SESSION['dangerLVL'] = "13"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

$equipMount = $row['equipMount'];

if ($row['grandquest3']=='0'){
		$query = $link->query("UPDATE $user SET grandquest3 = 1 "); 
		echo $message = "You start GRAND QUEST 3! Help the good dwarves of the Stone Mining Village and anybody else you find out on the Blue Ocean (Complete Quests 31-50)<br/>";
		include ('update_feed.php'); // --- update feed
}	


include ('battle-sets/blueocean.php'); // blue ocean battle set

if (1==2){} //nada


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
else if($input=='e' || $input=='east') 
{			echo 'You travel east and enter the Grassy Field Docks<br/>';
   	$message="<i>You travel east and enter the Grassy Field Docks</i></br>".$_SESSION['desc016'];
	include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '016'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}

else if($input=='nw' || $input=='northwest') 
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel northwest.<br/>';
   		$message="<i>You travel northwest.</i></br>".$_SESSION['desc402'];
		include ('update_feed.php');   // --- update feed
   			   $results = $link->query("UPDATE $user SET room = '402'"); // -- room change
   			   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		} else{
 		echo $message="<i>You can't go that way! You need to be in a boat!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}
else if($input=='sw' || $input=='southwest') 
{	if ($equipMount == 'wooden boat')
			  { echo 'You travel southwest.<br/>'; 
   		$message="<i>You travel southwest.</i></br>".$_SESSION['desc404'];
		include ('update_feed.php');   // --- update feed
   			   $results = $link->query("UPDATE $user SET room = '404'"); // -- room change
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