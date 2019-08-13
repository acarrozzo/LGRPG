<?php
						$roomname = "The Neverending Mine - Base Camp";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc311'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

$quest31=$row['quest31'];  


if($input=='grab blue potion')  // ---- GRAB 
{
	if ( $row['bluepotion'] >= 5 )
	{
	echo $message="<div class='menuAction'><i class='fa fa-times-circle lightred'></i>You already have more than 5 blue potions! Come back if you run low.</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You grab a bunch of blue potions! [ +5 blue potions ]</div>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET bluepotion = 5");
	}
}
if($input=='grab red potion')  // ---- GRAB 
{
	if ( $row['redpotion'] >= 5 )
	{
	echo $message="<div class='menuAction'><i class='fa fa-times-circle lightred'></i>You already have more than 5 red potions! Come back if you run low.</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You grab a bunch of red potions! [ +5 red potions ]</div>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET redpotion = 5");
	}
}
if($input=='grab pickaxe')  // ---- GRAB 
{
	if ( $row['pickaxe'] >= 1 )
	{
	echo $message="<div class='menuAction'><i class='fa fa-times-circle lightred'></i>You already have a pickaxe! Come back if you lose it.</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You grab a pickaxe! [ +1 pickaxe ]</div>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET pickaxe = 1");
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

else if($input=='s' || $input=='south') 
{			echo 'You travel south<br/>';
   	$message="<i>You travel south</i></br>".$_SESSION['desc308'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = 308"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='sw' || $input=='southwest') 
{			echo 'You travel southwest<br/>';
   	$message="<i>You travel southwest</i></br>".$_SESSION['desc307'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = 307"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='d' || $input=='down') 
{			
if ($quest31 >=2 ) {
				echo 'You travel down<br/>';
   	$message="<i>You travel down</i></br>".$_SESSION['descm00'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = 'm00'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	}
	else {
		echo $message = "ACCESS DENIED. Join the Mining Guild to the south to gain access to the mine.<br>";
		include ('update_feed.php'); // --- update feed
	}


}





// ----------------------------------- end of room function
include ('function-end.php');
}
?>