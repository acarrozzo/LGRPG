<?php
// -- 0027 -- Entrance to the Stone Mines
$roomname = "Entrance to the Stone Mines";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc027'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level


include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 

	$quest9=$row['quest9']; 

$quest19=$row['quest19']; 
$quest20=$row['quest20']; 

// -------------------------------------------------------------------------- TRAVEL
if($input=='n' || $input=='north') 
{
	echo 'You travel north<br/>';
	$message="<i>You travel north</i><br/>".$_SESSION['desc026'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '026'"); // -- room change
	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	}
	

else if($input=='s' || $input=='south') 
{
	if ($quest19 >= 2) { //VARIABLE CHECK FOR STONE MINE
	echo 'You travel south and enter the Stone Mine Map<br/>';
   $message="<i>You travel south and enter the Stone Mine Map</i><br/>".$_SESSION['desc305'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '305'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	}
	else{
	echo "The Dwarf Guard prevents you from entering the mining town. You will need to be a member of the Warrior's or Wizard's Guild to pass. Meanwhile you should visit the bat cave to the west. Or you can head back north to safety and east through the forest path to get to Red Town.<br/>";
   $message="<i>The Dwarf Guard prevents you from entering the mining town. You will need to be a member of the Warrior's or Wizard's Guild to pass. Meanwhile you should visit the bat cave to the west. Or you can head back north to safety and east through the forest path to get to Red Town.</i>";
	include ('update_feed.php'); // --- update feed
   	}
	
   }
  	else if($input=='w' || $input=='west') 
{

	echo 'You travel west<br/>';
   $message="<i>You travel west</i><br/>".$_SESSION['desc028'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '028'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
 
	
   } 

// ----------------------------------- end of room function
include ('function-end.php');

}

?>
