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
if ($infight < 1 && $endfight != 1)  // -FOREST PATH RAND GENERATOR
	{	$rand = rand (1,35); }	else {$rand=0;}	
	//echo 'RR'.$rand;
// -------------------------------------------------------------------------- INITIALIZE - 1/35
if(($rand == 1 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Rat'"); include ('battle.php'); }	
// -------------------------------------------------------------------------- INITIALIZE - 1/35
else if(($rand == 2 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Giant Rat'"); include ('battle.php'); }
// -------------------------------------------------------------------------- INITIALIZE - 1/35
else if(($rand == 3 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Thief'"); include ('battle.php'); }
// -------------------------------------------------------------------------- INITIALIZE - 1/35
else if(($rand == 4 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Spider'"); include ('battle.php'); }
// -------------------------------------------------------------------------- INITIALIZE - 1/35
else if(($rand == 5 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Snake'"); include ('battle.php'); }

// -------------------------------------------------------------------------- INITIALIZE - 1/35
else if(($rand == 6 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Goblin'"); include ('battle.php'); }

// -------------------------------------------------------------------------- INITIALIZE - 1/35
else if(($rand == 7 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Bat'"); include ('battle.php'); }

// -------------------------------------------------------------------------- INITIALIZE - 1/35
else if(($rand == 8 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Golden Bat'"); include ('battle.php'); }	
// -------------------------------------------------------------------------- INITIALIZE - 1/35
else if(($rand == 9 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Salamander'"); include ('battle.php'); }	
// -------------------------------------------------------------------------- INITIALIZE - 1/35
else if(($rand == 10 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Skeleton'"); include ('battle.php'); }	
// -------------------------------------------------------------------------- INITIALIZE - 1/35
else if(($rand == 11 || $rand == 12) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Tarantula'"); include ('battle.php'); }	
// -------------------------------------------------------------------------- INITIALIZE - 1/35
else if(($rand == 13 || $rand == 14 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Sewer Rat'"); include ('battle.php'); }	
// -------------------------------------------------------------------------- INITIALIZE - 1/35
else if(($rand == 15 || $rand == 16 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Red Gator'"); include ('battle.php'); }	
// -------------------------------------------------------------------------- INITIALIZE - 1/35
else if(($rand == 17 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Flying Dung Beetle'"); include ('battle.php'); }	
// -------------------------------------------------------------------------- INITIALIZE - 1/35
else if(($rand == 18 ) && $infight==0 && $endfight==0) 
	{	
	$rand2 = rand(1,2);
	if ($rand2 ==1){
		$results = $link->query("UPDATE $user SET enemy = 'Imp'"); include ('battle.php'); }	
	else {echo 'No Imp this time!<br/>';}
	}
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	



	
} // ---end while


?>