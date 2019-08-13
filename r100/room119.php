<?php
						$roomname = "In the Forest by a Gold Chest";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc119'];
//$dangerLVL = $_SESSION['dangerLVL'] = "5-13"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

$chest2 = $row['chest2'];
$goldkey = $row['goldkey'];

include ('battle-sets/forest.php');
include ('function-choptree.php');
	

// ------------------------------------- ------------------------------------- CHEST 2 - FOREST
if($input=='open chest') 
{
	if ($chest2 >= 1) { 	 // --- already opened
	echo $message="<i>You already opened this gold chest. Remember that sweet hunter equipment?</i><br>";
	include ('update_feed.php'); // --- update feed	
	}
	
	else if ($chest2 == 0 &&  $goldkey <= 0) {  // ---- no key	
	echo $message="<i>You need a Gold Key to open this chest. You can get one by completing Quest 18 from Hunter Bill. You can find him to the southwest.</i><br/>";
	include ('update_feed.php'); // --- update feed	
	}
	
	
	else if ($chest2 == 0 || $goldkey >= 1 ) {  // ---- open!
	echo 'You use your golden key to open the chest!<br/>';
	$message="You use your golden key to open the chest!<br/>";
	include ('update_feed.php'); // --- update feed	
	$cash = rand (500,1000);
	$message = "<i>the chest contains:</i>   
	<div class='goldchestopen'>
	<h3>Forest</h3>
	<h3>Gold Chest</h3>
	<p>+ 200 XP</p>
	<p>+ $cash $currency</p>
	<p>+ 20 Wood</p>
	<p>+ 10 Cooked Meat</p>
	<p>+ 3 Purple Potions</p>
	<p>+ 2 Silver Keys</p>
	<p class='px25'>+ Hunter Ring!</p>
	<p class='px25'>+ Hunter Gloves!</p>
	</div>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET xp = xp + 200");
	$results = $link->query("UPDATE $user SET currency = currency + $cash");
	$results = $link->query("UPDATE $user SET wood = wood + 20");
	$results = $link->query("UPDATE $user SET cookedmeat = cookedmeat + 10");
	$results = $link->query("UPDATE $user SET purplepotion = purplepotion + 3");
	$results = $link->query("UPDATE $user SET silverkey = silverkey + 2");
	$results = $link->query("UPDATE $user SET hunterring = hunterring + 1");
	$results = $link->query("UPDATE $user SET huntergloves = huntergloves + 1");
	$results = $link->query("UPDATE $user SET chest2 = 1");
	$results = $link->query("UPDATE $user SET goldkey = goldkey - 1");
}
}
if ($input == 'reset chest')
{
	$results = $link->query("UPDATE $user SET chest2 = 0");
	$results = $link->query("UPDATE $user SET goldkey = goldkey + 1");
}

// -------------------------------------------------------------------------- READ SIGN!
if($input=='read sign') {  //read sign
   echo '<i>You read the sign</i> <br>  ';
   	$message="
   <i>you read the sign:</i>   
   <div class='sign'>
   <h3 class='gold'>Forest Gold Chest<i></i></h3>
---------------------------------------------------</br>
You will need a gold key if you wish to open this chest. Rumor has it a nearby hunter has one.<br>
---------------------------------------------------<br>
<span class='hilight'>Opening this chest will open the gate to the east and allow you to access the more dangerous Dark Forest, where Trolls can be found.</span><br>
---------------------------------------------------<br>
</div>";
include ('update_feed.php'); // --- update feed	
}

	
	
// --------------------------------------------------------------------------- GOLD CHEST 2 - FOREST OLDDDD
if($input=='open chestOLD') 
{
	if ($chest2 >= 1) { 	 // --- already opened
	echo 'You already opened this gold chest. Remember that hunter equipment?';
	$message="<i>You already opened this gold chest. Remember that hunter equipment?</i>";
	include ('update_feed.php'); // --- update feed	
	}
	
	else if ($chest2 == 0 &&  $goldkey <= 0) {  // ---- no key	
	echo $message="<i>You need a gold key to open this chest. You can get one by completing quest 18 from Hunter Bill. You can find him southwest of here.</i><br/>";
	include ('update_feed.php'); // --- update feed	
	}
	
	
	else if ($chest2 == 0 && $goldkey >= 1 ) {  // ---- open!
	echo 'You use your golden key to open the chest!<br/>';
	$message="You use your golden key to open the chest!<br/>";
	include ('update_feed.php'); // --- update feed	
	$cash = rand (500,1000);
	$message = "<i>The Chest Contains!</i> <br />
-------------------------------------------<br />
+ 200 XP<br />
+ $cash $currency<br />
+ 20 Wood<br />
+ 10 Cooked Meat<br />
+ 3 Purple Potions<br />
+ 2 Silver Keys<br />
+ Hunter Ring!<br />
+ Hunter Gloves!<br />
-------------------------------------------</p>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET xp = xp + 200");
	$results = $link->query("UPDATE $user SET currency = currency + $cash");
	$results = $link->query("UPDATE $user SET wood = wood + 20");
	$results = $link->query("UPDATE $user SET cookedmeat = cookedmeat + 10");
	$results = $link->query("UPDATE $user SET purplepotion = purplepotion + 3");
	$results = $link->query("UPDATE $user SET silverkey = silverkey + 2");
	$results = $link->query("UPDATE $user SET hunterring = hunterring + 1");
	$results = $link->query("UPDATE $user SET huntergloves = huntergloves + 1");
	$results = $link->query("UPDATE $user SET chest2 = 1");
	$results = $link->query("UPDATE $user SET goldkey = goldkey - 1");
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
else if($input=='sw' || $input=='southwest') 
{	echo 'You travel southwest<br/>';
   $message="<i>You travel southwest</i></br>".$_SESSION['desc118'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 118"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='s' || $input=='south') 
{	echo 'You travel south<br/>';
   $message="<i>You travel south</i></br>".$_SESSION['desc120'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 120"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}

// ----------------------------------- end of room function
include ('function-end.php');
}
?>
