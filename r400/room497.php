<?php
						$roomname = "Secret Underwater Area";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc497'];

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   




include ('battle-sets/blueocean-underwater.php'); // blue ocean battle set
include ('random-encounters/blueocean-underwater.php'); // blue ocean battle set


// --------------------------------------------------------------------------- REST HEAL
if ($input=="rest"){
		$query = $link->query("UPDATE $user SET hp = $hpmax + 100 "); 
		$query = $link->query("UPDATE $user SET mp = $mpmax + 100 "); 
		echo $message = "You rest at the Green Pillar! (+100 HP, +100 MP)<br/>";
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}


// -------------------------------------------------------------------------- SEARCH Sunken Ship
if ($input == 'search')
{
	$rand = rand (1,2); 			//		50%
	if ($rand == 1) {
		$rand2 = rand(1,10);		//		1/10
		if ($rand2 ==1){
			echo $message="You search the secret underwater area and find a Ring of Strength V!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET ringofstrengthV = ringofstrengthV + 1");
		}
		if ($rand2 ==2){
			$rand3 = rand(100,300);
			echo $message= 'You search the secret underwater area and find '.$rand3.' coin!<br/>';
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET currency = currency + $rand3");
		}
		if ($rand2 ==3){
			echo $message="You search the secret underwater area and find a Steel Javelin!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET steeljavelin = steeljavelin + 1");
		}
		if ($rand2 ==4){
			echo $message="You search the secret underwater area and find a Red Balm!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET redbalm = redbalm + 1");
		}
		if ($rand2 ==5){
			echo $message="You search the secret underwater area and find a pair of Purple Potion!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET purplepotion = purplepotion + 1");
		}
		if ($rand2 ==6){
			echo $message="You search the secret underwater area and find a Purple Balm!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET purplebalm = purplebalm + 1");
		}
		if ($rand2 ==7){
			echo $message="You search the secret underwater area and find some Blues!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET blues = blues + 1");
		}
		if ($rand2 ==8){
			echo $message="You search the secret underwater area and find some Reds!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET reds = reds + 1");
		}
		if ($rand2 ==9){
			echo $message="You search the secret underwater area and find some Greens!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET greens = greens + 1");
		}
		if ($rand2 ==10){
			echo $message="You search the secret underwater area and find some Yellows!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET yellows = yellows + 1");
		}
	}
	else {
		echo $message="You search the secret underwater area and find nothing, you should search again.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
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
else if($input=='u' || $input=='up') 
{			echo 'You swim up to the surface of the Ocean.<br/>';
   	$message="<i>You swim up to the surface</i></br>".$_SESSION['desc402'];
	include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = 402"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
// ----------------------------------- end of room function
include ('function-end.php');
}
?>