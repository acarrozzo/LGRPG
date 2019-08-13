<?php
// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 	



// ------------------------ NOT IN USE ANYMORE - SEE SKILLS-LEARN.PHP
// ------------------------ NOT IN USE ANYMORE - SEE SKILLS-LEARN.PHP
// ------------------------ NOT IN USE ANYMORE - SEE SKILLS-LEARN.PHP
// ------------------------ NOT IN USE ANYMORE - SEE SKILLS-LEARN.PHP
// ------------------------ NOT IN USE ANYMORE - SEE SKILLS-LEARN.PHP
// ------------------------ NOT IN USE ANYMORE - SEE SKILLS-LEARN.PHP
// ------------------------ NOT IN USE ANYMORE - SEE SKILLS-LEARN.PHP
// ------------------------ NOT IN USE ANYMORE - SEE SKILLS-LEARN.PHP
// ------------------------ NOT IN USE ANYMORE - SEE SKILLS-LEARN.PHP
// ------------------------ NOT IN USE ANYMORE - SEE SKILLS-LEARN.PHP



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



$destruction = $row['destruction'];$destruction_cost = $destruction_new = $destruction + 1;
if ($destruction_cost > 5) {$destruction_cost = 'max';}
$restoration = $row['restoration'];$restoration_cost = $restoration_new = $restoration + 1;
if ($restoration_cost > 5) {$restoration_cost = 'max';}
$alteration = $row['alteration'];$alteration_cost = $alteration_new = $alteration + 1;
if ($alteration_cost > 5) {$alteration_cost = 'max';}


$block = $row['block'];
$ddge = $row['ddge'];
$destruction = $row['destruction'];
$restoration = $row['restoration'];
$alteration = $row['alteration'];



if($input=='list skills' || $input=='list skills again') 
{	
echo 'YOU OPEN THE SKILL MENU<br>';
$message = "list skills
		<div class='shop'>
		<h4><span class='alt'>pajama shaman</span> skill shop
		</h4>
<form id='mainForm' method='post' action='' name='formInput'>		
			<h3>Offense</h3>
			<span>$onehanded </span> 
			<input type='submit' class='learnBtn' name='input1' value='learn one handed' /> 
			<span class='gold'>$onehanded_cost </span> one handed
			<input type='submit' class='helpBtn alt' name='input1' value='help one handed' /> 
			<br />
			
			<span>$twohanded </span> 
			<input type='submit' class='learnBtn' name='input1' value='learn two handed' /> 
			<span class='gold'>$twohanded_cost </span> two handed
			<input type='submit' class='helpBtn alt' name='input1' value='help two handed' /> 
			<br />
			
			<span>$ranged </span> 
			<input type='submit' class='learnBtn' name='input1' value='learn ranged' /> 
			<span class='gold'>$ranged_cost </span> ranged 
			<input type='submit' class='helpBtn alt' name='input1' value='help ranged' /> 
			<br />
			
			<h3>Defense</h3>
			<span>$toughness </span> 
			<input type='submit' class='learnBtn' name='input1' value='learn toughness' /> 
			<span class='gold'>$toughness_cost </span> toughness 
			<input type='submit' class='helpBtn alt' name='input1' value='help toughness' /> 
			<br />

			<h3>Magic</h3>
			<span>$destruction </span> 
			<input type='submit' class='learnBtn' name='input1' value='learn destruction' /> 
			<span class='gold'>$destruction_cost </span> destruction 
			<input type='submit' class='helpBtn alt' name='input1' value='help destruction' /> 
			<br />
			
			<span>$restoration </span> 
			<input type='submit' class='learnBtn' name='input1' value='learn restoration' /> 
			<span class='gold'>$restoration_cost </span> restoration 
			<input type='submit' class='helpBtn alt' name='input1' value='help restoration' /> 
			<br />
			
			<span>$alteration </span> 
			<input type='submit' class='learnBtn' name='input1' value='learn alteration' /> 
			<span class='gold'>$alteration_cost </span> alteration 
			<input type='submit' class='helpBtn alt' name='input1' value='help alteration' /> 
			<br />

			<h3>Training</h3>
			<span>$physicaltraining </span> 
			<input type='submit' class='learnBtn' name='input1' value='learn physical training' /> 
			<span class='gold'>$physicaltraining_cost </span> physical training 
			<input type='submit' class='helpBtn alt' name='input1' value='help physical training' /> 
			<br />
			
			<span>$mentaltraining </span> 
			<input type='submit' class='learnBtn' name='input1' value='learn mental training' /> 
			<span class='gold'>$mentaltraining_cost </span> mental training
			<input type='submit' class='helpBtn alt' name='input1' value='help mental training' /> 
			<br />
			<br/>
<input type='submit' name='input1' value='list skills again' />
<input type='submit' name='input1' value='look around' /></form>
		
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
			<input type='submit' class='auto' name='input1' value='learn one handed again' />
			<input type='submit' class='auto' name='input1' value='list skills again' />
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
			<input type='submit' class='auto' name='input1' value='learn two handed again' />
			<input type='submit' class='auto' name='input1' value='list skills again' />
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
			<input type='submit' class='auto' name='input1' value='learn toughness again' />
			<input type='submit' class='auto' name='input1' value='list skills again' />
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
			<input type='submit' class='auto' name='input1' value='learn ranged again' />
			<input type='submit' class='auto' name='input1' value='list skills again' />
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
			<input type='submit' class='auto' name='input1' value='learn physical training again' />
			<input type='submit' class='auto' name='input1' value='list skills again' />
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
			<input type='submit' class='auto' name='input1' value='learn mental training again' />
			<input type='submit' class='auto' name='input1' value='list skills again' />
			</form>";	
		include ('update_feed.php'); // --- update feed
		
		$query = $link->query("UPDATE $user SET mentaltraining = mentaltraining + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $mentaltraining_cost"); 
		$funflag=1; }
}



if($input=='learn destruction' || $input=='learn destruction again') 
{	if ($destruction >= 10) {
		echo $message="You have learned all the Destruction Skill the Pajama Shaman can teach you. Search for more advanced teachers.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$destruction_cost) {echo $message=$notenoughsp;include ('update_feed.php');$funflag=1;}
	else { 
		echo 'You spend '.$destruction_cost.' sp and increase destruction to '.$destruction_new.'<br/>';
		$message = "You spend $destruction_cost sp and increase destruction to $destruction_new
		<form id='mainForm' method='post' action='' name='formInput'>		
			<input type='submit' class='auto' name='input1' value='learn destruction again' />
			<input type='submit' class='auto' name='input1' value='list skills again' />
			</form> ";	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET destruction = destruction + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $destruction_cost"); 
		$funflag=1; }
}
if($input=='learn restoration' || $input=='learn restoration again') 
{	if ($restoration >= 10) {
		echo $message="You have learned all the Restoration Skill the Pajama Shaman can teach you. Search for more advanced teachers.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$restoration_cost) {echo $message=$notenoughsp;include ('update_feed.php');$funflag=1;}
	else { 
		echo 'You spend '.$restoration_cost.' sp and increase restoration to '.$restoration_new.'<br/>';
		$message = "You spend $restoration_cost sp and increase restoration to $restoration_new
		<form id='mainForm' method='post' action='' name='formInput'>		
			<input type='submit' class='auto' name='input1' value='learn restoration again' />
			<input type='submit' class='auto' name='input1' value='list skills again' />
			</form> ";	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET restoration = restoration + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $restoration_cost"); 
		$funflag=1; }
}
if($input=='learn alteration' || $input=='learn alteration again') 
{	if ($alteration >= 10) {
		echo $message="You have learned all the Alteration Skill the Pajama Shaman can teach you. Search for more advanced teachers.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$alteration_cost) {echo $message=$notenoughsp;include ('update_feed.php');$funflag=1;}
	else { 
		echo 'You spend '.$alteration_cost.' sp and increase alteration to '.$alteration_new.'<br/>';
		$message = "You spend $alteration_cost sp and increase alteration to $alteration_new
		<form id='mainForm' method='post' action='' name='formInput'>		
			<input type='submit' class='auto' name='input1' value='learn alteration again' />
			<input type='submit' class='auto' name='input1' value='list skills again' />
			</form> ";	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET alteration = alteration + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $alteration_cost"); 
		$funflag=1; }
}




}
 
 




?>