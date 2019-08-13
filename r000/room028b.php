<?php
// -- 0028b -- Bat Cave
$roomname = "Bat Cave";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc028b'];
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
if ((	$input=='n' || $input=='north' || $input=='ne' || $input=='northeast' ||
		$input=='e' || $input=='north' || $input=='se' || $input=='southeast' ||
		$input=='s' || $input=='south' || $input=='sw' || $input=='southwest' ||
		$input=='w' || $input=='west' || $input=='nw' || $input=='northwest' ||
		$input=='u' || $input=='up' || $input=='d' || $input=='down' )  && $infight >= 1) {
	echo 'You cannot leave the room in the middle of battle!<br/>';
   	$message="<i>You cannot leave the room in the middle of battle!</i><br/>";
	include ('update_feed.php'); // --- update feed
	}
// -------------------------------------------------------------------------- ROOM ACTIONS  



else if($input=='read sign') {  //read sign
   echo'You read the sign.';
	$message="<i>you read the sign:</i> <br />
----------------------------<br />
TO EXIT GO UP! <br/>
----------------------------</br>";
	include ('update_feed.php'); // --- update feed	
}


// --------------------------------------------------------------------------- PICK UP MAP
else if ($input=="pick up map"){
	echo 'You pick up the grassy field underground map:<br/>';
	$message ='<br/><i>You pick up the grassy field underground map. Check your INV to view the map at anytime</i><br/>
	<a target="_blank" rel="map" href="img/lightgray_map_grassyfield_underground.jpg" class="fancybox">
	<img class="mapimage" width="350" height="350" alt="View Map"  src="img/lightgray_map_grassyfield_underground.jpg"><br/>
	click to open map in new window and view full size</a><br/>';
  	include ('update_feed_alt.php'); // --- update feed ALT
	$results = $link->query("UPDATE $user SET grassyfieldundergroundmap = 1");
	$funflag=1;	
}

// -------------------------------------------------------------------------- TRAVEL
else if($input=='e' || $input=='east') 
{
	echo 'You travel east<br/>';
	$message="<i>You travel east</i><br/>".$_SESSION['desc028c'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '028c'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='u' || $input=='up') 
{
	echo 'You travel up<br/>';
	$message="<i>You travel up</i><br/>".$_SESSION['desc028'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '028'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
// ----------------------------------- end of room function
include ('function-end.php');

}

?>
