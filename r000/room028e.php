<?php
$roomname = "Bat Nest";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc028e'];
//$dangerLVL = $_SESSION['dangerLVL'] = "3"; // danger level


include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 


 	$infight = $row['infight'];
 	$endfight = $row['endfight'];
 	$enemy=$row['enemy'];


// -------------------------------------------------------------------------- After Battle - SAFE ROOM		
if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
		$input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
		$input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
		$input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
		$input!='u' && $input!='up' && $input!='d' && $input!='down' ) { echo "This room is safe.<br/>"; }	
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1) 
	{	$rand = rand (1,10); 
		//echo "<br/>RAND: ".$rand."<br/>";
	}	else {$rand=0;}	
// -------------------------------------------------------------------------- INITIALIZE Bat - 40%
if(($input=='attack bat' || $input=='attack' || $rand <= 4 ) && $infight==0 && $endfight==0) 
	{	if ($input=='attack bat') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Bat'");
		include ('battle.php'); }			
// -------------------------------------------------------------------------- INITIALIZE Golden Bat	- 10%
else if(($input=='attack golden bat' || $rand == 5 ) && $infight==0 && $endfight==0) 
	{	if ($input=='attack golden bat') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Golden Bat'");
		include ('battle.php');	}
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{ 	if($input=='attack golden bat' || $input=='attack bat' || $input=='attack salamander') { $input = 'attack'; }
		include ('battle.php');	}	

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
else if($input=='nw' || $input=='northwest') 
{
	echo 'You travel northwest<br/>';
	$message="<i>You travel northwest</i><br/>".$_SESSION['desc028g'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '028g'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='n' || $input=='north') 
{
	echo 'You travel north<br/>';
	$message="<i>You travel north</i><br/>".$_SESSION['desc028f'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '028f'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='e' || $input=='east') 
{
	echo 'You travel east<br/>';
	$message="<i>You travel east</i><br/>".$_SESSION['desc028b'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '028b'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='ne' || $input=='northeast') 
{
	echo 'You travel northeast<br/>';
	$message="<i>You travel northeast</i><br/>".$_SESSION['desc028d'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '028d'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
// ----------------------------------- end of room function
include ('function-end.php');

}

?>

