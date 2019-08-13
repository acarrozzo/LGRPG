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
if ($onehanded_cost > 10) {$onehanded_cost = 'max';}
$twohanded = $row['twohanded'];$twohanded_cost = $twohanded_new = $twohanded + 1;
if ($twohanded_cost > 10) {$twohanded_cost = 'max';}
$ranged = $row['ranged'];$ranged_cost = $ranged_new = $ranged + 1;
if ($ranged_cost > 10) {$ranged_cost = 'max';}
$toughness = $row['toughness'];$toughness_cost = $toughness_new = $toughness + 1;
if ($toughness_cost > 10) {$toughness_cost = 'max';}
$physicaltraining = $row['physicaltraining'];$physicaltraining_cost = $physicaltraining_new = $physicaltraining + 1;
if ($physicaltraining_cost > 10) {$physicaltraining_cost = 'max';}
$mentaltraining = $row['mentaltraining'];$mentaltraining_cost = $mentaltraining_new = $mentaltraining + 1;
if ($mentaltraining_cost > 10) {$mentaltraining_cost = 'max';}



if($input=='list skills' || $input=='list skills again') 
{	
echo 'YOU OPEN THE SKILL MENU<br>';
$message = "list skills
		<div class='shop'>
		<h4><span class='alt'>pajama shaman</span> skill shop
		</h4>
<form id='mainForm' method='post' action='' name='formInput'>		
			<h3>Offense</h3>
			<span class='alt2'>$onehanded / 10</span> 
			<input type='submit' class='learnBtn' name='input1' value='learn one handed' /> 
			<span class='gold'>cost: $onehanded_cost </span> one handed
			<input type='submit' class='helpBtn alt' name='input1' value='help one handed' /> 
			<br />
			
			<span class='alt2'>$twohanded / 10</span> 
			<input type='submit' class='learnBtn' name='input1' value='learn two handed' /> 
			<span class='gold'>cost: $twohanded_cost </span> two handed
			<input type='submit' class='helpBtn alt' name='input1' value='help two handed' /> 
			<br />
			
			<span class='alt2'>$ranged / 10 </span> 
			<input type='submit' class='learnBtn' name='input1' value='learn ranged' /> 
			<span class='gold'>cost: $ranged_cost </span> ranged 
			<input type='submit' class='helpBtn alt' name='input1' value='help ranged' /> 
			<br />
			
			<h3>Defense</h3>
			<span class='alt2'>$toughness / 10 </span> 
			<input type='submit' class='learnBtn' name='input1' value='learn toughness' /> 
			<span class='gold'>cost: $toughness_cost </span> toughness 
			<input type='submit' class='helpBtn alt' name='input1' value='help toughness' /> 
			<br />

			<h3>Training</h3>
			<span class='alt2'>$physicaltraining / 10 </span> 
			<input type='submit' class='learnBtn' name='input1' value='learn physical training' /> 
			<span class='gold'>cost: $physicaltraining_cost </span> physical training 
			<input type='submit' class='helpBtn alt' name='input1' value='help physical training' /> 
			<br />
			
			<span class='alt2'>$mentaltraining / 10 </span> 
			<input type='submit' class='learnBtn' name='input1' value='learn mental training' /> 
			<span class='gold'>cost: $mentaltraining_cost </span> mental training
			<input type='submit' class='helpBtn alt' name='input1' value='help mental training' /> 
			<br />
			<br/>
<input type='submit' name='input1' value='list skills' />
<input type='submit' name='input1' value='list spells' />
<input type='submit' name='input1' value='look' /></form>
		
	</form></div>";
	include ('update_feed.php'); // --- update feed
	$funflag=1;
}

if($input=='learn one handed' || $input=='learn one handed again') 
{	
	if ($onehanded >= 10) {
		echo $message="You have learned all the One Handed Skill the Pajama Shaman can teach you. Search for more advanced teachers.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$onehanded_cost) {echo $message=$notenoughsp;include ('update_feed.php');$funflag=1;}
	else { 
		echo 'You spend '.$onehanded_cost.' sp and increase one handed to '.$onehanded_new.'<br/>';
		$message = "You spend $onehanded_cost sp and increase one handed to $onehanded_new
		<form id='mainForm' method='post' action='' name='formInput'>		
			<input type='submit' class='auto' name='input1' value='learn one handed' />			
			<input type='submit' class='auto' name='input1' value='list skills' />
			<input type='submit' class='auto' name='input1' value='list spells' />
			<input type='submit' class='auto' name='input1' value='look' />
</form> ";	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET onehanded = onehanded + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $onehanded_cost"); 
		$funflag=1; }
}
if($input=='learn two handed' || $input=='learn two handed again') 
{	if ($twohanded >= 10) {
		echo $message="You have learned all the Two Handed Skill the Pajama Shaman can teach you. Search for more advanced teachers.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$twohanded_cost) {echo $message=$notenoughsp;include ('update_feed.php');$funflag=1;}
	else { 
		echo 'You spend '.$twohanded_cost.' sp and increase two handed to '.$twohanded_new.'<br/>';
		$message = "You spend $twohanded_cost sp and increase two handed to $twohanded_new
		<form id='mainForm' method='post' action='' name='formInput'>		
			<input type='submit' class='auto' name='input1' value='learn two handed' />			
			<input type='submit' class='auto' name='input1' value='list skills' />
			<input type='submit' class='auto' name='input1' value='list spells' />
			<input type='submit' class='auto' name='input1' value='look' />
</form> ";	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET twohanded = twohanded + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $twohanded_cost"); 
		$funflag=1; }
}
if($input=='learn toughness' || $input=='learn toughness again') 
{	if ($toughness >= 10) {
		echo $message="You have learned all the Toughness Skill the Pajama Shaman can teach you. Search for more advanced teachers.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$toughness_cost) {echo $message=$notenoughsp;include ('update_feed.php');$funflag=1;}
	else { 
		echo 'You spend '.$toughness_cost.' sp and increase toughness to '.$toughness_new.'<br/>';
		$message = "You spend $toughness_cost sp and increase toughness to $toughness_new
		<form id='mainForm' method='post' action='' name='formInput'>		
			<input type='submit' class='auto' name='input1' value='learn toughness' />			
			<input type='submit' class='auto' name='input1' value='list skills' />
			<input type='submit' class='auto' name='input1' value='list spells' />
			<input type='submit' class='auto' name='input1' value='look' />
</form> ";	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET toughness = toughness + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $toughness_cost"); 
		$funflag=1; }
}
if($input=='learn ranged' || $input=='learn ranged again') 
{	if ($ranged >= 10) {
		echo $message="You have learned all the Ranged Weapons Skill the Pajama Shaman can teach you. Search for more advanced teachers.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$ranged_cost) {echo $message=$notenoughsp;include ('update_feed.php');$funflag=1;}
	else { 
		echo 'You spend '.$ranged_cost.' sp and increase ranged to '.$ranged_new.'<br/>';
		$message = "You spend $ranged_cost sp and increase ranged to $ranged_new
		<form id='mainForm' method='post' action='' name='formInput'>		
			<input type='submit' class='auto' name='input1' value='learn ranged' />			
			<input type='submit' class='auto' name='input1' value='list skills' />
			<input type='submit' class='auto' name='input1' value='list spells' />
			<input type='submit' class='auto' name='input1' value='look' />
</form> ";	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ranged = ranged + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $ranged_cost"); 
		$funflag=1; }
}


if($input=='learn physical training' || $input=='learn physical training again') 
{	if ($physicaltraining >= 10) {
		echo $message="You have learned all the Physical Training Skill the Pajama Shaman can teach you.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$physicaltraining_cost) {echo $message=$notenoughsp;include ('update_feed.php');$funflag=1;}
	else { 
		echo 'You spend '.$physicaltraining_cost.' sp and increase physical training to '.$physicaltraining_new.'<br/>';
		$message = "You spend $physicaltraining_cost sp and increase physical training to $physicaltraining_new
		<form id='mainForm' method='post' action='' name='formInput'>		
			<input type='submit' class='auto' name='input1' value='learn physical training' />			
			<input type='submit' class='auto' name='input1' value='list skills' />
			<input type='submit' class='auto' name='input1' value='list spells' />
			<input type='submit' class='auto' name='input1' value='look' />
</form>";	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET physicaltraining = physicaltraining + 1"); 
	    $query = $link->query("UPDATE $user SET sp = sp - $physicaltraining_cost"); 
		$funflag=1; }
}
if($input=='learn mental training' || $input=='learn mental training again') 
{	if ($mentaltraining >= 10) {
		echo $message="You have learned all the Mental Training Skill the Pajama Shaman can teach you.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$mentaltraining_cost) {echo $message=$notenoughsp;include ('update_feed.php');$funflag=1;}
	else { 
		echo 'You spend '.$mentaltraining_cost.' sp and increase mental training to '.$mentaltraining_new.'<br/>';
		$message = "You spend $mentaltraining_cost sp and increase mental training to $mentaltraining_new
		<form id='mainForm' method='post' action='' name='formInput'>		
			<input type='submit' class='auto' name='input1' value='learn mental training' />			
			<input type='submit' class='auto' name='input1' value='list skills' />
			<input type='submit' class='auto' name='input1' value='list spells' />
			<input type='submit' class='auto' name='input1' value='look' />
</form>";	
		include ('update_feed.php'); // --- update feed
		
		$query = $link->query("UPDATE $user SET mentaltraining = mentaltraining + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $mentaltraining_cost"); 
		$funflag=1; }
}



}
 
 




?>