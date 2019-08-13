<?php
						$roomname = "Lost in the Trees";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc514'];

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   


// -------------------------------------------------------------------------- BATTLE VARIABLES		
 	$infight = $row['infight'];
 	$endfight = $row['endfight'];
 	$enemy=$row['enemy'];
	
include ('battle-sets/dark-forest.php');
include ('function-choptree.php');

if ($input == 'search')
{
	echo $message="You search the trees and somehow get even more lost.<br/>";
	include ('update_feed.php'); // --- update feed
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
else if($input=='sw' || $input=='southwest') 
{			echo 'you attempt to go southwest but end up going southeast<br/>';
   	$message="<i>you attempt to go southwest but end up going southeast</i></br>".$_SESSION['desc514'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '514'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='se' || $input=='southeast') 
{			echo 'you attempt to go southeast but end up going northeast<br/>';
   	$message="<i>you attempt to go southeast but end up going northeast</i></br>".$_SESSION['desc514'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '514'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='nw' || $input=='northwest') 
{			echo 'you attempt to go northwest but end up going southwest<br/>';
   	$message="<i>you attempt to go northwest but end up going southwest</i></br>".$_SESSION['desc514'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '514'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='ne' || $input=='northeast') 
{			echo 'you attempt to go northeast but actually go northwest. you somehow arrive at the base of a massive tree which claims home to the Ranger’s Guild.<br/>';
   	$message="<i>you attempt to go northeast but actually go northwest. you somehow arrive at the base of a massive tree which claims home to the Ranger’s Guild.</i></br>".$_SESSION['desc515'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '515'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='w' || $input=='west') 
{			echo 'you attempt to go west but end up going south<br/>';
   	$message="<i>you attempt to go west but end up going south</i></br>".$_SESSION['desc514'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '514'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='e' || $input=='east') 
{			echo 'you attempt to go east but end up going north<br/>';
   	$message="<i>you attempt to go east but end up going north</i></br>".$_SESSION['desc514'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '514'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='n' || $input=='north') 
{			echo 'you attempt to go north but end up going west<br/>';
   	$message="<i>you attempt to go north but end up going west</i></br>".$_SESSION['desc514'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '514'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='s' || $input=='south') 
{			echo 'You travel south and somehow go east and are no longer lost<br/>';
   	$message="<i>You travel south and somehow go east and are no longer lost</i></br>".$_SESSION['desc509'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '509'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}






// ----------------------------------- end of room function
include ('function-end.php');
}
?>