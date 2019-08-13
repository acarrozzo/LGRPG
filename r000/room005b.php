<?php
$roomname = "Secret Arena";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc005b'];

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 


// -------------------------------------------------------------------------- BATTLE VARIABLES		
 	$infight = $row['infight']; $endfight = $row['endfight']; $enemy=$row['enemy'];
// -------------------------------------------------------------------------- After Battle - SAFE ROOM		
if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
		$input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
		$input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
		$input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
		$input!='u' && $input!='up' && $input!='d' && $input!='down' ) { echo "This room is safe.<br/>"; }	// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1 && $input!='attack scorpion king' && $input!='attack' && $input!='a') 
	{	$rand = rand (1,10); 
	}	else {$rand=0;}
// -------------------------------------------------------------------------- INITIALIZE Ultima - 0/10 - only attack to fight
if(($input=='attack' || $rand <= -1 ) && $infight==0 && $endfight==0) 
	{
		$results = $link->query("UPDATE $user SET enemy = 'The Random'");
		include ('battle.php');
	}
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{
	include ('battle.php');
	}




// -------------------------------------------------------------------------- ROOM ACTIONS
// --------------------------------------------------------------------------- REST HEAL
if ($input=="rest"){
// -------------------------DB OUTPUT!

		$query = $link->query("UPDATE $user SET hp = $hpmax"); 
		$query = $link->query("UPDATE $user SET mp = $mpmax"); 
		echo $message = "You rest and fully heal your HP & MP!<br/>";
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}



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
{  	echo 'You travel up<br/>';
   	$message="<i>You travel up</i></br>".$_SESSION['desc005'];
	include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '005'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}


// ----------------------------------- end of room function
include ('function-end.php');

}
?>
