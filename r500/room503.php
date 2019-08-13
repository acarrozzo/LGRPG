<?php
						$roomname = "Stone Path by the Outpost";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc503'];

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
	
	
// -------------------------------------------------------------------------- BATTLE SET - Dark Forest Mountain Path
	
// -------------------------------------------------------------------------- After Battle - SAFE ROOM		
if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
		$input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
		$input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
		$input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
		$input!='u' && $input!='up' && $input!='d' && $input!='down' ) { echo "This room is safe.<br/>"; }	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
	{	$rand = rand (1,8); }	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE bowman 1/8
if(($rand == 1 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Bowman'"); include ('battle.php'); }
// -------------------------------------------------------------------------- INITIALIZE highwayman 1/8
else if(($rand == 2 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Highwayman'"); include ('battle.php'); }	
// -------------------------------------------------------------------------- INITIALIZE others 1/4
else if(($rand == 3 || $rand == 4  ) && $infight==0 && $endfight==0) 
	{	
		//imp, snake, salamander, golden bat, wild boar, kobold, skeleton, giant rat, troll
		$rand2 = rand(1,9);
		if($rand2 == 1 ) { $results = $link->query("UPDATE $user SET enemy = 'Imp'"); include ('battle.php'); } 			// - 1/9
		if($rand2 == 2 ) { $results = $link->query("UPDATE $user SET enemy = 'Snake'"); include ('battle.php'); } 		// - 1/9
		if($rand2 == 3 ) { $results = $link->query("UPDATE $user SET enemy = 'Salamander'"); include ('battle.php'); } 	// - 1/9
		if($rand2 == 4 ) { $results = $link->query("UPDATE $user SET enemy = 'Golden Bat'"); include ('battle.php'); }	// - 1/9
		if($rand2 == 5 ) { $results = $link->query("UPDATE $user SET enemy = 'Wild Boar'"); include ('battle.php'); }	// - 1/9
		if($rand2 == 6 ) { $results = $link->query("UPDATE $user SET enemy = 'Kobold'"); include ('battle.php'); }	 	// - 1/9
		if($rand2 == 7 ) { $results = $link->query("UPDATE $user SET enemy = 'Skeleton'"); include ('battle.php'); }	 	// - 1/9
		if($rand2 == 8 ) { $results = $link->query("UPDATE $user SET enemy = 'Giant Rat'"); include ('battle.php'); }	// - 1/9
		if($rand2 == 9 ) { $results = $link->query("UPDATE $user SET enemy = 'Troll'"); include ('battle.php'); }	 		// - 1/9
	}
	
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
else if($input=='e' || $input=='east') 
{			echo 'You travel east<br/>';
   	$message="<i>You travel east</i></br>".$_SESSION['desc502'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '502'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='w' || $input=='west') 
{			echo 'You travel west<br/>';
   	$message="<i>You travel west</i></br>".$_SESSION['desc504'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '504'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}




// ----------------------------------- end of room function
include ('function-end.php');
}
?>