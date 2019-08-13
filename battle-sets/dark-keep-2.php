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
if ($infight < 1 && $endfight != 1)  // - 
	{	$rand = rand (1,10); }	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE 3/9
if(($rand == 1 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Warped Priest'"); include ('battle.php'); } // - 1/10
else if(($rand == 2 || $rand == 3 || $rand == 4 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Dark Paladin'"); include ('battle.php'); }  // - 3/10
// -------------------------------------------------------------------------- IN BATTLE	
	
else if ($infight >=1 ) { include ('battle.php'); }	

	
	
} // ---end while


?>