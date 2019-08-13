<?php
						$roomname = "Highway Toll | Mountain Gate";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc504'];

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   


	$cash = $row['currency'];

// -------------------------------------------------------------------------- BATTLE VARIABLES		
 	$infight = $row['infight'];
 	$endfight = $row['endfight'];
 	$enemy=$row['enemy'];
	
	 
	
	
// -------------------------------------------------------------------------- READ SIGN!
if($input=='read sign') {  //read sign
   echo	 '<i>You read the Highway Toll Sign.</i><br>';
   
   $message="
   <i>you read the sign:</i>   
   <div class='sign darkgrayBG'>
---------------------------------------------------<br>
<span class='px25 lgray'>Pay up to Pass!</span><br>
<span class='blue'>It costs 1000 ".$_SESSION['currency']." to pass</span><br>
---------------------------------------------------<br>
( Or you can just attack the Highwayman and be on your way. Be careful though, they are a difficult Level 25. )<br>
---------------------------------------------------<br>
</div>
";
	include ('update_feed.php'); // --- update feed	

}		
// -------------------------------------------------------------------------- PAY TOLL 1000
else if ($input == 'pay toll')
{
	if ($cash < 1000) {
		echo $message="<div class='menuAction'><i class='fa fa-times lightred'></i>You don't have 1000 ".$_SESSION['currency']." to pay the toll.</div>";	
		include ('update_feed.php'); // --- update feed	
	}
	else if ($endfight >= 1) {
		echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up''></i>You don't have to pay the toll. Just go west, the gate is already open.</div>";	
		include ('update_feed.php'); // --- update feed	
	}
	else {echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up'></i>You give the Highwayman 1000 ".$_SESSION['currency'].". You can now go west.</div>";
	include ('update_feed.php'); // --- update feed
	$query = $link->query("UPDATE $user SET currency = currency - 1000"); 
   			$results = $link->query("UPDATE $user SET endfight = 1"); // -- close fight
   			$results = $link->query("UPDATE $user SET infight = 0"); 
			$message= 'TOLL PAID - GO WEST';
	}
}

	
// -------------------------------------------------------------------------- BATTLE SET - Dark Forest Mountain Path
	
// -------------------------------------------------------------------------- After Battle - SAFE ROOM		
if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
		$input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
		$input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
		$input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
		$input!='u' && $input!='up' && $input!='d' && $input!='down' ) { echo "This room is safe.<br/>"; }	

// -------------------------------------------------------------------------- INITIALIZE highwayman 1/8
if(($input == 'attack' || $input == 'fight highwayman' ) && $infight==0 && $endfight==0) 
	{	$results = $link->query("UPDATE $user SET enemy = 'Highwayman'"); include ('battle.php'); }	

	
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) { include ('battle.php'); }	










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
else if($input=='e' || $input=='east') 
{			echo 'You travel east<br/>';
   	$message="<i>You travel east</i></br>".$_SESSION['desc503'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '503'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='w' || $input=='west') 
{			
if ($endfight >= 1 && $infight == 0)
	{
		echo 'You travel west over the body of the Highwayman you just defeated.<br/>';
	 	$message="<i>You travel west over the body of the Highwayman you just defeated.</i><br/>".$_SESSION['desc601'];
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET room = '601'"); // -- room change
		$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	}
	else if ($infight == 0)
	{
		echo $message="<i class='px20'>You attempt to go west past the toll and are attacked by a Highwayman!</i><br/>";
		include ('update_feed.php'); // --- update feed	
		$results = $link->query("UPDATE $user SET enemy = 'Highwayman'"); include ('battle.php'); 
	}
}




// ----------------------------------- end of room function
include ('function-end.php');
}
?>