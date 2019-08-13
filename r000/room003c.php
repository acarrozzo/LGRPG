<?php
// -- 003c -- Weapons Training Area - Young Soldier
$roomname = "Weapons Training Area";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc003c'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){
    die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 	
  
		$gold=$row['currency'];   
		$xp=$row['xp'];   
		$quest4=$row['quest4'];   
		$quest5=$row['quest5']; 
		$quest6=$row['quest6']; 
		$trainingsword=$row['trainingsword'];   
		$training2hsword=$row['training2hsword'];   
		$trainingshield=$row['trainingshield'];   

		$soldiersring=$row['soldiersring'];   
		
		$traininghelmet=$row['traininghelmet'];   
		$trainingarmor=$row['trainingarmor'];   
		$traininggloves=$row['traininggloves'];   
		$trainingboots=$row['trainingboots'];   
		$equipHead=$row['equipHead'];   
		$equipBody=$row['equipBody']; 
		$equipHands=$row['equipHands'];   
		$equipFeet=$row['equipFeet']; 
		
		$masterblade=$row['masterblade'];   
		$equipR=$row['equipR'];   
		$equipL=$row['equipL'];   
		$scorpiontail=$row['scorpiontail'];   

		$youngsoldierFlag = $row['youngsoldierFlag'];

	}
	
include ('function-start.php');


// ---------------------- START ALL QUESTS ---------------------- //
  if($input=='start quests') {
	 if ($quest4 <1 || $quest5 <1 || $quest6 <1) {	
		echo $message = "<div class='menuAction'>
		<strong class='green px30'>You start the Young Soldier's Quests! (4 - 6)</strong>
		<p>Check your Quests tab to review what needs to be done.</p></div> ";		
		include ('update_feed.php'); // --- update feed
   		$results = $link->query("UPDATE $user SET quest4 = 1");
   		$results = $link->query("UPDATE $user SET quest5 = 1");
   		$results = $link->query("UPDATE $user SET quest6 = 1");
	  	}
}









// ---------------------- QUEST 4) My first sword and shield ---------------------- //
if($input=='info 4') { 
		echo $message="<div class='menuAction'>
		<strong class='green px30'>Quest 4 Info</strong><p>
		If you're going to adventure beyond the Grassy Field you're gonna need some equipment. Go ahead and grab a Training Sword and Shield and equip them both using the WEAP menu.</p></div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 4') 
{
	if ($quest4 == 1 && (($equipR == 'training sword' && $equipL == 'training shield') || $equipR=='training 2h sword'))
	{
		echo $message="
		<div class='questWin'>
		<h3>Quest 6 Completed!</h3>
		<h4>My First Sword and Shield</h4>
		<p>You show the Young Soldier that you can indeed equip a Sword and Shield. As a reward you are handed 3 scrumptious steaks. Time to explore the Spider Cave.</p>
	  	<h4>Rewards</h4>
  	  	[ + 10 xp ]<br />
		[ + 30 $currency ]<br />
		[ + 3 Cooked Meat! ]</div>";
		include ('update_feed.php'); // --- update feed
  		$results = $link->query("UPDATE $user SET quest4 = 2");
		$results = $link->query("UPDATE $user SET xp = xp + 10");
		$results = $link->query("UPDATE $user SET gold = gold + 30");
		$results = $link->query("UPDATE $user SET cookedmeat = cookedmeat + 3");
	}
	else if ($quest4 == 1)
	{
		echo $message="<div class='menuAction'>
		<strong class='green px30'>Quest 4 Not Complete</strong>
		<p>You need to equip a Training Sword and Shield. Pick them up here and equip them using the WEAP menu.</p></div>";
		include ('update_feed.php'); // --- update feed
	}  
}







// ---------------------- QUEST 5) Collect 5 Scorpion Tails ---------------------- //
if($input=='info 5') { 
		echo $message="<div class='menuAction'>
		<strong class='green px30'>Quest 5 Info</strong>
		<p>Take your new Sword and Shield and go slay some Scorpions in the Spider Cave east of here. Return with 5 Tails to receive your first Golden Key!</p></div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 5') 
{
	if ($quest5 == 1 && $scorpiontail >= '5')
	{
		echo $message="
		<div class='questWin'>
		<h3>Quest 5 Completed!</h3>
		<h4>Collect 5 Scorpion Tails</h4>
		You hand over 5 Scorpion Tails. The Soldier hands you a shiny gold key. You should go and see if it opens the gold chest at the Crossroads.
	  	<h4>Rewards</h4>
  	  	[ + 20 xp ]<br />
		[ + 50 $currency ]<br />
		[ + Soldier's Ring! (+2 str, +2 def) ]<br />
		[ + Gold Key! ]</div>";
		include ('update_feed.php'); // --- update feed
  		$results = $link->query("UPDATE $user SET quest5 = 2");
  		$results = $link->query("UPDATE $user SET currency = currency + 50");
  		$results = $link->query("UPDATE $user SET soldiersring = soldiersring + 1");
  		$results = $link->query("UPDATE $user SET goldkey = goldkey + 1");
		$results = $link->query("UPDATE $user SET xp = xp + 20");
		$results = $link->query("UPDATE $user SET scorpiontail = scorpiontail - 5");
	} 
	else if ($quest5 == 1)
	{
		echo $message="<div class='menuAction'>
		<strong class='green px30'>Quest 5 Not Complete</strong>
		<p>You have $scorpiontail Scorpion Tails. Get some more from the Spider Cave southeast of the Crossroads.</p></div>";
		include ('update_feed.php'); // --- update feed
	}  
}












// ---------------------- QUEST 6) Training Armor Pro ---------------------- //
if($input=='info 6') { 
		echo $message="<div class='menuAction'>
		<strong class='green px30'>Quest 6 Info</strong>
		<p>Think you're a pro? Go and collect the rest of the training armor set and return here with it all equipped. You will need to find the training helmet, armor, gloves and boots. Check your Quests tab to see what enemies drop them.</p></div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 6') 
{
	if ($quest6 == 1 && $traininghelmet >= '1' 
	&& $trainingarmor >= '1'
	&& $traininggloves >= '1'
	&& $trainingboots >= '1')
	{
		echo $message="
		<div class='questWin'>
		<h3>Quest 6 Completed!</h3>
		<h4>Training Armor Pro</h4>
		<p>You show the Young Soldier that you have acquired and equipped the rest of the Training Set! You are handed a very strong piece of Training Armor.</p>
		<h4>Rewards</h4>
		[ + 50 xp ]<br />
		[ + 100 $currency ]<br />
		[ + Training Armor Pro ( <i class='gold'>+5</i> def, <i class='red'>+1</i> str, <i class='green'>+1</i> dex ) ]</div>";
		include ('update_feed.php'); // --- update feed
  		$results = $link->query("UPDATE $user SET quest6 = 2");
  		$results = $link->query("UPDATE $user SET currency = currency + 100");
  		$results = $link->query("UPDATE $user SET trainingarmorpro = trainingarmorpro + 1");
		$results = $link->query("UPDATE $user SET equipBody = 'training armor pro'");
		$results = $link->query("UPDATE $user SET xp = xp + 50");
	} 
	else if ($quest6 == 1)
	{
		echo $message="<div class='menuAction'>
		<strong class='green px30'>Quest 6 Not Complete</strong>
		<p>You need to equip a Training Helmet, Armor, Gloves & Boots. Certain enemies will drop them, check your Quests tab.</p></div>";
		include ('update_feed.php'); // --- update feed
	}  
}






















 
// -------------------------------------------------------------------------- Room Commands
else if($input=='get training sword' || $input=='get sword'|| $input=='pick up sword and shield') 
{
	if ($trainingsword >= 1)
	 {
		echo $message="<div class='menuAction'><i class='fa fa-times red'></i>You already have a training sword and shield.</div>";
		include ('update_feed.php'); // --- update feed
		}
	else if ($quest4 == 0)
	 {
		echo $message="<div class='menuAction'><i class='fa fa-times red'></i>You need to start the quests before you can pick up the equipment. Go to QUESTS and START QUESTS.</div>";
		include ('update_feed.php'); // --- update feed
		}
	else
	 {	 
   	echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up'></i>You grab a training sword and shield off the weapon rack and place it in your pack.</div>";
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET trainingsword = 1");
   	$results = $link->query("UPDATE $user SET trainingshield = 1");
	 }
}


else if($input=='get training shield' || $input=='get shield') 
{
	if ($trainingshield >= 1)
	 {
		echo $message="<div class='menuAction'><i class='fa fa-times red'></i>You already have a training shield. If you lose it come back here for another free one.</div>";
		include ('update_feed.php'); // --- update feed
	 }
	else if ($quest4 == 0)
	 {
		echo $message="<div class='menuAction'><i class='fa fa-times red'></i>You need to start the quests here before you can pick this up. View the QUESTS tab at the top and START QUESTS.</div>";
		include ('update_feed.php'); // --- update feed
		}
	else
	 {	 
   	echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up'></i>You grab a training shield off the rack and place it in your pack.</div>";
	include ('update_feed.php'); // --- update feed
  	$results = $link->query("UPDATE $user SET trainingshield = 1");
	 }
}


else if($input=='get training 2h sword' || $input=='pick up 2-handed sword') 
{
	if ($training2hsword >= 1)
	 {
		echo $message="<div class='menuAction'><i class='fa fa-times red'></i>You already have a training 2h sword. If you lose it come back here for another one.</div>";
		include ('update_feed.php'); // --- update feed
		}
	else if ($quest4 == 0)
	 {
		echo $message="<div class='menuAction'><i class='fa fa-times red'></i>You need to start the quests here before you can pick up this sword. Go to QUESTS and START QUESTS.</div>";
		include ('update_feed.php'); // --- update feed
		}
	else
	 {	 
   	echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up'></i>You grab a training 2h sword off the weapon rack and place it in your pack.</div>";
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET training2hsword = 1");
	 }
}


// -------------------------DB CONNECT! - RECALCULATE FOR GOLD KEY AND SKILLS TEACH
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){
    die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 	
		  
		$quest4=$row['quest4'];   
		$quest5=$row['quest5']; 
		$quest6=$row['quest6']; 
		$goldkey=$row['goldkey']; 
		$chest1=$row['chest1']; 
			}

	if ($quest4 == 2 && $quest5 == 2 && $quest6 == 2  && $goldkey == 0 && $chest1 == 0) {
		echo $message = "<div class='menuAction'><i span class='fa fa-key px40'></i>You have completed all the Young Soldier's Quests! <br>
He hands you a shiny GOLD KEY!</div>";
		include ('update_feed.php'); // --- update feed
  		$results = $link->query("UPDATE $user SET goldkey = goldkey + 1");
	}



// ---------------------- SKILL FLAG! ---------------------- //
if ($quest4 == 2 && $youngsoldierFlag==0) {
echo  $message = "<div class='menuAction'><i span class='fa fa-check-square-o'></i>
You can now learn the 1h Weapons, 2h Weapon & Toughness SKILLS!</div> ";
include ('update_feed.php'); // --- update feed
$results = $link->query("UPDATE $user SET youngsoldierFlag = 1");
}
//else {$results = $link->query("UPDATE $user SET youngsoldierFlag = 0");}








// -------------------------------------------------------------------------- TRAVEL
if($input=='e' || $input=='east') 
{
	echo 'You travel east<br/>';
   	$message="<i>You travel east</i><br/>".$_SESSION['desc003'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '003'"); // -- room change
}
else if($input=='ne' || $input=='northeast') 
{
	echo 'You travel northeast<br/>';
   	$message="<i>You travel northeast</i><br/>".$_SESSION['desc004'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '004'"); // -- room change
}
else if($input=='d' || $input=='down') 
{
	echo 'You travel down<br/>';
   	$message="<i>You travel down</i><br/>".$_SESSION['desc003bb'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '003bb'"); // -- room change
}


else if($input=='nw' || $input=='northwest') 
{
	echo 'You jump down to the beach<br/>';
   	$message="<i>You jump down to the beach</i><br/>".$_SESSION['desc017'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '017'"); // -- room change
}
else if($input=='sw' || $input=='southwest') 
{
	echo 'You jump down to the beach<br/>';
   	$message="<i>You jump down to the beach</i><br/>".$_SESSION['desc019'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '019'"); // -- room change
}

// ----------------------------------- end of room function
include ('function-end.php'); 

?>
