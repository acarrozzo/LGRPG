<?php
						$roomname = "Top of the Stairwell";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc516e'];

include ('function-start.php');  

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

// -------------------------------------------------------------------------- BATTLE VARIABLES		
 	$infight = $row['infight'];
 	$endfight = $row['endfight'];
 	$enemy=$row['enemy'];

 include ('battle-sets/dark-keep-2.php');








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
{			echo 'You travel east<br/>';
   	$message="<i>You travel east</i></br>".$_SESSION['desc516f'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '516f'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}

else if($input=='n' || $input=='north') 
{			echo 'You travel north<br/>';
   	$message="<i>You travel north</i></br>".$_SESSION['desc516g'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '516g'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='d' || $input=='down') 
{			echo 'You travel down the winding stairwell<br/>';
   	$message="<i>You travel down the winding stairwell</i></br>".$_SESSION['desc516d'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '516d'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}

else if($input=='ne' || $input=='northeast') 
{					
if ($_SESSION['darkkeepswitchA'] == 1 && $_SESSION['darkkeepswitchB'] == 1) 
	{ 
	
	echo 'you go northeast through the open door!<br/>';
	$message="<i>you go northeast through the open door.</i><br/>".$_SESSION['desc516h'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '516h'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	
	$_SESSION['darkkeepswitchA'] = 0;
	$_SESSION['darkkeepswitchB'] = 0;
	}

else if ($_SESSION['darkkeepswitchA'] == 1 || $_SESSION['darkkeepswitchB'] == 1) 
	{ 
	echo $message="<i>you have switched 1 / 2 levers. Go flip the other lever to open this door.</i><br/>";
	include ('update_feed.php'); // --- update feed
	}
	
else {
	echo $message="<i>the way to the northeast is blocked by a massive door. There are 2 levers nearby that need to be switched in order to open the door.</i><br/>";
	include ('update_feed.php'); // --- update feed
	}
}


// ----------------------------------- end of room function
include ('function-end.php');
}
?>