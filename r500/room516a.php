<?php
						$roomname = "Dark Keep Main Hall";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc516a'];

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

 include ('battle-sets/dark-keep-1.php');








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
   	$message="<i>You travel east</i></br>".$_SESSION['desc516'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '516'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='w' || $input=='west') 
{			echo 'You travel west<br/>';
   	$message="<i>You travel west</i></br>".$_SESSION['desc516b'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '516b'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='s' || $input=='south') 
{			echo 'You travel south<br/>';
   	$message="<i>You travel south</i></br>".$_SESSION['desc516c'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '516c'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}


else if($input=='sw' || $input=='southwest') 
{			
if ($_SESSION['darkkeepswitchA'] == 1 && $_SESSION['darkkeepswitchB'] == 1) 
	{ 
	
	echo 'you go southwest through the open door!<br/>';
	$message="<i>you go southwest through the open door.</i><br/>".$_SESSION['desc516d'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '516d'"); // -- room change
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
	echo $message="<i>the way to the southwest is blocked by a steel door. There are 2 levers nearby that need to be switched in order to open the door.</i><br/>";
	include ('update_feed.php'); // --- update feed
	}
}
// ----------------------------------- end of room function
include ('function-end.php');
}
?>