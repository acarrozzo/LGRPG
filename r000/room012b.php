<?php
				$roomname = "Scorpion Pit Exit";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc012b'];
//$dangerLVL = $_SESSION['dangerLVL'] = "5"; // danger level
  

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 
	$infight = $row['infight']; $endfight = $row['endfight']; $enemy=$row['enemy'];
	
// -------------------------------------------------------------------------- After Battle - SAFE ROOM		
if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
		$input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
		$input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
		$input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
		$input!='u' && $input!='up' && $input!='d' && $input!='down' ) { echo "This room is safe.<br/>"; }		
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1 && $input!='attack alpha scorpion' && $input!='attack giant spider' && $input!='attack' && $input!='a') 
	{	$rand = rand (1,10); 
	}	else {$rand=0;}
// -------------------------------------------------------------------------- After Battle - SAFE ROOM		
if ($endfight == 1 && $input != 'sw') { echo "This room is safe.<br/>"; }	
// -------------------------------------------------------------------------- INITIALIZE ALPHA	3/10
else if(($input=='attack alpha scorpion' || $rand >= 7 ) && $infight==0 && $endfight==0) 
	{
		if ($input=='attack alpha scorpion') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Alpha Scorpion'");
		include ('battle.php');
	}
// -------------------------------------------------------------------------- INITIALIZE giant spider	2/10
else if(($input=='attack giant spider' || $rand <= 2 ) && $infight==0 && $endfight==0) 
	{
		if ($input=='attack giant spider') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Giant Spider'");
		include ('battle.php');
	}
	
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{
	if($input=='attack alpha scorpion' || $input=='attack giant spider') { $input = 'attack'; }
	include ('battle.php');
	}




// -------------------------------------------------------------------------- ROOM ACTIONS



// -------------------------------------------------------------------------- Battle TRAVEL
else if ((	$input=='n' || $input=='north' || $input=='ne' || $input=='northeast' ||
		$input=='e' || $input=='north' || $input=='se' || $input=='southeast' ||
		$input=='s' || $input=='south' || $input=='sw' || $input=='southwest' ||
		$input=='w' || $input=='west' || $input=='nw' || $input=='northwest' ||
		$input=='u' || $input=='up' || $input=='d' || $input=='down' )  && $infight >= 1) {
	echo 'You cannot leave the room in the middle of battle!<br/>';
   	$message="<i>You cannot leave the room in the middle of battle!</i><br/>";
	include ('update_feed.php'); // --- update feed
	}
// -------------------------------------------------------------------------- TRAVEL


else if($input=='s' || $input=='south') 
{  	echo 'You travel south<br/>';
   	$message="<i>You travel south</i></br>".$_SESSION['desc012c'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '012c'"); // -- room change
   	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	$_SESSION['scorpionswitch'] = 0;
}

else if($input=='u' || $input=='up') 
{	echo 'You travel up into the spider cave<br/>';
   	$message="<i>You travel up into the spider cave</i></br>".$_SESSION['desc012'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '012'"); // -- room change
   	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	$_SESSION['scorpionswitch'] = 0;
	
}

// ----------------------------------- end of room function
include ('function-end.php');

}
?>
