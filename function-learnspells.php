<?php
// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 	



// ------------------------- NOT IN USE ANYMORE!
// ------------------------- NOT IN USE ANYMORE!
// ------------------------- NOT IN USE ANYMORE!
// ------------------------- NOT IN USE ANYMORE!
// ------------------------- NOT IN USE ANYMORE!
// ------------------------- NOT IN USE ANYMORE!
// ------------------------- NOT IN USE ANYMORE!
// ------------------------- NOT IN USE ANYMORE!
// ------------------------- NOT IN USE ANYMORE!
// ------------------------- NOT IN USE ANYMORE!
// ------------------------- NOT IN USE ANYMORE!
// ------------------------- NOT IN USE ANYMORE!
// ------------------------- NOT IN USE ANYMORE!
// ------------------------- NOT IN USE ANYMORE!
// ------------------------- NOT IN USE ANYMORE!
// ------------------------- NOT IN USE ANYMORE!
// ------------------------- NOT IN USE ANYMORE!

$level = $row['level'];
$xp = $row['xp'];
$hp = $row['hpmax'];
$mp = $row['mpmax'];
$bp = $row['bp'];
$sp = $row['sp'];
$physicaltraining = $row['physicaltraining'];
$mentaltraining = $row['mentaltraining'];

$destruction = $row['destruction'];
$restoration = $row['restoration'];
$alteration = $row['alteration'];

$cash = $row['currency'];
$toopoor = $_SESSION['toopoor'];
$notenoughbp = $_SESSION['notenoughbp'];
$notenoughsp = $_SESSION['notenoughsp'];

$heal = $row['heal'];
$heal_new = $heal + 1;
$heal_cost = ($heal + 1);
if ($heal_cost > 25) {$heal_cost = 25;}

$fireball = $row['fireball'];
$fireball_new = $fireball + 1;
$fireball_cost = ($fireball + 1) ;
if ($fireball_cost > 25) {$fireball_cost = 25;}

$frostball = $row['frostball'];
$frostball_new = $frostball + 1;
$frostball_cost = ($frostball + 1) ;
if ($frostball_cost > 25) {$frostball_cost = 25;}



if($input=='list spells' || $input=='list spells again') 
{	
echo 'YOU OPEN THE SPELL MENU<br>';
$message = "spell
		<div class='shop'>
		<h4><span class='alt'>pajama shaman</span> spell shop
		</h4>
<form id='mainForm' method='post' action='' name='formInput'>		
			<h3>Destruction</h3>
			<input type='submit' class='learnBtn' name='input1' value='learn fireball' /> 
			<span class='gold'>$fireball_cost sp</span> fireball <span class='alt'>current level: $fireball</span><br />
			
			<input type='submit' class='learnBtn' name='input1' value='learn frostball' /> 
			<span class='gold'>$frostball_cost sp</span> frostball <span class='alt'>current level: $frostball</span><br />
			
			<h3>Restoration</h3>
			<input type='submit' class='learnBtn' name='input1' value='learn heal' /> 
			<span class='gold'>$heal_cost sp</span> heal <span class='alt'>current level: $heal</span><br />
			<br/>
<input type='submit' name='input1' value='list spells again' />
<input type='submit' name='input1' value='look around' />
	</form></div>";
	include ('update_feed.php'); // --- update feed
	$funflag=1;
}
if($input=='learn heal') 
{	if($sp<$heal_cost) {echo $message=$notenoughsp;include ('update_feed.php');$funflag=1;}
	
	else if ($restoration<1){ 		
		echo 'You need to learn the restoration skill before you can learn the heal spell<br/>';
		$message = "You need to learn the restoration skill before you can learn the heal spell<br/>";
		include ('update_feed.php'); // --- update feed
		$funflag=1; }
	
	else { 		
		echo 'You spend '.$heal_cost.' sp and increase your heal spell to '.$heal_new.'<br/>';
		$message = "You spend $heal_cost sp and increase your heal spell to $heal_new";
		
		
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET heal = heal + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $heal_cost"); 
		$funflag=1; }
}
if($input=='learn fireball') 
{	if ($fireball >= 5) { 		
		echo 'You have learned fireball as much as you can here. Search out better trainers.<br/>';
		$message = "You have learned fireball as much as you can here. Search out better trainers.<br/>";
		include ('update_feed.php'); // --- update feed
		$funflag=1;}
	else if($sp<$fireball_cost) {echo $message=$notenoughsp;include ('update_feed.php');$funflag=1;}
	else if ($destruction<1){ 		
		echo 'You need to learn the destruction skill before you can learn the fireball spell<br/>';
		$message = "You need to learn the destruction skill before you can learn the fireball spell<br/>";
		include ('update_feed.php'); // --- update feed
		$funflag=1; }
	else { 
		echo $message = 'You spend '.$fireball_cost.' sp and learn the fireball spell<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET fireball = fireball + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $fireball_cost"); 
		$funflag=1; }
}

if($input=='learn frostball') 
{	
	if ($frostball >= 5) { 		
		echo 'You have learned frostball as much as you can here. Search out better trainers.<br/>';
		$message = "You have learned frostball as much as you can here. Search out better trainers.<br/>";
		include ('update_feed.php'); // --- update feed
		$funflag=1;}
	else if($sp<$frostball_cost) {echo $message=$notenoughsp;include ('update_feed.php');$funflag=1;}
	else if ($destruction<1){ 		
		echo 'You need to learn the destruction skill before you can learn the frostball spell<br/>';
		$message = "You need to learn the destruction skill before you can learn the frostball spell<br/>";
		include ('update_feed.php'); // --- update feed
		$funflag=1; }
	else { 
		echo $message = 'You spend '.$frostball_cost.' sp and learn the frostball spell<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET frostball = frostball + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $frostball_cost"); 
		$funflag=1; }
}






 }
 
 




?>