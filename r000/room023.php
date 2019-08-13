<?php
// -- 023 -- Entrance to the Forest
$roomname = "Entrance to the Forest";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc023'];
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
$jacklumberFlag = $row['jacklumberFlag'];


// -------------------------------------------------------------------------- ROOM ACTIONS





// -------------------------------------------------------------------------- TRAVEL
if($input=='w' || $input=='west') 
{	echo 'You travel west<br/>';
 	$message="<i>You travel west</i><br/>".$_SESSION['desc022'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '022'"); // -- room change
}
else if($input=='n' || $input=='north') 
{	echo 'You travel north<br/>';
 	$message="<i>You travel north</i><br/>".$_SESSION['desc024'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '024'"); // -- room change
				// ---------------------- SKILL FLAG! ---------------------- //
				if ($jacklumberFlag==0) {
				echo  $message = "<div class='menuAction'><i span class='fa fa-check-square-o'></i>
You can now learn the Ranged SKILL from Jack Lumber!</div>";
				include ('update_feed.php'); // --- update feed
				$results = $link->query("UPDATE $user SET jacklumberFlag = 1");
}
	
}
else if($input=='e' || $input=='east') 
{	
	if ($quest9 == 2)
	{

	echo 'You travel east and leave the grassy field<br/>';
 	$message="<i>You travel east and leave the grassy field</i><br/>".$_SESSION['desc101'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '101'"); // -- room change
	}
	else
	{
	echo 'As you attempt to continue on the forest path you are stopped by a Red Guard.<br/>';
 	$message="<i>As you attempt to continue on the forest path you are stopped by a Red Guard. He says you're too weak and you need to complete Jack's quests first. You can find Jack in his cabin just north of here. </i><br/>";
	include ('update_feed.php'); // --- update feed	
		
	}
}


// ----------------------------------- end of room function
include ('function-end.php');
}
?>
