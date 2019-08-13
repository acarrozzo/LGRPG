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


 	$KLgmg2=$row['KLgmg2'];
 	$KLgk2=$row['KLgk2'];
 	$KLgiantmountaingiant=$row['KLgiantmountaingiant'];
 	$KLgatekeeper=$row['KLgatekeeper'];
	
	
// -------------------------------------------------------------------------- After Battle - SAFE ROOM		
if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
		$input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
		$input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
		$input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
		$input!='u' && $input!='up' && $input!='d' && $input!='down' ) { echo "This room is safe.<br/>"; }	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
	{	
		$rand = rand (1,15);
		$randrare = rand (1,200); 
	}	
		else {$rand=0;$randrare=0;}	
		
// -------------------------------------------------------------------------- INITIALIZE GK2 or GMG2
if(($randrare == 1 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Rat'"); include ('battle.php'); }	
	
// -------------------------------------------------------------------------- INITIALIZE low RARES - 1/15 -> 1/7
else if(($rand == 1 ) && $infight==0 && $endfight==0) {
	$rand2 = rand (1,7);
		 
		 if ($rand2 == 1){ $results = $link->query("UPDATE $user SET enemy = 'Bowman'"); include ('battle.php'); }
	else if ($rand2 == 2){ $results = $link->query("UPDATE $user SET enemy = 'Highwayman'"); include ('battle.php'); }
	else if ($rand2 == 3){ $results = $link->query("UPDATE $user SET enemy = 'Imp'"); include ('battle.php'); }
	else if ($rand2 == 4){ $results = $link->query("UPDATE $user SET enemy = 'Wisp'"); include ('battle.php'); }
	else if ($rand2 == 5){ $results = $link->query("UPDATE $user SET enemy = 'Falcon'"); include ('battle.php'); }
	else if ($rand2 == 6){ $results = $link->query("UPDATE $user SET enemy = 'Bigfoot'"); include ('battle.php'); }
	else if ($rand2 == 7){ $results = $link->query("UPDATE $user SET enemy = 'Ent'"); include ('battle.php'); }
	}	
// -------------------------------------------------------------------------- INITIALIZE - 1/15
else if(($rand == 2 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Mountain Giant'"); include ('battle.php'); }		
// -------------------------------------------------------------------------- INITIALIZE - 1/15
else if(($rand == 3 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Ice Troll'"); include ('battle.php'); }		
// -------------------------------------------------------------------------- INITIALIZE - 1/15
else if(($rand == 4 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Giant Brute'"); include ('battle.php'); }		
// -------------------------------------------------------------------------- INITIALIZE - 1/15
else if(($rand == 5 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Wyvern'"); include ('battle.php'); }		
// -------------------------------------------------------------------------- INITIALIZE - 1/15
else if(($rand == 6 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Stone Dwarf'"); include ('battle.php'); }		
// -------------------------------------------------------------------------- INITIALIZE - 1/15 -> 1/7
else if(($rand == 7 ) && $infight==0 && $endfight==0) 
	{	$rand2 = rand (1,7);
		 if ($rand2 == 1){ $results = $link->query("UPDATE $user SET enemy = 'Yeti'"); include ('battle.php'); }
	else if ($rand2 == 2){ $results = $link->query("UPDATE $user SET enemy = 'Yeti'"); include ('battle.php'); }
	else if ($rand2 == 3){ $results = $link->query("UPDATE $user SET enemy = 'Yeti'"); include ('battle.php'); }
	else if ($rand2 == 4){ $results = $link->query("UPDATE $user SET enemy = 'Snow Ogre'"); include ('battle.php'); }
	else if ($rand2 == 5){ $results = $link->query("UPDATE $user SET enemy = 'Snow Ninja'"); include ('battle.php'); }
	else if ($rand2 == 6){ $results = $link->query("UPDATE $user SET enemy = 'Snow Owl'"); include ('battle.php'); }
	else if ($rand2 == 7){ $results = $link->query("UPDATE $user SET enemy = 'Dragon'"); include ('battle.php'); }
	
	 }		
				
		
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	


	
	
} // ---end while


?>