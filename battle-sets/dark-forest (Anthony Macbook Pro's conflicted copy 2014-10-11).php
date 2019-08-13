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
	{	$rand = rand (1,20);
		$randrare = rand (1,200); 
	
		//echo 'RR: '.$randrare.' :: ';
	}	
		else {$rand=0;$randrare=0;}	
// -------------------------------------------------------------------------- INITIALIZE SUPER RARE - Wisp - 1/200
if(($randrare == 1 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Wisp'"); include ('battle.php'); }	
// -------------------------------------------------------------------------- INITIALIZE low RARES - 1/15 -> 1/6
else if(($rand == 1 ) && $infight==0 && $endfight==0) {
	$rand2 = rand (1,6);
	if ($rand2 == 1){ $results = $link->query("UPDATE $user SET enemy = 'Bigfoot'"); include ('battle.php'); }
	else if ($rand2 == 2){ $results = $link->query("UPDATE $user SET enemy = 'Imp'"); include ('battle.php'); }
	else if ($rand2 == 3){ $results = $link->query("UPDATE $user SET enemy = 'Bowman'"); include ('battle.php'); }
	else if ($rand2 == 4){ $results = $link->query("UPDATE $user SET enemy = 'Falcon'"); include ('battle.php'); }
	else if ($rand2 == 5){ $results = $link->query("UPDATE $user SET enemy = 'Ent'"); include ('battle.php'); }
	else if ($rand2 == 6){ $results = $link->query("UPDATE $user SET enemy = 'Dark Ranger'"); include ('battle.php'); }
	}	
// -------------------------------------------------------------------------- INITIALIZE - 1
else if(($rand == 3 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Troll'"); include ('battle.php'); }		
// -------------------------------------------------------------------------- INITIALIZE - 1
else if(($rand == 4 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Troll Shaman'"); include ('battle.php'); }		
// -------------------------------------------------------------------------- INITIALIZE - 1
else if(($rand == 5 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Troll Sorcerer'"); include ('battle.php'); }		
// -------------------------------------------------------------------------- INITIALIZE - 1
else if(($rand == 6 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Troll Elder'"); include ('battle.php'); }		
// -------------------------------------------------------------------------- INITIALIZE - 1
else if(($rand == 7 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Troll Elder'"); include ('battle.php'); }		
// -------------------------------------------------------------------------- INITIALIZE - 1
else if(($rand == 8 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Troll Champion'"); include ('battle.php'); }		
				
		
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	


	
	
} // ---end while


?>