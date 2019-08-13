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
	{	$rand = rand (1,10); }	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE 4/10
if(($rand == 1 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Steel Rat'"); include ('battle.php'); } // - 1/10
else if(($rand == 2 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Steel Crab'"); include ('battle.php'); }		
else if(($rand == 3 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Steel Scorpion'"); include ('battle.php'); }
else if(($rand == 4 ) && $infight==0 && $endfight==0) 
	{	
		$rand2 = rand(1,5);
		if($rand2 == 1 ) { $results = $link->query("UPDATE $user SET enemy = 'Black Frog'"); include ('battle.php'); } // - 1/
		if($rand2 == 2 ) { $results = $link->query("UPDATE $user SET enemy = 'Steel Gator'"); include ('battle.php'); } //
		if($rand2 == 3 ) { $results = $link->query("UPDATE $user SET enemy = 'Steel Golem'"); include ('battle.php'); } // - 1/
		if($rand2 == 4 ) { $results = $link->query("UPDATE $user SET enemy = 'Stone Asassin'"); include ('battle.php'); } // - 1/
		if($rand2 == 5 ) { $results = $link->query("UPDATE $user SET enemy = 'Gamma Monk'"); include ('battle.php'); } // - 1/
	}
// -------------------------------------------------------------------------- IN BATTLE	
	
else if ($infight >=1 ) { include ('battle.php'); }	

	
	
} // ---end while


?>