<?php
$roomname = "Goblin Tracks";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc028g'];
//$dangerLVL = $_SESSION['dangerLVL'] = "5"; // danger level


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
// -------------------------------------------------------------------------- INITIALIZE Goblin - 40%
if(($input=='attack goblin' || $input=='attack' || $rand >= 7 ) && $infight==0 && $endfight==0) 
	{	if ($input=='attack goblin') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Goblin'");
		include ('battle.php'); }	
// -------------------------------------------------------------------------- INITIALIZE Salamander - 10%
else if(($input=='attack salamander' || $rand == 1 ) && $infight==0 && $endfight==0) 
	{	if ($input=='attack salamander') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Salamander'");
		include ('battle.php'); }			
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{ 	if($input=='attack goblin' || $input=='attack salamander') { $input = 'attack'; }
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


else if($input=='read sign') {  //read sign
   echo	$message="<i>you read the sign:</i> <br />
----------------------------<br />
GOBLIN TERRITORY <br/>
Get out and stay out! <br/>
----------------------------</br>";
	include ('update_feed.php'); // --- update feed	
}


// -------------------------------------------------------------------------- TRAVEL
else if($input=='n' || $input=='north') 
{
	echo 'You travel north<br/>';
	$message="<i>You travel north</i><br/>".$_SESSION['desc028h'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '028h'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	$_SESSION['goblinsearch'] = 0;	
}
else if($input=='e' || $input=='east') 
{
	echo 'You travel east<br/>';
	$message="<i>You travel east</i><br/>".$_SESSION['desc028f'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '028f'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='se' || $input=='southeast') 
{
	echo 'You travel southeast<br/>';
	$message="<i>You travel southeast</i><br/>".$_SESSION['desc028e'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '028e'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
// ----------------------------------- end of room function
include ('function-end.php');

}

?>
