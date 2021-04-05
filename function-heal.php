<?php
// -------------------------DB CONNECT!
include ('db-connect.php');
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){

		$hpmax=$row['hpmax'];
		$mpmax=$row['mpmax'];

		$hp=$row['hp'];
		$mp=$row['mp'];

		$redberry=$row['redberry'];
		$blueberry=$row['blueberry'];
		$rawmeat=$row['rawmeat'];
		$cookedmeat=$row['cookedmeat'];
		$redpotion=$row['redpotion'];
		$bluepotion=$row['bluepotion'];

		$veggies=$row['veggies'];
		$meatball=$row['meatball'];
		$bluefish=$row['bluefish'];

		$redbalm=$row['redbalm'];
		$bluebalm=$row['bluebalm'];
		$purplebalm=$row['purplebalm'];


// --------------------------------------------------------------------------- Drink RED POTION
if ($input=="drink red potion" || $input=="red potion" || $input=="+100 HP"){
	if	($redpotion<=0) { echo $message = '<div class="menuAction"><i class="fa fa-times lightred"></i>You are all out of red potions.</div>'; include ('update_feed.php'); } // --- update feed
	else if ($hp >= $hpmax) { echo $message = '<div class="menuAction"><i class="fa fa-times lightred"></i>You alreay have full health.</div>'; include ('update_feed.php'); } // --- update feed
	else {
		$results = $link->query("UPDATE $user SET hp = hp + 100");
		$results = $link->query("UPDATE $user SET redpotion = redpotion - 1");
		echo $message = '<div class="menuAction lightredBG white"><i class="fa lightred">+100 HP</i>You drink a red potion and heal 100 HP!</div>'; include ('update_feed.php'); // --- update feed
		if ( $hp+100 > $hpmax) {$query = $link->query("UPDATE $user SET hp = $hpmax "); } // if healing goes over max HP
		}  }
// --------------------------------------------------------------------------- eat REDBERRY
else if ($input=="eat redberry" || $input=="redberry" || $input=="+10 HP"){
	if	($redberry<=0) { echo $message = '<div class="menuAction"><i class="fa fa-times lightred"></i>You are all out of redberry.</div>'; include ('update_feed.php'); } // --- update feed
	else if ($hp >= $hpmax) { echo $message = '<div class="menuAction"><i class="fa fa-times gray"></i>You alreay have full health.</div>'; include ('update_feed.php'); } // --- update feed
	else {
		$results = $link->query("UPDATE $user SET hp = hp + 10");
		$results = $link->query("UPDATE $user SET redberry = redberry - 1");
		echo $message = '<div class="menuAction"><i class="fa lightred">+10 HP</i>You eat a redberry and heal 10 HP!</div>'; include ('update_feed.php'); // --- update feed
		if ( $hp+10 > $hpmax) {$query = $link->query("UPDATE $user SET hp = $hpmax "); } // if healing goes over max HP
		}  }
// --------------------------------------------------------------------------- Drink BLUE POTION
else if ($input=="drink blue potion" || $input=="blue potion" || $input=="+100 MP"){
	if	($bluepotion<=0) { echo $message = '<div class="menuAction"><i class="fa fa-times lightred"></i>You are all out of blue potions.</div>'; include ('update_feed.php'); } // --- update feed
	else if ($mp >= $mpmax) { echo $message = '<div class="menuAction"><i class="fa fa-times gray"></i>You alreay have full MP.</div>'; include ('update_feed.php'); } // --- update feed
	else {
		$results = $link->query("UPDATE $user SET mp = mp + 100");
		$results = $link->query("UPDATE $user SET bluepotion = bluepotion - 1");
		echo $message = '<div class="menuAction"><i class=" blue">+100 MP</i>You drink a blue potion and restore 100 MP!</div>'; include ('update_feed.php'); // --- update feed
		if ( $mp+100 > $hpmax) {$query = $link->query("UPDATE $user SET mp = $mpmax "); } // if healing goes over max HP
		}  }
// --------------------------------------------------------------------------- eat BLUE BERRY
else if ($input=="eat blueberry" || $input=="blueberry" || $input=="+10 MP"){
	if	($blueberry<=0) { echo $message = '<div class="menuAction"><i class="fa fa-times lightred"></i>You are all out of blueberries.</div>'; include ('update_feed.php'); } // --- update feed
	else if ($mp >= $mpmax) { echo $message = '<div class="menuAction"><i class="fa fa-times gray"></i>You already have full MP.</div>'; include ('update_feed.php'); } // --- update feed
	else {
		$results = $link->query("UPDATE $user SET mp = mp + 10");
		$results = $link->query("UPDATE $user SET blueberry = blueberry - 1");
		echo $message = '<div class="menuAction"><i class="blue">+10 MP</i> You eat a blueberry and restore 10 MP!</div>'; include ('update_feed.php'); // --- update feed
		if ( $mp + 10 > $hpmax) {$query = $link->query("UPDATE $user SET mp = mpmax "); } // if healing goes over max HP
		}  }

// --------------------------------------------------------------------------- Eat RAW MEAT
if ($input=="eat raw meat" || $input=="raw meat" || $input=="+25 HP"){
	if	($rawmeat<=0) { echo $message = '<div class="menuAction"><i class="fa fa-times lightred"></i>You don\'t have any raw meat.</div>'; include ('update_feed.php'); } // --- update feed
	else if ($hp >= $hpmax) { echo $message = '<div class="menuAction"><i class="fa fa-times gray"></i>You alreay have full health.</div>'; include ('update_feed.php'); } // --- update feed
	else {
		$results = $link->query("UPDATE $user SET hp = hp + 25");
		$results = $link->query("UPDATE $user SET rawmeat = rawmeat - 1");
		echo $message = '<div class="menuAction"><i class="fa lightred">+25 HP</i>You eat some raw meat and heal 25 HP!</div>'; include ('update_feed.php'); // --- update feed
		if ( $hp+25 > $hpmax) {$query = $link->query("UPDATE $user SET hp = $hpmax "); } // if healing goes over max HP
		}  }

// --------------------------------------------------------------------------- Eat COOKED MEAT
if ($input=="eat cooked meat" || $input=="cooked meat" || $input=="+50 HP"){
	if	($cookedmeat<=0) { echo $message = '<div class="menuAction"><i class="fa fa-times lightred"></i>You don\'t have any cooked meat.</div>'; include ('update_feed.php'); } // --- update feed

	else if ($hp >= $hpmax) { echo $message = '<div class="menuAction"><i class="fa fa-times lightred"></i>You alreay have full health.</div>'; include ('update_feed.php'); } // --- update feed
	else {
		$results = $link->query("UPDATE $user SET hp = hp + 50");
		$results = $link->query("UPDATE $user SET cookedmeat = cookedmeat - 1");
		echo $message = '<div class="menuAction"><i class="fa lightred">+50 HP</i>You eat some cooked meat and heal 50 HP!</div>'; include ('update_feed.php'); // --- update feed
		if ( $hp+50 > $hpmax) {$query = $link->query("UPDATE $user SET hp = $hpmax "); } // if healing goes over max HP
		}  }
// --------------------------------------------------------------------------- Drink PURPLE POTION
else if ($input=="drink purple potion" || $input=="purple potion" || $input=="+200 HP/MP"){
	if	($purplepotion<=0) { echo $message = '<div class="menuAction"><i class="fa  fa-times lightred"></i>You are all out of purple potions.</div>'; include ('update_feed.php'); } // --- update feed
	else if ($mp >= $mpmax && $hp >= $hpmax) { echo $message = '<div class="menuAction"><i class="fa fa-times gray"></i>You alreay have full HP & MP.</div>'; include ('update_feed.php'); } // --- update feed
	else {
		$results = $link->query("UPDATE $user SET mp = mp + 200");
		$results = $link->query("UPDATE $user SET hp = hp + 200");
		$results = $link->query("UPDATE $user SET purplepotion = purplepotion - 1");
		echo $message = '<div class="menuAction"><i class="fa lightpurple">+200 HP, +200 MP</i>You drink a purple potion and restore 200 HP & 200 MP!</div>'; include ('update_feed.php'); // --- update feed
		if ( $mp+200 > $mpmax) {$query = $link->query("UPDATE $user SET mp = $mpmax "); } // if healing goes over max HP
		if ( $hp+200 > $hpmax) {$query = $link->query("UPDATE $user SET hp = $hpmax "); } // if healing goes over max HP
		}  }


// --------------------------------------------------------------------------- Eat VEGGIES
if ($input=="eat veggies" || $input=="veggies" || $input=="+50 HP/MP"){
	if	($veggies<=0) { echo $message = '<div class="menuAction"><i class="fa fa-times lightred"></i>You don\'t have any veggies.</div>'; include ('update_feed.php'); } // --- update feed
	else if ($hp >= $hpmax && $mp >= $mpmax) { echo $message = '<div class="menuAction"><i class="fa fa-times lightred"></i>You alreay have full HP & MP.</div>'; include ('update_feed.php'); } // --- update feed
	else {
		$results = $link->query("UPDATE $user SET hp = hp + 50");
		$results = $link->query("UPDATE $user SET mp = mp + 50");
		$results = $link->query("UPDATE $user SET veggies = veggies - 1");
		echo $message = '<div class="menuAction"><i class="fa lightpurple">+50 HP, +50 MP</i>You eat some veggies and restore 50 HP & 50 MP!</div>'; include ('update_feed.php'); // --- update feed
		if ( $hp+50 > $hpmax) {$query = $link->query("UPDATE $user SET hp = $hpmax "); } // if healing goes over max HP
		if ( $mp+50 > $mpmax) {$query = $link->query("UPDATE $user SET mp = $mpmax "); } // if mp goes over max mp
		}  }

// --------------------------------------------------------------------------- Eat MEATBALL
if ($input=="eat meatball" || $input=="meatball" || $input=="+400 HP"){
	if	($meatball<=0) { echo '<div class="menuAction"><i class="fa fa-times lightred"></i>You don\'t have any meatballs.</div>';

	$message = 'You don\'t have any meatballs.</div>'; include ('update_feed.php'); } // --- update feed
	else if ($hp >= $hpmax) { echo $message = '<div class="menuAction"><i class="fa fa-times gray"></i>You alreay have full health.</div>'; include ('update_feed.php'); } // --- update feed
	else {
		$results = $link->query("UPDATE $user SET hp = hp + 400");
		$results = $link->query("UPDATE $user SET meatball = meatball - 1");
		echo $message = '<div class="menuAction"><i class="fa lightred">+400 HP</i>You eat a meatball and heal 400 HP!</div>'; include ('update_feed.php'); // --- update feed
		if ( $hp+400 > $hpmax) {$query = $link->query("UPDATE $user SET hp = $hpmax "); } // if healing goes over max HP
		}  }
// --------------------------------------------------------------------------- Eat Bluefish
if ($input=="eat bluefish" || $input=="bluefish" || $input=="+400 MP"){
	if	($bluefish<=0) { echo '<div class="menuAction"><i class="fa fa-times lightred"></i>You don\'t have any bluefish.</div>';

	$message = 'You don\'t have any bluefish.</div>'; include ('update_feed.php'); } // --- update feed
	else if ($mp >= $mpmax) { echo $message = '<div class="menuAction"><i class="fa fa-times gray"></i>You alreay have full mana.</div>'; include ('update_feed.php'); } // --- update feed
	else {
		$results = $link->query("UPDATE $user SET mp = mp + 400");
		$results = $link->query("UPDATE $user SET bluefish = bluefish - 1");
		echo $message = '<div class="menuAction"><i class="fafa-angle-double-right blue">+400 MP</i>You eat a bluefish and heal 400 MP!</div>'; include ('update_feed.php'); // --- update feed
		if ( $mp+400 > $mpmax) {$query = $link->query("UPDATE $user SET mp = $mpmax "); } // if healing goes over max HP
		}
		}



// --------------------------------------------------------------------------- Apply RED BALM
if ($input=="apply red balm" || $input=="red balm" || $input=="+1000 HP"){
	if	($redbalm<=0) { echo $message ='<div class="menuAction"><i class="fa fa-times lightred"></i>You don\'t have any red balm.</div>'; include ('update_feed.php'); } // --- update feed
	else if ($hp >= $hpmax) { echo $message = '<div class="menuAction"><i class="fa fa-times gray"></i>You alreay have full health.</div>'; include ('update_feed.php'); } // --- update feed
	else {
		$results = $link->query("UPDATE $user SET hp = hp + 1000");
		$results = $link->query("UPDATE $user SET redbalm = redbalm - 1");
		echo $message = '<div class="menuAction"><i class="fa lightred">+1000 HP</i>You apply some red balm and heal 1000 HP!</div>'; include ('update_feed.php'); // --- update feed
		if ( $hp+1000 > $hpmax) {$query = $link->query("UPDATE $user SET hp = $hpmax "); } // if healing goes over max HP
		}  }

// --------------------------------------------------------------------------- Apply blue BALM
if ($input=="apply blue balm" || $input=="blue balm" || $input=="+1000 MP"){
	if	($bluebalm<=0) { echo $message ='<div class="menuAction"><i class="fa fa-times lightred"></i>You don\'t have any blue balm.</div>'; include ('update_feed.php'); } // --- update feed
	else if ($mp >= $mpmax) { echo $message = '<div class="menuAction"><i class="fa fa-times gray"></i>You alreay have full mana.</div>'; include ('update_feed.php'); } // --- update feed
	else {
		$results = $link->query("UPDATE $user SET mp = mp + 1000");
		$results = $link->query("UPDATE $user SET bluebalm = bluebalm - 1");
		echo $message = '<div class="menuAction"><i class="fafa-angle-double-right blue">+1000 MP</i>You apply some blue balm and heal 1000 MP!</div>'; include ('update_feed.php'); // --- update feed
		if ( $mp+1000 > $mpmax) {$query = $link->query("UPDATE $user SET mp = $mpmax "); } // if healing goes over max HP
		}  }



// --------------------------------------------------------------------------- apply PURPLE balm
else if ($input=="apply purple balm" || $input=="purple balm" || $input=="+2000 HP/MP"){
	if	($purplebalm<=0) { echo $message = '<div class="menuAction"><i class="fa fa-angle-double-right"></i>You are all out of purple balms.</div>'; include ('update_feed.php'); } // --- update feed
	else if ($mp >= $mpmax && $hp >= $hpmax) { echo $message = '<div class="menuAction"><i class="fa fa-angle-double-right"></i>You alreay have full HP & MP.</div>'; include ('update_feed.php'); } // --- update feed
	else {
		$results = $link->query("UPDATE $user SET mp = mp + 2000");
		$results = $link->query("UPDATE $user SET hp = hp + 2000");
		$results = $link->query("UPDATE $user SET purplebalm = purplebalm - 1");
		echo $message = '<div class="menuAction"><i class="fa lightpurple">+2k HP, +2k MP</i>You apply a purple balm and restore 2000 HP & 2000 MP!</div>'; include ('update_feed.php'); // --- update feed
		if ( $mp+2000 > $mpmax) {$query = $link->query("UPDATE $user SET mp = $mpmax "); } // if healing goes over max HP
		if ( $hp+2000 > $hpmax) {$query = $link->query("UPDATE $user SET hp = $hpmax "); } // if healing goes over max HP
		}  }




} // end database while



?>
