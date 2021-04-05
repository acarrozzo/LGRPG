<?php
						$roomname = "Broccoli Rob's Veggie Stand";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc207'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php');

// -------------------------DB CONNECT!
include ('db-connect.php');
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){





$cash = $row['currency'];
$dung = $row['dung'];
$toopoor = $_SESSION['toopoor'];

// ------------------------------------------------------------------------------------------- Broccoli Rob Shop

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
if($input=='buy veggies')
{	if($cash<100) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy some veggies for 100 '.$currency.'<br>';
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET veggies = veggies + 1");
		$query = $link->query("UPDATE $user SET currency = currency - 100");
		}
}

// -------------------------------------------------------------------------- ROOM ACTIONS

// -------------------------------------------------------------------------- SELL ALL DUNG
if($input=='sell all dung')
{
	if($dung>=1) {
		$amt = $dung*10000;
		echo $message = 'You sell '.$dung.' dung to Broccoli Rob for  '.$amt.' '.$currency.'<br>';
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET dung = 0");
		$query = $link->query("UPDATE $user SET currency = currency + $amt");
	}
	else if($dung<1) {
		echo $message = 'You have no dung fool. If you want some, go find some flying beetles in the sewers.<br>';
		include ('update_feed.php'); // --- update feed
	}
}




// -------------------------------------------------------------------------- TRAVEL
if($input=='s' || $input=='south')
{	echo 'You travel south<br/>';
   	$message="<i>You travel south</i></br>".$_SESSION['desc208'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = 208"); // -- room change
   	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='e' || $input=='east')
{	echo 'You travel east<br/>';
   	$message="<i>You travel east</i></br>".$_SESSION['desc203'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = 203"); // -- room change
   	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='d' || $input=='down')
{	echo "You travel down through a secret cellar in Broccoli Rob's Cabin that brings you right into the heart of the Catacombs.<br/>";
   	$message="<i>You travel down through a secret cellar in Broccoli Rob's Cabin that brings you right into the heart of the Catacombs.</i></br>".$_SESSION['desc232w'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '232w'"); // -- room change
   	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}


// ----------------------------------- end of room function
include ('function-end.php');
}
?>
