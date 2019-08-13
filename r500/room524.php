<?php
						$roomname = "Top of the Despair";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc524'];

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   


//$quest57=$row['quest57']; 

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

else if($input=='w' || $input=='west') 
{			echo 'You travel west to the Forest Princess<br/>';
   	$message="<i>You travel west to the Forest Princess</i></br>".$_SESSION['desc525'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '525'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
   $_SESSION['enterdespair'] = 1;

}

else if($input=='s' || $input=='south') 
{			echo 'You travel south<br/>';
   	$message="<i>You travel south </i></br>".$_SESSION['desc517'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '517'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
   $_SESSION['enterdespair'] = 1;

}

else if($input=='d' || $input=='down') 
{	
	if ($_SESSION['enterdespair'] == 1)
	{
			echo 'You enter the Despair...eventually<br/>';
   	$message="<i>You enter the Despair...eventually</i></br>".$_SESSION['desc524'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '524'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	}
	else
	{
	echo $message="<i>You attempt to go down into the Despair but are prevented from doing so.</i><br/>";
	include ('update_feed.php'); // --- update feed	
	}
}



// ----------------------------------- end of room function
include ('function-end.php');
}
?>