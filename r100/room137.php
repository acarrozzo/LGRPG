<?php
						$roomname = "Troll Base Camp";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc137'];
//$dangerLVL = $_SESSION['dangerLVL'] = "13"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

$chest2 = $row['chest2'];


// -------------------------------------------------------------------------------------------------------------- BATTLE VARIABLES		
 	$infight = $row['infight']; $endfight = $row['endfight']; $enemy=$row['enemy'];
// -------------------------------------------------------------------------- After Battle - SAFE ROOM		
if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
		$input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
		$input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
		$input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
		$input!='u' && $input!='up' && $input!='d' && $input!='down' ) { echo "This room is safe.<br/>"; }	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
	{	$rand = rand (1,10); }	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE Troll - 7/10
if(($rand <= 7 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Troll'"); include ('battle.php'); }							
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	

// -------------------------------------------------------------------------- END BATTLE BLOCK








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
{	echo 'You travel east<br/>';
   $message="<i>You travel east</i></br>".$_SESSION['desc136'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 136"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='n' || $input=='north') 
{ 
	if (2 == 1) 
	{ 
	echo $message="<i>You can't go north into the Dark Forest yet. AC still needs to code it all!</i><br/>";
	include ('update_feed.php'); // --- update feed
   	}
	else if ($chest2 <= 0){
	echo  $message="<i>You cannot travel north yet. Opening up the Gold Chest here in the forest will unlock this gate. Complete quest 18 from Hunter Bill to get a Gold Key.</i><br/>";	
   	include ('update_feed.php'); // --- update feed
	}
	
	else {
	echo 'You travel north into the Dark Forest<br/>';
	$message="<i>You travel north into the Dark Forest</i><br/>".$_SESSION['desc505'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '505'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	}
}


// ----------------------------------- end of room function
include ('function-end.php');
}
?>
