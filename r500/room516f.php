<?php
						$roomname = "Dark Keep Barracks";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc516f'];

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

 include ('battle-sets/dark-keep-2.php');



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
			echo $message="You search the barracks and find a Mithril Dagger!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET mithrildagger = mithrildagger + 1");
		}
		if ($rand2 ==2){
			echo $message="You search the barracks and find a Mithril Staff!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET mithrilstaff = mithrilstaff + 1");
		}
		if ($rand2 ==3){
			echo $message="You search the barracks and find a Flamberg!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET flamberg = flamberg + 1");
		}
		if ($rand2 ==4){
			echo $message="You search the barracks and find a Glaive!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET glaive = glaive + 1");
		}
		if ($rand2 ==5){
			echo $message="You search the barracks and find a Steel Battle Staff!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET steelbattlestaff = steelbattlestaff + 1");
		}
		if ($rand2 ==6){
			echo $message="You search the barracks and find 2 Steel Javelins!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET steeljavelin = steeljavelin + 2");
		}
		if ($rand2 ==7){
			echo $message="You search the barracks and find a Mithril Boomerang!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET mithrilboomerang = mithrilboomerang + 1");
		}
		if ($rand2 ==8){
			echo $message="You search the barracks and find a Cursed Skull!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET cursedskull = cursedskull + 1");
		}
		/*
	mithril dagger
mithril staff
flamberg
glaive
steel battle staff
2 steel javelin
mithril boomerang
cursed skull
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
else if($input=='w' || $input=='west') 
{			echo 'You travel west<br/>';
   	$message="<i>You travel west</i></br>".$_SESSION['desc516e'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '516e'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}


// ----------------------------------- end of room function
include ('function-end.php');
}
?>