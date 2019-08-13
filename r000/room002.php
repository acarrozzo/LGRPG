 <?php
// -- 002 -- Grassy Field South
$roomname = "Grassy Field South";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc002'];
////$dangerLVL = $_SESSION['dangerLVL'] = "222"; // danger level


include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 

$chest1 = $row['chest1'];
$quest7 = $row['quest7'];

// -------------------------------------------------------------------------- ROOM ACTIONS

if($input=='pick redberry' ||$input=='pick 5 redberry' || $input=='pick berry')  // ---- PICK REDBERRY
{
    $check=$row['redberry'];
	if ( $check >= 5 )
	{
	echo $message="<div class='menuAction'><i class='fa fa-times-circle red'></i>You already have a bunch of redberries! Come back if you run low.</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You pick up 5 redberries!</div>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET redberry = 5");
	}
}

// -------------------------------------------------------------------------- TRAVEL
else if($input=='n' || $input=='north') 
{
	echo 'You travel north<br/>';
	$message="<i>You travel north</i><br/>".$_SESSION['desc001'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '001'"); // -- room change
	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	}

else if($input=='w' || $input=='west') 
{
	echo 'You travel west<br/>';
  	$message="<i>You travel west</i><br/>".$_SESSION['desc003'];
	include ('update_feed.php'); // --- update feed
 	$results = $link->query("UPDATE $user SET room = '003'"); // -- room change
	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	}
	
else if($input=='e' || $input=='east') 
{
	echo 'You travel east<br/>';
   	$message="<i>You travel east</i><br/>".$_SESSION['desc007'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '007'"); // -- room change
	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	}
	
	
	else if($input=='s' || $input=='south') 
{
	
	if ($row['chest1'] <= 0){
		echo $message="<div class='menuAction'><i class='fa fa-times-circle red'></i>You cannot travel to the south yet! You first need what is in the Gold Chest north of here. Help out the Young Soldier to get the Gold Key.</div>";			
   	include ('update_feed.php'); // --- update feed

	}	
	else{
	echo 'You travel south<br/>';
   $message="<i>You travel south</i><br/>".$_SESSION['desc026'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '026'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
 
	}
   }

// ----------------------------------- end of room function
include ('function-end.php');

}

?>
