<?php
// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 	


$_SESSION['magiccast'] = 0;
$_SESSION['noMPregen'] = 0;
$_SESSION['slice'] = 0;
$_SESSION['smash'] = 0;
$_SESSION['aim'] = 0;

		$infight = $row['infight'];
		$mp = $row['mp'];

		$flying = $_SESSION['flying'];
		$breathingwater = $_SESSION['breathingwater'];
		
		$onehanded=$row['onehanded'];   
		$twohanded=$row['twohanded'];   
		$ranged=$row['ranged'];   		

		$infight = $row['infight'];
		$endfight = $row['endfight'];
// -------------------------------------------------------------------------- OFFENCE
// -------------------------------------------------------------------------- OFFENCE
// -------------------------------------------------------------------------- OFFENCE

// -------------------------------------------------------------------------- ACTION/CAST SLICE
if($input=='slice') {
	if ($mp < $slice_cost_cast )
		{
			echo $message="<i class='redBG lightgray'>You don't have enough MP to SLICE!</i><br/>";
			include ('update_feed_alt.php'); // --- update feed
		}
	else {	
		$_SESSION['slice'] = 1;
		$input = 'attack';
			$_SESSION['noMPregen'] = 1;

		}
	}
// -------------------------------------------------------------------------- ACTION/CAST SMASH
if($input=='smash') {
	if ($mp < $smash_cost_cast )
		{
			echo $message="<i class='redBG lightgray'>You don't have enough MP to SMASH!</i><br/>";
			include ('update_feed_alt.php'); // --- update feed
		}
	else {	
		$_SESSION['smash'] = 1;
		$input = 'attack';
			$_SESSION['noMPregen'] = 1;

		}
	}
// -------------------------------------------------------------------------- ACTION/CAST AIM
if($input=='aim') {
	if ($mp < $aim_cost_cast )
		{
			echo $message="<i class='redBG lightgray'>You don't have enough MP to AIM!</i><br/>";
			include ('update_feed_alt.php'); // --- update feed
		}
    else {	
		$_SESSION['aim'] = 1;
		$input = 'attack';
			$_SESSION['noMPregen'] = 1;

		//$results = $link->query("UPDATE $user SET mp = mp - $aim_cost_cast"); // -- mp change
		}	
	}	

// -------------------------------------------------------------------------- CAST FIREBALL
if($input=='cast fireball' || $input=='fireball') 
{		
	$hp = $row['hp']; 
   	$hpmax = $row['hpmax'];
   	$magic_base = $row['fireball'] ; // Base damage is spell level // OR 0 // reset magic damage
	$spell_level = $row['fireball'];
	$spell_cost = 5 + ($row['fireball']*2); // was *1
   	
	$magic_rand = rand (1,$row['magmod']);
	// $magic_mod = ($spell_level / 5) + 1;
	$magic_mod = ($spell_level * .05) + 1;
	$magic_add = floor($magic_rand * $magic_mod); // round up
	$magic_amount = $magic_base + $magic_add;

	echo '<span class="darkblue">[ '.$magic_base.' + ('.$magic_rand.' x '.$magic_mod.') = '.$magic_amount.' ] </span> ';

	//echo ' Base: '.$magic_base.', ';
	//echo ' Rnd: '.$magic_rand.', ';
	//echo ' Mod%:'.$magic_mod.', ';
	//echo ' Amt: '.$magic_amount.', ';
	//echo ' RNDup: '.$magic_amount.'<br/>';
	
		//while ($countdown > 0) // WILL BE ATOMIC BLAST
//	{
   	//	$fireball_add = rand (1,$row['magmod']);
   	//		echo ' + '.$fireball_add;
   	//	$magic_amount = $magic_amount + $fireball_add;
   	//	$countdown = $countdown - 1;
  // }
   
   if ($row['fireball'] < 1)
	{
	//	echo $message="<i>You don't know the Fireball spell</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else
	{
	$message=""; //so doesn't display message in HUD battle status
	$magiccast = 1;
	$_SESSION['magiccast'] = 1;
	$input = 'attack';
	$_SESSION['spell'] = $spell = 'Fireball';
	$_SESSION['spellColor'] = $spellColor = 'red';
	}
//$funflag=1;		
}

// -------------------------------------------------------------------------- CAST frostball
if($input=='cast frostball' || $input=='frostball') 
{	
   	$hp = $row['hp'];
   	$hpmax = $row['hpmax'];
   	$magic_base = $row['frostball'];
	$spell_level = $row['frostball'];
	$spell_cost = 5 + ($row['frostball']*2); // was *1
   	
	$magic_rand = rand (1,$row['magmod']);
	// $magic_mod = ($spell_level / 5) + 1;
	$magic_mod = ($spell_level * .05) + 1;
	$magic_add = floor($magic_rand * $magic_mod); // round up
	$magic_amount = $magic_base + $magic_add;
	
	echo '<span class="darkblue">[ '.$magic_base.' + ('.$magic_rand.' x '.$magic_mod.') = '.$magic_amount.' ] </span> ';
    if ($row['frostball'] < 1)
	{
	include ('update_feed.php'); // --- update feed
	}
	else
	{
	$message=""; //so doesn't display message in HUD battle status
	$_SESSION['magiccast'] = 1;
	$input = 'attack';
	$_SESSION['spell'] = $spell = 'frostball';
	$_SESSION['spellColor'] = $spellColor = 'blue';
	}
}


// -------------------------------------------------------------------------- CAST poison dart
if ($infight == 0) {$_SESSION['poison_amt']=0;}

if($input=='cast poison dart' || $input=='poison dart') 
{	
   	$hp = $row['hp'];
   	$mp = $row['mp'];
   	$hpmax = $row['hpmax'];
   	$magic_base = $row['poisondart'];
	$spell_level = $row['poisondart'];
	$spell_cost = 5 + ($row['poisondart']*3); // was 10 + lvl*1

	if ($_SESSION['poison_amt'] <= 1 && $mp >= $spell_cost) {
		$_SESSION['poison_amt'] = $poison_amt = rand (1,$row['poisondart']*2);   	
	}
	
	$magic_rand = rand (1,$row['magmod']);
	//$magic_mod = ($spell_level / 5) + 1;
	$magic_mod = ($spell_level * .05) + 1;
	$magic_add = floor($magic_rand * $magic_mod); // round up
	$magic_amount = $magic_base + $magic_add;
	
	// echo '<span>[ </span><span class="darkblue">'.$magic_base.' + '.$magic_add.' </span><span> = '.$magic_amount.' ] </span>';
	echo '<span class="darkblue">[ '.$magic_base.' + ('.$magic_rand.' x '.$magic_mod.') = '.$magic_amount.' ] </span> ';

    if ($row['poisondart'] < 1)
	{
	include ('update_feed.php'); // --- update feed
	}
	else
	{
	$message=""; //so doesn't display message in HUD battle status
	$_SESSION['magiccast'] = 1;
	$input = 'attack';
	$_SESSION['spell'] = $spell = 'poison dart';
	$_SESSION['spellColor'] = $spellColor = 'green';
	}
}
// -------------------------------------------------------------------------- CAST atomic blast
if($input=='cast atomic blast' || $input=='atomic blast') 
{	
	$spell_level = $row['atomicblast'];
	$spell_cost = 100 * $row['atomicblast'];   	
   	
	$magic_amount = rand (1,$row['magmod']);
	$countdown = $row['atomicblast'];
	echo ' <span class="darkblue">[ '.$magic_amount;
	while ($countdown > 1) // WILL BE ATOMIC BLAST
	{
   		$atomicblast_add = rand (1,$row['magmod']);
   			echo ' + '.$atomicblast_add;
   		$magic_amount = $magic_amount + $atomicblast_add;
   		$countdown = $countdown - 1;
   } 
	echo ' = '.$magic_amount.' ] </span> ';
    if ($row['atomicblast'] < 1)
	{
	include ('update_feed.php'); // --- update feed
	}
	else
	{
	$message=""; //so doesn't display message in HUD battle status
	$_SESSION['magiccast'] = 1;
	$input = 'attack';
	$_SESSION['spell'] = $spell = 'atomic blast';
	$_SESSION['spellColor'] = $spellColor = 'ddgray';

	}
}

// -------------------------------------------------------------------------- magic strike
if($input=='magic strike') 
{	
   	$hp = $row['hp'];
   	$hpmax = $row['hpmax'];
	$spell_level = $row['magicstrike'];
	$spell_cost = $row['magicstrike']*2;   	
	
	//cost: lvl*2	dam + ( lvl x 10% mag )
   	//echo $row['weapontype'];
	
	$att_rand = rand (1,$row['strmod']);										//str base
		
			$damageskill = rand (0, $ranged);

	if ($row['weapontype'] == 1) { 		//1h base
		$att_rand = rand (1,$row['strmod']);
		$damageskill = rand (0, $onehanded);
		} 	
	if ($row['weapontype'] == 2) { 		//2h base
		$att_rand = rand (1,$row['strmod']);
		$damageskill = rand (0, $twohanded);
		} 		
	
	if ($row['weapontype'] == 3) { 		//dex base
		$att_rand = rand (1,$row['dexmod']);
		$damageskill = rand (0, $ranged);
		} 	
	
	$att_rand = $att_rand + $damageskill;
	
	$magic_base = rand (1,$row['magmod']);
	$magic_addition = $magic_base * ($spell_level / 20);
	$magic_amount = ($att_rand + $magic_addition);
	$magic_amount = floor($magic_amount) + 1; // round up
	$_SESSION['mag_plus'] = $mag_plus = $magic_amount - $att_rand; // overall magic increase
	
	//echo ' Rnd: '.$att_rand.', ';
	//echo ' MagB: '.$magic_base.', ';
	//echo ' mod%: '.($spell_level / 10).', ';
	//echo ' MagA: '.$magic_addition.', ';
	//echo ' Amt: '.$magic_amount.', ';
	//echo ' RNDup: '.$magic_amount.', ';
	
	if ($row['weapontype'] == 3) { 	
		echo '<span>[ </span><span class="green"> '.$att_rand.' </span> <span>+</span> <span class="darkblue"> '.$mag_plus.' </span> <span> = '.$magic_amount.' ] </span> '; 
		}
	else { echo '<span>[ </span><span class="red"> '.$att_rand.' </span> <span>+</span> <span class="darkblue"> '.$mag_plus.' </span> <span> = '.$magic_amount.' ] </span> ';
	}
    if ($row['magicstrike'] < 1)
	{
	include ('update_feed.php'); // --- update feed
	}
	else
	{
	$message=""; //so doesn't display message in HUD battle status
	$_SESSION['magiccast'] = 1;
	$input = 'attack';
	$_SESSION['spell'] = $spell = 'magic strike';
	$_SESSION['spellColor'] = $spellColor = 'blue';

	}
}


// -------------------------------------------------------------------------- BUFF / HEAL
// -------------------------------------------------------------------------- BUFF / HEAL
// -------------------------------------------------------------------------- BUFF / HEAL
		

// -------------------------------------------------------------------------- CAST wings
if($input=='cast wings' || $input=='wings') 
{	
	$wings_cost = $row['wings']*10;
	if	($flying>=1) { echo $message = "You are already flying!<br/>"; include ('update_feed.php'); } // --- update feed	
	else if ($row['wings'] < 1) {
		echo $message = "<i>You don't know the wings spell</i><br/>";
		include ('update_feed_alt.php'); // --- update feed
		}
	else {
		$flying = $_SESSION['flying'] = $row['wings']*20;
		$results = $link->query("UPDATE $user SET mp = mp - $wings_cost");
		echo $message = 'You cast wings and grow some! You can now fly for '.$flying.' clicks.<br/>'; 
		include ('update_feed.php'); // --- update feed
	}
}
// -------------------------------------------------------------------------- CAST gills
if($input=='cast gills' || $input=='gills') 
{	
	$gills_cost = $row['gills']*10;
	if	($breathingwater>=1) { echo $message = "You are already breathing water!<br/>"; include ('update_feed.php'); } // --- update feed	
	else if ($row['gills'] < 1) {
		echo $message = "<i>You don't know the gills spell</i><br/>";
		include ('update_feed_alt.php'); // --- update feed
		}
	else {
		$breathingwater = $_SESSION['breathingwater'] = $row['gills']*20;
		$results = $link->query("UPDATE $user SET mp = mp - $gills_cost");
		echo $message = 'You cast gills and grow some! You can now breathe water for '.$breathingwater.' clicks.<br/>'; 
		include ('update_feed.php'); // --- update feed
	}
}






	
	
	
// -------------------------------------------------------------------------- CAST HEAL
if($input=='cast heal' || $input=='heal') 
{	
   	$hp = $row['hp'];
   	$hpmax = $row['hpmax'];
   	$heal_amount = rand (1,$row['magmod']); //$row['restoration'];
   		echo $heal_amount;
	$heal_cost = $row['heal']*2;
	$countdown = $row['heal'];   	
   	while ($countdown > 0)
	{
   		$heal_add = rand (1,$row['magmod']);
   			echo ' + '.$heal_add;
   		$heal_amount = $heal_amount + $heal_add;
   		$countdown = $countdown - 1;
   }
   echo ' = '.$heal_amount.'<br/>';

   if ($row['heal'] < 1)
	{
		echo $message="<i>You don't know the Heal spell</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
   else if ($hp >= $hpmax)
	{
		echo "<i>You already have full health</i><br/>";
		$message="<div class='castBox'>You already have full health</div>";
		include ('update_feed_alt.php'); // --- update feed
	}
	else if ($row['mp'] < $heal_cost)
	{
		echo "<i>You don't have enough MP to cast Heal</i><br/>";
		$message="<div class='castBox'>You don't have enough MP to cast Heal</div>";
		include ('update_feed_alt.php'); // --- update feed
	}
	else
	{
	   echo 'You cast heal for '.$heal_cost.' MP and restore '.$heal_amount.' HP <br/>';
		$message="<div class='castBox'>You cast heal for $heal_cost MP and restore $heal_amount HP</div>";
		include ('update_feed_alt.php'); // --- update feed
	$results = $link->query("UPDATE $user SET hp = hp + $heal_amount"); // -- hp change
 	$results = $link->query("UPDATE $user SET mp = mp - $heal_cost"); // -- mp change
	$message=""; //so doesn't display message in HUD battle status
	
	
	if (($hp + $heal_amount) > $hpmax) {$query = $link->query("UPDATE $user SET hp = $hpmax "); }
	
	}
//$funflag=1;		
}
// -------------------------------------------------------------------------- CAST regenerate
if($input=='cast regenerate' || $input=='regenerate') 
{	
   	
	$regenerate_cost = 20 * $row['regenerate']; // cost
	
   if ($row['regenerate'] < 1)
	{
		echo $message="<i>You don't know the regenerate spell</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	//else if ($row['regenerate'] > 1)
	//{
	//	echo "<i> You already have regenerate casted!</i><br/>";
	//	$message="<div class='battleBox'><i class='fa fa-plus green'></i> You already have regenerate casted!</div>";
	//	include ('update_feed_alt.php'); // --- update feed
	//}
   	else if ($row['mp'] < $regenerate_cost)
	{
		echo "<i>You don't have enough MP to cast regenerate</i><br/>";
		$message="<div class='castBox blackBG white'><i class='fa fa-times white px20'></i> You don't have enough MP to cast regenerate!</div>";
		include ('update_feed_alt.php'); // --- update feed
	}
	else
	{
		$hp = $row['hp'];
   		$hpmax = $row['hpmax'];
   		$regenerate_amount =rand ($row['regenerate'],$row['regenerate']*2); // regenerate amount
		$_SESSION['regenerate_clicks'] = $regenerate_clicks = rand ($row['mag'],$row['magmod']); // for how many clicks
	
	   	echo 'You cast regenerate for '.$regenerate_cost.' MP and will restore '.$regenerate_amount.' HP for '.$regenerate_clicks.' clicks<br/>';
		$message="<div class='castBox greenBG'><i class='fa fa-plus white px20'></i> You cast regenerate for $regenerate_cost MP and will restore $regenerate_amount HP for $regenerate_clicks clicks</div>";
		include ('update_feed_alt.php'); // --- update feed
	
		//$results = $link->query("UPDATE $user SET hp = hp + $regenerate_amount"); // -- hp change
 		$results = $link->query("UPDATE $user SET mp = mp - $regenerate_cost"); // -- mp change
		$message=""; //so doesn't display message in HUD battle status 
	}
}
// --- regeneration add
//if ($_SESSION['regenerate_clicks'] > 0) {  
$_SESSION['healthregen']+=$row['regenerate'];
// $_SESSION['regenerate_clicks'] -=1; // moved to status effects
//}



// -------------------------------------------------------------------------- CAST magic armor
if($input=='cast magic armor' || $input=='magic armor') 
{	
   	   
	   	$magicarmor_cost = 10 * $row['magicarmor']; // cost

	   
	if ($row['magicarmor'] < 1)
	{
		echo $message="<i>You don't know the magic armor spell</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
   	else if ($_SESSION['magicarmor_amount'] > 0)
	{
		echo "<i>You already have magic armor cast!</i><br/>";
		$message="<div class='castBox'>You already have magic armor cast!</div>";
		include ('update_feed_alt.php'); // --- update feed
	}
   	else if ($row['mp'] < $magicarmor_cost)
	{
		echo "<i>You don't have enough MP to cast magic armor</i><br/>";
		$message="<div class='castBox'>You don't have enough MP to cast magic armor</div>";
		include ('update_feed_alt.php'); // --- update feed
	}
	else
	{
		$magicarmor_amount = rand(1, $row['magmod']);
		$countdown = $row['magicarmor'];
		echo ' <span class="darkblue">[ '.$magicarmor_amount;
		while ($countdown > 1) // WILL BE ATOMIC BLAST
		{
   			$magicarmor_add = rand (1,$row['magmod']);
   			echo ' + '.$magicarmor_add;
   			$magicarmor_amount = $magicarmor_amount + $magicarmor_add;
   			$countdown = $countdown - 1;
 	  	} 
	echo ' = '.$magicarmor_amount.' ] </span>';
	$_SESSION['magicarmor_amount'] = $magicarmor_amount; //set global
	
	   echo 'You cast magic armor for '.$magicarmor_cost.' MP and will absorb an extra '.$magicarmor_amount.' damage<br/>';
		$message="<div class='castBox'>You cast magic armor for $magicarmor_cost MP and will absorb an extra $magicarmor_amount damage</div>";
		include ('update_feed_alt.php'); // --- update feed
	//$results = $link->query("UPDATE $user SET hp = hp + $magicarmor_amount"); // -- hp change
 	$results = $link->query("UPDATE $user SET mp = mp - $magicarmor_cost"); // -- mp change
	$message=""; //so doesn't display message in HUD battle status 
	
		
	}
} 



if ($_SESSION['ironskin_clicks'] > 0) {$_SESSION['ironskin_clicks'] -=1;}
else if ($_SESSION['ironskin_clicks'] == 0) {$_SESSION['ironskin_amount'] =0;}
// -------------------------------------------------------------------------- CAST iron skin
if($input=='cast iron skin' || $input=='iron skin') 
{	
   	$ironskin_cost = 10 * $row['ironskin']; // cost
	if ($row['ironskin'] < 1)
	{
		echo $message="<i>You don't know the iron skin spell</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
   	else if ($_SESSION['ironskin_amount'] > 0)
	{
		echo "<i>You already have iron skin cast!</i><br/>";
		$message="<div class='castBox'>You already have iron skin cast!</div>";
		include ('update_feed_alt.php'); // --- update feed
	}
   	else if ($row['mp'] < $ironskin_cost)
	{
		echo "<i>You don't have enough MP to cast iron skin</i><br/>";
		$message="<div class='castBox'>You don't have enough MP to cast iron skin</div>";
		include ('update_feed_alt.php'); // --- update feed
	}
	else
	{
		$_SESSION['ironskin_amount'] = $ironskin_amount = rand($row['ironskin']*2,$row['ironskin']*4);
		$_SESSION['ironskin_clicks'] = $ironskin_clicks = rand($row['mag'],$row['magmod']);
		//echo ' <span class="darkblue">[ +'.$ironskin_amount.' Def for '.$ironskin_clicks.' clicks ] </span>';
		echo 'You cast iron skin for '.$ironskin_cost.' MP and gain '.$ironskin_amount.' defense for '.$ironskin_clicks.' clicks<br/>';
		$message="<div class='castBox'>You cast iron skin for $ironskin_cost MP and gain $ironskin_amount defense for $ironskin_clicks clicks</div>";
		include ('update_feed_alt.php'); // --- update feed
	//$results = $link->query("UPDATE $user SET hp = hp + $ironskin_amount"); // -- hp change
 	$results = $link->query("UPDATE $user SET mp = mp - $ironskin_cost"); // -- mp change
	$message=""; //so doesn't display message in HUD battle status 
	}
}




//$_SESSION['regenerate_clicks']=0;

} // -end while

?>