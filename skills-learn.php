<?php
// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT! 
while($row = $result->fetch_assoc()){ 	


// ------ COPIED VARIABLES AND MATH FROM SKILLS.PHP!!!

 

// ---------------------------------------------------------------------------------- // START VARIABLES
// ---------------------------------------------------------------------------------- // START VARIABLES
// ---------------------------------------------------------------------------------- // START VARIABLES
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

$quest4 = $row['quest4']; // 1h, 2h, LVL 5
$teleport2 = $row['teleport2']; // 1h, 2h, LVL 10
$quest19 = $row['quest19']; // Warriors Guild Initiation
$quest20 = $row['quest20']; // Wizards Guild Initiation

$youngsoldierFlag = $row['youngsoldierFlag'];
$jacklumberFlag = $row['jacklumberFlag'];
$hunterbillFlag = $row['hunterbillFlag'];
$travelingwarriorFlag = $row['travelingwarriorFlag'];
$travelingwizardFlag = $row['travelingwizardFlag'];
$warriorskillFlag = $row['warriorskillFlag'];
$wizardskillFlag = $row['wizardskillFlag'];
$miningskillFlag = $row['miningskillFlag'];
$rangerskillFlag = $row['rangerskillFlag'];
$mastertrainerFlag = $row['mastertrainerFlag'];
$starcitysskillsFlag = $row['starcitysskillsFlag'];
$starcityspellsFlag = $row['starcityspellsFlag'];

// ----------------------------------------------------------------------------------One Handed MATH
$onehanded = $row['onehanded'];
$onehanded_cost = $onehanded_new = $onehanded + 1;
if ($row['starcitysskillsFlag'] >= 1) { $onehanded_max = 30; }			// blue city
else if ($row['warriorskillFlag'] >= 1) { $onehanded_max = 20; }		// warriors guild
else if ($row['travelingwarriorFlag'] >= 1) { $onehanded_max = 10; }	// traveling warrior
else if ($row['quest4'] >= 2) { $onehanded_max = 5; }			// young soldier
else { $onehanded_max = 0; }
if ($onehanded_cost > $onehanded_max) {$onehanded_cost = 'max';}

// ----------------------------------------------------------------------------------Two Handed MATH
$twohanded = $row['twohanded'];
$twohanded_cost = $twohanded_new = $twohanded + 1;
if ($row['starcitysskillsFlag'] >= 1) { $twohanded_max = 30; }			// blue city
else if ($row['warriorskillFlag'] >= 1) { $twohanded_max = 20; }		// warriors guild
else if ($row['travelingwarriorFlag'] >= 1) { $twohanded_max = 10; }	// traveling warrior
else if ($row['quest4'] >= 2) { $twohanded_max = 5; }			// young soldier
else { $twohanded_max = 0; }
if ($twohanded_cost > $twohanded_max) {$twohanded_cost = 'max';}

// ----------------------------------------------------------------------------------Ranged MATH
$ranged = $row['ranged'];
$ranged_cost = $ranged_new = $ranged + 1;
if ($row['rangerskillFlag'] >= 1) {$ranged_max = 30; }		// ranged 30
else if ($row['hunterbillFlag'] >= 1) {$ranged_max = 15; }	// ranged 15
else if ($row['jacklumberFlag'] >= 1) {$ranged_max = 5; }	// ranged 5
else {$ranged_max = 0; }
if ($ranged_cost > $ranged_max) {$ranged_cost = 'max';}

// ----------------------------------------------------------------------------------Toughness MATH
$toughness = $row['toughness'];
$toughness_cost = $toughness_new = $toughness + 1;
if ($row['starcitysskillsFlag'] >= 1) { $toughness_max = 30; }			// blue city
else if ($row['warriorskillFlag'] >= 1) { $toughness_max = 20; }		// warriors guild
else if ($row['travelingwarriorFlag'] >= 1) { $toughness_max = 10; }	// traveling warrior
else if ($row['quest4'] >= 2) { $toughness_max = 5; }			// young soldier
else { $toughness_max = 0; }
if ($toughness_cost > $toughness_max) {$toughness_cost = 'max';}
// ----------------------------------------------------------------------------------Block MATH
$block = $row['block'];
$block_cost = $block_new = $block + 1;
if ($row['warriorskillFlag'] >= 1) { $block_max = 10; }		// warriors guild
else { $block_max = 0; }
if ($block_cost > $block_max) {$block_cost = 'max';}
// ----------------------------------------------------------------------------------Dodge MATH
$ddge = $row['ddge'];
$ddge_cost = $ddge_new = $ddge + 1;
if ($row['rangerskillFlag'] >= 1) { $ddge_max = 10; }				// rangers guild
else if ($row['hunterbillFlag'] >= 1) { $ddge_max = 5; }		// hunter bill
else { $ddge_max = 0; }
if ($ddge_cost > $ddge_max) {$ddge_cost = 'max';}

// ----------------------------------------------------------------------------------Slice MATH
$slice = $row['slice'];
$slice_cost = $slice_new = $slice + 1;
if ($row['warriorskillFlag'] >= 1) { $slice_max = 10; }				// warriors guild
else if ($row['travelingwarriorFlag'] >= 1) { $slice_max = 5; }		// traveling warrior
else { $slice_max = 0; }
if ($slice_cost > $slice_max) {$slice_cost = 'max';}
// ----------------------------------------------------------------------------------Smash MATH
$smash = $row['smash'];
$smash_cost = $smash_new = $smash + 1;
if ($row['warriorskillFlag'] >= 1) { $smash_max = 10; }				// warriors guild
else if ($row['travelingwarriorFlag'] >= 1) { $smash_max = 5; }		// traveling warrior
else { $smash_max = 0; }
if ($smash_cost > $smash_max) {$smash_cost = 'max';}
// ----------------------------------------------------------------------------------Aim MATH
$aim = $row['aim'];
$aim_cost = $aim_new = $aim + 1;
if ($row['rangerskillFlag'] >= 1) { $aim_max = 20; }				// rangers guild
else if ($row['hunterbillFlag'] >= 1) { $aim_max = 5; }		// hunter bill
else { $aim_max = 0; }
if ($aim_cost > $aim_max) {$aim_cost = 'max';}
// ----------------------------------------------------------------------------------Magic Strike MATH
$magicstrike = $row['magicstrike'];
$magicstrike_cost = $magicstrike_new = $magicstrike + 1;
if ($row['warriorskillFlag'] >= 1) { $magicstrike_max = 10; }				// warriors guild
else { $magicstrike_max = 0; }
if ($magicstrike_cost > $magicstrike_max) {$magicstrike_cost = 'max';}

// ----------------------------------------------------------------------------------Multi Arrow MATH
$multiarrow = $row['multiarrow'];
$multiarrow_cost = $multiarrow_new = $multiarrow + 1;
if ($row['starcitysskillsFlag'] >= 1) { $multiarrow_max = 30; }		// blue city
else if ($row['rangerskillFlag'] >= 1) { $multiarrow_max = 20; }		// rangers guild
else { $multiarrow_max = 0; }
if ($multiarrow_cost > $multiarrow_max) {$multiarrow_cost = 'max';}

// ----------------------------------------------------------------------------------Bolt Upgrade MATH
$boltupgrade = $row['boltupgrade'];
$boltupgrade_cost = $boltupgrade_new = $boltupgrade + 1;
if ($row['starcitysskillsFlag'] >= 1) { $boltupgrade_max = 30; }		// blue city
else if ($row['rangerskillFlag'] >= 1) { $boltupgrade_max = 20; }		// rangers guild
else { $boltupgrade_max = 0; }
if ($boltupgrade_cost > $boltupgrade_max) {$boltupgrade_cost = 'max';}



// ----------------------------------------------------------------------------------PT MATH
$physicaltraining = $row['physicaltraining'];
$physicaltraining_cost = $physicaltraining_new = $physicaltraining + 1;
if ($row['starcitysskillsFlag'] >= 1) { $physicaltraining_max = 30; }			// blue city
else if ($row['rangerskillFlag'] >= 1) { $physicaltraining_max = 25; }			// rangers guild
else if ($row['warriorskillFlag'] >= 1) { $physicaltraining_max = 20; }		// warriors guild
else { $physicaltraining_max = 10; }
if ($physicaltraining_cost > $physicaltraining_max) {$physicaltraining_cost = 'max';}

// ----------------------------------------------------------------------------------MT MATH
$mentaltraining = $row['mentaltraining'];
$mentaltraining_cost = $mentaltraining_new = $mentaltraining + 1;
if ($row['starcitysskillsFlag'] >= 1) { $mentaltraining_max = 30; }			// blue city
else if ($row['rangerskillFlag'] >= 1) { $mentaltraining_max = 25; }		// rangers guild
else if ($row['wizardskillFlag'] >= 1) { $mentaltraining_max = 20; }		// wizards guild
else { $mentaltraining_max = 10; }
if ($mentaltraining_cost > $mentaltraining_max) {$mentaltraining_cost = 'max';}
// ---------------------------------------------------------------------------------- // END VARIABLES
// ---------------------------------------------------------------------------------- // END VARIABLES
// ---------------------------------------------------------------------------------- // END VARIABLES



// ------ END COPIED VARIABLES


// -------------------------------------------------------------------------------One Handed - learn
if($input=='learn one handed') 
{	
	if ($onehanded_cost == 'max') {
		echo $message="You have MAXED out your One Handed skill! Search for more advanced teachers.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$onehanded_cost) {echo $message=$notenoughsp;include ('update_feed.php');}
	else { 	
		echo $message = "
		<div class='learnBox'>
		(You spend $onehanded_cost SP)
		<strong class='px40 red'>One Handed </strong>
		is now level
		<strong class='px60 red'>$onehanded_new</strong>
		</div>";		
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET onehanded = onehanded + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $onehanded_cost"); 
		}
}


// -------------------------------------------------------------------------------One Handed - learn MAX
if($input=='max one handed') 
{	 
	if($sp<$onehanded_cost && $onehanded_cost !='max') {echo $message=$notenoughsp;include ('update_feed.php');}
	
	else while ($onehanded_cost <= $onehanded_max && $onehanded_cost <= $sp) 
	{
		echo $message = "
		<div class='learnBox'>
		(You spend $onehanded_cost SP)
		<strong class='px40 red'>One Handed </strong>
		is now level
		<strong class='px60 red'>$onehanded_new</strong>
		</div>";		
			
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET onehanded = onehanded + 1");  
		$query = $link->query("UPDATE $user SET sp = sp - $onehanded_cost"); 
		$onehanded_new = $onehanded_new + 1;  
		$onehanded_cost = $onehanded_cost + 1;
		$sp = $sp - $onehanded_cost;
	}
	if($onehanded_max == $onehanded_new-1) {
					echo $message="<strong class='learnBox px30 red'>ONE HANDED MAX!</strong>";
					include ('update_feed.php'); 
					}				
	else if($sp<$onehanded_cost) {
					echo $message='You don\'t have enough SP!'; 
					include ('update_feed.php');   
					}
	}
// -------------------------------------------------------------------------------Two Handed - learn
if($input=='learn two handed') 
{	
	if ($twohanded_cost == 'max') {
		echo $message="You have MAXED out your Two Handed skill! Search for more advanced teachers.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$twohanded_cost) {echo $message=$notenoughsp;include ('update_feed.php');}
	else { 
		echo $message = "
		<div class='learnBox'>
		(You spend $twohanded_cost SP)
		<strong class='px40 red'>Two Handed </strong>
		is now level
		<strong class='px60 red'>$twohanded_new</strong>
		</div>";		
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET twohanded = twohanded + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $twohanded_cost"); 
		}
} 
// -------------------------------------------------------------------------------Two Handed - learn MAX
if($input=='max two handed') 
{	 
	if($sp<$twohanded_cost && $twohanded_cost !='max') {echo $message=$notenoughsp;include ('update_feed.php');}
	
	else while ($twohanded_cost <= $twohanded_max && $twohanded_cost <= $sp) 
	{
		echo $message = "
		<div class='learnBox'>
		(You spend $twohanded_cost SP)
		<strong class='px40 red'>Two Handed </strong>
		is now level
		<strong class='px60 red'>$twohanded_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET twohanded = twohanded + 1");  
		$query = $link->query("UPDATE $user SET sp = sp - $twohanded_cost"); 
		$twohanded_new = $twohanded_new + 1;  
		$twohanded_cost = $twohanded_cost + 1;
		$sp = $sp - $twohanded_cost;
	}
	if($twohanded_max == $twohanded_new-1) {
					echo $message="<strong class='learnBox px30 red'>TWO HANDED MAX!</strong>";
					include ('update_feed.php'); 
					}				
	else if($sp<$twohanded_cost) {
					echo $message='You don\'t have enough SP!'; 
					include ('update_feed.php');   
					}
	}
// -------------------------------------------------------------------------------Ranged - learn
if($input=='learn ranged') 
{	
	if ($ranged_cost == 'max') {
		echo $message="You have MAXED out your Ranged skill! Search for more advanced teachers.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$ranged_cost) {echo $message=$notenoughsp;include ('update_feed.php');}
	else { 
		echo $message = "
		<div class='learnBox'>
		(You spend $ranged_cost SP)
		<strong class='px40 green'>Ranged </strong>
		is now level
		<strong class='px60 green'>$ranged_new</strong>
		</div>";	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ranged = ranged + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $ranged_cost"); 
		}
}
// -------------------------------------------------------------------------------Ranged - learn MAX
if($input=='max ranged') 
{	 
	if($sp<$ranged_cost && $ranged_cost !='max') {echo $message=$notenoughsp;include ('update_feed.php');}
	
	else while ($ranged_cost <= $ranged_max && $ranged_cost <= $sp) 
	{
		echo $message = "
		<div class='learnBox'>
		(You spend $ranged_cost SP)
		<strong class='px40 green'>Ranged </strong>
		is now level
		<strong class='px60 green'>$ranged_new</strong>
		</div>";
		
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ranged = ranged + 1");  
		$query = $link->query("UPDATE $user SET sp = sp - $ranged_cost"); 
		$ranged_new = $ranged_new + 1;  
		$ranged_cost = $ranged_cost + 1;
		$sp = $sp - $ranged_cost;
	}
	if($ranged_max == $ranged_new-1) {
					echo $message="<strong class='learnBox px30 green'>RANGED MAX!</strong>";
					include ('update_feed.php'); 
					}				
	else if($sp<$ranged_cost) {
					echo $message='You don\'t have enough SP!'; 
					include ('update_feed.php');   
					}
	}
// -------------------------------------------------------------------------------Toughness - learn
if($input=='learn toughness') 
{	
	if ($toughness_cost == 'max') {
		echo $message="You have MAXED out your Toughness skill! Search for more advanced teachers.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$toughness_cost) {echo $message=$notenoughsp;include ('update_feed.php');}
	else { 
		echo $message = "
		<div class='learnBox'>
		(You spend $toughness_cost SP)
		<strong class='px40 gold'>Toughness </strong>
		is now level
		<strong class='px60 gold'>$toughness_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET toughness = toughness + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $toughness_cost"); 
		}
}
// -------------------------------------------------------------------------------Toughness - learn MAX
if($input=='max toughness') 
{	 
	if($sp<$toughness_cost && $toughness_cost !='max') {echo $message=$notenoughsp;include ('update_feed.php');}
	
	else while ($toughness_cost <= $toughness_max && $toughness_cost <= $sp) 
	{
		echo $message = "
		<div class='learnBox'>
		(You spend $toughness_cost SP)
		<strong class='px40 gold'>Toughness </strong>
		is now level
		<strong class='px60 gold'>$toughness_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET toughness = toughness + 1");  
		$query = $link->query("UPDATE $user SET sp = sp - $toughness_cost"); 
		$toughness_new = $toughness_new + 1;  
		$toughness_cost = $toughness_cost + 1;
		$sp = $sp - $toughness_cost;
	}
	if($toughness_max == $toughness_new-1) {
					echo $message="<strong class='learnBox px30 gold'>TOUGHNESS MAX!</strong>";
					include ('update_feed.php'); 
					}				
	else if($sp<$toughness_cost) {
					echo $message='You don\'t have enough SP!'; 
					include ('update_feed.php');   
					}
	}
// -------------------------------------------------------------------------------Dodge - learn
if($input=='learn dodge') 
{	
	if ($ddge_cost == 'max') {
		echo $message="You have MAXED out your Dodge skill! Search for more advanced teachers.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$ddge_cost) {echo $message=$notenoughsp;include ('update_feed.php');}
	else { 
		echo $message = "
		<div class='learnBox'>
		(You spend $ddge_cost SP)
		<strong class='px40 gold'>Dodge </strong>
		is now level
		<strong class='px60 gold'>$ddge_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ddge = ddge + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $ddge_cost"); 
		}
}
// -------------------------------------------------------------------------------Dodge - learn MAX
if($input=='max dodge') 
{	 
	if($sp<$ddge_cost && $ddge_cost !='max') {echo $message=$notenoughsp;include ('update_feed.php');}
	
	else while ($ddge_cost <= $ddge_max && $ddge_cost <= $sp) 
	{
		echo $message = "
		<div class='learnBox'>
		(You spend $ddge_cost SP)
		<strong class='px40 gold'>Dodge </strong>
		is now level
		<strong class='px60 gold'>$ddge_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ddge = ddge + 1");  
		$query = $link->query("UPDATE $user SET sp = sp - $ddge_cost"); 
		$ddge_new = $ddge_new + 1;  
		$ddge_cost = $ddge_cost + 1;
		$sp = $sp - $ddge_cost;
	}
	if($ddge_max == $ddge_new-1) {
					echo $message="<strong class='learnBox px30 gold'>DODGE MAX!</strong>";
					include ('update_feed.php'); 
					}				
	else if($sp<$ddge_cost) {
					echo $message='You don\'t have enough SP!'; 
					include ('update_feed.php');   
					}
	}
// -------------------------------------------------------------------------------Block - learn
if($input=='learn block') 
{	
	if ($block_cost == 'max') {
		echo $message="You have MAXED out your Block skill! Search for more advanced teachers.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$block_cost) {echo $message=$notenoughsp;include ('update_feed.php');}
	else { 
		echo $message = "
		<div class='learnBox'>
		(You spend $block_cost SP)
		<strong class='px40 gold'>Block </strong>
		is now level
		<strong class='px60 gold'>$block_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET block = block + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $block_cost"); 
		}
}
// -------------------------------------------------------------------------------Block - learn MAX
if($input=='max block') 
{	 
	if($sp<$block_cost && $block_cost !='max') {echo $message=$notenoughsp;include ('update_feed.php');}
	
	else while ($block_cost <= $block_max && $block_cost <= $sp) 
	{
		echo $message = "
		<div class='learnBox'>
		(You spend $block_cost SP)
		<strong class='px40 gold'>Block </strong>
		is now level
		<strong class='px60 gold'>$block_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET block = block + 1");  
		$query = $link->query("UPDATE $user SET sp = sp - $block_cost"); 
		$block_new = $block_new + 1;  
		$block_cost = $block_cost + 1;
		$sp = $sp - $block_cost;
	}
	if($block_max == $block_new-1) {
					echo $message="<strong class='learnBox px30 gold'>BLOCK MAX!</strong>";
					include ('update_feed.php'); 
					}				
	else if($sp<$block_cost) {
					echo $message='You don\'t have enough SP!'; 
					include ('update_feed.php');   
					}
	}

// -------------------------------------------------------------------------------Slice - learn
if($input=='learn slice') 
{	
	if ($slice_cost == 'max') {
		echo $message="You have MAXED out your Slice skill! Search for more advanced teachers.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$slice_cost) {echo $message=$notenoughsp;include ('update_feed.php');}
	else { 
		echo $message = "
		<div class='learnBox'>
		(You spend $slice_cost SP)
		<strong class='px40 red'>Slice </strong>
		is now level
		<strong class='px60 red'>$slice_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET slice = slice + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $slice_cost"); 
		}
}
// -------------------------------------------------------------------------------Slice - learn MAX
if($input=='max slice') 
{	 
	if($sp<$slice_cost && $slice_cost !='max') {echo $message=$notenoughsp;include ('update_feed.php');}
	
	else while ($slice_cost <= $slice_max && $slice_cost <= $sp) 
	{
		echo $message = "
		<div class='learnBox'>
		(You spend $slice_cost SP)
		<strong class='px40 red'>Slice </strong>
		is now level
		<strong class='px60 red'>$slice_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET slice = slice + 1");  
		$query = $link->query("UPDATE $user SET sp = sp - $slice_cost"); 
		$slice_new = $slice_new + 1;  
		$slice_cost = $slice_cost + 1;
		$sp = $sp - $slice_cost;
	}
	if($slice_max == $slice_new-1) {
					echo $message="<strong class='learnBox px30 red'>SLICE MAX!</strong>";
					include ('update_feed.php'); 
					}				
	else if($sp<$slice_cost) {
					echo $message='You don\'t have enough SP!'; 
					include ('update_feed.php');   
					}
	}
// -------------------------------------------------------------------------------Smash - learn
if($input=='learn smash') 
{	
	if ($smash_cost == 'max') {
		echo $message="You have MAXED out your Smash skill! Search for more advanced teachers.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$smash_cost) {echo $message=$notenoughsp;include ('update_feed.php');}
	else { 
		echo $message = "
		<div class='learnBox'>
		(You spend $smash_cost SP)
		<strong class='px40 red'>Smash </strong>
		is now level
		<strong class='px60 red'>$smash_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET smash = smash + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $smash_cost"); 
		}
}
// -------------------------------------------------------------------------------Smash - learn MAX
if($input=='max smash') 
{	 
	if($sp<$smash_cost && $smash_cost !='max') {echo $message=$notenoughsp;include ('update_feed.php');}
	
	else while ($smash_cost <= $smash_max && $smash_cost <= $sp) 
	{
		echo $message = "
		<div class='learnBox'>
		(You spend $smash_cost SP)
		<strong class='px40 red'>Smash </strong>
		is now level
		<strong class='px60 red'>$smash_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET smash = smash + 1");  
		$query = $link->query("UPDATE $user SET sp = sp - $smash_cost"); 
		$smash_new = $smash_new + 1;  
		$smash_cost = $smash_cost + 1;
		$sp = $sp - $smash_cost;
	}
	if($smash_max == $smash_new-1) {
					echo $message="<strong class='learnBox px30 red'>SMASH MAX!</strong>";
					include ('update_feed.php'); 
					}				
	else if($sp<$smash_cost) {
					echo $message='You don\'t have enough SP!'; 
					include ('update_feed.php');   
					}
	}
// -------------------------------------------------------------------------------Aim - learn
if($input=='learn aim') 
{	
	if ($aim_cost == 'max') {
		echo $message="You have MAXED out your Aim skill! Search for more advanced teachers.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$aim_cost) {echo $message=$notenoughsp;include ('update_feed.php');}
	else { 
		echo $message = "
		<div class='learnBox'>
		(You spend $aim_cost SP)
		<strong class='px40 green'>Aim </strong>
		is now level
		<strong class='px60 green'>$aim_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET aim = aim + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $aim_cost"); 
		}
}
// -------------------------------------------------------------------------------Aim - learn MAX
if($input=='max aim') 
{	 
	if($sp<$aim_cost && $aim_cost !='max') {echo $message=$notenoughsp;include ('update_feed.php');}
	
	else while ($aim_cost <= $aim_max && $aim_cost <= $sp) 
	{
		echo $message = "
		<div class='learnBox'>
		(You spend $aim_cost SP)
		<strong class='px40 green'>Aim </strong>
		is now level
		<strong class='px60 green'>$aim_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET aim = aim + 1");  
		$query = $link->query("UPDATE $user SET sp = sp - $aim_cost"); 
		$aim_new = $aim_new + 1;  
		$aim_cost = $aim_cost + 1;
		$sp = $sp - $aim_cost;
	}
	if($aim_max == $aim_new-1) {
					echo $message="<strong class='learnBox px30 green'>AIM MAX!</strong>";
					include ('update_feed.php'); 
					}				
	else if($sp<$aim_cost) {
					echo $message='You don\'t have enough SP!'; 
					include ('update_feed.php');   
					}
	}
// -------------------------------------------------------------------------------Multi Arrow - learn
if($input=='learn multi arrow') 
{	
	if ($multiarrow_cost == 'max') {
		echo $message="You have MAXED out your Multi Arrow skill! Search for more advanced teachers.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$multiarrow_cost) {echo $message=$notenoughsp;include ('update_feed.php');}
	else { 
		echo $message = "
		<div class='learnBox'>
		(You spend $multiarrow_cost SP)
		<strong class='px40 green'>Multi Arrow </strong>
		is now level
		<strong class='px60 green'>$multiarrow_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET multiarrow = multiarrow + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $multiarrow_cost"); 
		}
}
// -------------------------------------------------------------------------------Multi Arrow - learn MAX
if($input=='max multi arrow') 
{	 
	if($sp<$multiarrow_cost && $multiarrow_cost !='max') {echo $message=$notenoughsp;include ('update_feed.php');}
	
	else while ($multiarrow_cost <= $multiarrow_max && $multiarrow_cost <= $sp) 
	{
		echo $message = "
		<div class='learnBox'>
		(You spend $multiarrow_cost SP)
		<strong class='px40 green'>Multi Arrow </strong>
		is now level
		<strong class='px60 green'>$multiarrow_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET multiarrow = multiarrow + 1");  
		$query = $link->query("UPDATE $user SET sp = sp - $multiarrow_cost"); 
		$multiarrow_new = $multiarrow_new + 1;  
		$multiarrow_cost = $multiarrow_cost + 1;
		$sp = $sp - $multiarrow_cost;
	}
	if($multiarrow_max == $multiarrow_new-1) {
					echo $message="<strong class='learnBox px30 green'>MULTI ARROW MAX!</strong>";
					include ('update_feed.php'); 
					}				
	else if($sp<$multiarrow_cost) {
					echo $message='You don\'t have enough SP!'; 
					include ('update_feed.php');   
					}
	}


// -------------------------------------------------------------------------------Bolt Upgrade - learn
if($input=='learn bolt upgrade') 
{	
	if ($boltupgrade_cost == 'max') {
		echo $message="You have MAXED out your Bolt Upgrade skill! Search for more advanced teachers.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$boltupgrade_cost) {echo $message=$notenoughsp;include ('update_feed.php');}
	else { 
		echo $message = "
		<div class='learnBox'>
		(You spend $boltupgrade_cost SP)
		<strong class='px40 green'>Bolt Upgrade </strong>
		is now level
		<strong class='px60 green'>$boltupgrade_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET boltupgrade = boltupgrade + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $boltupgrade_cost"); 
		}
}
// -------------------------------------------------------------------------------Bolt Upgrade - learn MAX
if($input=='max bolt upgrade') 
{	 
	if($sp<$boltupgrade_cost && $boltupgrade_cost !='max') {echo $message=$notenoughsp;include ('update_feed.php');}
	
	else while ($boltupgrade_cost <= $boltupgrade_max && $boltupgrade_cost <= $sp) 
	{
		echo $message = "
		<div class='learnBox'>
		(You spend $boltupgrade_cost SP)
		<strong class='px40 green'>Bolt Upgrade </strong>
		is now level
		<strong class='px60 green'>$boltupgrade_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET boltupgrade = boltupgrade + 1");  
		$query = $link->query("UPDATE $user SET sp = sp - $boltupgrade_cost"); 
		$boltupgrade_new = $boltupgrade_new + 1;  
		$boltupgrade_cost = $boltupgrade_cost + 1;
		$sp = $sp - $boltupgrade_cost;
	}
	if($boltupgrade_max == $boltupgrade_new-1) {
					echo $message="<strong class='learnBox px30 green'>BOLT UPGRADE MAX!</strong>";
					include ('update_feed.php'); 
					}				
	else if($sp<$boltupgrade_cost) {
					echo $message='You don\'t have enough SP!'; 
					include ('update_feed.php');   
					}
	}



// -------------------------------------------------------------------------------Magic Strike - learn
if($input=='learn magic strike') 
{	
	if ($magicstrike_cost == 'max') {
		echo $message="You have MAXED out your Magic Strike skill! Search for more advanced teachers.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$magicstrike_cost) {echo $message=$notenoughsp;include ('update_feed.php');}
	else { 
		echo $message = "
		<div class='learnBox'>
		(You spend $magicstrike_cost SP)
		<strong class='px40 blue'>Magic Strike </strong>
		is now level
		<strong class='px60 blue'>$magicstrike_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET magicstrike = magicstrike + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $magicstrike_cost"); 
		}
}
// -------------------------------------------------------------------------------Magic Strike - learn MAX
if($input=='max magic strike') 
{	 
	if($sp<$magicstrike_cost && $magicstrike_cost !='max') {echo $message=$notenoughsp;include ('update_feed.php');}
	
	else while ($magicstrike_cost <= $magicstrike_max && $magicstrike_cost <= $sp) 
	{
		echo $message = "
		<div class='learnBox'>
		(You spend $magicstrike_cost SP)
		<strong class='px40 blue'>Magic Strike </strong>
		is now level
		<strong class='px60 blue'>$magicstrike_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET magicstrike = magicstrike + 1");  
		$query = $link->query("UPDATE $user SET sp = sp - $magicstrike_cost"); 
		$magicstrike_new = $magicstrike_new + 1;  
		$magicstrike_cost = $magicstrike_cost + 1;
		$sp = $sp - $magicstrike_cost;
	}
	if($magicstrike_max == $magicstrike_new-1) {
					echo $message="<strong class='learnBox px30 blue'>MAGIC STRIKE MAX!</strong>";
					include ('update_feed.php'); 
					}				
	else if($sp<$magicstrike_cost) {
					echo $message='You don\'t have enough SP!'; 
					include ('update_feed.php');   
					}
	}




// -------------------------------------------------------------------------------Physical Training - learn
if($input=='learn physical training') 
{	
	if ($physicaltraining_cost == 'max') {
		echo $message="You have MAXED out your Physical Training skill! Search for more advanced teachers.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$physicaltraining_cost) {echo $message=$notenoughsp;include ('update_feed.php');}
	else { 
		echo $message = "
		<div class='learnBox'>
		(You spend $physicaltraining_cost SP)
		<strong class='px40 red'>Physical Training </strong>
		is now level
		<strong class='px60 red'>$physicaltraining_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET physicaltraining =physicaltraining + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $physicaltraining_cost"); 
		}
}
// -------------------------------------------------------------------------------Physical Training - learn MAX
if($input=='max physical training') 
{	 
	if($sp<$physicaltraining_cost && $physicaltraining_cost !='max') {echo $message=$notenoughsp;include ('update_feed.php');}
	
	else while ($physicaltraining_cost <= $physicaltraining_max && $physicaltraining_cost <= $sp) 
	{
		echo $message = "
		<div class='learnBox'>
		(You spend $physicaltraining_cost SP)
		<strong class='px40 red'>Physical Training </strong>
		is now level
		<strong class='px60 red'>$physicaltraining_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET physicaltraining = physicaltraining + 1");  
		$query = $link->query("UPDATE $user SET sp = sp - $physicaltraining_cost"); 
		$physicaltraining_new = $physicaltraining_new + 1;  
		$physicaltraining_cost = $physicaltraining_cost + 1;
		$sp = $sp - $physicaltraining_cost;
	}
	if($physicaltraining_max == $physicaltraining_new-1) {
					echo $message="<strong class='learnBox px30 red'>PHYSICAL TRAINING MAX!</strong>";
					include ('update_feed.php'); 
					}				
	else if($sp<$physicaltraining_cost) {
					echo $message='You don\'t have enough SP!'; 
					include ('update_feed.php');   
					}
	}


// -------------------------------------------------------------------------------Mental Training - learn
if($input=='learn mental training') 
{	
	if ($mentaltraining_cost == 'max') {
		echo $message="You have MAXED out your Mental Training skill! Search for more advanced teachers.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$mentaltraining_cost) {echo $message=$notenoughsp;include ('update_feed.php');}
	else { 
		echo $message = "
		<div class='learnBox'>
		(You spend $mentaltraining_cost SP)
		<strong class='px40 blue'>Mental Training </strong>
		is now level
		<strong class='px60 blue'>$mentaltraining_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET mentaltraining = mentaltraining + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $mentaltraining_cost"); 
		}
}
// -------------------------------------------------------------------------------Mental Training - learn MAX
if($input=='max mental training') 
{	 
	if($sp<$mentaltraining_cost && $mentaltraining_cost !='max') {echo $message=$notenoughsp;include ('update_feed.php');}
	
	else while ($mentaltraining_cost <= $mentaltraining_max && $mentaltraining_cost <= $sp) 
	{
		echo $message = "
		<div class='learnBox'>
		(You spend $mentaltraining_cost SP)
		<strong class='px40 blue'>Mental Training </strong>
		is now level
		<strong class='px60 blue'>$mentaltraining_new</strong>
		</div>";
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET mentaltraining = mentaltraining + 1");  
		$query = $link->query("UPDATE $user SET sp = sp - $mentaltraining_cost"); 
		$mentaltraining_new = $mentaltraining_new + 1;  
		$mentaltraining_cost = $mentaltraining_cost + 1;
		$sp = $sp - $mentaltraining_cost;
	}
	if($mentaltraining_max == $mentaltraining_new-1) {
					echo $message="<strong class='learnBox px30 blue'>MENTAL TRAINING MAX!</strong>";
					include ('update_feed.php'); 
					}				
	else if($sp<$mentaltraining_cost) {
					echo $message='You don\'t have enough SP!'; 
					include ('update_feed.php');   
					}
	}





}
 
 




?>