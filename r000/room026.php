<?php
// -- 026 -- Stone Path South
$roomname = "Stone Path South";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc026'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level


include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 



// -------------------------------------------------------------------------- TRAVEL
if($input=='n' || $input=='north') 
{
	echo 'You travel north<br/>';
	$message="<i>You travel north</i><br/>".$_SESSION['desc002']; 
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '002'"); // -- room change
	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	}
	
	else if($input=='s' || $input=='south') 
{

	echo 'You travel south<br/>';
   $message="<i>You travel south</i><br/>".$_SESSION['desc027'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '027'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
 
   }
else if($input=='sw' || $input=='southwest') 
{
	echo 'You travel southwest<br/>';
	$message="<i>You travel southwest</i><br/>".$_SESSION['desc028'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '028'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
// ----------------------------------- end of room function
include ('function-end.php');

}

?>
