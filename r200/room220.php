<?php
						$roomname = "Quinn's Potion Shop";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc220'];
//$dangerLVL = $_SESSION['dangerLVL'] = "1"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

include ('battle-sets/thief.php');




if($input=='buy red potion') 
{	if($cash<100) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a red potion for 100 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET redpotion = redpotion + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 100"); 
		}
}
if($input=='buy blue potion') 
{	if($cash<200) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a blue potion for 200 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET bluepotion = bluepotion + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 200"); 
		}
}
if($input=='buy purple potion') 
{	if($cash<400) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a purple potion for 400 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET purplepotion = purplepotion + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 400"); 
		}
}
if($input=='buy red balm') 
{	if($cash<1000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a red balm for 1000 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET redbalm = redbalm + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 1000"); 
		}
}
if($input=='buy blue balm') 
{	if($cash<2000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a blue balm for 2000 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET bluebalm = bluebalm + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 2000"); 
		}
}
if($input=='buy purple balm') 
{	if($cash<4000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a purple balm for 4000 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET purplebalm = purplebalm + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 4000"); 
		}
}
if($input=='buy wings potion') 
{	if($cash<500) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a wings potion for 500 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET wingspotion = wingspotion + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 500"); 
		}
}
if($input=='buy gills potion') 
{	if($cash<500) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a gills potion for 500 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET gillspotion = gillspotion + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 500"); 
		}
}
if($input=='buy antidote potion') 
{	if($cash<500) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy an antidote potion for 500 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET antidotepotion = antidotepotion + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 500"); 
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


else if($input=='w' || $input=='west') 
{	echo 'You travel west<br/>';
   $message="<i>You travel west</i></br>".$_SESSION['desc218'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 218"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}



// ----------------------------------- end of room function
include ('function-end.php');
}
?>
