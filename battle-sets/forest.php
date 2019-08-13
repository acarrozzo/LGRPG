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
if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
	{	$rand = rand (1,30); }	else {$rand=	0;}	
// -------------------------------------------------------------------------- INITIALIZE bigfoot / wild boar / snake - 1/30
if(($rand == 1 ) && $infight==0 && $endfight==0) {
$rand2 = rand (1,3);
	if ($rand2 == 1){ $results = $link->query("UPDATE $user SET enemy = 'Bigfoot'"); include ('battle.php'); }
	if ($rand2 == 2){ $results = $link->query("UPDATE $user SET enemy = 'Hawk'"); include ('battle.php'); }
	if ($rand2 == 3){ $results = $link->query("UPDATE $user SET enemy = 'Snake'"); include ('battle.php'); }
	}	
// -------------------------------------------------------------------------- INITIALIZE - 1/30
else if(($rand == 2 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Wolf'"); include ('battle.php'); }	
// -------------------------------------------------------------------------- INITIALIZE - 1/30
else if(($rand == 3 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Coyote'"); include ('battle.php'); }		
// -------------------------------------------------------------------------- INITIALIZE - 1/30
else if(($rand == 4 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Buck'"); include ('battle.php'); }		
// -------------------------------------------------------------------------- INITIALIZE - 1/30
else if(($rand == 5 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Bear'"); include ('battle.php'); }		
// -------------------------------------------------------------------------- INITIALIZE - 1/30
else if(($rand == 6 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Stag'"); include ('battle.php'); }		
// -------------------------------------------------------------------------- INITIALIZE - 1/30
else if(($rand == 7 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Wild Boar'"); include ('battle.php'); }	
// -------------------------------------------------------------------------- INITIALIZE - 3x1/30 = 1/90, 1/90, 1/90 - rare battles
else if(($rand == 8 ) && $infight==0 && $endfight==0) 
	{	
	$rand2 = rand (1,3);
	if ($rand2 == 1){ $results = $link->query("UPDATE $user SET enemy = 'Bigfoot'"); include ('battle.php'); }
	if ($rand2 == 2){ $results = $link->query("UPDATE $user SET enemy = 'Hawk'"); include ('battle.php'); }
	if ($rand2 == 3){ $results = $link->query("UPDATE $user SET enemy = 'Imp'"); include ('battle.php'); }
	}			
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	


	
	
} // ---end while


?>