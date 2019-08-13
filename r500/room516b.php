<?php
						$roomname = "Dark Keep Storeroom";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc516b'];

include ('function-start.php');  

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

// -------------------------------------------------------------------------- BATTLE VARIABLES		
 	$infight = $row['infight'];
 	$endfight = $row['endfight'];
 	$enemy=$row['enemy'];

 include ('battle-sets/dark-keep-1.php');



if ($input == 'flip lever')
{
	if ($_SESSION['darkkeepswitchA'] == 1)
	{
		echo $message = 'You already flipped this lever.<br/>';
		include ('update_feed.php'); // --- update feed
	}
	else {
		echo $message= 'You flip the lever and hear some grinding in the walls.<br/>';
		include ('update_feed.php'); // --- update feed
		$_SESSION['darkkeepswitchA'] = 1;
	}
	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}



// -------------------------------------------------------------------------- SEARCH DARK KEEP STOREROOM	
if ($input == 'search')
{
	$rand = rand (1,3); 			//		1/3
	if ($rand == 1) {
		$rand2 = rand(1,8);		//		1/8
		if ($rand2 ==1){
			echo $message="You search the dark storeroom and find a Red Balm!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET redbalm = redbalm + 1");
		}
		if ($rand2 ==2){
			echo $message="You search the dark storeroom and find a Blue Balm!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET bluebalm = bluebalm + 1");
		}
		if ($rand2 ==3){
			echo $message="You search the dark storeroom and find a Purple Balm!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET purplebalm = purplebalm + 1");
		}
		if ($rand2 ==4){
			$rand3 = rand(20,50);
			echo $message= 'You search the dark storeroom and find '.$rand3.' arrows!<br/>';
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET arrows = arrows + $rand3");
		}
		if ($rand2 ==5){
			$rand3 = rand(20,50);
			echo $message= 'You search the dark storeroom and find '.$rand3.' bolts!<br/>';
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET bolts = bolts + $rand3");
		}
		if ($rand2 ==6){
			echo $message="You search the dark storeroom and find some Blues!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET blues = blues + 1");
		}
		if ($rand2 ==7){
			echo $message="You search the dark storeroom and find some Yellows!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET yellows = yellows + 1");
		}
		if ($rand2 ==8){
			echo $message="You search the dark storeroom and find some Gray Matter!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET graymatter = graymatter + 1");
		}
		/*
		red balm
blue balm
purple balm
20-50 arrows
20-50 bolts
blues
yellows
gray matter
*/
	}
	else {
		echo $message="You search the dark keep storeroom and find nothing, you should search again.<br/>";
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
else if($input=='e' || $input=='east') 
{			echo 'You travel east<br/>';
   	$message="<i>You travel east</i></br>".$_SESSION['desc516a'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '516a'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}


// ----------------------------------- end of room function
include ('function-end.php');
}
?>