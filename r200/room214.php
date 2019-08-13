<?php
						$roomname = "Red Guard Captain's Office";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc214'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   


$ringofstrengthII=$row['ringofstrengthII'];

// -------------------------------------------------------------------------- ROOM ACTIONS
if($input=='read signOLD') {  //read sign
   echo	$message="<i>you read the sign:</i> <br />
-------------------------------------------<br />
Grab a FREE Ring! (But only one!)<br />
-------------------------------------------</p>";
	include ('update_feed.php'); // --- update feed	

}

// -------------------------------------------------------------------------- READ SIGN!
else if($input=='read sign') {  //read sign
   echo '<i>You read the sign</i> <br>  ';
   	$message="
   <i>you read the sign:</i>   
   <div class='sign'>
   <h3>Free Ring <i></i></h3>
   	<form id='mainForm' method='post' action='' name='formInput'>
---------------------------------------------------</br>
<span class='hilight'>Grab a FREE Ring! (But only one!)</span><br>
---------------------------------------------------<br>
</form></div>";
include ('update_feed.php'); // --- update feed	
}

// -------------------------------------------------------------------------- GRAB RING
if($input=='grab ring') 
{	if ($ringofstrengthII >= 1)
	 	{ echo $message="<div class='menuAction'><i class='fa fa-times lightred'></i>You already have a Ring of Strength II. If you lose it come back here for another free one.</div>"; include ('update_feed.php'); // --- update feed
		}
	else
	 	{ echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up'></i>You grab a Ring of Strength II out of the bowl.</div>"; include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET ringofstrengthII = ringofstrengthII + 1");
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
else if($input=='s' || $input=='south') 
{  echo 'You travel south<br/>';
   $message="<i>You travel south</i></br>".$_SESSION['desc212'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 212"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='ne' || $input=='northeast') 
{	echo 'You travel northeast<br/>';
   $message="<i>You travel northeast</i></br>".$_SESSION['desc215'];
  include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 215"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}


// ----------------------------------- end of room function
include ('function-end.php');
}
?>
