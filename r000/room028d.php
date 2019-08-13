<?php
$roomname = "Bat Cave";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc028d'];
//$dangerLVL = $_SESSION['dangerLVL'] = "2"; // danger level


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
// -------------------------------------------------------------------------- INITIALIZE Bat - 30%
if(($input=='attack bat' || $input=='attack' || $rand >= 8 ) && $infight==0 && $endfight==0) 
	{	if ($input=='attack bat') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Bat'");
		include ('battle.php'); }
// -------------------------------------------------------------------------- INITIALIZE Golden Bat	- 10%
else if(($input=='attack golden bat' || $rand <= 1 ) && $infight==0 && $endfight==0) 
	{	if ($input=='attack golden bat') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Golden Bat'");
		include ('battle.php');	}
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{ 	if($input=='attack golden bat' || $input=='attack bat') { $input = 'attack'; }
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
The Golden Bat is significantly stronger than the regular bat, but drops some serious $currency! <br/>
----------------------------</br>";
	include ('update_feed.php'); // --- update feed	
}

// -------------------------------------------------------------------------- TRAVEL
else if($input=='sw' || $input=='southwest') 
{
	echo 'You travel southwest<br/>';
	$message="<i>You travel southwest</i><br/>".$_SESSION['desc028e'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '028e'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='se' || $input=='southeast') 
{
	echo 'You travel southeast<br/>';
	$message="<i>You travel southeast</i><br/>".$_SESSION['desc028c'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '028c'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
// ----------------------------------- end of room function
include ('function-end.php');

}

?>
