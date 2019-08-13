<?php
						$roomname = "Red Town Shady Shop";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc236'];
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


if($input=='buy 20 arrows') 
{	if($cash<50) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy 20 wooden arrows for 50 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET arrows = arrows + 20"); 
		$query = $link->query("UPDATE $user SET currency = currency - 50"); 
		}
}
if($input=='buy 20 bolts') 
{	if($cash<100) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy 20 bolts for 100 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET bolts = bolts + 20"); 
		$query = $link->query("UPDATE $user SET currency = currency - 100"); 
		}
}
if($input=='buy reds') 
{	if($cash<500) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy some REDS for 500 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET reds = reds + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 500"); 
		}
}
if($input=='buy greens') 
{	if($cash<500) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy some GREENS for 500 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET greens = greens + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 500"); 
		}
}
if($input=='buy blues') 
{	if($cash<500) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy some BLUES for 500 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET blues = blues + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 500"); 
		}
}
if($input=='buy yellows') 
{	if($cash<500) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy some YELLOWS for 500 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET yellows = yellows + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 500"); 
		}
}
if($input=='buy vapor necklace') 
{	if($cash<50000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a VAPOR NECKLACE for 50k '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET vapornecklace = vapornecklace + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 50000"); 
		}
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
else if($input=='n' || $input=='north') 
{	echo 'You travel north<br/>';
   $message="<i>You travel north</i></br>".$_SESSION['desc232'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 232"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}






// ----------------------------------- end of room function
include ('function-end.php');
}
?>
