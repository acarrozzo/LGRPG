<?php
						$roomname = "Silver Shop";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc310'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php'); 

//include ('shops/silver_shop.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   



if($input=='buy silver sword') 
{	if($cash<50000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver sword for 50k '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silversword = silversword + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 50000"); } 
}
if($input=='buy silver staff') 
{	if($cash<50000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver staff for 50k '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silverstaff = silverstaff + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 50000"); } 
}
if($input=='buy silver 2h sword') 
{	if($cash<60000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver 2h sword for 60k '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silver2hsword = silver2hsword + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 60000"); } 
}
if($input=='buy silver boomerang') 
{	if($cash<40000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver boomerang for 40k '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silverboomerang = silverboomerang + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 40000"); } 
}
if($input=='buy silver bow') 
{	if($cash<50000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver bow for 50k '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silverbow = silverbow + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 50000"); } 
}
if($input=='buy silver crossbow') 
{	if($cash<60000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver crossbow for 60k '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silvercrossbow = silvercrossbow + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 60000"); } 
}



if($input=='buy silver shield') 
{	if($cash<30000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver shield for 30k '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silvershield = silvershield + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 30000"); } 
}
if($input=='buy silver helmet') 
{	if($cash<20000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver helmet for 20k '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silverhelmet = silverhelmet + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 20000"); } 
}
if($input=='buy silver breastplate') 
{	if($cash<30000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver breastplate for 30k '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silverbreastplate = silverbreastplate + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 30000"); } 
}
if($input=='buy silver gauntlets') 
{	if($cash<20000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a pair of silver gauntlets for 20k '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silvergauntlets = silvergauntlets + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 20000"); } 
}
if($input=='buy silver boots') 
{	if($cash<20000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a pair of silver boots for 20k '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silverboots = silverboots + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 20000"); } 
}



if($input=='buy silver ring') 
{	if($cash<100000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver ring for 100k '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silverring = silverring + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 100000"); } 
}
if($input=='buy silver necklace') 
{	if($cash<200000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver necklace for 200k '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silvernecklace = silvernecklace + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 200000"); } 
}
if($input=='buy silver key') 
{	if($cash<10000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver key for 10k '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silverkey = silverkey + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 10000"); } 
}













if($input=='+10 HP') 
{			echo $message="<strong>[ secret ] +1M BABY!</strong></br>";
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET currency = currency + 1000000"); // -- reset fight
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

else if($input=='s' || $input=='south') 
{			echo 'You travel south<br/>';
   	$message="<i>You travel south</i></br>".$_SESSION['desc307'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = 307"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
// -------------------------------------------------------------------------- TRAVEL

else if($input=='se' || $input=='southeast') 
{			echo 'You travel southeast<br/>';
   	$message="<i>You travel southeast</i></br>".$_SESSION['desc308'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = 308"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}






// ----------------------------------- end of room function
include ('function-end.php');
}
?>