<?php


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
	{	$results = $link->query("UPDATE $user SET enemy = 'Barracuda'"); include ('battle.php'); }
else if(($rand == 6 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Squid'"); include ('battle.php'); }		// - 1/21
else if(($rand == 7 ) && $infight==0 && $endfight==0) 
	{	
		$rand2 = rand(1,9);
		if($rand2 == 1 ) { $results = $link->query("UPDATE $user SET enemy = 'Glowing Octopus'"); include ('battle.php'); } // - 1/
		if($rand2 == 2 ) { $results = $link->query("UPDATE $user SET enemy = 'Glowing Octopus'"); include ('battle.php'); } //
		if($rand2 == 3 ) { $results = $link->query("UPDATE $user SET enemy = 'Great White'"); include ('battle.php'); } // - 1/
		if($rand2 == 4 ) { $results = $link->query("UPDATE $user SET enemy = 'Hammerhead'"); include ('battle.php'); }	 // - 1/
		if($rand2 == 5 ) { $results = $link->query("UPDATE $user SET enemy = 'Crocodile'"); include ('battle.php'); }	 // - 1/
		if($rand2 == 6 ) { $results = $link->query("UPDATE $user SET enemy = 'Jellyfish'"); include ('battle.php'); }	 // - 1/
		if($rand2 == 7 ) { $results = $link->query("UPDATE $user SET enemy = 'Electric Eel'"); include ('battle.php'); }	 // - 1/
		if($rand2 == 8 ) { $results = $link->query("UPDATE $user SET enemy = 'Piranha Eel'"); include ('battle.php'); }	 // - 1/
		if($rand2 == 9 ) { 	echo $message="<i>For a moment you see a glowing squid looking thing, but it swims quickly back into the shadows. You just missed a possible rare. You know, there is a slightly higher chance of finding the GLOWING OCTOPUS if you search near the SUNKEN SHIP. </i><br>";	
		include ('update_feed.php');   // --- update feed
		}	 // - 1/105
	}

	
						
// -------------------------------------------------------------------------- IN BATTLE	
	
else if ($infight >=1 ) { include ('battle.php'); }	

	
	
} // ---end while


?>