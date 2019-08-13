<?php
						$roomname = "Red Town Back Alley by a Sewer";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc232'];
//$dangerLVL = $_SESSION['dangerLVL'] = "3"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

include ('battle-sets/thief2.php'); // 1/20 thief encounter



if ($input == 'search')
{
	$rand = rand (1,2);
	if ($rand !=2)
	{
		echo 'You search and find nothing, you should try searching again.<br/>';
	$message="You search and find nothing, you should try searching again.<br/>";
	include ('update_feed.php'); // --- update feed
		
	}
	else {
		echo 'You search the room and find a hidden passageway to the south!<br/>';
	$message="You search the room and find a hidden passageway to the south!<br/>";
	include ('update_feed.php'); // --- update feed
	$_SESSION['shadysearch'] = 1; 
	}
	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
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
else if($input=='w' || $input=='west') 
{	echo 'You travel west<br/>';
   $message="<i>You travel west</i></br>".$_SESSION['desc231'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 231"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='e' || $input=='east') 
{	echo 'You travel east<br/>';
   $message="<i>You travel east</i></br>".$_SESSION['desc233'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 233"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   	$_SESSION['shadysearch'] = 0; 
}
else if($input=='s' || $input=='south') 
{ 
	if ($_SESSION['shadysearch'] != 1) 
	{ 
	echo "You don't see an exit to the south. You should try searching.<br/>";
	$message="<i>You don't see an exit to the south. You should try searching.</i><br/>";
	include ('update_feed.php'); // --- update feed
   	
	}
	else {
	echo 'You travel south through a secret passageway<br/>';
	$message="<i>You travel south through a secret passageway</i><br/>".$_SESSION['desc236'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '236'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	$_SESSION['shadysearch'] = 0;
	}
}
else if($input=='d' || $input=='down') 
{	echo 'You travel down<br/>';
   $message="<i>You travel east</i></br>".$_SESSION['desc232a'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '232a'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   	$_SESSION['shadysearch'] = 0; 
}





// ----------------------------------- end of room function
include ('function-end.php');
}
?>
