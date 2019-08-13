<?php
						$roomname = "Stone Grotto";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc321'];
//$dangerLVL = $_SESSION['dangerLVL'] = "25"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

		$endfight = $row['endfight'];




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
	{	$rand = rand (1,10); }	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE - 3/10
if(($rand <= 3 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Possessed Axeman'"); include ('battle.php'); }
// -------------------------------------------------------------------------- INITIALIZE - 1/10
else if(($rand == 4 ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Demon Wing'"); include ('battle.php'); }		
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	
// -------------------------------------------------------------------------- END BATTLE BLOCK




if ($input == 'search')
{
	$rand = rand (1,2); // 50%
	if ($rand == 1) {
		$rand2 = rand(1,5);
		if ($rand2 ==1){
			echo $message="You search the grotto and find a Blue Balm!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET bluebalm = bluebalm + 1");
		}
		if ($rand2 ==2){
			echo $message="You search the grotto and find a Red Balm!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET redbalm = redbalm + 1");
		}
		if ($rand2 ==3){
			echo $message="You search the grotto and find a Meatball!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET meatball = meatball + 1");
		}
		if ($rand2 ==4){
			echo $message="You search the grotto and find a Bluefish!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET bluefish = bluefish + 1");
		}
		if ($rand2 ==5){
			$rand3 = rand(100,200);
			echo "You search the grotto and find ".$rand3." coin!<br/>";
			$message="You search the grotto and find $rand3 coin!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET currency = currency + $rand3");
		}
	}
	else {
		echo $message="You search the grotto and find nothing, you should search again.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}


$randMessage = rand(1,10);
if ($randMessage == 1 && $infight == 0 ) //$endfight == 1
{
	$rand2 = rand(1,3);
	if ( $rand2 == 1 )	{
		echo $message="<br><i> --- you get an uneasy feeling that some sort of spirit is around.</i><br>";
   		include ('update_feed_alt.php'); // --- update feed
	}
	else if ( $rand2 == 2 )	{
		echo $message="<br><i> --- you hear a rumbling come from the ground.</i><br>";
   		include ('update_feed_alt.php'); // --- update feed
	}
	else if ( $rand2 == 3 )	{
		echo $message="<br><i> --- you feel both warm and cold.</i><br>";
   		include ('update_feed_alt.php'); // --- update feed
	}
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
else if($input=='ne' || $input=='northeast') 
{			echo 'You travel northeast<br/>';
   	$message="<i>You travel northeast</i></br>".$_SESSION['desc319'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '319'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='d' || $input=='down') 
{	echo 'You descend below the Grotto:<br/>';
   	$message="<i>You descend below the Grotto</i></br>".$_SESSION['desc321b'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '321b'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}







// ----------------------------------- end of room function
include ('function-end.php');
}
?>