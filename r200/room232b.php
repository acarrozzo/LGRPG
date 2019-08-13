<?php
							  $roomname = "By a Large Curved Pipe in the Sewer";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc232b'];
//$dangerLVL = $_SESSION['dangerLVL'] = "1-8"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

include ('battle-sets/sewers.php'); 


// -------------------------------------------------------------------------- ROOM ACTIONS



if ($input == 'search')
{
	$rand = rand (1,2);
	if ($_SESSION['catacombssearch'] == 1)
	{
		echo $message="You already found a secret passageway, you can go EAST through the pipe.<br/>";
	include ('update_feed.php'); // --- update feed
	}
	else if ($rand !=2)
	{
	echo 'You search and find nothing, you should try searching again.<br/>';
	$message="You search and find nothing, you should try searching again.<br/>";
	include ('update_feed.php'); // --- update feed
		
	}
	else {
		echo $message="You search the room and find a hidden passageway through the large pipe to the EAST!<br/>";
	include ('update_feed.php'); // --- update feed
	$_SESSION['catacombssearch'] = 1; 
	}
	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}





// -------------------------------------------------------------------------- END BATTLE BLOCK


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


else if($input=='nw' || $input=='northwest') 
{			echo 'You travel northwest<br/>';
   	$message="<i>You travel northwest</i></br>".$_SESSION['desc232c'];
	include ('update_feed.php');   // --- update feed
   		   $results = $link->query("UPDATE $user SET room = '232c'"); // -- room change
   		   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		$_SESSION['catacombssearch'] = 0;    
}
else if($input=='sw' || $input=='southwest') 
{			echo 'You travel southwest<br/>';
   	$message="<i>You travel southwest</i></br>".$_SESSION['desc232a'];
	include ('update_feed.php');   // --- update feed
   		   $results = $link->query("UPDATE $user SET room = '232a'"); // -- room change
   		   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		$_SESSION['catacombssearch'] = 0;    
}
else if($input=='e' || $input=='east') 
{ 
	if ($_SESSION['catacombssearch'] != 1) 
	{ 
	echo "You don't see an exit to the east. It's really dark but you should try searching.<br/>";
	$message="<i>You don't see an exit to the east. It's really dark but you should try searching.</i><br/>";
	include ('update_feed.php'); // --- update feed
	}
	else {
	echo 'You travel east through a secret pipe passageway!<br/>';
	$message="<i>You travel east through a secret pipe passageway</i><br/>".$_SESSION['desc232k'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '232k'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	$_SESSION['catacombssearch'] = 0;
	}
}

// ----------------------------------- end of room function
include ('function-end.php');
}
?>
