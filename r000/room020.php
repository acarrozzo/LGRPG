<?php
$roomname = "Healing Springs";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc020'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 

	$hpmax=$row['hpmax'];   
		$mpmax=$row['mpmax'];   
		   
		$hp=$row['hp'];   
		$mp=$row['mp'];
		
	
// -------------------------------------------------------------------------- ROOM ACTIONS
// --------------------------------------------------------------------------- REST HEAL
if ($input=="rest"){
	//$sql = "SELECT * FROM $username";
// -------------------------DB OUTPUT!

		$query = $link->query("UPDATE $user SET hp = $hpmax + 10 "); 
		$query = $link->query("UPDATE $user SET mp = $mpmax + 2 "); 
		echo $message = "You rest at the waterfall and supercharge your HP and MP!<br/>";
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	
}


// -------------------------------------------------------------------------- TRAVEL
else if($input=='east' || $input=='e') 
{	echo 'You travel east<br/>';
 	$message="<i>You travel east</i><br/>".$_SESSION['desc005'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '005'"); // -- room change
}
else if($input=='south' || $input=='s') 
{	echo 'You travel south<br/>';
 	$message="<i>You travel south</i><br/>".$_SESSION['desc004'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '004'"); // -- room change
}
else if($input=='southeast' || $input=='se') 
{	echo 'You travel southeast<br/>';
 	$message="<i>You travel southeast</i><br/>".$_SESSION['desc001'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '001'"); // -- room change
}
else if($input=='nw' || $input=='northwest') 
{			
	if ($_SESSION['flying'] >= 1)
		{
		echo 'You fly up the waterfall.<br/>';
   		$message="<i>You fly up the waterfall.</i></br>".$_SESSION['desc020'];
		include ('update_feed.php');   // --- update feed
   			   $results = $link->query("UPDATE $user SET room = '020'"); // -- room change
   			   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		}
	else{
 		echo $message="<i>You will not be able to go northwest unless you are flying. Find/buy a wings potion or cast a wings spell to fly</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}


// ----------------------------------- end of room function
include ('function-end.php');
}
?>
