<?php
						$roomname = "Sunken Ship";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc489'];

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
	
	
// -------------------------------------------------------------------------- After Battle - SAFE ROOM		
if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
		$input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
		$input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
		$input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
		$input!='u' && $input!='up' && $input!='d' && $input!='down' ) { echo "This room is safe.<br/>"; }	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1)  // -UNDER OCEAN RAND GENERATOR
	{	$rand = rand (1,21); }	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE 7/21
if(($rand == 1 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Giant Sea Turtle'"); include ('battle.php'); } // - 1/21
else if(($rand == 2 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Giant Sea Turtle'"); include ('battle.php'); }		
else if(($rand == 3 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Colossal Squid'"); include ('battle.php'); }
else if(($rand == 4 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Colossal Squid'"); include ('battle.php'); }
else if(($rand == 5 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Glowing Octopus'"); include ('battle.php'); }
else if(($rand == 6 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Squid'"); include ('battle.php'); }		// - 1/21
else if(($rand == 7 ) && $infight==0 && $endfight==0) 
	{	
		$rand2 = rand(1,9);
		if($rand2 == 1 ) { $results = $link->query("UPDATE $user SET enemy = 'Glowing Octopus'"); include ('battle.php'); } // - 1/
		if($rand2 == 2 ) { $results = $link->query("UPDATE $user SET enemy = 'King Squid'"); include ('battle.php'); } //
		if($rand2 == 3 ) { $results = $link->query("UPDATE $user SET enemy = 'Great White'"); include ('battle.php'); } // - 1/
		if($rand2 == 4 ) { $results = $link->query("UPDATE $user SET enemy = 'Hammerhead'"); include ('battle.php'); }	 // - 1/
		if($rand2 == 5 ) { $results = $link->query("UPDATE $user SET enemy = 'Crocodile'"); include ('battle.php'); }	 // - 1/
		if($rand2 == 6 ) { $results = $link->query("UPDATE $user SET enemy = 'Jellyfish'"); include ('battle.php'); }	 // - 1/
		if($rand2 == 7 ) { $results = $link->query("UPDATE $user SET enemy = 'Electric Eel'"); include ('battle.php'); }	 // - 1/
		if($rand2 == 8 ) { $results = $link->query("UPDATE $user SET enemy = 'Piranha'"); include ('battle.php'); }	 // - 1/
		if($rand2 == 9 ) { 	echo $message="<i>For a brief moment you see a glowing squid looking thing, but then it swims back into the shadows.</i><br>";	
		include ('update_feed.php');   // --- update feed
		}	 // - 1/105
	}

	
						
// -------------------------------------------------------------------------- IN BATTLE	
	
else if ($infight >=1 ) { include ('battle.php'); }	

	

// include ('battle-sets/blueocean-underwater.php'); // blue ocean battle set
include ('random-encounters/blueocean-underwater.php'); // blue ocean battle set




// -------------------------------------------------------------------------- SEARCH Sunken Ship
if ($input == 'search')
{
	$rand = rand (1,2); 			//		1/2
	if ($rand == 1) {
		$rand2 = rand(1,10);		//		1/10
		if ($rand2 ==1){
			echo $message="You search the sunken ship and find a super cool RIOT SHIELD!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET riotshield = riotshield + 1");
		}
		if ($rand2 ==2){
			echo $message="You search the sunken ship and find an Iron Sword!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET ironsword = ironsword + 1");
		}
		if ($rand2 ==3){
			echo $message="You search the sunken ship and find a Steel Javelin!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET steeljavelin = steeljavelin + 1");
		}
		if ($rand2 ==4){
			echo $message="You search the sunken ship and find a Glowing Orb!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET glowingorb = glowingorb + 1");
		}
		if ($rand2 ==5){
			echo $message="You search the sunken ship and find a pair of Iron Boots!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET ironboots = ironboots + 1");
		}
		if ($rand2 ==6){
			echo $message="You search the sunken ship and find a Red Balm!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET redbalm = redbalm + 1");
		}
		if ($rand2 ==7){
			echo $message="You search the sunken ship and find some Blues!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET blues = blues + 1");
		}
		if ($rand2 ==8){
			echo $message="You search the sunken ship and find some Reds!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET reds = reds + 1");
		}
		if ($rand2 ==9){
			echo $message="You search the sunken ship and find some Greens!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET greens = greens + 1");
		}
		if ($rand2 ==10){
			echo $message="You search the sunken ship and find some Yellows!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET yellows = yellows + 1");
		}
	}
	else {
		echo $message="You search the sunken ship and find nothing, you should search again.<br/>";
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

else if($input=='nw' || $input=='northwest') 
{	if ($_SESSION['breathingwater'] >= 1)
			  { echo 'You swim northwest<br/>';
   		$message="<i>You swim northwest</i></br>".$_SESSION['desc498'];
		include ('update_feed.php');   // --- update feed
   			   $results = $link->query("UPDATE $user SET room = '498'"); // -- room change
   			   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		} else{
 		echo $message="<i>You can't swim that way! You need to be breathing water!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}
else if($input=='ne' || $input=='northeast') 
{	if ($_SESSION['breathingwater'] >= 1)
			  { echo 'You swim northeast<br/>';
   		$message="<i>You swim northeast</i></br>".$_SESSION['desc488'];
		include ('update_feed.php');   // --- update feed
   			   $results = $link->query("UPDATE $user SET room = '488'"); // -- room change
   			   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		} else{
 		echo $message="<i>You can't swim that way! You need to be breathing water!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}

else if($input=='se' || $input=='southeast') 
{			echo 'You travel southeast into the Mud Crab Nest.<br/>';
   	$message="<i>You travel southeast into the Mud Crab Nest</i></br>".$_SESSION['desc492'];
	include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = 492"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
// ----------------------------------- end of room function
include ('function-end.php');
}
?>