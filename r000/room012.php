<?php
				$roomname = "Scorpion Pit Entrance";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc012'];
//$dangerLVL = $_SESSION['dangerLVL'] = "5"; // danger level
  

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 
	$infight = $row['infight']; $endfight = $row['endfight']; $enemy=$row['enemy'];
	
// -------------------------------------------------------------------------- After Battle - SAFE ROOM		
if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
		$input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
		$input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
		$input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
		$input!='u' && $input!='up' && $input!='d' && $input!='down' ) { echo "This room is safe.<br/>"; }		
// -------------------------------------------------------------------------- If room ready create random rand #
if ($infight < 1 && $endfight != 1 && $input!='attack alpha scorpion' && $input!='attack giant spider' && $input!='attack' && $input!='a') 
	{	$rand = rand (1,10); 
	}	else {$rand=0;}
// -------------------------------------------------------------------------- After Battle - SAFE ROOM		
if ($endfight == 1 && $input != 'sw') { echo "This room is safe.<br/>"; }	
// -------------------------------------------------------------------------- INITIALIZE ALPHA	2/10
else if(($input=='attack alpha scorpion' || $rand >= 8 ) && $infight==0 && $endfight==0) 
	{
		if ($input=='attack alpha scorpion') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Alpha Scorpion'");
		include ('battle.php');
	}
// -------------------------------------------------------------------------- INITIALIZE giant spider	2/10
else if(($input=='attack giant spider' || $rand <= 2 ) && $infight==0 && $endfight==0) 
	{
		if ($input=='attack giant spider') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Giant Spider'");
		include ('battle.php');
	}
	
// -------------------------------------------------------------------------- IN BATTLE		
else if ($infight >=1 ) 
	{
	if($input=='attack alpha scorpion' || $input=='attack giant spider') { $input = 'attack'; }
	include ('battle.php');
	}




// -------------------------------------------------------------------------- ROOM ACTIONS

else if($input=='read signXXOLD') {  //read sign
   echo	$message="<i>you read the sign:</i> <br />
-------------------------------------------<br />
SCORPION PIT BELOW!<br/>
VERY dangerous scorpions live below. You will need to be prepared if you wish to reach the end and defeat the king.
</br>
-------------------------------------------</p>";
	include ('update_feed.php'); // --- update feed	

}
// -------------------------------------------------------------------------- READ SIGN!
if($input=='read sign') {  //read sign
   echo	 '<i>You read the Scorpion Pit Entrance sign</i><br>';
   
   $message="
   <i>you read the sign:</i>   
   <div class='sign'>
   <span class='red px30'>Scorpion Pit </span>
   <span class='px20'>Entrance</span><br>
---------------------------------------------------<br>
VERY dangerous scorpions live below. <br>
---------------------------------------------------<br>
You will need to be prepared if you wish to reach the end and defeat the <span class='red'> Scorpion King!</span><br>
---------------------------------------------------
</div>
";
	include ('update_feed.php'); // --- update feed	

}		




// -------------------------------------------------------------------------- Battle TRAVEL
else if ((	$input=='n' || $input=='north' || $input=='ne' || $input=='northeast' ||
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
{
	echo 'You travel southwest<br/>';
 	$message="<i>You travel southwest</i><br/>".$_SESSION['desc010'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	$results = $link->query("UPDATE $user SET room = '010'"); // -- room change
}
else if($input=='w' || $input=='west') 
{
	echo 'You travel west<br/>';
 	$message="<i>You travel west</i><br/>".$_SESSION['desc011'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	$results = $link->query("UPDATE $user SET room = '011'"); // -- room change
}
else  if($input=='d' || $input=='down') 
{
	echo 'You travel down further into the scorpion pit<br/>';
 	$message="<i>You travel down further into the scorpion pit</i><br/>".$_SESSION['desc012b'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	$results = $link->query("UPDATE $user SET room = '012b'"); // -- room change
}

// ----------------------------------- end of room function
include ('function-end.php');

}
?>
