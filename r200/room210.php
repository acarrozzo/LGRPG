<?php
						$roomname = "Red Town Grand Square";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc210'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

   			$results = $link->query("UPDATE $user SET craftingtable = '210'"); // -- set room to crafting table
   			$results = $link->query("UPDATE $user SET fire = '210'"); // -- set fire to room

$teleport3 = $row['teleport3'];
// -------------------------------------------------------------------------- Activate Red Town Teleport
if ($teleport3 == 0) { 	
	$results = $link->query("UPDATE $user SET teleport3 = 1");
	echo $message="<i>You can now teleport to the Red Town square! Click 'red town' to teleport to this location at any time. </i><br/>";
	include ('update_feed.php'); // --- update feed	  
	}	
// -------------------------------------------------------------------------- READ SIGN!
else if($input=='read sign') {  //read sign
   echo '   <i>You read the Red Town Directory</i> <br>  ';
   $message="
   <i>you read the sign:</i>   
   <div class='sign'>
   <h3>Red Town<i>Directory</i></h3>
   	<form id='mainForm' method='post' action='' name='formInput'>

<span class='direc'><input type='submit' name='input1' value='north' /></span> <span class='hilight'>Red Guard</span> <i>Quests 11-13</i><br />
<span class='direc'><input type='submit' name='input1' value='east' /></span> <span class='hilight'>Town Hall</span> <i>Quests 21-24</i><br />
<span class='direc'><input type='submit' name='input1' value='south' /></span> <span class='hilight'>Back Alley</span> <i>Sewer Entrance</i><br />
<span class='direc'><input type='submit' name='input1' value='west' /></span> <span class='hilight'>Town Exit</span> <i>Path to Stone Mine</i><br />
<span class='direc'><input type='submit' name='input1' value='northeast' /></span> <span class='hilight'>Adam's General Store</span><i></i><br />
<span class='direc'><input type='submit' name='input1' value='southwest' /></span> <span class='hilight'>Michael's Weapon Shop</span> <i></i> <br /><span class='direc'><input type='submit' name='input1' value='northwest' /></span> <span class='hilight'>Warrior's Guild</span><i></i><br />
<span class='direc'><input type='submit' name='input1' value='southeast' /></span> <span class='hilight'>Wizard's Guild</span><i></i> <br />

---------------------------------------------------</br>
<span class='hilight'>Red Guard</span> 
Complete any quest from the Red Guard and gain access to the forest.<br/>
---------------------------------------------------</br>
<span class='hilight'>Guilds</span> 
You will find Guilds scattered throughout the land. Guilds are always a great places to learn newer and stronger skills and spells.<br/>
---------------------------------------------------
</form></div>"; include ('update_feed.php'); // --- update feed	
}
// -------------------------------------------------------------------------- ROOM ACTIONS
 if($input=='read signOLD') {  //read sign
   echo	$message="<i>you read the sign:</i> <br />
-------------------------------------------<br />
RED TOWN DIRECTORY<br/>
N - Red Guard<br/>
NE - General Shop<br/>
E - Town Hall, Potion Shop, Docks<br/>
SE - Wizards Guild<br/>
S - Meat Stand, South Gate<br/>
SW - Weapon Shop<br/>
W - Town Exit, Stone Mines<br/>
NW - Fighters Guild<br/>
-------------------------------------------</p>";
	include ('update_feed.php'); // --- update feed	

}


// --------------------------------------------------------------------------- REST HEAL
if ($input=="rest"){
		$query = $link->query("UPDATE $user SET hp = $hpmax + 25 "); 
		$query = $link->query("UPDATE $user SET mp = $mpmax + 25 "); 
		echo $message = "You rest at the fountain and supercharge your HP & MP!<br/>";
		include ('update_feed.php'); // --- update feed
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
else if($input=='s' || $input=='south') 
{  echo 'You travel south<br/>';
   $message="<i>You travel south</i></br>".$_SESSION['desc228'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 228"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}

else if($input=='w' || $input=='west') 
{	echo 'You travel west<br/>';
   $message="<i>You travel west</i></br>".$_SESSION['desc209'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 209"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}

else if($input=='sw' || $input=='southwest') 
{	echo 'You travel southwest<br/>';
   $message="<i>You travel southwest</i></br>".$_SESSION['desc227'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 227"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}

else if($input=='n' || $input=='north') 
{	echo 'You travel north<br/>';
   $message="<i>You travel north</i></br>".$_SESSION['desc211'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 211"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}

else if($input=='e' || $input=='east') 
{	echo 'You travel east<br/>';
   $message="<i>You travel east</i></br>".$_SESSION['desc217'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 217"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='ne' || $input=='northeast') 
{	echo 'You travel northeast<br/>';
   $message="<i>You travel northeast</i></br>".$_SESSION['desc216'];
  include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 216"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='nw' || $input=='northwest') 
{	echo 'You travel northwest<br/>';
   $message="<i>You travel northwest</i></br>".$_SESSION['desc226'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 226"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}

else if($input=='se' || $input=='southeast') 
{	echo 'You travel southeast<br/>';
   $message="<i>You travel southeast</i></br>".$_SESSION['desc225'];
   include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 225"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}



// ----------------------------------- end of room function
include ('function-end.php');
}
?>
