<?php
						$roomname = "Wizard's Guild Exit";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc225a'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

$wizardskillFlag = $row['wizardskillFlag'];





// -------------------------------------------------------------------------- ROOM ACTIONS




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
else if($input=='se' || $input=='southeast') 
{	echo 'You travel southeast<br/>';
   $message="<i>You travel southeast</i></br>".$_SESSION['desc225b'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '225b'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
			// ---------------------- SKILL FLAG! ---------------------- //
			if ($wizardskillFlag==0) {
			echo  $message = "<div class='menuAction'><i span class='fa fa-check-square-o'></i>
			You can now learn new SKILLS & SPELLS from the WIZARD'S GUILD!!</div> ";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET wizardskillFlag = 1");
			}
}
else if($input=='d' || $input=='down') 
{	echo 'You travel down<br/>';
   $message="<i>You travel down</i></br>".$_SESSION['desc225'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 225"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}







// ----------------------------------- end of room function
include ('function-end.php');
}
?>
