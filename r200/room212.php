<?php
						$roomname = "Red Town Barracks";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc212'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   



//include ('battle-sets/thief.php'); 

$mace=$row['mace'];
$longsword=$row['longsword'];
$warhammer=$row['warhammer'];


if($input=='grab mace') 
{	if ($mace >= 1)
	 	{ echo $message="<div class='menuAction'><i class='fa fa-times lightred'></i>You already have a mace. If you lose it come back here for another free one.</div>"; include ('update_feed.php'); // --- update feed
		}
	else
	 	{ echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up'></i>You grab a mace off the weapon rack and place it in your pack.</div>"; include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET mace = 1");
	 	}
}
if($input=='grab long sword') 
{	if ($longsword >= 1)
	 	{ echo $message="<div class='menuAction'><i class='fa fa-times lightred'></i>You already have a long sword. If you lose it come back here for another free one.</div>"; include ('update_feed.php'); // --- update feed
		}
	else
	 	{ echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up'></i>You grab a long sword off the weapon rack and place it in your pack.</div>"; include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET longsword = 1");
	 	}
}
if($input=='grab warhammer') 
{	if ($warhammer >= 1)
	 	{ echo $message="<div class='menuAction'><i class='fa fa-times lightred'></i>You already have a warhammer. If you lose it come back here for another free one.</div>"; include ('update_feed.php'); // --- update feed
		}
	else
	 	{ echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up'></i>You grab a warhammer off the weapon rack and place it in your pack.</div>"; include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET warhammer = 1");
	 	}
}


// --------------------------------------------------------------------------- grab weaponsOLD
if ($input=="grab maceOLD"){
		if ($mace < 1) { 
			echo $message = "You grab a mace off the rack!<br/>";
			$query = $link->query("UPDATE $user SET mace = mace + 1 "); 
			include ('update_feed.php'); // --- update feed
			}
		else { 	echo 
			$message = "You already have a mace, come back later if you lose it.<br/>";
			include ('update_feed.php'); // --- update feed
			}
}
if ($input=="grab long swordOLD"){
		if ($longsword < 1) { 
			echo $message = "You grab a long sword off the rack!<br/>";
			$query = $link->query("UPDATE $user SET longsword = longsword + 1 "); 
			include ('update_feed.php'); // --- update feed
			}
		else { 	echo 
			$message = "You already have a long sword, come back later if you lose it.<br/>";
			include ('update_feed.php'); // --- update feed
			}
}
if ($input=="grab warhammerOLD"){
		if ($warhammer < 1) { 
			echo $message = "You grab a warhammer off the rack!<br/>";
			$query = $link->query("UPDATE $user SET warhammer = warhammer + 1 "); 
			include ('update_feed.php'); // --- update feed
			}
		else { 	echo 
			$message = "You already have a warhammer, come back later if you lose it.<br/>";
			include ('update_feed.php'); // --- update feed
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
{  echo 'You travel south<br/>';
   $message="<i>You travel south</i></br>".$_SESSION['desc211'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 211"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}

else if($input=='n' || $input=='north') 
{	echo 'You travel north<br/>';
   $message="<i>You travel north</i></br>".$_SESSION['desc214'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 214"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}

else if($input=='e' || $input=='east') 
{	echo 'You travel east<br/>';
   $message="<i>You travel east</i></br>".$_SESSION['desc213'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 213"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}


// ----------------------------------- end of room function
include ('function-end.php');
}
?>
