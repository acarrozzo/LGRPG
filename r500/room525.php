<?php
						$roomname = "Test of Light | Forest Princess";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc525'];

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT! 
while($row = $result->fetch_assoc()){   


// $quest57=$row['quest57']; 






// -------------------------------------------------------------------------- BATTLE VARIABLES		
 	$infight = $row['infight']; $endfight = $row['endfight']; $enemy=$row['enemy'];
// -------------------------------------------------------------------------- After Battle - SAFE ROOM		
if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
		$input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
		$input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
		$input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
		$input!='u' && $input!='up' && $input!='d' && $input!='down' ) { echo "This room is safe.<br/>"; }

if ($input=='battle forest princess') { $input = 'attack'; }
if ($input=='attack' && $infight==0 && $endfight==0) 
	{
		$results = $link->query("UPDATE $user SET enemy = 'Forest Princess'");
		include ('battle.php');
	}
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{
	if($input=='battle forest princess') { $input = 'attack'; }
	include ('battle.php');
	}




// --------------------------------------------------------------------------- REST HEAL
if ($input=="rest"){
		$query = $link->query("UPDATE $user SET hp = $hpmax + 100 "); 
		$query = $link->query("UPDATE $user SET mp = $mpmax + 100 "); 
		echo $message = "You rest near the Forest Princess and feel great! (+100 HP, +100 MP)<br/>";
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}

include ('function-choptree.php');


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
   	$message="<i>You travel east</i></br>".$_SESSION['desc524'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '524'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
   $_SESSION['enterdespair'] = 1;   
}




// ----------------------------------- end of room function
include ('function-end.php');
}
?>