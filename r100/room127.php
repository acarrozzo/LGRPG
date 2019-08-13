<?php
						$roomname = "In the Forest Surrounded by Trees";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc127'];
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
		echo 'You search the room and find a hidden passageway to the north!<br/>';
	$message="You search the room and find a hidden passageway to the north!<br/>";
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
   $message="<i>You travel west</i></br>".$_SESSION['desc128'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 128"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
   $_SESSION['forestsearch'] = 0;
}
else if($input=='sw' || $input=='southwest') 
{	echo 'You travel southwest<br/>';
   $message="<i>You travel southwest</i></br>".$_SESSION['desc125'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 125"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
   $_SESSION['forestsearch'] = 0;

}
else if($input=='s' || $input=='south') 
{	echo 'You travel south<br/>';
   $message="<i>You travel south</i></br>".$_SESSION['desc126'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 126"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
   $_SESSION['forestsearch'] = 0;

}
else if($input=='n' || $input=='north') 
{ 
	if ($_SESSION['forestsearch'] != 1) 
	{ 
	echo "You don't see an exit to the north. You should try searching.<br/>";
	$message="<i>You don't see an exit to the north. You should try searching.</i><br/>";
	include ('update_feed.php'); // --- update feed
   	
	}
	else {
	echo 'You travel north through the trees<br/>';
	$message="<i>You travel north through the trees</i><br/>".$_SESSION['desc132'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '132'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	$_SESSION['forestsearch'] = 0;
	}
}


// ----------------------------------- end of room function
include ('function-end.php');
}
?>
