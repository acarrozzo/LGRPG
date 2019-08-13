<?php
						$roomname = "In the Forest on a Red Guard Tower";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc124'];
//$dangerLVL = $_SESSION['dangerLVL'] = "5-13"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

$quest11=$row['quest11']; 
$quest12=$row['quest12']; 
$quest13=$row['quest13']; 

$arrows=$row['arrows']; 

include ('battle-sets/forest.php');
include ('function-choptree.php');
	
if (1==2){} //nada



if($input=='grab arrows')  // ---- GRAB ARROWS
{
	if ( $arrows >= 25 )
	{
	echo $message="<div class='menuAction'><i class='fa fa-times-circle lightred'></i>You already have more than 25 arrows! Come back if you run low.</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You grab a bundle of arrows! [ +25 arrows ]</div>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET arrows = 25");
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
else if($input=='e' || $input=='east') 
{	echo 'You travel east<br/>';
   $message="<i>You travel east</i></br>".$_SESSION['desc125'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 125"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='n' || $input=='north') 
{	echo 'You travel north<br/>';
   $message="<i>You travel north</i></br>".$_SESSION['desc123'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 123"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='s' || $input=='south') 
{	
	if ($quest11 == 2 && $quest12 == 2 && $quest13 == 2)
	{
	echo 'You travel south and enter the Red Guard Tower<br/>';
 	$message="<i>You travel south and enter the Red Guard Tower<</i><br/>".$_SESSION['desc215'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = 215"); // -- room change
	$_SESSION['emptytree'] = 0; // reset tree
	}
	else
	{
	echo 'You can\'t go south here until you complete all 3 Red Guard Quests.<br/>';
 	$message="<i>You can't go south here until you complete all 3 Red Guard Quests.  </i><br/>";
	include ('update_feed.php'); // --- update feed	
		
	}
}
// ----------------------------------- end of room function
include ('function-end.php');
}
?>
