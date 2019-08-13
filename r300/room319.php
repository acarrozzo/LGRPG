<?php
						$roomname = "On a Grass Path near the Grotto";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc319'];
//$dangerLVL = $_SESSION['dangerLVL'] = "3-7"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

include ('battle-sets/stoneminepath.php'); // 1/20 thief encounter

if (1==2){} //nada



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
else if($input=='n' || $input=='north') 
{			echo 'You travel north<br/>';
   	$message="<i>You travel north</i></br>".$_SESSION['desc318'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '318'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='s' || $input=='south') 
{			echo 'You travel south<br/>';
   	$message="<i>You travel south</i></br>".$_SESSION['desc320'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '320'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}

else if($input=='sw' || $input=='southwest')  
{		
if ($_SESSION['grottoswitch'] != 1) 
	{ 
	echo $message="<i>A giant boulder blocks your way to the Grotto. There might be a switch nearby that will move it.</i><br/>";
	include ('update_feed.php'); // --- update feed
	}
	else {
	echo 'You travel southwest into the Stone Grotto!<br/>';
	$message="<i>You travel southwest into the Stone Grotto!</i><br/>".$_SESSION['desc321'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '321'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	$_SESSION['grottoswitch'] = 0;
	}
}






// ----------------------------------- end of room function
include ('function-end.php');
}
?>