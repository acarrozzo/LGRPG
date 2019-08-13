<?php
						$roomname = "Under a Massive Tree in a Large Clearing";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc117'];
//$dangerLVL = $_SESSION['dangerLVL'] = "5-13"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

$leather=$row['leather'];

include ('battle-sets/forest.php');
include ('function-choptree.php');

if (1==2){} //nada

if($input=='get leather')  // ---- Get leather
{
	if ( $leather >= 5 )
	{
	echo $message="<div class='menuAction'><i class='fa fa-times-circle lightred'></i>You already have more than 5 leather! Come back if you run low.</div>";	include ('update_feed.php'); // --- update feed
	}
	else {
	echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You pick up 5 pieces of leather!</div>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET leather = 5");
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
else if($input=='s' || $input=='south') 
{	echo 'You travel south<br/>';
   $message="<i>You travel south</i></br>".$_SESSION['desc116'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 116"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='n' || $input=='north') 
{	echo 'You travel north<br/>';
   $message="<i>You travel north</i></br>".$_SESSION['desc118'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 118"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='u' || $input=='up') 
{	
	echo 'You travel up<br/>';
   	$message="<i>You travel up</i></br>".$_SESSION['desc117'];
  	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 117"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='e' || $input=='east') 
{	echo 'You travel east<br/>';
   $message="<i>You travel east</i></br>".$_SESSION['desc121'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 121"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}




// ----------------------------------- end of room function
include ('function-end.php');
}
?>
