<?php
						$roomname = "Thorny Path";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc520'];

include ('function-start.php'); 

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

include ('battle-sets/dark-forest.php');
include ('function-choptree.php');



// -------------------------------------------------------------------------- rand
if ($infight == 0)  // -UNDER OCEAN RAND GENERATOR
	{	$randEncounter = rand (1,10); }	else {$randEncounter=0;}	
// -------------------------------------------------------------------------- INITIALIZE 7/21
if( $randEncounter == 1 ) 
	{
	$randEncounter2 = rand(1,5);
		
		if( $randEncounter2 == 1 ) { 
			$thorndamage = rand (50-100);
				echo $message="<br><i> --- ouch! you run into a thorn bush! </i>[ $thorndamage HP! ]<br>";
			$query = $link->query("UPDATE $user SET hp = hp - $thorndamage"); 				
			include ('update_feed_alt.php');   // --- update feed
		}
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
else if($input=='w' || $input=='west') 
{			echo 'You travel west<br/>';
   	$message="<i>You travel west</i></br>".$_SESSION['desc519'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '519'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='nw' || $input=='northwest') 
{			echo 'You travel northwest<br/>';
   	$message="<i>You travel northwest</i></br>".$_SESSION['desc521'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '521'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
// ----------------------------------- end of room function
include ('function-end.php');
}
?>