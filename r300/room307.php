<?php
						$roomname = "Stone Mine - Dwarf Village Square";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc307'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

$teleport5 = $row['teleport5'];

// -------------------------------------------------------------------------- Activate STONE MINE Teleport
if ($teleport5 == 0) { 	
	$results = $link->query("UPDATE $user SET teleport5 = 1");
	echo $message="<i>You can now teleport to the Stone Mine! Click 'stone mine' to teleport to this location at any time. </i><br/>";
	include ('update_feed.php'); // --- update feed	  
	}	


// -------------------------------------------------------------------------- READ SIGN!
else if($input=='read sign') {  //read sign
   echo '   <i>You read the Dwarf Village Directory</i> <br>  ';
   $message="
   <i>you read the sign:</i>   
   <div class='sign'>
   <h3>Dwarf Village<i>Directory</i></h3>
   	<form id='mainForm' method='post' action='' name='formInput'>

<span class='direc'><input type='submit' name='input1' value='northwest' /></span> <span class='hilight'>Dwarf Treasury</span> <i>Gold Chest, Silver Chest</i><br />
<span class='direc'><input type='submit' name='input1' value='north' /></span> <span class='hilight'>Silver Shop</span> <i>Expensive Armor & Weapons</i><br />
<span class='direc'><input type='submit' name='input1' value='northeast' /></span> <span class='hilight'>Neverending Mine</span> <i>Mine Stone, Iron, Coal and Mithril</i><br />
<span class='direc'><input type='submit' name='input1' value='east' /></span> <span class='hilight'>Mining Guild</span> <i>Forge, Mining Supplies & Quests 31-34</i> <br />
<span class='direc'><input type='submit' name='input1' value='south' /></span> <span class='hilight'>Dwarf Guard Bounty Board</span> <i>Quests 38-40</i><br />
<span class='direc'><input type='submit' name='input1' value='southwest' /></span> <span class='hilight'>Stone Mine Crossroads</span> <i>Quests 35-37</i><br />

</form></div>"; include ('update_feed.php'); // --- update feed	
}

// --------------------------------------------------------------------------- REST HEAL
if ($input=="rest"){
		$query = $link->query("UPDATE $user SET hp = $hpmax + 50 "); 
		$query = $link->query("UPDATE $user SET mp = $mpmax + 50 "); 
		echo $message = "You rest at the roaring furnace and supercharge! (+50 HP, +50 MP)<br/>";
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
else if($input=='nw' || $input=='northwest') 
{			echo 'You travel northwest<br/>';
   	$message="<i>You travel northwest</i></br>".$_SESSION['desc309'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = 309"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='n' || $input=='north') 
{			echo 'You travel north<br/>';
   	$message="<i>You travel north</i></br>".$_SESSION['desc310'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = 310"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='ne' || $input=='northeast') 
{			echo 'You travel northeast<br/>';
   	$message="<i>You travel northeast</i></br>".$_SESSION['desc311'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = 311"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='e' || $input=='east') 
{			echo 'You travel east<br/>';
   	$message="<i>You travel east</i></br>".$_SESSION['desc308'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = 308"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='sw' || $input=='southwest') 
{			echo 'You travel southwest<br/>';
   	$message="<i>You travel southwest</i></br>".$_SESSION['desc303'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = 303"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='s' || $input=='south') 
{			echo 'You travel south<br/>';
   	$message="<i>You travel south</i></br>".$_SESSION['desc306'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = 306"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}






// ----------------------------------- end of room function
include ('function-end.php');
}
?>