<?php
// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 	

$level = $row['level'];
$xp = $row['xp'];
$hp = $row['hpmax'];
$mp = $row['mpmax'];
$bp = $row['bp'];
$sp = $row['sp'];
$physicaltraining = $row['physicaltraining'];
$mentaltraining = $row['mentaltraining'];

// $destruction = $row['destruction'];
// $restoration = $row['restoration'];
// $alteration = $row['alteration'];

$cash = $row['currency'];
$toopoor = $_SESSION['toopoor'];
$notenoughbp = $_SESSION['notenoughbp'];
$notenoughsp = $_SESSION['notenoughsp'];

$fireball = $row['fireball'];
$fireball_new = $fireball_learn_cost = ($fireball + 1) ;
if ($fireball_learn_cost > 5) {$fireball_learn_cost = 'max';}

$frostball = $row['frostball'];
$frostball_new = $frostball_learn_cost = $frostball + 1 ;
if ($frostball_learn_cost > 5) {$frostball_learn_cost = 'max';}

$heal = $row['heal'];
$heal_new = $heal_learn_cost = ($heal + 1);
if ($heal_learn_cost > 5) {$heal_learn_cost = 'max';}


if($input=='list spells' || $input=='list spells again') 
{	
echo 'YOU OPEN THE SPELL MENU<br>';
$message = "list spells
		<div class='shop'>
		<h4><span class='alt'>pajama shaman</span> spell shop
		</h4>
<form id='mainForm' method='post' action='' name='formInput'>		
			<h3>Destruction</h3>
			<span class='alt2'>lvl $fireball</span>
			<input type='submit' class='learnBtn' name='input1' value='learn fireball' /> 
			<span class='gold'>cost: $fireball_learn_cost</span> fireball <br />
			
			<span class='alt2'>lvl $frostball</span>
			<input type='submit' class='learnBtn' name='input1' value='learn frostball' /> 
			<span class='gold'>cost: $frostball_learn_cost</span> frostball <br />
			
			<h3>Restoration</h3>
			 <span class='alt2'>lvl $heal</span>
			 <input type='submit' class='learnBtn' name='input1' value='learn heal' /> 
			<span class='gold'>cost: $heal_learn_cost</span> heal<br />
			<br/>
<input type='submit' name='input1' value='list skills' />
<input type='submit' name='input1' value='list spells' />
<input type='submit' name='input1' value='look' />
	</form></div>";
	include ('update_feed.php'); // --- update feed
	$funflag=1;
}

if($input=='learn heal') 
{	if ($heal_learn_cost == 'max') { 		
		echo 'You have learned heal as much as you can here. Search out better trainers.<br/>';
		$message = "You have learned heal as much as you can here. Search out better trainers.<br/>";
		include ('update_feed.php'); // --- update feed
		$funflag=1;}
	else if($sp<$heal_learn_cost) {echo $message=$notenoughsp;include ('update_feed.php');$funflag=1;}
	else { 
		echo "You spend ".$heal_learn_cost." sp and learn the heal spell<br>";
	 	$message = "You spend ".$heal_learn_cost." sp and learn the heal spell<br>
				<form id='mainForm' method='post' action='' name='formInput'>		
		<input type='submit' class='auto' name='input1' value='learn heal' />			
			<input type='submit' class='auto' name='input1' value='list skills' />
			<input type='submit' class='auto' name='input1' value='list spells' />
			<input type='submit' class='auto' name='input1' value='look' />
			</form>";	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET heal = heal + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $heal_learn_cost"); 
		$funflag=1; }
}
if($input=='learn fireball') 
{	if ($fireball_learn_cost == 'max') { 		
		echo 'You have learned fireball as much as you can here. Search out better trainers.<br/>';
		$message = "You have learned fireball as much as you can here. Search out better trainers.<br/>";
		include ('update_feed.php'); // --- update feed
		$funflag=1;}
	else if($sp<$fireball_learn_cost) {echo $message=$notenoughsp;include ('update_feed.php');$funflag=1;}
	else { 
		echo "You spend ".$fireball_learn_cost." sp and learn the fireball spell<br>";
		$message = "You spend ".$fireball_learn_cost." sp and learn the fireball spell<br>
		<form id='mainForm' method='post' action='' name='formInput'>		
			<input type='submit' class='auto' name='input1' value='learn fireball' />			
			<input type='submit' class='auto' name='input1' value='list skills' />
			<input type='submit' class='auto' name='input1' value='list spells' />
			<input type='submit' class='auto' name='input1' value='look' />
</form>";	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET fireball = fireball + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $fireball_learn_cost"); 
		$funflag=1; }
}

if($input=='learn frostball') 
{	
	if ($frostball_learn_cost == 'max') { 		
		echo 'You have learned frostball as much as you can here. Search out better trainers.<br/>';
		$message = "You have learned frostball as much as you can here. Search out better trainers.<br/>";
		include ('update_feed.php'); // --- update feed
		$funflag=1;}
	else if($sp<$frostball_learn_cost) {echo $message=$notenoughsp;include ('update_feed.php');$funflag=1;}
	else { 
		echo "You spend ".$frostball_learn_cost." sp and learn the frostball spell<br>";
		$message = "You spend ".$frostball_learn_cost." sp and learn the frostball spell<br>
		<input type='submit' class='auto' name='input1' value='learn frostball' />			
			<input type='submit' class='auto' name='input1' value='list skills' />
			<input type='submit' class='auto' name='input1' value='list spells' />
			<input type='submit' class='auto' name='input1' value='look' />";	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET frostball = frostball + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $frostball_learn_cost"); 
		$funflag=1; }
}






 }
 
 




?>