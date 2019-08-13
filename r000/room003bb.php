<?php
// -- 003bb --- Destroyed Basement
$roomname = "Destroyed Basement";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc003bb'];
//$dangerLVL = $_SESSION['dangerLVL'] = "3"; // danger level


include ('function-start.php'); 
 
// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc())
{ 	$infight = $row['infight'];
 	$endfight = $row['endfight'];
 	$enemy=$row['enemy'];

// -----------------------------------------------------------------------read sign  
if($input=='read sign') {  //read sign 
   echo	$message="<i>you read the sign:</i> <br /> 
------------------------------------------------------------------------------<br />
This room is one of many dangerous areas. Enemies have a chance to spawn as you perform actions (like resting or searching).
You can SEARCH until an enemy spawns naturally or you can ATTACK if you wish to battle right away. <br /><br />
You win when your enemies HP drops below 0.<br /><br />
If you health runs low, make sure you eat some meat or drink a red potion to heal up.<br/>------------------------------------------------------------------------------</p>";
	include ('update_feed.php'); // --- update feed	

}


// -------------------------------------------------------------------------- After Battle - SAFE ROOM		
if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
		$input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
		$input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
		$input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
		$input!='u' && $input!='up' && $input!='d' && $input!='down' ) { echo "This room is safe.<br/>"; }	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1) 
	{	$rand = rand (1,10); 
	}	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE GIANT RAT	- 20%
if(($input=='attack giant rat' || $input=='attack' || $rand <= 2 ) && $infight==0 && $endfight==0) 
	{	if ($input=='attack giant rat') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Giant Rat'");
		include ('battle.php');	}
// -------------------------------------------------------------------------- INITIALIZE RAT - 10%
else if(($input=='attack rat' || $rand == 3 ) && $infight==0 && $endfight==0) 
	{	if ($input=='attack rat') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Rat'");
		include ('battle.php'); }

// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{ 	if($input=='attack giant rat' || $input=='attack rat') { $input = 'attack'; } 
		include ('battle.php');	}	









if ($input == 'search')
{
	$rand = rand (1,2); 			//		1/2   // giant rat search
	if ($rand == 1) {
		$rand2 = rand(1,10);		//		1/10
		if ($rand2 ==1){
			echo $message="You search the cabin basement and find a Blueberry!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET blueberry = blueberry + 1");
		}
		if ($rand2 ==2){
			echo $message="You search the cabin basement and find 2 Redberry!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET redberry = redberry + 2");
		}
		if ($rand2 ==3){
			echo $message="You search the cabin basement and find a Javelin!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET javelin = javelin + 1");
		}
		if ($rand2 ==4){
			echo $message="You search the cabin basement and find a Crossbow Bolt!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET bolts = bolts + 1");
		}
		if ($rand2 ==5){
			$rand3 = rand(1,5);
			echo $message= 'You search the cabin basement and find '.$rand3.' coin!<br/>';
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET currency = currency + $rand3");
		}
		if ($rand2 ==6){
			$rand3 = rand(1,3);
			echo $message= 'You search the cabin basement and find '.$rand3.' arrows!<br/>';
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET arrows = arrows + $rand3");
		}
		if ($rand2 ==7){
			echo $message="You search the cabin basement and find a Mace!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET mace = mace + 1");
		}
		if ($rand2 ==8){
			echo $message="You search the cabin basement and find a Red Potion!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET redpotion = redpotion + 1");
		}
		if ($rand2 ==9){
			echo $message="You search the cabin basement and find a dagger!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET dagger = dagger + 1");
		}
		if ($rand2 ==10){
			echo $message="You search the cabin basement and find a Long Sword!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET longsword = longsword + 1");
		}
	}
	else {
		echo $message="You search the cabin basement and find nothing, you should search again.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}




// -------------------------------------------------------------------------- ROOM ACTIONS  


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
	{
	echo 'You travel up<br/>';
   	$message="<i>You travel up to the Training Area</i><br/>".$_SESSION['desc003c'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '003c'"); // -- room change
   	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	}
else if($input=='e' || $input=='east') 
	{
	echo 'You travel east<br/>';
   	$message="<i>You travel east</i><br/>".$_SESSION['desc003b'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '003b'"); // -- room change
   	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	}	


// ----------------------------------- end of room function
include ('function-end.php'); 

}
?>