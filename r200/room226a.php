<?php
						$roomname = "Warrior's Guild EXIT";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc226a'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   
 
 

 


$warriorskillFlag = $row['warriorskillFlag'];

// ---------------------- SKILL FLAG! ---------------------- //
if ($warriorskillFlag==0) {
echo  $message = "<div class='menuAction'><i span class='fa fa-check-square-o'></i>
You can now learn new SKILLS from the WARRIOR'S GUILD!!</div> ";
include ('update_feed.php'); // --- update feed
$results = $link->query("UPDATE $user SET warriorskillFlag = 1");
}
//else {$results = $link->query("UPDATE $user SET travelingwarriorFlag = 0");}







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
{	echo 'You travel west<br/>';
   $message="<i>You travel west</i></br>".$_SESSION['desc226c'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '226c'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='nw' || $input=='northwest') 
{	echo 'You travel northwest<br/>';
   $message="<i>You travel northwest</i></br>".$_SESSION['desc226d'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '226d'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='n' || $input=='north') 
{	echo 'You travel north<br/>';
   $message="<i>You travel north</i></br>".$_SESSION['desc226b'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '226b'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='d' || $input=='down') 
{	echo 'You travel down<br/>';
   $message="<i>You travel down</i></br>".$_SESSION['desc226'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '226'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}







// ----------------------------------- end of room function
include ('function-end.php');
}
?>
