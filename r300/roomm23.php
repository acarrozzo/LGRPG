<?php					
								$roomname = "Mine Level 23";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['descm23'];

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');   
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

 	$pickaxe = $row['pickaxe'];
 	$ironpickaxe = $row['ironpickaxe'];
 	$steelpickaxe = $row['steelpickaxe'];
 	$mithrilpickaxe = $row['mithrilpickaxe'];

if($input=='mine here')  
	{ include ('function-mine.php'); // MINE FOR ORE
	}
	
	
// include ('battle-sets/mine22.php');	// ENEMY BATTLE - MINE LEVEL 1-4


// -------------------------------------------------------------------------- Battle TRAVEL
if ((	$input=='n' || $input=='north' || $input=='ne' || $input=='northeast' ||
		$input=='e' || $input=='north' || $input=='se' || $input=='southeast' ||
		$input=='s' || $input=='south' || $input=='sw' || $input=='southwest' ||
		$input=='w' || $input=='west' || $input=='nw' || $input=='northwest' ||
		$input=='u' || $input=='up' || $input=='d' ||  $input=='mine down' || $input=='down' )  && $infight >= 1) {
	echo 'You cannot leave the room in the middle of battle!<br/>';
   	$message="<i>You cannot leave the room in the middle of battle!</i><br/>";
	include ('update_feed.php'); // --- update feed
	}
// -------------------------------------------------------------------------- TRAVEL
else if($input=='u' || $input=='up')  
{			echo 'You travel up the mine<br/>';
   	$message="<i class=''>You travel up the mine</i></br>".$_SESSION['descm22'];
	include ('update_feed.php'); // --- update feed
   								$results = $link->query("UPDATE $user SET room = 'm22'"); // -- room change
   								$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='d' || $input=='mine down' || $input=='down') 
{		
		if ($pickaxe<=0 && $ironpickaxe<=0 && $steelpickaxe<=0 && $mithrilpickaxe<=0) {
			echo $message="<i class='redBG lightgray'>You need a pickaxe to mine down!</i></br>";
			include ('update_feed.php'); // --- update feed
		}
		else {
			echo 'You dig down to mine level 23.<br/>';
   			$message="<i class=''>You dig down to mine level 24 eventually.</i></br>".$_SESSION['descm23'];
			include ('update_feed.php'); // --- update feed
   										$results = $link->query("UPDATE $user SET room = 'm23'"); // -- room change
   										$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
			include ('function-mine.php');	// MINE FOR ORE			
		}
}
// ----------------------------------- end of room function
include ('function-end.php');
}
?>