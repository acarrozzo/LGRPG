<?php
						$roomname = "Adam's General Store ";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc216'];
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


 
if($input=='buy dagger') 
{	if($cash<50) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a dagger for 50 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET dagger = dagger + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 50"); 
		}
}
if($input=='buy long sword') 
{	if($cash<400) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a long sword for 400 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET longsword = longsword + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 400"); 
		}
}
if($input=='buy 10 arrows') 
{	if($cash<100) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy 10 wooden arrows for 100 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET arrows = arrows + 10"); 
		$query = $link->query("UPDATE $user SET currency = currency - 100"); 
		}
}
if($input=='buy 10 bolts') 
{	if($cash<200) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy 10 bolts for 200 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET bolts = bolts + 10"); 
		$query = $link->query("UPDATE $user SET currency = currency - 200"); 
		}
}
if($input=='buy redberry') 
{	if($cash<10) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a redberry for 10 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET redberry = redberry + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 10"); 
		}
}
if($input=='buy blueberry') 
{	if($cash<20) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a blueberry for 20 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET blueberry = blueberry + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 20"); 
		}
}
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
 if($input=='buy meatball') 
{	if($cash<250) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a meatball for 250 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET meatball = meatball + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 250"); 
		}
}
if($input=='buy bluefish') 
{	if($cash<500) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a bluefish for 500 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET bluefish = bluefish + 1"); 
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
else if($input=='sw' || $input=='southwest') 
{	echo 'You travel southwest<br/>';
   $message="<i>You travel southwest</i></br>".$_SESSION['desc210'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 210"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}



// ----------------------------------- end of room function
include ('function-end.php');
}
?>
