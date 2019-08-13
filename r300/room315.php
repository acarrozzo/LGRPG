<?php
						$roomname = "Abandoned Mine ENTRANCE";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc315'];
//$dangerLVL = $_SESSION['dangerLVL'] = "3-7"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   


include ('battle-sets/stoneminepath.php'); // stone mine path enemies

if (1==2){} //nada

if($input=='read sign') {  //read sign
   	echo	$message="<i>you read the sign:</i> <br />
-------------------------------------------<br />
Mine has been condemned!<br>
Enter at your own risk!<br>
-------------------------------------------</p>";
include ('update_feed.php'); // --- update feed	
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

else if($input=='sw' || $input=='southwest') 
{			echo 'You travel southwest<br/>';
   	$message="<i>You travel southwest</i></br>".$_SESSION['desc314'];
	include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = 314"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='d' || $input=='down') 
{			echo 'You travel down<br/>';
   	$message="<i>You travel down</i></br>".$_SESSION['desc315a'];
	include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '315a'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}





// ----------------------------------- end of room function
include ('function-end.php');
}
?>