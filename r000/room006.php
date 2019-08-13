<?php
// -- 006 -- Grassy Field East
$roomname = "Grassy Field East / Basic Shop"; 
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc006'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // set danger level

include ('function-start.php'); 
//include ('shops/basic_shop.php');  



// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 

// -------------------------------------------------------------------------- ROOM ACTIONS



// -------------------------------------------------------------------------- TRAVEL
if($input=='s' || $input=='south') 
{
echo 'You travel south<br/>';
	$message="<i>You travel south</i><br/>".$_SESSION['desc007'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '007'");// -- room change
}

else if($input=='w' || $input=='west') 
{
echo 'You travel west<br/>';
 $message="<i>You travel west</i><br/>".$_SESSION['desc001'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '001'");// -- room change
}
else if($input=='e' || $input=='east') 
{
if ($row['chest1'] <= 0){
	echo  $message="<i>You cannot travel to the east yet. You first need what is in the Gold Chest west of here. Help out the Young Soldier to get the Gold Key to open the Chest.</i><br/>";	
   	include ('update_feed.php'); // --- update feed
	}
else{
echo 'You travel east<br/>';
 $message="<i>You travel east</i><br/>".$_SESSION['desc022'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '022'");// -- room change
}
}
else if($input=='n' || $input=='north') 
{
echo 'You travel north<br/>';
 $message="<i>You travel north</i><br/>".$_SESSION['desc021'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '021'");// -- room change
}

// ----------------------------------- end of room function
include ('function-end.php');

}
?>
