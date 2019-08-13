<?php
						$roomname = "Champion's Camp";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc511'];

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
	



// include ('battle-sets/dark-forest.php');
include ('function-choptree.php');

// -------------------------------------------------------------------------- ROOM ACTIONS
if ($input == 'flip lever')
{
	if ($_SESSION['darkforestsilverswitch'] == 1)
	{
		echo $message = 'You already flipped this lever, a door to the south has opened up.<br/>';
		include ('update_feed.php'); // --- update feed
	}
	else {
		echo $message= 'You flip the lever and hear some grinding to the south.<br/>';
		include ('update_feed.php'); // --- update feed
		$_SESSION['darkforestsilverswitch'] = 1;
	}
	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}








// -------------------------------------------------------------------------- SEARCH Dark Forest Champion's Camp
if ($input == 'search')
{
	$rand = rand (1,2); 			//		1/2
	if ($rand == 1) {
		$rand2 = rand(1,8);		//		1/8
		if ($rand2 ==1){
			echo $message="You search the camp and find a Ring of Strength V!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET ringofstrengthV = ringofstrengthV + 1");
		}
		if ($rand2 ==2){
			echo $message="You search the camp and find a Ring of Health Regen III!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET ringofhealthregenIII = ringofhealthregenIII + 1");
		}
		if ($rand2 ==3){
			echo $message="You search the camp and find 5 Meatballs!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET meatball = meatball + 5");
		}
		if ($rand2 ==4){
			echo $message="You search the camp and find a piece of Iron!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET iron = iron + 1");
		}
		if ($rand2 ==5){
			echo $message="You search the camp and find some Coal!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET coal = coal + 1");
		}
		if ($rand2 ==6){
			echo $message="You search the camp and find a shiny piece of Mithril!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET mithril = mithril + 1");
		}
		if ($rand2 ==7){
			echo $message="You search the camp and find some Reds!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET reds = reds + 1");
		}
		if ($rand2 ==8){
			echo $message="You search the camp and find some Yellows!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET yellows = yellows + 1");
		}
	}
	else {
		echo $message="You search the camp and find nothing, you should search again.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}

	














// -------------------------------------------------------------------------- After Battle - SAFE ROOM		
if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
		$input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
		$input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
		$input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
		$input!='u' && $input!='up' && $input!='d' && $input!='down' ) { echo "This room is safe.<br/>"; }	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
	{	$rand = rand (1,10);
		$randrare = rand (1,200); 
	}	
		else {$rand=0;$randrare=0;}	
// -------------------------------------------------------------------------- INITIALIZE SUPER RARE - Wisp - 1/200
if(($randrare == 1 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Wisp'"); include ('battle.php'); }	
// -------------------------------------------------------------------------- INITIALIZE low RARES - 1/30
else if(($rand == 1 ) && $infight==0 && $endfight==0) {
	$rand2 = rand (1,3);
	if ($rand2 == 1){ $results = $link->query("UPDATE $user SET enemy = 'Falcon'"); include ('battle.php'); }
	else if ($rand2 == 2){ $results = $link->query("UPDATE $user SET enemy = 'Ent'"); include ('battle.php'); }
	else if ($rand2 == 3){ $results = $link->query("UPDATE $user SET enemy = 'Dark Ranger'"); include ('battle.php'); }
	}	
// -------------------------------------------------------------------------- INITIALIZE - 1/30
else if(($rand == 2 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Troll Champion'"); include ('battle.php'); }		
// -------------------------------------------------------------------------- INITIALIZE - 1/30
else if(($rand == 3 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Troll Champion'"); include ('battle.php'); }		
// -------------------------------------------------------------------------- INITIALIZE - 1/30
else if(($rand == 4 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Troll Champion'"); include ('battle.php'); }		
// -------------------------------------------------------------------------- INITIALIZE - 1/30
else if(($rand == 5 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Troll Champion'"); include ('battle.php'); }		
		
				
		
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	


	
	










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
{			echo 'you jump off the hill to the west<br/>';
   	$message="<i>you jump off the hill to the west</i></br>".$_SESSION['desc508'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '508'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='sw' || $input=='southwest') 
{			echo 'you jump off the hill to the southwest and land in the Tree Hut!<br/>';
   	$message="<i>you jump off the hill to the southwest and land in the Tree Hut!</i></br>".$_SESSION['desc506'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '506'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='e' || $input=='east') 
{			echo 'You travel east<br/>';
   	$message="<i>You travel east</i></br>".$_SESSION['desc510'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '510'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}



// ----------------------------------- end of room function
include ('function-end.php');
}
?>