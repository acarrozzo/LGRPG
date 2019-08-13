<?php
						$roomname = "Wizard's General Store";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc225c'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php'); 
//include ('shops/wizards_shop.php');  

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   


if (1==2){} //nada
// -------------------------------------------------------------------------- ROOM ACTIONS




if($input=='buy iron staff') 
{	if($cash<3000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy an iron staff for 3000 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ironstaff = ironstaff + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 3000"); } 
}
if($input=='buy iron battle staff') 
{	if($cash<5000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy an iron battle staff for 5000 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ironbattlestaff = ironbattlestaff + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 5000"); } 
}
if($input=='buy ring of magic V') 
{	if($cash<16000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a ring of magic V for 16000 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ringofmagicV = ringofmagicV + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 16000"); } 
}
if($input=='buy ring of mana regen V') 
{	if($cash<32000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a ring of mana regen V for 32000 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ringofmanaregenV = ringofmanaregenV + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 32000"); } 
}
if($input=='buy blue potion') 
{	if($cash<200) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a blue potion for 200 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET bluepotion = bluepotion + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 200"); } 
}
if($input=='buy blue balm') 
{	if($cash<2000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a blue balm for 2000 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET bluebalm = bluebalm + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 2000"); } 
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
   $message="<i>You travel southwest</i></br>".$_SESSION['desc225b'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '225b'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}

// ----------------------------------- end of room function
include ('function-end.php');
}
?>
