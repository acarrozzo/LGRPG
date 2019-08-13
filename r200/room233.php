<?php
						$roomname = "Red Town - Turn in the Back Alley";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc233'];
//$dangerLVL = $_SESSION['dangerLVL'] = "3"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

include ('battle-sets/thief2.php'); // 1/20 thief encounter




if ($input == 'search')
{
	$rand = rand (1,2);
	if ($rand !=2)
	{
		echo 'You search and find nothing, you should try searching again.<br/>';
	$message="You search and find nothing, you should try searching again.<br/>";
	include ('update_feed.php'); // --- update feed
		
	}
	else {
		echo 'You search the room and find a hidden thief passageway to the southeast!<br/>';
	$message="You search the room and find a hidden thief passageway to the southeast!<br/>";
	include ('update_feed.php'); // --- update feed
	$_SESSION['shadysearch'] = 1; 
	}
	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
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
else if($input=='w' || $input=='west') 
{	echo 'You travel west<br/>';
   $message="<i>You travel west</i></br>".$_SESSION['desc232'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 232"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   		$_SESSION['shadysearch'] = 0; 
}
else if($input=='nw' || $input=='northwest') 
{	echo 'You travel northwest<br/>';
   $message="<i>You travel northwest</i></br>".$_SESSION['desc234'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 234"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
      	$_SESSION['shadysearch'] = 0; 

}
else if($input=='se' || $input=='southeast') 
{ 
	if ($_SESSION['shadysearch'] != 1) 
	{ 
	echo "You don't see an exit to the southeast. It's really dark but you should try searching.<br/>";
	$message="<i>You don't see an exit to the southeast. It's really dark but you should try searching.</i><br/>";
	include ('update_feed.php'); // --- update feed
   	
	}
	else {
	echo 'You travel southeast through a secret thief passageway!<br/>';
	$message="<i>You travel southeast through a secret thief passageway</i><br/>".$_SESSION['desc232mm'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '232mm'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	$_SESSION['shadysearch'] = 0;
	}
}





// ----------------------------------- end of room function
include ('function-end.php');
}
?>
