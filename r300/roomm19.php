<?php					
								$roomname = "Mine Level 19";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['descm19'];

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
	
	
// include ('battle-sets/mine16.php');	// ENEMY BATTLE - MINE LEVEL 1-4

// -------------------------------------------------------------------------- After Battle - SAFE ROOM		
if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
		$input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
		$input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
		$input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
		$input!='u' && $input!='up' && $input!='d' && $input!='down' ) { echo "This room is safe.<br/>"; }	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1)  // -UNDER OCEAN RAND GENERATOR
	{	$rand = rand (1,10); }	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE 4/10
if(($rand == 1 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Black Frog'"); include ('battle.php'); } // - 1/10
else if(($rand == 2 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Steel Gator'"); include ('battle.php'); }		
else if(($rand == 3 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Steel Golem'"); include ('battle.php'); }
else if(($rand == 4 ) && $infight==0 && $endfight==0) 
	{	
		$rand2 = rand(1,5);
		if($rand2 == 1 ) { $results = $link->query("UPDATE $user SET enemy = 'Earth Golem'"); include ('battle.php'); } // - 1/
		if($rand2 == 2 ) { $results = $link->query("UPDATE $user SET enemy = 'Gamma Monk'"); include ('battle.php'); } //
		if($rand2 == 3 ) { $results = $link->query("UPDATE $user SET enemy = 'Stone Assassin'"); include ('battle.php'); } // - 1/
		if($rand2 == 4 ) { $results = $link->query("UPDATE $user SET enemy = 'Stone Assassin'"); include ('battle.php'); } // - 1/
		if($rand2 == 5 ) { $results = $link->query("UPDATE $user SET enemy = 'Gamma Monk'"); include ('battle.php'); } // - 1/
	}
// -------------------------------------------------------------------------- IN BATTLE	
	
else if ($infight >=1 ) { include ('battle.php'); }	



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
   	$message="<i class=''>You travel up the mine</i></br>".$_SESSION['descm18'];
	include ('update_feed.php'); // --- update feed
   								$results = $link->query("UPDATE $user SET room = 'm18'"); // -- room change
   								$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='d' || $input=='mine down' || $input=='down') 
{		
		if ($pickaxe<=0 && $ironpickaxe<=0 && $steelpickaxe<=0 && $mithrilpickaxe<=0) {
			echo $message="<i class='redBG lightgray'>You need a pickaxe to mine down!</i></br>";
			include ('update_feed.php'); // --- update feed
		}
		else {
			echo 'You dig down to mine level 20.<br/>';
   			$message="<i class=''>You dig down to mine level 20.</i></br>".$_SESSION['descm20'];
			include ('update_feed.php'); // --- update feed
   										$results = $link->query("UPDATE $user SET room = 'm20'"); // -- room change
   										$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
			include ('function-mine.php');	// MINE FOR ORE			
		}
}
// ----------------------------------- end of room function
include ('function-end.php');
}
?>