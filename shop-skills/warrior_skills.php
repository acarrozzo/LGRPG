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

$cash = $row['currency'];
$toopoor = $_SESSION['toopoor'];
$notenoughbp = $_SESSION['notenoughbp'];
$notenoughsp = $_SESSION['notenoughsp'];


$onehanded = $row['onehanded'];$onehanded_cost = $onehanded_new = $onehanded + 1;
if ($onehanded_cost > 15) {$onehanded_cost = 'max';}
$twohanded = $row['twohanded'];$twohanded_cost = $twohanded_new = $twohanded + 1;
if ($twohanded_cost > 15) {$twohanded_cost = 'max';}
$toughness = $row['toughness'];$toughness_cost = $toughness_new = $toughness + 1;
if ($toughness_cost > 15) {$toughness_cost = 'max';}
$block = $row['block'];$block_cost = $block_new = $block + 1;
if ($block_cost > 15) {$block_cost = 'max';}
$magicstrike = $row['magicstrike'];$magicstrike_cost = $magicstrike_new = $magicstrike + 1;
if ($magicstrike_cost > 10) {$magicstrike_cost = 'max';}
$physicaltraining = $row['physicaltraining'];$physicaltraining_cost = $physicaltraining_new = $physicaltraining + 1;
if ($physicaltraining_cost > 20) {$physicaltraining_cost = 'max';}


// OFFENSE		max lvl
// one handed		15
// two handed 		15

// DEFENSE
// toughness		15
// block		15

// MAGIC		
// magic strike		10		cost: lvl*2 	dam + ( lvl/10 x mag )

// TRAINING	
// physical training	15

if($input=='list skills' || $input=='list skills again') 
{	
echo 'YOU OPEN THE SKILL MENU<br>';
$message = "list skills
		<div class='shop'>
		<h4><span class='alt'>Warrior's Guild</span> skill shop
		</h4>
<form id='mainForm' method='post' action='' name='formInput'>		
			<h3>Offense</h3>
			<span class='alt2'>lvl $onehanded </span> 
			<input type='submit' class='learnBtn' name='input1' value='learn one handed' /> 
			<span class='gold'>cost: $onehanded_cost </span> one handed
			<input type='submit' class='helpBtn alt' name='input1' value='help one handed' /> 
			<br />
			
			<span class='alt2'>lvl $twohanded </span> 
			<input type='submit' class='learnBtn' name='input1' value='learn two handed' /> 
			<span class='gold'>cost: $twohanded_cost </span> two handed
			<input type='submit' class='helpBtn alt' name='input1' value='help two handed' /> 
			<br />
			
			<h3>Defense</h3>
			<span class='alt2'>lvl $toughness </span> 
			<input type='submit' class='learnBtn' name='input1' value='learn toughness' /> 
			<span class='gold'>cost: $toughness_cost </span> toughness 
			<input type='submit' class='helpBtn alt' name='input1' value='help toughness' /> 
			<br />
			<span class='alt2'>lvl $block </span> 
			<input type='submit' class='learnBtn' name='input1' value='learn block' /> 
			<span class='gold'>cost: $block_cost </span> block 
			<input type='submit' class='helpBtn alt' name='input1' value='help block' /> 
			<br />

			<h3>Magic</h3>
			<span class='alt2'>lvl $magicstrike </span> 
			<input type='submit' class='learnBtn' name='input1' value='learn magic strike' /> 
			<span class='gold'>cost: $magicstrike_cost </span> magic strike
			<input type='submit' class='helpBtn alt' name='input1' value='help magic strike' /> 
			<br />

			<h3>Training</h3>
			<span class='alt2'>lvl $physicaltraining </span> 
			<input type='submit' class='learnBtn' name='input1' value='learn physical training' /> 
			<span class='gold'>cost: $physicaltraining_cost </span> physical training 
			<input type='submit' class='helpBtn alt' name='input1' value='help physical training' /> 
			<br />
			
		
			<br/>
<input type='submit' name='input1' value='list skills' />
<input type='submit' name='input1' value='look' /></form>
		
	</form></div>";
	include ('update_feed.php'); // --- update feed
	
}

if($input=='learn one handed' || $input=='learn one handed again') 
{	
	if ($onehanded_cost == 'max') {
		echo $message="You have learned all the One Handed Skill the Guild can teach you. Search for more advanced teachers.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$onehanded_cost) {echo $message=$notenoughsp;include ('update_feed.php');}
	else { 
		echo 'You spend '.$onehanded_cost.' sp and increase one handed to '.$onehanded_new.'<br/>';
		$message = "<div class='learnBox'>
		You spend $onehanded_cost sp and increase one handed to $onehanded_new</div>
		<form id='mainForm' method='post' action='' name='formInput'>		
			<input type='submit' class='auto' name='input1' value='learn one handed' />
			<input type='submit' class='auto' name='input1' value='list skills' />
			<input type='submit' class='auto' name='input1' value='look' />
			</form> ";	
		include ('update_feed_alt.php'); // --- update feed
		$query = $link->query("UPDATE $user SET onehanded = onehanded + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $onehanded_cost"); 
		 }
}
if($input=='learn two handed' || $input=='learn two handed again') 
{	if ($twohanded_cost == 'max') {
		echo $message="You have learned all the Two Handed Skill the Guild can teach you. Search for more advanced teachers.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$twohanded_cost) {echo $message=$notenoughsp;include ('update_feed.php');}
	else { 
		echo 'You spend '.$twohanded_cost.' sp and increase two handed to '.$twohanded_new.'<br/>';
		$message = "<div class='learnBox'>
		You spend $twohanded_cost sp and increase two handed to $twohanded_new</div>
		<form id='mainForm' method='post' action='' name='formInput'>		
			<input type='submit' class='auto' name='input1' value='learn two handed' />
			<input type='submit' class='auto' name='input1' value='list skills' />
			<input type='submit' class='auto' name='input1' value='look' />
			</form> ";	
		include ('update_feed_alt.php'); // --- update feed
		$query = $link->query("UPDATE $user SET twohanded = twohanded + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $twohanded_cost"); 
		 }
}
if($input=='learn toughness' || $input=='learn toughness again') 
{	if ($toughness_cost == 'max') {
		echo $message="You have learned all the Toughness Skill the Guild can teach you. Search for more advanced teachers.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$toughness_cost) {echo $message=$notenoughsp;include ('update_feed.php');}
	else { 
		echo 'You spend '.$toughness_cost.' sp and increase toughness to '.$toughness_new.'<br/>';
		$message = "<div class='learnBox'>
		You spend $toughness_cost sp and increase toughness to $toughness_new</div>
		<form id='mainForm' method='post' action='' name='formInput'>		
			<input type='submit' class='auto' name='input1' value='learn toughness' />
			<input type='submit' class='auto' name='input1' value='list skills' />
			<input type='submit' class='auto' name='input1' value='look' />
			</form> ";	
		include ('update_feed_alt.php'); // --- update feed
		$query = $link->query("UPDATE $user SET toughness = toughness + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $toughness_cost"); 
		 }
}
if($input=='learn block' || $input=='learn block again') 
{	if ($block_cost == 'max') {
		echo $message="You have learned all the block Weapons Skill the Guild can teach you. Search for more advanced teachers.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$block_cost) {echo $message=$notenoughsp;include ('update_feed.php');}
	else { 
		echo 'You spend '.$block_cost.' sp and increase block to '.$block_new.'<br/>';
		$message = "<div class='learnBox'>
		You spend $block_cost sp and increase block to $block_new</div>
		<form id='mainForm' method='post' action='' name='formInput'>		
			<input type='submit' class='auto' name='input1' value='learn block' />
			<input type='submit' class='auto' name='input1' value='list skills' />
			<input type='submit' class='auto' name='input1' value='look' />
			</form> ";	
		include ('update_feed_alt.php'); // --- update feed
		$query = $link->query("UPDATE $user SET block = block + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $block_cost"); 
		 }
}


if($input=='learn physical training' || $input=='learn physical training again') 
{	if ($physicaltraining_cost == 'max') {
		echo $message="You have learned all the Physical Training Skill the Guild can teach you.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$physicaltraining_cost) {echo $message=$notenoughsp;include ('update_feed.php');}
	else { 
		echo 'You spend '.$physicaltraining_cost.' sp and increase physical training to '.$physicaltraining_new.'<br/>';
		$message = "<div class='learnBox'>
		You spend $physicaltraining_cost sp and increase physical training to $physicaltraining_new</div>
		<form id='mainForm' method='post' action='' name='formInput'>		
			<input type='submit' class='auto' name='input1' value='learn physical training' />
			<input type='submit' class='auto' name='input1' value='list skills' />
			<input type='submit' class='auto' name='input1' value='look' />
			</form>";	
		include ('update_feed_alt.php'); // --- update feed
		$query = $link->query("UPDATE $user SET physicaltraining = physicaltraining + 1"); 
	    $query = $link->query("UPDATE $user SET sp = sp - $physicaltraining_cost"); 
		 }
}
if($input=='learn magic strike' || $input=='learn magic strike again') 
{	if ($magicstrike_cost == 'max') {
		echo $message="You have learned all the magic strike Skill the Guild can teach you.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$magicstrike_cost) {echo $message=$notenoughsp;include ('update_feed.php');}
	else { 
		echo 'You spend '.$magicstrike_cost.' sp and increase magic strike to '.$magicstrike_new.'<br/>';
		$message = "<div class='learnBox'>
		You spend $magicstrike_cost sp and increase magic strike to $magicstrike_new</div>
		<form id='mainForm' method='post' action='' name='formInput'>		
			<input type='submit' class='auto' name='input1' value='learn magic strike' />
			<input type='submit' class='auto' name='input1' value='list skills' />
			<input type='submit' class='auto' name='input1' value='look' />
			</form>";	
		include ('update_feed_alt.php'); // --- update feed
		
		$query = $link->query("UPDATE $user SET magicstrike = magicstrike + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $magicstrike_cost"); 
		 }
}



}
 
 




?>