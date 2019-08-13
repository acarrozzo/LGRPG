<?php
						$roomname = "Vincenzo's Meat & Produce Stand";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc229'];
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


if($input=='buy cooked meat') 
{	if($cash<50) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a piece of cooked meat for 50 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET cookedmeat = cookedmeat + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 50"); 
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
if($input=='buy veggies') 
{	if($cash<100) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy some veggies for 100 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET veggies = veggies + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 100"); 
		}
}



 
 
 

 

 
/*

FOODS

50c cooked meat (+50 hp)

250c meatball (+400 hp) (combine 5 cooked meats)

500c bluefish (+400 mp)

100c veggies (+50 hp, +50 mp)

*/
 



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
{	echo 'You travel east<br/>';
   $message="<i>You travel east</i></br>".$_SESSION['desc230'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 230"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}






// ----------------------------------- end of room function
include ('function-end.php');
}
?>
