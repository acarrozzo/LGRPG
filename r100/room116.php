<?php
						$roomname = "Forest EXIT";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc116'];
//$dangerLVL = $_SESSION['dangerLVL'] = "5-13"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

$teleport4 = $row['teleport4'];
	

include ('battle-sets/forest.php');
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


else if($input=='sw' || $input=='southwest') 
{	echo 'You travel southwest and leave the forest<br/>';
   $message="<i>You travel southwest and leave the forest</i></br>".$_SESSION['desc104'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 104"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}

else if($input=='n' || $input=='north') 
{	echo 'You travel north<br/>';
   $message="<i>You travel north</i></br>".$_SESSION['desc117'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 117"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='ne' || $input=='northeast') 
{	echo 'You travel northeast<br/>';
   $message="<i>You travel northeast</i></br>".$_SESSION['desc121'];
  include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 121"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
		// -------------------------------------------------------------------------- Activate Forest Teleport
		if ($row['teleport4'] == 0) { 	
			$results = $link->query("UPDATE $user SET teleport4 = 1");
			echo $message="<i>You can now teleport to the Forest! Click 'Forest' in your teleport menu to teleport to this location at any time. </i><br/>";
			include ('update_feed.php'); // --- update feed	  
			}
}
else if($input=='e' || $input=='east') 
{	echo 'You travel east<br/>';
   $message="<i>You travel east</i></br>".$_SESSION['desc122'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 122"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='se' || $input=='southeast') 
{	echo 'You travel southeast<br/>';
   $message="<i>You travel southeast</i></br>".$_SESSION['desc123'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 123"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}



// ----------------------------------- end of room function
include ('function-end.php');
}
?>
