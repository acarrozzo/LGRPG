<?php
						$roomname = "In the Forest on a Rocky Path";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc132'];
//$dangerLVL = $_SESSION['dangerLVL'] = "5-13"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   


include ('battle-sets/forest.php');
include ('function-choptree.php');

if (1==2){} //nada


else if ($input == 'search')
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
	$_SESSION['forestsearch'] = 1; 
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
   $message="<i>You travel west</i></br>".$_SESSION['desc131'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 131"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='n' || $input=='north') 
{	echo 'You travel north<br/>';
   $message="<i>You travel north</i></br>".$_SESSION['desc133'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 133"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}

else if($input=='s' || $input=='south') 
{ 
	if ($_SESSION['forestsearch'] != 1) 
	{ 
	echo "You don't see an exit to the south. You should try searching.<br/>";
	$message="<i>You don't see an exit to the south. You should try searching.</i><br/>";
	include ('update_feed.php'); // --- update feed
   	
	}
	else {
	echo 'You travel south through the trees<br/>';
	$message="<i>You travel south through the trees</i><br/>".$_SESSION['desc127'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '127'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	$_SESSION['forestsearch'] = 0;
	}
}

// ----------------------------------- end of room function
include ('function-end.php');
}
?>
