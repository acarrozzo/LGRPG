<?php
// -- 013 -- Marsh Behind the Cabin
$roomname = "Marsh Behind the Cabin";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc013'];
//$dangerLVL = $_SESSION['dangerLVL'] = "5"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 
	$infight = $row['infight']; $endfight = $row['endfight']; $enemy=$row['enemy'];
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1 && $input!='attack gator' && $input!='attack' && $input!='a') 
	{	$rand = rand (1,10); 
		//echo "<br/>RAND: ".$rand."<br/>";
	}	else {$rand=0;}
// -------------------------------------------------------------------------- After Battle - SAFE ROOM		
if ($endfight == 1 && $input != 'sw') { echo "This room is safe.<br/>"; }	
// -------------------------------------------------------------------------- INITIALIZE Gator	
else if(($input=='attack gator' || $rand <= 2 ) && $infight==0 && $endfight==0) 
	{
		if ($input=='attack gator') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Gator'");
		$results = $link->query("UPDATE $user SET infight = '1'");
		include ('battle.php');
	}
	

// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{
	if($input=='attack gator') { $input = 'attack'; }
	include ('battle.php');
	}

else if ($input == 'attack gator' || $input == 'attack'){
	echo 
   	$message="<i>
There are currently no gators to attack here. REST or SEARCH to RESET THE DANGER!</i><br/>";
	include ('update_feed.php'); // --- update feed
	}


// -------------------------------------------------------------------------- ROOM ACTIONS

// -------------------------------------------------------------------------- SEARCH MARSH BEHIND THE CABIN		
if ($input == 'search')
{
	$rand = rand (1,3); 			//		1/2
	if ($rand == 1) {
		$rand2 = rand(1,10);		//		1/10
		if ($rand2 ==1){
			echo $message="You search the swampy marsh and find 2 Blueberry!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET blueberry = blueberry + 2");
		}
		if ($rand2 ==2){
			echo $message="You search the swampy marsh and find 4 Redberry!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET redberry = redberry + 4");
		}
		if ($rand2 ==3){
			echo $message="You search the swampy marsh and find a Javelin!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET javelin = javelin + 1");
		}
		if ($rand2 ==4){
			echo $message="You search the swampy marsh and find 2 bolts!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET bolts = bolts + 2");
		}
		if ($rand2 ==5){
			$rand3 = rand(5,10);
			echo $message= 'You search the swampy marsh and find '.$rand3.' coin!<br/>';
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET currency = currency + $rand3");
		}
		if ($rand2 ==6){
			$rand3 = rand(2,4);
			echo $message= 'You search the swampy marsh and find '.$rand3.' arrows!<br/>';
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET arrows = arrows + $rand3");
		}
		if ($rand2 ==7){
			echo $message="You search the swampy marsh and find a bitchin' Battle Axe!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET battleaxe = battleaxe + 1");
		}
		if ($rand2 ==8){
			echo $message="You search the swampy marsh and find a Red Potion!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET redpotion = redpotion + 1");
		}
		if ($rand2 ==9){
			echo $message="You search the swampy marsh and find a Morning Star!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET morningstar = morningstar + 1");
		}
		if ($rand2 ==10){
			echo $message="You search the swampy marsh and find a Long Sword!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET longsword = longsword + 1");
		}
	}
	else {
		echo $message="You search the swampy marsh and find nothing, you should search again.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}


// -------------------------------------------------------------------------- Battle TRAVEL
if (($input=='n' || $input=='north' || 
		$input=='ne' || $input=='northeast' ||
		$input=='e' || $input=='north' ||
		$input=='se' || $input=='southeast' ||
		$input=='s' || $input=='south' ||
		$input=='sw' || $input=='southwest' ||
		$input=='w' || $input=='west' ||
		$input=='nw' || $input=='northwest' ||
		$input=='u' || $input=='up' ||
		$input=='d' || $input=='down' )  && $infight >= 1) {
	echo 'You cannot leave the room in the middle of battle!<br/>';
   	$message="<i>You cannot leave the room in the middle of battle!</i><br/>";
	include ('update_feed.php'); // --- update feed
	}
// -------------------------------------------------------------------------- TRAVEL
else if($input=='ne' || $input=='northeast') 
{
	echo 'You travel northeast<br/>';
 	$message="<i>You travel northeast</i><br/>".$_SESSION['desc003'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	$results = $link->query("UPDATE $user SET room = '003'"); // -- room change
}


// ----------------------------------- end of room function
include ('function-end.php');

}
?>
