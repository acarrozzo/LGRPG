<?php
// -- 0028c -- Abandoned Workshop in the Bat Cave
$roomname = "Abandoned Workshop in the Bat Cave";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc028c'];
//$dangerLVL = $_SESSION['dangerLVL'] = "2"; // danger level


include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 


 	$infight = $row['infight'];
 	$endfight = $row['endfight'];
 	$enemy=$row['enemy'];


if($input=='get hammer') 
{
	if ($hammer >= 1)
	 {
		echo 'You already have a hammer. If you lose it come back here for another free one<br/>';
	   	$message="<i>You already have a hammer. If you lose it come back here for another free one</i></br>";
		include ('update_feed.php'); // --- update feed
	 }
	else
	 {	 
   	echo 'You pick up a hammer and put it in your inventory<br/>';
   	$message="You pick up a hammer and put it in your inventory</br>";
	include ('update_feed.php'); // --- update feed
  	$results = $link->query("UPDATE $user SET hammer = hammer + 1");
	 }
}


if($input=='get string') 
{
	if ($string >= 1)
	 {
		echo 'You already have a string. If you lose it come back here for another free one<br/>';
	   	$message="<i>You already have a string. If you lose it come back here for another free one</i></br>";
		include ('update_feed.php'); // --- update feed
	 }
	else
	 {	 
   	echo 'You pick up a string and put it in your inventory<br/>';
   	$message="You pick up a string and put it in your inventory</br>";
	include ('update_feed.php'); // --- update feed
  	$results = $link->query("UPDATE $user SET string = string + 1");
	 }
}



// -------------------------------------------------------------------------- After Battle - SAFE ROOM		
if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
		$input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
		$input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
		$input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
		$input!='u' && $input!='up' && $input!='d' && $input!='down' ) { echo "This room is safe.<br/>"; }	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1) 
	{	$rand = rand (1,10); 
		//echo "<br/>RAND: ".$rand."<br/>";
	}	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE Bat - 30%
if(($input=='attack bat' || $input=='attack' || $rand <=3 ) && $infight==0 && $endfight==0) 
	{	if ($input=='attack bat') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Bat'");
		include ('battle.php'); }
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{ 	if($input=='attack bat') { $input = 'attack'; }
		include ('battle.php');	}	

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
else if($input=='nw' || $input=='northwest') 
{
	echo 'You travel northwest<br/>';
	$message="<i>You travel northwest</i><br/>".$_SESSION['desc028d'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '028d'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='w' || $input=='west') 
{
	echo 'You travel west<br/>';
	$message="<i>You travel west</i><br/>".$_SESSION['desc028b'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '028b'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
// ----------------------------------- end of room function
include ('function-end.php');

}

?>
