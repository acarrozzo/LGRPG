<?php
						$roomname = "Under the Grotto";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc321b'];
//$dangerLVL = $_SESSION['dangerLVL'] = "20"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   


$grottogloves=$row['grottogloves']; 






// -------------------------------------------------------------------------------------------------------------- BATTLE VARIABLES		
 	$infight = $row['infight']; $endfight = $row['endfight']; $enemy=$row['enemy'];
// -------------------------------------------------------------------------- After Battle - SAFE ROOM		
if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
		$input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
		$input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
		$input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
		$input!='u' && $input!='up' && $input!='d' && $input!='down' ) { echo "This room is safe.<br/>"; }	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1)  // RAND GENERATOR
	{	$rand = rand (1,15); }	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE - 4/15
if(($rand <= 4 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Demon Wing'"); include ('battle.php'); }
// -------------------------------------------------------------------------- INITIALIZE - 1/15 or
else if(($rand == 5 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Golden Bat'"); include ('battle.php'); }		
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	
// -------------------------------------------------------------------------- END BATTLE BLOCK



// ------------------------------------------------------------ ex gloves
if($input=='ex gloves') { 
   echo $message="<i>The gloves seem to be an antiquated offering. They are covered in a thick layer of dust and I don't think anyone will mind if you GRAB GLOVES.</i><br>";
   include ('update_feed.php'); // --- update feed
}
// ------------------------------------------------------------ get gloves
if($input=='grab gloves' || $input=='get gloves' || $input=='GRAB GLOVES') { 
   	if ($grottogloves >= 1) {
		echo $message='<i>You hear a loud voice come from all around you, "The Dwarven gods only allow you to have 1 pair of grotto gloves!!!"</i><br>';
   		include ('update_feed.php'); // --- update feed	
	}
	else{
	echo $message="<i>You grab the magical Grotto Gloves! Look at you go.</i><br>";
   	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET grottogloves = 1");
	}
}

if ($input == 'search')
{
	$rand = rand (1,2); //10
	if ($rand == 1) {
		$rand2 = rand(1,5);
		if ($rand2 ==1){
			echo $message="You search the lower grotto and find a Blue Potion!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET bluepotion = bluepotion + 1");
		}
		if ($rand2 ==2){
			echo $message="You search the lower grotto and find a Red Potion!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET redpotion = redpotion + 1");
		}
		if ($rand2 ==3){
			echo $message="You search the lower grotto and find 2 Javelins!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET javelin = javelin + 2");
		}
		if ($rand2 ==4){
			$rand3 = rand(5,15);
			echo "You search the lower grotto and find ".$rand3." bolts!<br/>";
			$message="You search the lower grotto and find $rand3 bolts!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET bolts = bolts + $rand3");
		}
		if ($rand2 ==5){
			$rand3 = rand(100,200);
			echo "You search the lower grotto and find ".$rand3." coin!<br/>";
			$message="You search the lower grotto and find $rand3 coin!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET currency = currency + $rand3");
		}
	}
	else {
		echo $message="You search the lower grotto and find nothing, you should search again.<br/>";
		include ('update_feed.php'); // --- update feed
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
else if($input=='u' || $input=='up') 
{	echo 'You go up:<br/>';
   	$message="<i>You go up</i></br>".$_SESSION['desc321'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '321'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}

// ----------------------------------- end of room function
include ('function-end.php');
}
?>