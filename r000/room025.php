<?php
// -- 025 -- Free Trees
$roomname = "Free Trees";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc025'];

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   


	$wood=$row['wood']; 
	$hatchet=$row['hatchet']; 
	$equipR=$row['equipR']; 

// -------------------------------------------------------------------------- ROOM ACTIONS



if($input=='read sign') {  //read sign
   echo	$message="<i>you read the sign:</i> <br />
-------------------------------------------<br />
To chop down some trees and get some free wood simply CHOP TREE.<br/>
-------------------------------------------<br/>";
	include ('update_feed.php'); // --- update feed	

}
else if($input=='get hatchet' || $input=='grab hatchet' || $input=='pick up hatchet') 
{
	if ($hatchet >= 1)
	 {
		echo 'You already have a hatchet. If you lose it come back here for another one<br/>';
	   	$message="<i>You already have a hatchet. If you lose it come back here for another one</i></br>";
		include ('update_feed.php'); // --- update feed
	 }
	else
	 {	 
   	echo 'You pick up a hatchet and put it in your inventory<br/>';
   	$message="You pick up a hatchet and put it in your inventory</br>";
	include ('update_feed.php'); // --- update feed
  	$results = $link->query("UPDATE $user SET hatchet = hatchet + 1");
	 }
}

else if($input=='chop tree')  // --- chop tree
{
	if  ($wood >=10) {
		echo "You can't chop down more than 10 wood here!<br/>";
	   	$message="Jack will only let you chop down 10 wood here. You can chop down more in the forest east of here.</br>";
		include ('update_feed.php'); // --- update feed
	 	}
	else if ($hatchet >= 1)
	 {
		$woodQty = rand (2,4);
		echo 'You chop down some wood [ '.+$woodQty.' wood ]<br/>';
	   	$message="You chop down some wood [ +$woodQty wood ]</br>";
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET wood = wood + $woodQty"); // -- room change
	 }
	else
	 {	 
   	echo 'You need a hatchet to chop wood. You can pick one up here.<br/>';
   	$message="You need a hatchet to chop wood. You can pick one up here.</br>";
	include ('update_feed.php'); // --- update feed
	 }
}







// -------------------------------------------------------------------------- TRAVEL
else if($input=='s' || $input=='south') 
{	echo 'You travel south<br/>';
 	$message="<i>You travel south</i><br/>".$_SESSION['desc024'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '024'"); // -- room change
}



// ----------------------------------- end of room function
include ('function-end.php');
}
?>
