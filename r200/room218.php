<?php
						$roomname = "Red Town Courtyard";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc218'];
//$dangerLVL = $_SESSION['dangerLVL'] = "1"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

include ('battle-sets/thief.php');



// -------------------------------------------------------------------------- READ SIGN!
if($input=='read sign') {  //read sign
   echo '   <i>You read the Red Town Courtyard Directory</i> <br>  ';
   $message="
   <i>you read the sign:</i>   
   <div class='sign'>
   <h3>Red Courtyard<i>Directory</i></h3>
   	<form id='mainForm' method='post' action='' name='formInput'>

<span class='direc'><input type='submit' name='input1' value='north' /></span> <span class='hilight'>Vacant Lot</span> <i>northing (for now)</i><br />
<span class='direc'><input type='submit' name='input1' value='east' /></span> <span class='hilight'>Quinn's Potion Shop</span> <i>Potent Potions</i><br />
<span class='direc'><input type='submit' name='input1' value='south' /></span> <span class='hilight'>Back Alley</span> <i>South Sewer Entrance</i><br />
<span class='direc'><input type='submit' name='input1' value='west' /></span> <span class='hilight'>Grand Square</span> <i>Red Town Center</i><br />
<span class='direc'><input type='submit' name='input1' value='northeast' /></span> <span class='hilight'>Town Hall</span> <i>Quests 21-24</i><br />
<span class='direc'><input type='submit' name='input1' value='southeast' /></span> <span class='hilight'>Red Town Docks</span> <i>Currently Closed</i> <br />

---------------------------------------------------</br>
<span class='hilight'>TOWN HALL</span> 
Go Northeast to reach the Lobby (Quests 21-23), Mayor Rudolf (Quest 24), and Babylon Gardens (Gold Chest).<br/>
---------------------------------------------------</br>
</form></div>"; include ('update_feed.php'); // --- update feed	
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
else if($input=='s' || $input=='south') 
{  echo 'You travel south<br/>';
   $message="<i>You travel south</i></br>".$_SESSION['desc234'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 234"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}

else if($input=='w' || $input=='west') 
{	echo 'You travel west<br/>';
   $message="<i>You travel west</i></br>".$_SESSION['desc217'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 217"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}

else if($input=='n' || $input=='north') 
{	echo 'You travel north<br/>';
   $message="<i>You travel north</i></br>".$_SESSION['desc219'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 219"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}

else if($input=='e' || $input=='east') 
{	echo 'You travel east<br/>';
   $message="<i>You travel east</i></br>".$_SESSION['desc220'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 220"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='ne' || $input=='northeast') 
{	echo 'You travel northeast<br/>';
   $message="<i>You travel northeast</i></br>".$_SESSION['desc221'];
  include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 221"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}

else if($input=='se' || $input=='southeast') 
{	echo 'You travel southeast<br/>';
   $message="<i>You travel southeast</i></br>".$_SESSION['desc235'];
   include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 235"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='d' || $input=='down') 
{	echo 'You travel down<br/>';
   $message="<i>You travel down</i></br>".$_SESSION['desc232c'];
   include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '232c'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}




// ----------------------------------- end of room function
include ('function-end.php');
}
?>
